<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class MainController extends Controller
{

    /**
     * Display main page
     * @return void
     */
    public function main() : void {
        echo view('main');
    }

    /**
     * Run the shorten URL action
     * @param Request $request
     * @return void
     */
    public function shorten(Request $request) : void {

        $validate = $request->validate([
            'url' => ['required', 'string', 'url'],
            'password' => ['nullable', 'min:4']
        ]);

        // If URL is okay.
        if ($validate) {

            $url = $validate['url'];
            $password = $validate['password'];

            // Check if we already have a code for this url.
            $record = Link::where('url', $url)->first();
            if (!$record) {
                $record = Link::generate($url, $password);
            }

            echo view('main', [
                'record' => $record
            ]);

        }

    }

    /**
     * Go to the URL linked to this code
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function go(Request $request) {

        $code = $request->code;

        // Do we have a url for that code?
        $link = Link::where('code', $code)->first();
        if (is_null($link)) {
            abort(404);
        }

        // Does it have a password?
        if (!is_null($link->password)) {
            echo view('password', [
                'link' => $link
            ]);
        } else {
            // Redirect to the URL.
            return redirect()->away($link->url);
        }

    }

    public function auth(Request $request) {

        $errors = new MessageBag();
        $code = $request->code;
        $password = $request->password;

        // Do we have a url for that code?
        $link = Link::where('code', $code)->first();
        if (is_null($link)) {
            abort(404);
        }


        // Do the password's match?
        if (Hash::check($password, $link->password)) {
            // Redirect to the URL.
            return redirect()->away($link->url);
        } else {

            $errors->add('password', 'Incorrect password.');

            echo view('password', [
                'link' => $link,
                'errors' => $errors
            ]);
        }



    }

}

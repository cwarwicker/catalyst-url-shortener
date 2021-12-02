<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Link extends Model
{

    /**
     * Get the shortened URL
     * @return string
     */
    public function getShortURL() : string {
        return url('/' . $this->code);
    }

    /**
     * Generate a random string for the 'code' and make sure it's unique
     * @return string
     */
    public static function generateUniqueCode() : string {

        // Make a random string.
        $code = Str::random(10);

        // Check it doesn't already exist.
        $check = Link::where('code', $code)->first();

        // If it exists, try again.
        if (!is_null($check)) {
            return static::generateUniqueCode();
        } else {
            return $code;
        }

    }

    /**
     * Generate a link code for this URL.
     * @param string $url
     * @return Link
     */
    public static function generate(string $url, string $password = null) : Link {

        $obj = new Link();
        $obj->url = $url;
        $obj->code = static::generateUniqueCode();
        $obj->password = (!is_null($password)) ? Hash::make($password) : null;
        $obj->save();
        return $obj;

    }

}

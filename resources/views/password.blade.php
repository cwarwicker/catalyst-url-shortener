@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 box">
                <h2>ACCESS RESTRICTED</h2>
                <p>This URL has been password protected. Please enter the password below:</p>
                <form action="{{ route('go', $link->code) }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="password" name="password" class="form-control" autocomplete="off">
                    </div>
                    <button class="btn">Continue</button>
                </form>
            </div>
        </div>

        @if ($errors->any())
            <div class="row">
                <div class="col alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
@endsection

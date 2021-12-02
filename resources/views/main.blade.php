@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 box">
                <h1>Paste URL to shorten</h1>
                <form action="" method="post" class="form-inline">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="url" placeholder="Enter your URL here">
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="mini-header"><a href="#" class="toggle" data-target="#options">Click here for more options</a></div>
                            <div id="options">
                                <br>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn mb-2">Shorten</button>
                </form>
            </div>
        </div>

        @if(isset($record))
            <div class="row justify-content-center">
                <div class="result">
                    <div class="col col original-url">{{ $record->url }}</div>
                    <div class="col col-3 new-url">
                        <a href="{{ $record->getShortURL() }}" target="_blank">{{ $record->getShortURL() }}</a>
                    </div>
                    <div class="col col-1 copy-button">
                        <button class="btn copy-clipboard flash" data-text="{{ $record->getShortURL() }}">Copy</button>
                    </div>
                </div>
            </div>
        @endif

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

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Vintage - Vintage Ecommerce">
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
               
                @csrf
               
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control agis-medium {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus autocomplete="off">
                       
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control agis-medium {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        SingIn
                    </button>
                </div>

                <div class="form-group row justify-content-center">
                    <a class="btn btn-link" href="{{ route('register') }}">
                        SingUp
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

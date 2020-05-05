@extends('layouts.app')

@section('content')

<div class="container">
    <div class="columns">
        <div class="column is-desktop is-one-third is-offset-one-third m-t-100">
            <div class="card m-b-20">
                <div class="card-content">
                    <h1 class="title">Register</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label class="label" for="name">{{ __('Name') }}</label>
                            <div class="control">
                                <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your name">
                            </div>
                            @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="email">{{ __('Email') }}</label>
                            <div class="control">
                                <input id="email" type="text" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                            </div>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="password">{{ __('Password') }}</label>
                            <div class="control">
                                <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
                            </div>
                        
                            @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="password">{{ __('Confirm Password') }}</label>
                            <div class="control">
                    
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-outlined is-fullwidth m-t-30">{{ __('Register') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <h5 class="has-text-centered">
              
                <span class="is-muted">{{ __('You have account ?.') }}<a class="is-primary" href="{{ route('login') }}">
                    {{ __('login now') }}
                </a>
            </h5>
        </div>
    </div>
</div>
@endsection


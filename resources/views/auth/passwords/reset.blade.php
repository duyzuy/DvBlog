@extends('layouts.app')

@section('content')


<div class="container">
    <div class="columns">
        <div class="column is-desktop is-one-third is-offset-one-third m-t-100">
            <div class="card m-b-20">
                <div class="card-content">
                    <h1 class="title">Forgot password?</h1>
                    @if (session('status'))
                        <p class="notification is-success">   {{ session('status') }}</p>
                    @endif


                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field">
                            <label class="label" for="email">Email</label>
                            <div class="control">
                                <input class="input @error('email') is-danger @enderror" type="text" id="email" name="email" placeholder="Email address" value="{{ $email ?? old('email') }}" autocomplete="email" required autofocus>
                            
                            </div>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="password">{{ __('Password') }}</label>
                            <div class="control">
                                <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">
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
                                <button class="button is-primary is-outlined is-fullwidth m-t-30">{{ __('Reset password') }}</button>
                            </div>
                        </div>
                    

                    </form>
                </div>
            </div>
            <h5 class="has-text-centered">
              
                <a class="is-muted" href="{{ route('login') }}">
                    {{ __('Back to login') }}
                </a>
               
            </h5>
        </div>
    </div>
</div>

@endsection

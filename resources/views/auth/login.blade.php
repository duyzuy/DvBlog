@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-desktop is-one-third is-offset-one-third m-t-100">
            <div class="card m-b-20">
                <div class="card-content">
                    <h1 class="title">Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <label class="label" for="email">Email</label>
                            <div class="control">
                                <input class="input @error('email') is-danger @enderror" type="text" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" autocomplete="current-email">
                            
                            </div>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label" for="password">Password</label>
                            <div class="control">
                                <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
                            </div>
                        
                            @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            Remember me
                        </label><br/>
                        {{-- <b-checkbox name="remember" class="m-t-20">Remember me</b-checkbox> --}}

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-outlined is-fullwidth m-t-30">{{ __('Login') }}</button>
                            </div>

                        
                        </div>

                    </form>
                </div>
            </div>
            <h5 class="has-text-centered">
                @if (Route::has('password.request'))
                <a class="is-muted" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </h5>
        </div>
    </div>
</div>
@endsection

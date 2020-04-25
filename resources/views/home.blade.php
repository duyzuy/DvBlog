@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <div class="card m-b-20">
               
                <div class="card-content">
                    <h1 class="title">Home</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                 
                    {{ __('welcome') . ' ' . Auth::user()->name }}
                </div>
        </div>
    </div>
@endsection

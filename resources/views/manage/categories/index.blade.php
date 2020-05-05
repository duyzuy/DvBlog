@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">
                    {{ __('Categories') }}
                </h1>
                <a href="{{ route('categories.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-plus m-r-10"></i>Create a category</a>
            </div>
        </div>

        <div class="card no-shadow">
            <div class="card-content">
               
            </div>
        </div>
    </div>
@endsection
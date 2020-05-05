@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Manage Roles</h1>
                <a href="{{ route('role.create') }}" class="button is-pulled-right is-primary"><i class="fa fa-plus m-r-10"></i>Create new role</a>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="card-content">
                <div class="columns is-multiline">

                    @foreach ($roles as $role)
                        <div class="column is-one-quarter">
                            <div class="box">
                                <article class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <h3 class="title">{{ $role->display_name }}</h3>
                                            <h4 class="subtitle"><em>{{ $role->name }}</em></h4>
                                            <p>{{ $role->description }}</p>
                                        </div>
                                        <nav class="level is-mobile">
                                            <div class="level-left">
                                                <p class="level-item">
                                                    <a class="button is-primary" href="{{ route('role.show', $role->id) }}" ">Details</a>
                                                </p>
                                               <p class="level-item">
                                                    <a class="button is-light" href="{{ route("role.edit", $role->id) }}" >Edit</a>
                                               </p>
                                            </div>
                                        </nav>
                                    </div>

                                </article>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
@endpush
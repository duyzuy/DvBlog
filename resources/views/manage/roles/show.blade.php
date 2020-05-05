@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">{{ $role->name }}</h1>
                <a href="{{ route('role.edit', $role->id) }}" class="button is-primary is-pulled-right"><i class="fas fa-pen m-r-10"></i>Edit role</a>
            </div>
          
        </div>
        <div class="card no-shadow">
            <div class="card-content">
                <div class="desc m-b-30">
                    <h4 class="subtitle"><em>({{ $role->display_name }})</em></h4>
                    <p>{{ $role->description }}</p>
                    <hr/>
                </div>
                <h4 class="title is-4">Permissions:</h4>
                <div class="content">
                    <ol type="1">
                        @foreach($permissions as $permission)
                        <li>{{ $permission->display_name }} <em class="m-l-15">({{ $permission->name }})</em></li>
                        @endforeach
                       
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
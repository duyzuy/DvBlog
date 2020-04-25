@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Edit {{ $role->name }}</h1>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="card-content">
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="desc m-b-30">
                        <div class="field">
                            <label for="role_name" class="label">Name (Human readable)</label>
                            <div class="control">
                                <input type="text" name="role_name" id="role_name" class="input" value="{{ $role->display_name }}">
                            </div>
                        </div>
                        <div class="field">
                            <label for="role_name" class="label">Slug (Can't be edited)</label>
                            <div class="control">
                                <input type="text" name="role_slug" id="role_slug" disabled class="input" value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="field">
                            <label for="role_name" class="label">Descriptions</label>
                            <div class="control">
                                <input type="text" name="role_desc" id="role_desc" class="input" value="{{ $role->description }}">
                            </div>
                        </div>

                        <input type="hidden" class="input" name="permissions_selected" :value="permissionsSelected">
                    
                        <hr/>
                    </div>

                    <h4 class="title is-4">Chose the permissions:</h4>
                    <div class="content">
                        <ol type="1">
                            @foreach($permissions as $permission)
                            <div class="field">
                                <b-checkbox v-model="permissionsSelected" native-value="{{ $permission->id }}">
                                    {{ $permission->display_name }} 
                                    <em class="m-l-15">({{ $permission->name }})</em>
                                </b-checkbox>
                            </div>
                          
                            @endforeach
                        
                        </ol>
                       
                    </div>
                    <hr class="m-t-10 m-b-30" />
                    <div class="field">
                        <button class="button is-primary m-r-15" type="submit">Update role</button>
                        <a href="{{ route('role.show', $role->id) }}" class="button is-light is-info">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var app = new Vue({
            el: '#app', 
            data: {
                permissionsSelected: {!! $role->role_permission->pluck('id') !!}
            }
        })
    </script>
@endpush
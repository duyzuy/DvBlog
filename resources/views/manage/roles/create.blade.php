@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Create new role</h1>
            </div>
        </div>

     
        <div class="card no-shadow">
            <div class="card-content">

                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="desc m-b-30">
                        <div class="field">
                            <label for="role_name" class="label">Name (Human readable)</label>
                            <div class="control">
                                <input type="text" name="role_name" id="role_name" class="input @error('role_name') is-danger @enderror" value="{{ old('role_name') }}" placeholder="Name of role">
                                @error('role_name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label for="role_name" class="label">Slug</label>
                            <div class="control">
                                <input type="text" name="role_slug" id="role_slug" class="input @error('role_slug') is-danger @enderror" value="{{ old("role_slug") }}" placeholder="slug-name">
                                @error('role_slug')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label for="role_name" class="label">Descriptions</label>
                            <div class="control">
                                <input type="text" name="role_desc" id="role_desc" class="input" value="{{ old('role_desc') }}" placeholder="What's this role can do?">
                            </div>
                        </div>

                        <input type="hidden" class="input" name="permissions_selected" :value="permissionsSelected">
                    
                        <hr/>
                    </div>

                    <h4 class="title is-4">Permissions:</h4>
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
                        <button class="button is-primary m-r-15" type="submit">Create role</button>
                        <a href="{{ route('role.index') }}" class="button is-light is-info">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const app = new Vue({
            el: '#app', 
            data: {
                permissionsSelected: [],
            }
        })
    </script>
@endpush
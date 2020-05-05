@extends('layouts.manage')

@section('content')
    
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Edit permission</h1>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="card-content">

             
                <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field permission-basic" v-if="permission_options == 'basic_permission'">
                        <div class="field">
                            <label for="permission_name" class="label">Name (Display Name)</label>
                            <div class="control">
                                <input class="input" type="text" name="permission_name" id="permission_name" placeholder="Permission name" value="{{ $permission->display_name }}">
                            </div>
                        </div>

                        <div class="field">
                            <label for="permission_slug" class="label">Slug</label>
                            <div class="control">
                                <input class="input" type="text" name="permission_slug" disabled id="permission_slug" placeholder="Permission slug" value="{{ $permission->name }}">
                            </div>
                        </div>

                        <div class="field">
                            <label for="permission_desc" class="label">Description</label>
                            <div class="control">
                                <input class="input" type="text" name="permission_desc" id="permission_desc" placeholder="Describe what this permission does" value="{{ $permission->description }}">
                            </div>
                        </div>
                    </div>
                    <div class="field m-t-50">
                        <button class="button is-primary m-r-10" type="submit">Update permission</button>   
                        <a href="{{ route('permission.index') }}" class="button is-link is-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
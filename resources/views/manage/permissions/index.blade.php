@extends('layouts.manage')

@section('content')
    
<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-inline-block">Manage Permissions</h1>
            <a href="{{ route('permission.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-plus m-r-10"></i>Create Permission</a>
        </div>
    </div>

    <div class="card no-shadow">
        <div class="card-content">
            <table class="table is-narow is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>slug</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td><a href="{{ route('permission.show', $permission->id) }}" class="button is-small">{{ __('view') }}</a> <a href="{{ route('permission.edit', $permission->id) }}" class="button is-small">{{ __('Edit') }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="page-paginations m-t-20">
   {{ $permissions->links() }}
    </div>
</div>
@endsection

@push('scripts')
    
@endpush
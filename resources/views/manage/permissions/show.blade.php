@extends('layouts.manage')

@section('content')
    
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Permission Details</h1>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="card-content">
                <pre>
                    {{ $permission->display_name }}
                    {{ $permission->name }}
                    {{ $permission->description}}
                </pre>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
   
@endpush
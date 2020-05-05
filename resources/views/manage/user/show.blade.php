@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-inline-block">{{ __('User Details') }}</h1>
            <a class="button is-primary is-pulled-right" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-user-edit m-r-10"></i>{{ __('Edit user') }}</a>
        </div>
    </div>
    <div class="card no-shadow">
        <div class="card-content">
            <h4 class="title is-4">{{ $user->name }}</h4>
            <p><strong>Email: </strong></p>
            <pre>{{ $user->email }}</pre> 
            <p class="m-t-30"><strong>Roles:</strong></p>
            {{ count($roles) == null ? 'This user is not assigned role' : '' }}
            @foreach($roles as $role)
            <pre>{{ $role->display_name }} <em>({{ $role->name }})</em></pre>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
    
@endpush
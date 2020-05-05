@extends('layouts.manage')
@section('content')
        <div class="flex-container">
            <div class="columns m-t-10">
                <div class="column">
                    <h1 class="title is-inline-block">Manager Users</h1>
                    <a href="{{ route('user.create') }}" class="button is-primary is-pulled-right"><i class="fas fa-user-plus m-r-10"></i>Create new user</a>
                </div>
            </div>
           <div class="card no-shadow">
               <div class="card-content">
                <table class="table is-fullwidth is-narrow">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="button is-small">View</a>
                                <a href="{{ route('user.edit', $user->id) }}" class="button is-small">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
           </div>
           <div class="page-paginations m-t-20">
            {{ $users->links() }}
           </div>
           
        </div>
@endsection
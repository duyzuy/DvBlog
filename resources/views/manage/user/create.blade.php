@extends('layouts.manage')

@section('content')
    
    <div class="flex-container">
        <div class="collumns">
            <div class="collumn">
                <h1 class="title">Create new user</h1>
            </div>
        </div>
        <div class="card no-shadow m-t-20">
            <div class="card-content">
              <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="columns">

                  <div class="column">
                    <div class="field">
                      <label class="label">{{ __('Your name') }}</label>
                      <div class="control">
                        <input class="input" type="text" name="name" placeholder="Name" autocomplete>
                      </div>
                    </div>
                    
                    <div class="field">
                      <label class="label">Email</label>
                      <div class="control">
                        <input class="input" type="text" name="email" placeholder="Email address" autocomplete>
                      </div>
                    </div>
                
                    <div class="field">
                      <label class="label">Password</label>
                      <div class="control">
                        <input class="input" v-if="auto_password === 'no'" type="password" name="password" id="password" placeholder="Manually create password" autocomplete>
                        <b-checkbox v-model="auto_password" name="auto_generate" class="m-t-15" true-value="yes" false-value=no> {{ __('Auto generate password') }}</b-checkbox>
                      </div>
                    </div>
                  </div>
                  <div class="column">
                    @foreach ($roles as $role)
                      <div class="field">
                        <b-checkbox v-model="userRolseSelected" native-value="{{ $role->id }}">{{ $role->name }}</b-checkbox>
                      </div>
                    @endforeach

                    <input type="hidden" class="input" name="roles_selected" :value="userRolseSelected">
                  </div>
                </div>
               
                 
                  <div class="field is-grouped m-t-20">
                    <div class="control">
                      <button class="button is-primary" type="submit">Submit</button>
                    </div>
                    <div class="control">
                      <a class="button is-link is-light" href="{{ route('user.index') }}">cancel</a>
                    </div>
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
      data:{
        auto_password: 'yes',
        userRolseSelected: []
      }
    })

    </script> 
@endpush

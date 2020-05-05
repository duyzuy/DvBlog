@extends('layouts.manage')

@section('content')
    
    <div class="flex-container">
        <div class="collumns">
            <div class="collumn">
                <h1 class="title">Edit user</h1>
            </div>
        </div>
        <div class="card no-shadow m-t-20">
            <div class="card-content">
              <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="columns">
                    <div class="column">
                      <div class="field">
                          <label class="label">{{ __('Your name') }}</label>
                          <div class="control">
                            <input class="input" type="text" name="name" placeholder="Name" autocomplete value="{{ $user->name }}">
                          </div>
                        </div>
                        
                        <div class="field">
                          <label class="label">Email</label>
                          <div class="control">
                            <input class="input" type="text" name="email" placeholder="Email address" autocomplete value="{{ $user->email }}">
                          </div>
                        </div>
                      
                        <div class="field">
                          <label class="label">Password</label>
                        
                              <div class="field">
                                <b-radio v-model="password_options" name="password_options" native-value="keep">Keep old password</b-radio>
                              </div>
                              <div class="field">
                                  <b-radio v-model="password_options" name="password_options" native-value="auto" >Auto generate new password</b-radio>
                              </div>
                              <div class="field">
                                <b-radio v-model="password_options" name="password_options" native-value="manual" >Manual create password</b-radio>
                                <div class="control m-t-10" v-if="password_options == 'manual'">
                                  <input class="input" type="password" name="password" id="password" placeholder="Manually create password" autocomplete>
                                </div>
                              </div>
                        </div>
                        <div class="field">
                          <input type="hidden" class="input" name="roles_selected" :value="rolesSelected">
                        </div>
                      </div>
                      <div class="column">
                        <div class="box">
                          @foreach($roles as $role)
                          <div class="field">
                            <b-checkbox v-model="rolesSelected" native-value="{{ $role->id }}">{{ $role->display_name }}</b-checkbox>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                 
                  <div class="field is-grouped m-t-30">
                    <div class="control">
                      <button class="button is-primary" type="submit">Update user</button>
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
        password_options: 'keep', 
        rolesSelected: {!! $user->user_role()->pluck('id') !!},
      }
    })

    </script> 
@endpush

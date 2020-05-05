@extends('layouts.manage')

@section('content')
    
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Create a permission</h1>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="card-content">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf
                    <div class="feild m-b-30">
                        <b-radio v-model="permission_options" name="permission_options" id="permission_options" native-value="basic_permission">Basic Permission</b-radio>
                        <b-radio v-model="permission_options" name="permission_options" id="permission_options" native-value="crud_permission">CRUD Permission</b-radio>
                    </div>
                    <div class="field permission-basic" v-if="permission_options == 'basic_permission'">
                        <div class="field">
                            <label for="permission_name" class="label">Name (Display Name)</label>
                            <div class="control">
                                <input class="input" type="text" name="permission_name" id="permission_name" placeholder="Permission name">
                            </div>
                        </div>

                        <div class="field">
                            <label for="permission_slug" class="label">Slug</label>
                            <div class="control">
                                <input class="input" type="text" name="permission_slug" id="permission_slug" placeholder="Permission slug">
                            </div>
                        </div>

                        <div class="field">
                            <label for="permission_desc" class="label">Description</label>
                            <div class="control">
                                <input class="input" type="text" name="permission_desc" id="permission_desc" placeholder="Describe what this permission does">
                            </div>
                        </div>
                    </div>

                    <div class="field permission-crud" v-if="permission_options == 'crud_permission'">
                        <div class="field m-b-30">
                            <label for="resource" class="label">Resource</label>
                            <div class="control">
                                <input type="text" name="resource" id="resource" v-model="permission_resource" class="input" placeholder="The name of the resource">
                            </div>
                        </div>
                        <div class="field columns">
                            <div class="field column">
                                <div class="field">
                                    <b-checkbox native-value="create" v-model="permission_crud">Create</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox native-value="read"  v-model="permission_crud">Read</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox native-value="update"  v-model="permission_crud">Update</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox native-value="delete" v-model="permission_crud">Delete</b-checkbox>
                                </div>
                            </div>
                            <input type="hidden" class="input" name="crud_selected" :value="permission_crud">
                            <div class="field column">
                                <table class="table is-narrow is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="permission_resource.length >= 3">

                                        <tr v-for="item in permission_crud">
                                            <td v-text="crudName(item)"></td>
                                            <td v-text="crudSlug(item)"></td>
                                            <td v-text="crudDesc(item)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>

                    <div class="field m-t-50">
                        <button class="button is-primary m-r-10" type="submit">Create permission</button>   
                        <a href="{{ route('permission.index') }}" class="button is-link is-light">Cancel</a>
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
                permission_options: 'basic_permission',
                permission_crud: ['create', 'read', 'update', 'delete'],
                permission_resource: '',

            }, 
            methods: {
                crudName: function(item){
                  return item.substr(0,1).toUpperCase() + item.substr(1) + ' ' + this.permission_resource.substr(0,1).toUpperCase() + this.permission_resource.substr(1);
                },
                crudSlug: function(item){
                    return item.toLowerCase() + '-' + this.permission_resource.toLowerCase();
                },
                crudDesc: function(item){
                    return "Allow a user to " + item.toUpperCase() + " a " + this.permission_resource.substr(0,1).toUpperCase() + this.permission_resource.substr(1);
                }
            }
        })
    </script>
@endpush
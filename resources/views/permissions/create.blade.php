@extends ('layouts.manage')
@section('content')
    <div class="columns">
        <div class="column flex-container m-t-20">
            <div class="title">
                Create permission
            </div>
            <form action="{{ route('permissions.store') }}" method="POST">
                {{ csrf_field() }}

                <b-field>
                    <b-radio v-model="permission_type"
                        name="permission_type"
                        native-value="basic">
                        Basic
                    </b-radio>
                    <b-radio v-model="permission_type"
                        name="permission_type"                    
                        native-value="crud">
                        Crud
                    </b-radio>
                </b-field>

                <div v-if="permission_type === 'basic'">

                    <b-field label="Name">
                        <b-input
                                type="text"
                                id="name"
                                icon="face"
                                name="name"
                                required
                                >                                                                
                        </b-input>
                    </b-field>
    
                    <b-field label="Slug" for="slug">
                        <b-input type="text"
                                 name="display_name"
                                 id="slug"
                                 icon="short_text"
                                 required
                                 >
                        </b-input>
                    </b-field>
    
    
                    <b-field label="Description">
                        <b-input type="text"
                               name="description"
                               id="description"
                               icon="description"
                               required                               
                        ></b-input>
                    </b-field>
                </div>
                <div v-else>
                    <div class="columns">
                        <div class="column">
                            <b-field label="Resource">
                                <b-input
                                        type="text"
                                        id="resource"
                                        icon="face"
                                        v-model="resource"
                                        name="resource"
                                        required
                                        >                                                                
                                </b-input>
                            </b-field>
                            <b-field>
                                <b-checkbox 
                                    v-model="crudSelected"
                                    native-value="create">
                                    Create
                                </b-checkbox>
                            </b-field>
                            <b-field>
                                <b-checkbox 
                                    v-model="crudSelected"
                                    native-value="read">
                                    Read
                                </b-checkbox>
                            </b-field>
                            <b-field>
                                <b-checkbox 
                                    v-model="crudSelected"
                                    native-value="update">
                                    Update
                                </b-checkbox>
                            </b-field>
                            <b-field>
                                <b-checkbox 
                                    v-model="crudSelected"
                                    native-value="delete">
                                    Delete
                                </b-checkbox>
                            </b-field>
                        </div>
                        <input type="hidden" name="crud_selected" :value="crudSelected">
                        <div class="column">
                            <table class="table" style="width: 100%">
                                <thead>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                </thead>
                                <tbody v-if="resource.length >= 3 && crudSelected.length > 0">
                                    <tr v-for="item in crudSelected">
                                    <td v-text="crudName(item)"></td>
                                    <td v-text="crudSlug(item)"></td>
                                    <td v-text="crudDescription(item)"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="button is-success is-fullwidth" style="margin-top: 10px">Create new permission</button>                    
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var app  = new Vue({
            el: '#app',
            data: {
                permission_type: 'basic',
                crudSelected: ['create', 'read', 'update', 'delete'],
                resource: ''
            },
            methods: {
                crudName: function(item) {
                  return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function(item) {
                  return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function(item) {
                  return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                }
              }
        });
    </script>
@endsection


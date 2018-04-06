@extends ('layouts.manage')
@section('content')
    <div class="columns">
        <div class="column flex-container m-t-20">
            <div class="title">
                Edit users
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <b-field label="Fullname">
                    <b-input
                            value="{{$user->name}}"
                            icon="face"
                            name="name">
                    </b-input>
                </b-field>

                <b-field label="Email" for="email">
                    <b-input type="email"
                             value="{{$user->email}}"
                             name="email"
                             id="email"
                             icon="email"
                             >
                    </b-input>
                </b-field>


                <b-field label="Password">
                    <b-input type="password"
                           name="password"
                           id="password"
                           v-if="password_option == 'manual'"
                           maxlength="30"
                           :has-counter="true"
                           placeholder="Manually give a password to this user"
                           password-reveal
                           icon="lock"
                    ></b-input>
                </b-field>


                <b-field>
                    <b-radio v-model="password_option"
                        name="password_option"
                        native-value="manual">
                        Manual
                    </b-radio>
                    <b-radio v-model="password_option"
                        name="password_option"                    
                        native-value="keep">
                        Do not change password
                    </b-radio>
                    <b-radio v-model="password_option"
                        name="password_option"                        
                        native-value="auto">
                        Auto Generate new password
                    </b-radio>
                </b-field>


                <button type="submit" name="submit" class="button is-success is-fullwidth">Edit user</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var app  = new Vue({
            el: '#app',
            data: {
                checked: false,
                password_option: 'keep',
                email:'',

            },
        });
    </script>
@endsection


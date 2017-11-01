@extends ('layouts.manage')
@section('content')
    <div class="columns">
        <div class="column flex-container m-t-20">
            <div class="title">
                Create users
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}

                <b-field label="Fullname">
                    <b-input
                            value=""
                            icon="face"
                            name="name">
                    </b-input>
                </b-field>

                <b-field label="Email" for="email">
                    <b-input type="email"
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
                           v-if="!auto_password"
                           maxlength="30"
                           :has-counter="true"
                           placeholder="Manually give a password to this user"
                           password-reveal
                           icon="lock"
                    ></b-input>
                </b-field>


                <b-field>
                    <b-checkbox v-model="auto_password" name="auto_password">Auto Generate Password</b-checkbox>
                </b-field>


                <button type="submit" name="submit" class="button is-success is-fullwidth">Create new user</button>
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
                auto_password: true,
                email:'',

            },
        });
    </script>
@endsection


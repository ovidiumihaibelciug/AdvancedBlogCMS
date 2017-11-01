@extends ('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-20">
            <div class="column">
                <div class="title">
                    User details
                </div>
            </div>
            <div class="column">
                <a href="{{ route('users.edit', $user->id) }}" class="button is-success is-pulled-right "><span class="icon"><i class="fa fa-cog"></i></span>&nbsp; Edit user details</a>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <p>Name: <strong>{{ $user->name }}</strong></p>
                    <p>E-mail: <strong>{{ $user->email }}</strong></p>
                </div>
            </div>
        </div>
    </div>
@endsection



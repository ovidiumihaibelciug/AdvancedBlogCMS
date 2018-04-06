@extends('layouts.app')

@section('content')

    <div id="app">

        <div class="columns m-t-75">
            <div class="column is-one-third is-offset-one-third">
                <div class="card">
                    <div class="card-header-title">
                        <h1 class="title" style="font-weight: 100">Log in</h1>
                    </div>

                    <div class="card-content">
                        <form action="{{ route('login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="field">
                                <label for="email" class="label">Email Adress</label>
                                <div class="control">
                                    <input type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <p class="is-danger help">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="field">

                                <label for="password" class="label">Password</label>
                                <div class="control">
                                    <input type="password" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="password" id="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="is-danger help">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
 
                            <b-checkbox class="p-t-10 p-b-20" name="remember">Remember me</b-checkbox>

                            <button class="button is-success is-outlined is-fullwidth">Log in</button>

                        </form>
                    </div> <!-- End Card Content -->
                </div><!-- END CARD -->
                <h5 class="has-text-centered m-t-10"><a href="{{ route('password.request') }}" class="is-muted">Forgot Your Password?</a></h5>
            </div> <!-- END COLUMN -->
        </div> <!-- END ROW -->

    </div> <!-- END APP -->

@endsection

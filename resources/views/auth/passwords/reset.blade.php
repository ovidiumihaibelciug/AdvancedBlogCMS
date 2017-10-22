@extends('layouts.app')

@section('content')

    <div id="app">
        @if (session('status'))
            <div class="notification is-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="columns m-t-75">
            <div class="column is-one-third is-offset-one-third">
                <div class="card">
                    <div class="card-header-title">
                        <h1 class="title" style="font-weight: 100">Reset Your Password</h1>
                    </div>

                    <div class="card-content">
                        <form action="{{ route('password.request') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="field">
                                <label for="email" class="label">Email Adress</label>
                                <div class="control">
                                    <input type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}"required>
                                </div>
                                @if ($errors->has('email'))
                                    <p class="is-danger help">{{ $errors->first('email') }}</p>
                                @endif
                            </div>


                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label for="password" class="label">Password</label>
                                        <div class="control">
                                            <input type="password" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="password" id="password" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <p class="is-danger help">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="password_confirmation" class="label">Confirm password</label>
                                        <div class="control">
                                            <input type="password" class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" name="password_confirmation" id="password_confirmation" required>
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <p class="is-danger help">{{ $errors->first('password_confirmation') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <button class="button is-success is-outlined is-fullwidth">Register</button>

                        </form>
                    </div> <!-- End Card Content -->
                </div><!-- END CARD -->
                <h5 class="has-text-centered m-t-10"><a href="{{ route('login') }}" class="is-muted">Do you have a account? Log in here.</a></h5>
            </div> <!-- END COLUMN -->
        </div> <!-- END ROW -->
    </div> <!-- END APP -->

@endsection

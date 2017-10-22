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
                        <h1 class="title" style="font-weight: 100">Forgot Password?</h1>
                    </div>

                    <div class="card-content">
                        <form action="{{ route('password.email') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="field">
                                <label for="email" class="label">Email Adress</label>
                                <div class="control">
                                    <input type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <p class="is-danger help">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <button class="button is-success is-outlined is-fullwidth">Get Reset Link</button>

                        </form>
                    </div> <!-- End Card Content -->
                </div><!-- END CARD -->
                <h5 class="has-text-centered m-t-10"><a href="{{ route('login') }}" class="is-muted"><span class="icon"><i class="fa fa-caret-left"></i></span> Back to login</a></h5>
            </div> <!-- END COLUMN -->
        </div> <!-- END ROW -->

    </div> <!-- END APP -->
@endsection

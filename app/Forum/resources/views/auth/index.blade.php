@extends('forum::layouts.full')

@section('forum.body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <form class="form-signin" method="POST" action="{{ route('auth.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h2 class="form-signin-heading">Please sign in</h2>

                    <div class="form-group">

                        <label for="inputEmail" class="sr-only">User/Email address</label>
                        <input type="text"
                               name="email"
                               value="{{ old('email') }}"
                               id="inputEmail"
                               class="form-control"
                               placeholder="User/Email address" required autofocus>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password"
                               name="password"
                               id="inputPassword"
                               class="form-control" placeholder="Password" required>
                    </div>
                    <!-- /.form-group -->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection

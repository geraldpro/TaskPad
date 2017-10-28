@extends('layout.app')

@section('content')
<div class="container">
 <div class="row">
    <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">LOGIN</div>
            
 <div class="text-center">Don't have an account? Click <a href="{{url('/auth/register')}}">here</a> to Sign Up</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        {{ csrf_field() }}

                           @if (session('status'))
                           <div class="alert alert-success">
                                {{ session('status') }}
                          </div>
                           @endif

                 
                       @if (session('info'))
                           <div class="alert alert-success">
                                {{ session('info') }}
                          </div>
                       @endif

                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-MAIL ADDRESS</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">PASSWORD</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    LOGIN
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="col-md-3"></div>

    </div>
</div>
@endsection

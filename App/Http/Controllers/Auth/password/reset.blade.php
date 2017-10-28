@extends('layout.app')
@section('content')
<!-- Reset password section -->
<div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Reset Your Password</h2>
        <p>Enter your email address and we'll send you a link to reset your password.</p>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
      </form>

    </div> <!-- /container -->
@endsection
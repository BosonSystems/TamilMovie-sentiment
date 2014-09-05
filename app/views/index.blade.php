@extends('layouts.master')

@section('content')
<div class="wrapper">

    <form class="form-signin" method="post" action="login">
        @if($errors->all())
        <div class="alert alert-danger">
            {{  HTML::ul($errors->all()) }}
        </div>
        @endif
        @if(Session::has('msg'))
        <div class="alert alert-warning">
            <p>{{ Session::get('msg') }}</p>
        </div>
        @endif
        <h2 class="form-signin-heading">Please login</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>
@stop
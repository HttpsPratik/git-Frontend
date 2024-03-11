@extends('dashboard.auth.layouts.app')
@section('content')
<p class="login-box-msg">Please login to continue</p>

<form action="{{ route('admin.login') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <span class="input-group-text fa fa-eye toggle-password" toggle="#password"> </span>
            </div>
    </div>

    <div class="form-group mt-2 mb-2">
        <div class="captcha">
            <span>{!! captcha_img('flat') !!}</span>
            <button type="button" class="btn btn-danger" id="reload-captcha">
                &#x21bb;
            </button>
        </div>
    </div>
    <div class="form-group mb-2">
        <input id="captcha" type="text" class="form-control" placeholder="Captcha" name="captcha">
    </div>

    @if($errors->any())
        @foreach( array_reverse($errors->all()) as $error )
            <div class="text-danger mb-1">{{ $error }}</div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>

{{--<p class="mb-1 mt-3 text-center">
    <a href="{{url('/forgot-password')}}">I forgot my password</a>
</p>--}}

@endsection

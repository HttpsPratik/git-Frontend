@extends('frontend.auth.app')
@section('content')

    @if (session('status') == 'Your password has been reset!')
        <div class="mb-4 font-medium text-center text-lg text-success">
            {{ __('पासवर्ड रिसेट गरियो') }}
        </div>
    @endif

    <form method="POST"  action="{{route('login')}}">
        @csrf
        <h3 class="h3 mb-3 text-center">लगइन गर्नुहोस्</h3>

        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">इमेल ठेगाना</label>
        </div>

        <div class="input-group mb-3">
            <div class="form-floating" style="flex: 85%;">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">पासवर्ड</label>
            </div>
            <span class="input-group-text toggle-password" toggle="#floatingPassword" style="flex: 15%; place-content: center;"><i class="fa fa-eye" ></i></span>
        </div>

        <div class="form-floating mb-3">
            <div class="captcha">
                <span>{!! captcha_img('flat') !!}</span>
                <button type="button" class="btn btn-danger" id="reload-captcha">
                    &#x21bb;
                </button>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input id="captcha" type="text" class="form-control" placeholder="Captcha" name="captcha">
            <label for="floatingPassword">क्याप्चा</label>
        </div>
        @if($errors->any())
            @foreach( $errors->all() as $error )
                <div class="text-danger mb-1">{{ $error }}</div>
            @endforeach
        @endif
        <div class="checkbox mb-4">
            <label>
                <input name="remember" type="checkbox" value="remember-me"> लग इन भइराख्ने
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">लग इन</button>
        <div class="text-center d-block mb-2">
            <a href="{{route('register')}}" class="mb-3 text-center text-decoration-none text-muted">दर्ता गर्नुहोस</a>
        </div>
        <div class="text-center d-block">
            <a href="{{route('password.request')}}" class="mb-3 text-center text-decoration-none text-muted">पासवर्ड बिर्सिएँ</a>
        </div>
    </form>
@endsection

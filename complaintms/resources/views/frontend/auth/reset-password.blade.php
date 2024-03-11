@extends('frontend.auth.app')
@section('content')
    <form method="POST"  action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <h6 class="h6 mb-3 text-center">कृपया पासवर्ड भर्नुहोस् र पासवर्ड पुष्टि गर्नुहोस्</h6>

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" value="{{ old('email', $request->email) }}" required readonly autofocus>
            <label for="email">इमेल ठेगाना</label>
            {{--<x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
            <div class="form-floating" style="flex: 85%;">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">पासवर्ड</label>
            </div>
            <span class="input-group-text toggle-password" toggle="#password" style="flex: 15%; place-content: center;"><i class="fa fa-eye" ></i></span>
        </div>

        <div class="input-group mb-3">
            <div class="form-floating" style="flex: 85%;">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password_confirmation">
                <label for="password_confirmation">पूनः पासवर्ड</label>
            </div>
            <span class="input-group-text toggle-password" toggle="#password_confirmation" style="flex: 15%; place-content: center;"><i class="fa fa-eye" ></i></span>
        </div>

        <!-- Captcha -->
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
        <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">पासवर्ड रिसेट गर्नुहोस्</button>
        <div class="text-center d-block">
            <a href="{{route('login')}}" class="mb-3 text-center text-decoration-none text-muted">लग इन गर्नुहोस्</a>
        </div>
    </form>
@endsection


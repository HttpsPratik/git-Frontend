@extends('frontend.auth.app')
@section('content')
    <form method="POST"  action="{{route('register')}}">
        @csrf
        <h3 class="h3 mb-3 text-center">दर्ता गर्नुहोस्</h3>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInputs" placeholder="John Snow">
            <label for="floatingInputs">नाम</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">इमेल ठेगाना</label>
        </div>
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
        <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">दर्ता गर्नुहोस्</button>
        <div class="text-center d-block">
            <a href="{{route('login')}}" class="mb-3 text-center text-decoration-none text-muted">मसँग पहिले देखि खाता छ । लग इन गर्छुँ ।</a>
        </div>
    </form>
@endsection

@extends('frontend.auth.app')
@section('content')
    <!-- Session Status -->
    {{--<x-auth-session-status class="mb-4" :status="session('status')" />--}}
    @if(Session::has('status'))
        <h6 class="text-success"> यदि इमेल हाम्रो प्रणालीमा अवस्थित छ भने। <br>
            हामी तपाईको पासवर्ड रिसेट लिंक इमेल गर्नेछौंं, <br>कृपया दुई मिनेट पर्खनुहोस्।
            <br> यदि इमेल दुई मिनेट भित्र आइपुगेन भने फेरि आफ्नो पासवर्ड रिसेट गर्नुहोस्।</h6>
    @endif
    <form method="POST"  action="{{route('password.email')}}">
        @csrf
        <h3 class="h3 mb-3 text-center">पासवर्ड बिर्सिनुभयो ?</h3>
        <div class="mb-4 text-sm text-gray-600">
            तपाईले आफ्नो पासवर्ड बिर्सिनुभएको हो ? चिन्ता नलिनुहोस । तपाईको खाता दर्ता गर्न प्रयोग भएको आधिकारिक इमेल ठेगाना प्रविष्ट गर्नुहोस् । हामी तपाईलाई पूनः नयाँ पासवर्ड स्थापना गर्न मद्दत गर्नेछौँ ।
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">इमेल ठेगाना</label>
            {{--<x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
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
        <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">पासवर्डको लिङ्क इमेल गर्नुहोस्</button>
        <div class="text-center d-block">
            <a href="{{route('login')}}" class="mb-3 text-center text-decoration-none text-muted">लग इन गर्नुहोस्</a>
        </div>
    </form>
@endsection

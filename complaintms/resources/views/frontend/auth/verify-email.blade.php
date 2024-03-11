@extends('frontend.auth.app')
@section('content')
<div class="mb-4 text-sm text-gray-600">
{{ __('साइन अप गर्नुभएकोमा धन्यवाद! सुरु गर्नु अघि, हामीले भर्खरै तपाईलाई इमेल गरेको लिङ्कमा क्लिक गरेर तपाईले आफ्नो इमेल ठेगाना प्रमाणित गर्न सक्नुहुन्छ। हामी तपाईंलाई दुई मिनेट भित्र इमेल पठाउनेछौं। यदि तपाईंले दुई मिनेट भित्र ईमेल प्राप्त गर्नुभएन भने, हामी तपाईंलाई अर्को पठाउनेछौं।') }}
</div>

@if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-success">
        {{ __('तपाईंले दर्ताको क्रममा प्रदान गर्नुभएको इमेल ठेगानामा एउटा नयाँ प्रमाणीकरण लिङ्क पठाइएको छ। यदि इमेल दुई मिनेट भित्र आइपुगेन भने प्रमाणिकरण ईमेल पुन: पठाउनुहोस् क्लिक गर्नुहोस्।') }}
    </div>
@endif

<div class="mt-4 flex items-center justify-between">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary mb-2"> प्रमाणिकरण ईमेल पुन: पठाउनुहोस् </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
            <button type="submit" class="btn btn-danger"> लग आउट </button>
    </form>
</div>
@endsection


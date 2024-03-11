@extends('frontend.auth.app')
@section('content')
<div class="mb-4 text-sm text-gray-600">
{{ __('हामीले भर्खरै तपाईलाई इमेल गरेको लिङ्कमा क्लिक गरेर तपाईले आफ्नो नयाँ इमेल ठेगाना प्रमाणित गर्न सक्नुहुन्छ। नयाँ इमेल ठेगाना प्रमाणित नभएसम्म, पूर्वनिर्धारित इमेल ठेगाना पुरानो इमेल ठेगाना हुनेछ। यदि तपाईंले इमेल प्राप्त गर्नुभएन भने, हामी खुशीसाथ तपाईंलाई अर्को पठाउनेछौं।') }}
</div>

@if (session('status') == 'new-email-verification-link-sent')
    <div class="mb-4 font-medium text-sm text-success">
        {{ __('तपाईंले दर्ताको क्रममा प्रदान गर्नुभएको नयाँ इमेल ठेगानामा एउटा नयाँ प्रमाणीकरण लिङ्क पठाइएको छ। यदि इमेल दुई मिनेट भित्र आइपुगेन भने प्रमाणिकरण ईमेल पुन: पठाउनुहोस् क्लिक गर्नुहोस्।') }}
    </div>
@endif

<div class="mt-4 flex items-center justify-between">
    <form method="POST" action="{{ route('verification.send.new.email') }}">
        @csrf
        <button type="submit" class="btn btn-primary mb-2"> प्रमाणिकरण ईमेल पुन: पठाउनुहोस् </button>
    </form>
</div>
@endsection


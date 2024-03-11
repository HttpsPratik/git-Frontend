@extends('frontend.layouts.app', ['title'=> "गुनासो दर्ता"])
@section('content')
    <div class="container-fluid bg-off-white">
        <div class="row justify-content-center">
            <div class="col-10 bg-white rounded shadow my-3 py-3 d-none" id="anonymous-ticket-block">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="fw-bold">टिकट दर्ता सम्पन्न</h5>
                        <p class="text-muted small">गुनासोको स्थिति थाहा पाउन, गुनासो खोज गर्दा तल उपलब्ध गराइएको 'टिकट नं.' र 'पासवर्ड' हालेर खोज्न सक्नुहुनेछ ।</p>
                    </div>
                    <div  class="col-12 text-center">
                        <span class="mx-3">
                            <span class="fw-bold">टिकट नं.:</span> <input class="outline-none" readonly id="anonymous-ticket-number">
                        </span>
                        <span class="mx-3">
                            <span class="fw-bold">पासवर्ड :</span> <input  class="outline-none" readonly size="40" id="anonymous-ticket-password">
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-10 bg-white rounded shadow mt-3 py-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="fw-bold">गुनासो दर्ता गर्नुहोस्</h5>
                    </div>
                    <form class="col-12" method="post" action="{{url('/gunaso/register/save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">गुनासोको दर्ता गर्ने व्यक्तिको विवरण</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-6">
                                <div class="mb-3">
                                    <input class="form-check-input" checked type="radio" name="privacy" value="anonymous" id="privacy_anonymous">
                                    <label for="privacy_anonymous" class="form-label">गोप्य राख्ने</label>
                                </div>
                            </div>
                            @if(Auth::guard('web')->check())
                                @if(Auth::guard('web')->user()->hasVerifiedEmail())
                                    <div class="col-md-2 col-sm-3 col-6">
                                        <div class="mb-3">
                                            <input class="form-check-input" type="radio" name="privacy" value="none" id="privacy_none">
                                            <label for="privacy_none" class="form-label">दर्ता गर्ने</label>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted small text-warning">गुनासोको दर्ता गर्ने व्यक्तिको विवरण दर्ता गर्न आफ्नो <a href="{{url('/verify-email')}}"> इमेल भेरिफाइ </a>गर्नुहोस् ।</p>
                                @endif
                            @else
                                <p class="text-muted small text-warning">गुनासोको दर्ता गर्ने व्यक्तिको विवरण दर्ता गर्न <a href="{{url('/login')}}"> लगइन </a>गर्नुहोस् ।</p>
                            @endif
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label for="subject" class="form-label">विषय</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">गुनासोको प्रकार</label>
                                    <select class="form-select" id="category_id" name="category_id">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">विवरण</label>
                                    <textarea name="description" rows="6" class="form-control" id="description" placeholder="गुनासोको पुर्ण विवरण खुलाउनुहोस्"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label for="attachments" class="form-label">संलग्न प्रमाणहरु</label>
                                    <input type="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.pdf,.pptx,.doc,.docx,.ppt,.xls,.xlsx,.webp" name="attachments[]"  id="attachments" multiple />
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12 text-end mt-5">
                                <button type="submit" class="btn btn-primary">दर्ता गर्नुहोस्</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.app', ['title'=> "गुनासोको स्थिति जानकारी"])
@section('content')
    <div class="container-fluid bg-off-white">
        <div class="row justify-content-center">
            <div class="col-10 bg-white rounded shadow my-5 py-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5>गुनासोको स्थिति बारे जानकारी</h5>
                        <p>गुनासोको स्थिति थाहा पाउन गुनासो दर्ता गर्दा उपलब्ध गराइएको 'टिकट नं.' र 'पासवर्ड' हालेर खोज्नुहोस् ।</p>
                    </div>
                    <form class="col-12" action="{{ url('/gunaso/search') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">टिकट नं.</label>
                                    <input type="text" class="form-control" id="ticket_number" name="ticket_number" placeholder="xxxxxxxxxxxx">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">पासवर्ड</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="xxxxxxxxxxxx">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> खोजी</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 mt-5">
                        <h5>गुनासोको विवरण</h5>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.app', ['title'=> "प्रयोगकर्ताको विवरण"])
@section('content')
@php($userId = Auth::guard('web')->id())
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center" colspan="3"><h5>प्रयोगकर्ताको विवरण</h5></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @php($name = Auth::guard('web')->user()->name)
                    <td class="fw-bold">नाम</td>
                    <td>{{$name}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_user_name"
                           data-id="{{$userId}}"
                           data-name="{{$name}}"
                           class="btn btn-sm btn-primary" title="Edit Name">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>

                </tr>
                <tr>
                    <td class="fw-bold">पासवर्ड</td>
                    <td>********</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#change_user_password"
                           data-id="{{$userId}}"
                           class="btn btn-sm btn-primary" title="Change Password">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">इमेल ठेगाना</td>
                    <td>
                        @php($email = Auth::guard('web')->user()->email)
                        @php($pendingMail = Auth::guard('web')->user()->getPendingEmail())
                        {{$email}}
                        @if(Auth::guard('web')->user()->hasVerifiedEmail())
                            <span>(भेरिफाई भएको)</span>
                        @else
                            <a href="{{url('/verify-email')}}">(भेरिफाई गर्नुहोस्)</a>
                        @endif
                        @if($pendingMail != null)
                            <br>
                            <span>{{$pendingMail}} (भेरिफाई हुन बकी)</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_user_email"
                           data-id="{{$userId}}"
                           data-email="{{$email}}"
                           class="btn btn-sm btn-primary" title="Edit Email">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_user_name">
    @include('frontend.pages.modals.edit_user_name');
</div>

<div class="modal fade" id="edit_user_email">
    @include('frontend.pages.modals.edit_user_email');
</div>

<div class="modal fade" id="change_user_password">
    @include('frontend.pages.modals.change_user_password');
</div>
@endsection

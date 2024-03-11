@extends('dashboard.layouts.app',['name' => 'Profile'])
@section('content')
    {{--<!-- Content Wrapper. Contains page content -->--}}
    <div class="content-wrapper">
        {{--<!-- Content Header (Page header) -->--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Profile</h1>
                    </div>{{--<!-- /.col -->--}}
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        </ol>
                    </div>{{--<!-- /.col -->--}}
                </div>{{--<!-- /.row -->--}}
            </div>{{--<!-- /.container-fluid -->--}}
        </div>
        {{--<!-- /.content-header -->--}}

        {{--<!-- Main content -->--}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 mt-2">
                        <div class="px-lg-4 px-0">
                            <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Your account's profile information and email address.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8 mt-2">
                        <div class="card card-info">
                            <div class="card-body">
                                <div class="row">
                                    <label for="">Name : &nbsp;</label>
                                    <p>{{ Auth::guard('admin')->user()->name }}</p>
                                </div>
                                <div class="row">
                                    <label for="">Email : &nbsp;</label>
                                    <p>{{ Auth::guard('admin')->user()->email }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="px-lg-4 px-0">
                            <h3 class="text-lg font-medium text-gray-900">Update Password</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                Ensure your account is using a long, random password to stay secure.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8 mt-3">
                        <form action="{{route('admin.password.update')}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="put" />
                            <div class="card card-info">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="Password">Current Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="current_password" id="current_password" autocomplete="off" placeholder="Enter Current Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-eye toggle-password" toggle="#current_password"> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                                    <div class="form-group">
                                        <label for="Password">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Enter New Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-eye toggle-password" toggle="#password"> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="off" placeholder="Enter New Password To Confirm">
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-eye toggle-password" toggle="#password_confirmation"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                {{--<!-- /.card-body -->--}}
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                        {{--<!-- /.card -->--}}
                    </div>
                </div>
            </div>{{--<!-- /.container-fluid -->--}}
        </section>
        {{--<!-- /.content -->--}}
    </div>
    {{--<!-- /.content-wrapper -->--}}
@endsection

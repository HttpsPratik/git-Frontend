@extends('dashboard.layouts.app',['name' => 'Administrator'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Administrator</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_admin">
                                    Add Administrator
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped dataTable datatable">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($admins as $admin)

                                        <tr class="text-center">
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->role->name}}</td>
                                            <td>{{ $admin->department->name }}</td>
                                            <td>
                                                <div class="btn-group">

                                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="fa fa-edit"></span>
                                                    </button>

                                                    <div class="dropdown-menu">

                                                        <a class="dropdown-item" href="#"
                                                           data-toggle="modal"
                                                           data-target="#edit_admin_name"
                                                           data-id="{{$admin->id}}"
                                                           data-name="{{$admin->name}}">Name
                                                        </a>

                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#edit_admin_email"
                                                           data-id="{{$admin->id}}"
                                                           data-email="{{$admin->email}}">Email
                                                        </a>

                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#edit_admin_password"
                                                           data-id="{{$admin->id}}">Password
                                                        </a>

                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#edit_admin_role"
                                                           data-id="{{$admin->id}}"
                                                           data-role_id="{{$admin->role_id}}">Role
                                                        </a>

                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#edit_admin_department"
                                                           data-id="{{$admin->id}}"
                                                           data-department_id="{{$admin->department_id}}">Department
                                                        </a>

                                                    </div>
                                                </div>

                                                {{--<a href="{{url('/dashboard/admin/delete/'.$admin->id)}}"
                                                   title="Delete" class="delete-confirm btn btn-sm btn-danger"><span class="fa fa-trash">
                                                    </span></a>--}}
                                                <a href="#" data-toggle="modal" data-target="#delete_modal"
                                                   data-url="{{url('/dashboard/admin/delete/'.$admin->id)}}"
                                                   class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        @include('dashboard.pages.modals.add_admin')
    </div>

    <div class="modal fade" id="edit_admin_name" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        @include('dashboard.pages.modals.edit_admin_name')
    </div>

    <div class="modal fade" id="edit_admin_email" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        @include('dashboard.pages.modals.edit_admin_email')
    </div>

    <div class="modal fade" id="edit_admin_password" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        @include('dashboard.pages.modals.edit_admin_password')
    </div>

    <div class="modal fade" id="edit_admin_role" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        @include('dashboard.pages.modals.edit_admin_role')
    </div>

    <div class="modal fade" id="edit_admin_department" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        @include('dashboard.pages.modals.edit_admin_department')
    </div>

    <div class="modal fade" id="delete_modal">
        @include('dashboard.pages.modals.delete_modal');
    </div>

@endsection

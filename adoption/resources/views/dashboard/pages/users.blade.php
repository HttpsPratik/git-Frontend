@extends('dashboard.layouts.app', ['name' => 'Users'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/users">Users</a></li>
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
                                <a type="button"
                                   class="btn btn-sm btn-primary"
                                   data-toggle="modal"
                                   data-target="#add_users"

                                >
                                    Add Users
                                </a>

                                <div class="form-group">
                                    <form class="float-right">

                                        <div class="input-group">
                                            <input type="text" class="form-control " placeholder="Search..."
                                                   name="search_term" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary form-control"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>E-mail</th>
                                        <th>Password</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr class="text-center">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->contact_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button"
                                                       class="btn btn-sm btn-primary"
                                                       data-toggle="modal"
                                                       data-target="#edit_users"
                                                       data-id="{{ $user->id  }}"
                                                       data-name="{{ $user->name }}"
                                                       data-email="{{ $user->email }}"
                                                       data-password="{{ $user->password }}"
                                                       data-contact_number="{{ $user->contact_number }}"
                                                       data-address="{{ $user->address }}"

                                                    >
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a  href="{{ url('/users/delete/'.$user->id) }}"
                                                        class="btn btn-sm btn-danger mx-1">
                                                        <span class="fa fa-trash"></span>
                                                    </a>
                                                </div>
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



    <div class="modal fade" id="add_users">
        @include('dashboard.pages.modals.add_users');
    </div>
    <div class="modal fade" id="edit_users">
        @include('dashboard.pages.modals.edit_users');
    </div>


@endsection

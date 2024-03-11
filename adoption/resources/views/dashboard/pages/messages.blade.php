@extends('dashboard.layouts.app', ['name' => 'Messages'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Messages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/messages">Messages</a></li>
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
                                   data-target="#add_messages"

                                >
                                    Add Messages
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message Content</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($messages as $message)
                                        <tr class="text-center">
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->message_content }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button"
                                                       class="btn btn-sm btn-primary"
                                                       data-toggle="modal"
                                                       data-target="#edit_messages"
                                                       data-id="{{ $message->id }}"
                                                       data-user_id="{{ $message->name }}"
                                                       data-receiver_id="{{ $message->email }}"
                                                       data-listing_id="{{ $message->subject }}"
                                                       data-message_content="{{ $message->message_content }}"
                                                    >
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a  href="{{ url('/messages/delete/'.$message->id) }}"
                                                        class="btn btn-sm btn-danger mx-1"


                                                    >
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



    <div class="modal fade" id="add_messages">
        @include('dashboard.pages.modals.add_messages');
    </div>
    <div class="modal fade" id="edit_messages">
        @include('dashboard.pages.modals.edit_messages');
    </div>


@endsection

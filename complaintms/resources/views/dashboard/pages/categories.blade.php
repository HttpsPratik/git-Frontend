@extends('dashboard.layouts.app',['name' => 'Category'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_category">
                                    Add Category
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped dataTable datatable">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)

                                        <tr class="text-center">
                                            <td>{{$category->name}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_category"
                                                       data-id="{{$category->id}}"
                                                       data-name="{{$category->name}}"
                                                       class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    &nbsp;&nbsp;
                                                    <a href="#" data-toggle="modal" data-target="#delete_modal"
                                                       data-url="{{url('/dashboard/category/delete/'.$category->id)}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span></a>
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

    <div class="modal fade" id="add_category">
        @include('dashboard.pages.modals.add_edit_category', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_category">
        @include('dashboard.pages.modals.add_edit_category', ['task' => 'update' ]);
    </div>

    <div class="modal fade" id="delete_modal">
        @include('dashboard.pages.modals.delete_modal');
    </div>

@endsection

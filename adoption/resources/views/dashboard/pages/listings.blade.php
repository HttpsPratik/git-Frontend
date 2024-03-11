@extends('dashboard.layouts.app', ['name' => 'Listings'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Listings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/listings">Listings</a></li>
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
                                   data-target="#add_listings"

                                >
                                    Add Listings
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Pet's Gender</th>
                                        <th>Images</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listings as $listing)
                                        <tr class="text-center">
                                            <td>{{ $listing->id }}</td>
                                            <td>{{ $listing->title }}</td>
                                            <td>{{ $listing->description }}</td>
                                            <td>{{ $listing->category }}</td>
                                            <td>{{ $listing->gender }}</td>
                                            <td>{{ $listing->images }}</td>
                                            <td>{{ $listing->status }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button"
                                                       class="btn btn-sm btn-primary"
                                                       data-toggle="modal"
                                                       data-target="#edit_listings"
                                                       data-id="{{ $listing->id }}"
                                                       data-title="{{ $listing->title }}"
                                                       data-description="{{ $listing->description }}"
                                                       data-category="{{ $listing->category }}"
                                                       data-gender="{{ $listing->gender }}"
                                                       data-images="{{ $listing->images }}"
                                                       data-status="{{ $listing->status }}"

                                                    >
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a  href="{{ url('/listings/delete/'.$listing->id) }}"
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



    <div class="modal fade" id="add_listings">
        @include('dashboard.pages.modals.add_listings');
    </div>
    <div class="modal fade" id="edit_listings">
        @include('dashboard.pages.modals.edit_listings');
    </div>


@endsection

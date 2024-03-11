@extends('dashboard.layouts.app', ['name' => 'Reviews'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Reviews</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/reviews">Reviews</a></li>
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
                                   data-target="#add_reviews"

                                >
                                    Add Reviews
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
                                        <th>User ID</th>
                                        <th>Listing ID</th>
                                        <th>Rating</th>
                                        <th>Review Content</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reviews as $review)
                                        <tr class="text-center">
                                            <td>{{ $review->id }}</td>
                                            <td>{{ $review->user_id }}</td>
                                            <td>{{ $review->listing_id }}</td>
                                            <td>{{ $review->rating }}</td>
                                            <td>{{ $review->review_content }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button"
                                                       class="btn btn-sm btn-primary"
                                                       data-toggle="modal"
                                                       data-target="#edit_reviews"
                                                       data-id="{{ $review->id }}"
                                                       data-user_id="{{ $review->user_id }}"
                                                       data-listing_id="{{ $review->listing_id }}"
                                                       data-rating="{{ $review->rating }}"
                                                       data-review_content="{{ $review->review_content }}"
                                                    >
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a  href="{{ url('/reviews/delete/'.$review->id) }}"
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



    <div class="modal fade" id="add_reviews">
        @include('dashboard.pages.modals.add_reviews');
    </div>
    <div class="modal fade" id="edit_reviews">
        @include('dashboard.pages.modals.edit_reviews');
    </div>


@endsection

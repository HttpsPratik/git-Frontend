@extends('dashboard.layouts.app', ['name' => 'Transactions'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Transactions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/transactions">Transactions</a></li>
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
                                   data-target="#add_transactions"

                                >
                                    Add Transactions
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
                                        <th>Buyer ID</th>
                                        <th>Seller ID</th>
                                        <th>Listing ID</th>
                                        <th>Transaction Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr class="text-center">
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->buyer_id }}</td>
                                            <td>{{ $transaction->seller_id }}</td>
                                            <td>{{ $transaction->listing_id }}</td>
                                            <td>{{ $transaction->transaction_date }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button"
                                                       class="btn btn-sm btn-primary"
                                                       data-toggle="modal"
                                                       data-target="#edit_transactions"
                                                       data-id="{{ $transaction->id }}"
                                                       data-buyer_id="{{ $transaction->buyer_id }}"
                                                       data-seller_id="{{ $transaction->seller_id }}"
                                                       data-listing_id="{{ $transaction->listing_id }}"
                                                       data-transaction_date="{{ $transaction->transaction_date }}"
                                                       data-amount="{{ $transaction->amount }}"

                                                    >
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a  href="{{ url('/transactions/delete/'.$transaction->id) }}"
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



    <div class="modal fade" id="add_transactions">
        @include('dashboard.pages.modals.add_transactions');
    </div>
    <div class="modal fade" id="edit_transactions">
        @include('dashboard.pages.modals.edit_transactions');
    </div>


@endsection

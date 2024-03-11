@extends('dashboard.layouts.app', ['name' => 'Processing Ticket'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Processing Ticket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Processing Ticket</a></li>
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
                                <x-ticket-search-form :action="'dashboard/ticket/processing'" />
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="table-info text-center">
                                            <th>#Ticket</th>
                                            <th>User Name</th>
                                            {{-- <th>F/Y</th> --}}
                                            <th>Category</th>
                                            <th>Subject</th>
                                            <th>Status Date</th>
                                            <th>Medium</th>
                                            {{-- <th>Visible</th> --}}
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($processingTickets as $processingTicket)
                                            <tr class="text-center">
                                                <td>{{ $processingTicket->ticket_number }}</td>
                                                <td>{{ $processingTicket->user->name ?? 'N/A' }}</td>
                                                {{-- <td>{{$processingTicket->fiscalYear->year}}</td> --}}
                                                <td>{{ $processingTicket->category->name }}</td>
                                                <td>{{ $processingTicket->subject }}</td>
                                                {{-- <td>{{$processingTicket->status_date->format('Y-m-d h:i A')}}</td> --}}
                                                <td>{{ App\Facade\NepDate::getNepaliDateTimeA($processingTicket->status_date->format('Y-m-d h:i A')) }}
                                                </td>
                                                <td>{{ $processingTicket->medium->name }}</td>

                                                {{-- @if ($processingTicket->visible == 1)
                                                    <td><span class="badge text-success"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </td>
                                                @else
                                                    <td><span class="badge text-grey"><i class="fa fa-eye-slash"
                                                                aria-hidden="true"></i></span></td>
                                                @endif --}}
                                                <td>
                                                    <a href="{{ url('/dashboard/ticket/processing/details/' . $processingTicket->id) }}"
                                                        title="Details" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {!! $processingTickets->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection

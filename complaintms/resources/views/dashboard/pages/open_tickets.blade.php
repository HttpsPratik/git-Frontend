@extends('dashboard.layouts.app', ['name' => 'Open Ticket'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Open Ticket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Open Ticket</a></li>
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
                                <x-ticket-search-form :action="'/dashboard/ticket/open'" />
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
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

                                    @foreach ($openTickets as $openTicket)
                                        <tr class="text-center">
                                            <td>{{ $openTicket->ticket_number }}</td>
                                            <td>{{ $openTicket->user->name ?? 'N/A' }}</td>
                                            <td>{{ $openTicket->category->name }}</td>
                                            <td class="text-break">{{ $openTicket->subject }}</td>
                                            <td>{{ App\Facade\NepDate::getNepaliDateTimeA($openTicket->status_date->format('Y-m-d h:i A')) }}
                                            </td>
                                            <td>{{ $openTicket->medium->name }}</td>

                                            {{-- @if ($openTicket->visible == 1)
                                                <td><span class="badge text-success"><i class="fa fa-eye"
                                                                                        aria-hidden="true"></i></span>
                                                </td>
                                            @else
                                                <td><span class="badge text-grey"><i class="fa fa-eye-slash"
                                                                                     aria-hidden="true"></i></span></td>
                                            @endif --}}

                                            <td>
                                                <a href="{{ url('/dashboard/ticket/open/details/' . $openTicket->id) }}"
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
                                {!! $openTickets->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection

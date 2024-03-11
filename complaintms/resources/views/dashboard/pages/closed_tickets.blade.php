@extends('dashboard.layouts.app',['name' => 'Closed Ticket'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Closed Ticket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Closed Ticket</a></li>
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
                                <x-ticket-search-form :action="'dashboard/ticket/closed'" />
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>#Ticket</th>
                                        <th>User Name</th>
                                        {{--<th>F/Y</th>--}}
                                        <th>Category</th>
                                        <th>Subject</th>
                                        <th>Status Date</th>
                                        <th>Medium</th>
                                        <th>Visible</th>
                                        <th>Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($closedTickets as $closedTicket)

                                        <tr class="text-center">
                                            <td>{{$closedTicket->ticket_number}}</td>
                                            <td>{{$closedTicket->user->name ?? 'N/A'}}</td>
                                            {{--<td>{{$closedTicket->fiscalYear->year}}</td>--}}
                                            <td>{{$closedTicket->category->name}}</td>
                                            <td>{{$closedTicket->subject}}</td>
                                            <td>{{ App\Facade\NepDate::getNepaliDateTimeA($closedTicket->status_date->format('Y-m-d h:i A')) }}</td>
                                            <td>{{$closedTicket->medium->name}}</td>

                                            @if ($closedTicket->visible == 1)
                                                    <td><span class="badge text-success"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </td>
                                                @else
                                                    <td><span class="badge text-grey"><i class="fa fa-eye-slash"
                                                                aria-hidden="true"></i></span></td>
                                                @endif
                                            <td>
                                                <a href="{{ url('/dashboard/ticket/closed/details/'.$closedTicket->id) }}"
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
                                {!! $closedTickets->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

@endsection

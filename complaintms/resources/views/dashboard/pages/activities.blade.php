@extends('dashboard.layouts.app',['name' => 'Activity'])
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Activity</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Activity</a></li>
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

                                <div class="form-group">
                                    <form action="{{ url('dashboard/activities') }}" method="get" id="ticket_search_form">
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" name="date_range_processing_ticket"
                                                           autocomplete="off" id="date_range_search_ticket">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control " placeholder="Search..." name="search_term" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>F/Y</th>
                                        <th>Ip address</th>
                                        <th>Browser/Platform</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($activities as $activity)
                                        <tr class="text-center">
                                            <td>{{ App\Facade\NepDate::getNepaliDateTimeA($activity->created_at->format('Y-m-d h:i A')) }}</td>
                                            <td>{{$activity->admin->name ?? '-'}}</td>
                                            <td>{{$activity->fiscalYear->year}}</td>
                                            <td>{{$activity->ip_address}}</td>
                                            <td>{{ Jenssegers\Agent\Facades\Agent::browser($activity->user_agent). '/' 
                                            .Jenssegers\Agent\Facades\Agent::platform($activity->user_agent)}}</td>
                                            <td>{{$activity->description}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {!! $activities->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

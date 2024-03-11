@extends('dashboard.layouts.app', ['name' => 'Report'])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">
                            Reports
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Reports</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card">

                    <div class="card-header">

                        <div class="form-group form-inline mb-0">

                                <label class="mr-2" for="search-form-fiscal-year">Fiscal Year :</label>
                                <select class="custom-select" name="fiscal_year" id="search-report-fiscal-year">
                                </select>
                        </div>

                    </div>

                    <div class="card-body">

                        @php($totalTicketCount = $openTicketCount + $closedTicketCount + $rejectedTicketCount + $processingTicketCount)

                        {{-- <!-- Info boxes --> --}}
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1">
                                        <i class="fa fa-envelope-open" aria-hidden="true"></i>
                                    </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Open</span>
                                        <span class="info-box-number">
                                            {{ $openTicketCount }}
                                            (@if ($openTicketCount > 0)
                                                {{  round(($openTicketCount / $totalTicketCount ) *100, 2) }}
                                            @else
                                                {{ $openTicketCount }}
                                            @endif<small>%</small>)
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1">
                                        <i class="fa fa-spinner nav-icon"></i>
                                    </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Processing</span>
                                        <span class="info-box-number">
                                             {{ $processingTicketCount }}
                                            (@if ($processingTicketCount > 0)
                                            {{ round(($processingTicketCount / $totalTicketCount ) *100, 2) }}
                                            @else
                                                {{  $processingTicketCount }}
                                            @endif<small>%</small>)
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <!-- fix for small devices only -->
                            <div class="clearfix hidden-md-up"></div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Resolved</span>
                                        <span class="info-box-number">
                                             {{ $closedTicketCount }}
                                            (@if ($closedTicketCount > 0)
                                            {{ round(($closedTicketCount / $totalTicketCount ) *100, 2) }}
                                            @else
                                            {{ $closedTicketCount }}
                                            @endif<small>%</small> )
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1">
                                        <i class="fa fa-eject" aria-hidden="true"></i>
                                    </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Rejected</span>
                                        <span class="info-box-number">
                                            {{ $rejectedTicketCount }}
                                            (@if ($rejectedTicketCount > 0)
                                            {{ round(($rejectedTicketCount / $totalTicketCount ) *100, 2) }}
                                            @else
                                            {{ $rejectedTicketCount }}
                                            @endif<small>%</small> )
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Mediums</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="medium-report-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Categories</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="categories-report-chart" style="height: 550px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Departments</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="departments-report-chart" style="height: 550px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- main card body end --}}

                    <div class="card-footer" style="text-align-last:justify;">

                        <button class="mb-md-0 mb-sm-2 mb-2 btn btn-primary" id="categories_to_excel" >
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Export to Excel (Categories)
                        </button>

                        <button class="mb-md-0 mb-sm-2 mb-2 btn btn-primary" id="departments_to_excel" >
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Export to Excel (Departments)
                        </button>

                        <button class="mb-md-0 mb-sm-2 mb-2 btn btn-primary" id="medium_to_excel" >
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Export to Excel (Medium)
                        </button>

                    </div>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@extends('dashboard.layouts.app',['name' => 'Dashboard'])

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- Adoption Requests Card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>10</h3>
                                <p>Adoption Requests</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-paw"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- Available Animals Card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>25</h3>
                                <p>Available Pets</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-paw"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- Successful Adoptions Card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>50</h3>
                                <p>Successful Adoptions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-heart"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- Pending Applications Card -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>8</h3>
                                <p>Pending Applications</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-clock"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

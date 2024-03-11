@extends('dashboard.pages.resources.views.dashboard.layouts.app',['name' => 'Notification'])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            &nbsp;
                            <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a> &nbsp; Notifications
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Motherboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Notifications</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ url('/dashboard/notification/mark-all') }}" method="get">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check" aria-hidden="true"></i> &nbsp;Mark all as read
                                </button>
                            </form>
                        </div>
                        <div class="card-body">

                            <div class="list-group">

                                @csrf
                                @foreach($notifications as $notification)

                                    <a href="{{ url('/dashboard'.$notification->data['url']) }}" data-id="{{ $notification->id }}"
                                       class="list-group-item list-group-item-action notification-mark">

                                        <h6 class="font-weight-bolder text-wrap">
                                            @if($notification->read_at == null)
                                                <u class="text-danger">{{ $notification->data['title'] }}</u>
                                                <i class="text-danger font-weight-bolder" style="font-size: large">&#8226;</i>
                                            @else
                                                <u>{{ $notification->data['title'] }}</u>
                                            @endif

                                            <span class="float-right font-weight-normal text-muted text-sm">

                                                {{ $notification->created_at->diffForHumans() }}
                                            </span>

                                        </h6>

                                        <span class="text-wrap">
                                           &#8227; {{ $notification->data['body'] }}
                                        </span>

                                    </a>

                                @endforeach

                            </div>

                        </div>

                        <div class="card-footer">
                            {!! $notifications->links('pagination::bootstrap-4') !!}
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection

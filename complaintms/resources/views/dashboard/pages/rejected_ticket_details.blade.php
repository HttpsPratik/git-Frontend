@extends('dashboard.layouts.app',['name' => 'Rejected Ticket Detail'])
@inject('SignedUrl', 'App\Helpers\SignedUrlBuilderForBlade')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            &nbsp;
                            <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a> &nbsp; Rejected Ticket Detail
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/dashboard/ticket/rejected')}}">Rejected</a></li>
                            <li class="breadcrumb-item"><a href="#">Rejected Ticket Detail</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="callout callout-warning">
                            <div class="row mb-1">

                                <div class="col-5">
                                    <p><b>#Ticket :</b> &nbsp;{{ $ticket->ticket_number }}
                                        {{-- {{ $conversations[0]->ticket->number }}--}}</p>
                                </div>

                                <div class="col-5">
                                    <p><b>Submitted :</b> &nbsp;
                                        {{ App\Facade\NepDate::getNepaliDateTimeA($ticket->created_at->format('Y-m-d h:i A')) /*$ticket->created_at->format('Y-m-d h:i A')*/ }}
                                    </p>
                                </div>

                            </div>

                            <div class="row mb-1">

                                <div class="col-5">
                                    <p><b>Requester :</b> &nbsp;{{ $ticket->user->name ?? 'N/A' }}
                                        {{--{{ $conversations[0]->ticket->user->name }}--}}</p>
                                </div>

                                <div class="col-5">
                                    <p><b>Updated on :</b> &nbsp;
                                        {{ App\Facade\NepDate::getNepaliDateTimeA($ticket->status_date->format('Y-m-d h:i A')) /*$ticket->status_date->format('Y-m-d h:i A')*/ }}
                                    </p>
                                </div>

                            </div>

                            <div class="row mb-1">

                                <div class="col-5">
                                    <p>
                                        <b>Medium :</b> &nbsp; {{ $ticket->medium->name }}
                                    </p>
                                </div>
                                <div class="col-5">
                                    <p>
                                        <b>F/Y :</b> &nbsp; {{ $ticket->fiscalYear->year }}
                                    </p>
                                </div>
                            </div>

                        </div>

                        @foreach($conversations as $conversation)
                            <div class="callout callout-info mb-3">
                                <h3><u style="color : #117a8b;" >{{ $conversation->department->name ?? 'Requester' }}</u>

                                    {{--@if($conversation->reply === 0)
                                        <span> <i class="fa fa-user text-gray small float-right ml-2" title="Visible to customer"> </i> </span>
                                    @endif--}}

                                    @if($conversation->publish === 1)
                                        <span> <i class="fa fa-eye text-success small float-right" title="Visible to requester"> </i> </span>
                                    @else
                                        <span> <i class="fa fa-eye-slash text-secondary small float-right" title="Invisible to requester"> </i> </span>
                                    @endif

                                    <span class="text-muted" style="font-size: 50%">
                                        {{ App\Facade\NepDate::getNepaliDate($conversation->created_at->format('Y-m-d')) /*$conversation->created_at->format('Y-m-d')*/ }}
                                    </span>
                                </h3>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <p> {{ $conversation->description }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <ul class="mailbox-attachments d-flex flex-wrap align-items-stretch clearfix">

                                        @foreach($conversation->attachments as $attachment)

                                            @php($url = $SignedUrl->createSignedUrlAttachment($attachment->url['path'], $attachment->url['name']))
                                            @php( $fileSize =  \Illuminate\Support\Facades\File::fileToHumanReadable($attachment->url['path'].'/uploads/'.$attachment->url['name']) )

                                            @include('dashboard.pages.components.attachment')
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
    </div>

@endsection

@extends('dashboard.layouts.app',['name' => 'Processing Ticket Detail'])
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
                            </a> &nbsp; Processing Ticket Detail
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/dashboard/ticket/open')}}">Processing</a></li>
                            <li class="breadcrumb-item"><a href="#">Processing Ticket Detail</a></li>
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
                                    <p><b>Requester :</b> &nbsp;
                                        {{ $ticket->user->name ?? 'N/A' }}
                                    </p>
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
                                <h3><u style="color : #117a8b;">{{ $conversation->department->name ?? 'Requester' }}</u>

                                    {{--@if($conversation->reply === 0)
                                        <span> <i class="fa fa-user text-gray small float-right ml-2" title="Visible to customer"> </i> </span>
                                    @endif--}}

                                    @if($conversation->publish === 1)
                                        <span> <i class="fa fa-eye text-success small float-right"
                                                  title="Visible to requester"> </i> </span>
                                    @else
                                        <span> <i class="fa fa-eye-slash text-secondary small float-right"
                                                  title="Invisible to requester"> </i> </span>
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
                    @can('ticket-permission', $ticket->id)
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">

                                    <a href="#" data-toggle="modal" data-target="#forward_ticket"
                                       data-ticket_id="{{ $ticket->id }}"
                                       class="btn btn-success float-left">
                                        <i class="fa-solid fa-forward"></i> Forward Ticket</a>

                                    <button type="button" id="reply-processing-ticket"
                                            class="btn btn-primary float-right">
                                        <i class="fa fa-reply" aria-hidden="true"></i> Reply Now
                                    </button>

                                    <a href="#" data-toggle="modal" data-target="#reject_ticket"
                                       data-ticket_number="{{ $ticket->ticket_number }}"
                                       data-url="{{url('/dashboard/ticket/processing/reject/'.$ticket->id)}}"
                                       class="btn btn-warning float-left ml-3 close-ticket-confirm">
                                        <i class="fa fa-eject" aria-hidden="true"></i> Reject Ticket</a>

                                    <a href="#" data-toggle="modal" data-target="#close_ticket"
                                       data-ticket_number="{{ $ticket->ticket_number }}"
                                       data-url="{{url('/dashboard/ticket/processing/close/'.$ticket->id)}}"
                                       class="btn btn-danger float-left ml-3 close-ticket-confirm">
                                        <i class="fa fa-window-close" aria-hidden="true"></i> Close Ticket
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endcan
                </div>

                <form action="{{ url('/dashboard/ticket/processing/conversation/save') }}" method="post"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="card d-none" id="reply-card-processing-ticket">
                        <div class="card-body">

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="row">
                                <div class="col-12">
                                    <label for="description" class="">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"
                                              placeholder="Enter Description"></textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="publish">Visible To Requestor &nbsp; </label>
                                <div class="icheck-success d-inline">
                                    <input type="checkbox" name="publish" id="publish">
                                    <label for="publish"></label>
                                </div>
                            </div>

                            <hr>

                            <label for="attachment" class="">Attachment</label>
                            <div class="col-md-12">
                                <div class="row" id="attachments-main"></div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-sm btn-info" id="add-attachment"> Add
                                        Attachment
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">

                            <button type="button" id="reply-cancel-processing-ticket"
                                    class="btn btn-danger float-right ml-3">
                                Cancel
                            </button>

                            <button type="submit" id="reply-submit-processing-ticket"
                                    class="btn btn-success float-right">
                                <i class="fa fa-reply" aria-hidden="true"></i> Submit
                            </button>

                        </div>
                    </div>

                </form>


            </div><!-- /.container-fluid -->
        </section>
    </div>

    <div class="modal fade" id="reject_ticket">
        @include('dashboard.pages.modals.reject_ticket')
    </div>

    <div class="modal fade" id="forward_ticket">
        @include('dashboard.pages.modals.forward_processing_ticket')
    </div>

    <div class="modal fade" id="close_ticket">
        @include('dashboard.pages.modals.close_ticket')
    </div>

@endsection

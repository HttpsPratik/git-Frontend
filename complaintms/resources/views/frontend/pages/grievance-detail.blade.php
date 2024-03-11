@extends('frontend.layouts.app', ['title'=> $ticket->subject ?? "गुनासोको विवरण"])
@inject('SignedUrl', 'App\Helpers\SignedUrlBuilderForBlade')
@section('content')
    <div class="container-fluid bg-off-white">
        <div class="row justify-content-center">
            <div class="col-10 bg-white rounded shadow my-5 py-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5>{{$ticket->category->name}}</h5>
                        <p>{{$ticket->subject}}</p>
                    </div>
                    <div class="col-12">
                        <p><span class="fw-bold">स्थिति :</span> &nbsp;<span>{{$ticket->status}}</span></p>
                        <p><span class="fw-bold">स्थिति अध्यावदिक गरिएको समय :</span>
                            &nbsp;<span>{{$ticket->status_date->diffForHumans()}}</span></p>
                        <p><span class="fw-bold">गुनासो  माध्यम :</span> &nbsp;<span>{{$ticket->medium->name}}</span>
                        </p>
                    </div>
                    <div class="col-12 mb-2">
                        <span class="fw-bold">कार्यवाही विवरण :</span>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="row">
                                    @foreach($ticket->conversations as $conversation)
                                        @if($conversation->publish == 1)
                                            <div class="col-12 px-3 mb-3">
                                                <div class="row">
                                                    <div class="col-12 border rounded">
                                                        <div class="row">
                                                            <div class="col-12 py-2 bg-primary">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <h6 class="text-white">
                                                                            @if($conversation->department_id == null)
                                                                                गुनासोकर्ता
                                                                            @else
                                                                                {{$conversation->department->name}}
                                                                            @endif
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-6 text-end text-white small">
                                                                        <span data-bs-toggle="tooltip"
                                                                              data-bs-placement="bottom"
                                                                              title="{{ App\Facade\NepDate::getNepaliDateTimeA($conversation->created_at->format('Y-m-d h:i A')) }}">{{$conversation->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 p-3">
                                                                <p>{{$conversation->description}}</p>
                                                                <p class="fw-bold">संलग्नक कागजातहरु :</p>
                                                                <ul class="list-unstyled d-inline-flex flex-wrap">
                                                                    @foreach($conversation->attachments as $attachment)
                                                                        @php($url_attachment = $SignedUrl->createSignedUrlAttachment($attachment->url['path'], $attachment->url['name']))
                                                                        <li class="mx-1 mt-2 single-attachment">
                                                                            @switch(\Illuminate\Support\Facades\File::mimeType(public_path($attachment->url['path'].'/uploads/'.$attachment->url['name'])))
                                                                                @case('image/jpeg')
                                                                                    @php($url = $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']))
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <img class="border rounded"
                                                                                             src="{{$url}}">
                                                                                    </a>
                                                                                    @break
                                                                                @case('image/webp')
                                                                                    @php($url = $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']))
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <img class="border rounded"
                                                                                             src="{{$url}}">
                                                                                    </a>
                                                                                    @break
                                                                                @case('image/png')
                                                                                    @php($url = $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']))
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <img class="border rounded"
                                                                                             src="{{$url}}">
                                                                                    </a>
                                                                                    @break
                                                                                @case('image/x-ms-bmp')
                                                                                    @php($url = $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']))
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <img class="border rounded"
                                                                                             src="{{$url}}">
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/pdf')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-pdf border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/vnd.openxmlformats-officedocument.presentationml.presentation')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-powerpoint border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/msword')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-word border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-word border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/vnd.ms-powerpoint')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-powerpoint border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-excel border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @case('application/vnd.ms-excel')
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file-excel border rounded text-light-grey"></i>
                                                                                    </a>
                                                                                    @break
                                                                                @default
                                                                                    <a download="{{'file-'.now().rand(1,1000)}}"
                                                                                       href="{{$url_attachment}}">
                                                                                        <i class="fa-regular fa-file border rounded text-light-grey"></i>
                                                                                    </a>
                                                                            @endswitch

                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="timeline">
                                            @php($assigns = $ticket->assigns)
                                            @foreach($assigns as $assign)
                                                <div class="container right">
                                                    <div class="content">
                                                        <h5>{{$assign->department->name ?? ''}}</h5>

                                                        @if($assign != $assigns->last())
                                                            <p class="text-info">(Forwarded)</p>
                                                        @else
                                                            @switch($assign->status)
                                                                @case('open')
                                                                    <p class="text-primary">(Open)</p>
                                                                    @break
                                                                @case('closed')
                                                                    <p class="text-success">(Closed)</p>
                                                                    @break
                                                                @case('processing')
                                                                    <p class="text-warning">(Processing)</p>
                                                                    @break
                                                                @case('rejected')
                                                                    <p class="text-danger">(Rejected)</p>
                                                                    @break
                                                                @default
                                                                    <p class="text-warning">(Pending)</p>
                                                            @endswitch
                                                        @endif
                                                        <p class="text-muted small">{{$assign->created_at->diffForHumans()}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

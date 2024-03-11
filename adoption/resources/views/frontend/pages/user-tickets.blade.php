@extends('frontend.layouts.app', ['title'=> "प्रयोगकर्ताको विवरण"])
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card my-2">
            <div class="card-header bg-white">
                <h4 class="mt-2">मेरो टिकटहरु</h4>
            </div>
            <div class="card-body">
                <div class="col-12 my-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>मिति</th>
                            <th>टिकट नं.</th>
                            <th>विषय</th>
                            <th>हेर्नुहोस्</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ App\Facade\NepDate::getNepaliDateTimeA($ticket->created_at->format('Y-m-d h:i A')) }}</td>
                                <td>{{$ticket->ticket_number}}</td>
                                <td>{{$ticket->subject}}</td>
                                <td><a href="{{url("user-ticket/$ticket->ticket_number")}}" class="btn btn-sm btn-primary"><span class="fa fa-eye"></span></a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                {!! $tickets->links('pagination::bootstrap-4') !!}
            </div>
        </div>

    </div>
</div>
@endsection

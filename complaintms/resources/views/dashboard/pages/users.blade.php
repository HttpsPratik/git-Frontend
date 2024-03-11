@extends('dashboard.layouts.app', ['name' => 'User'])

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
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
                                    <form action="{{ url('dashboard/users') }}" method="get" class="float-right">

                                        <div class="input-group">
                                            <input type="text" class="form-control " placeholder="Search..."
                                                name="search_term" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary form-control"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="table-info text-center">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Email verified</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr class="text-center">
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                {{-- <td>{{App\Facade\NepDate::getNepaliDateTimeA($user->email_verified_at->format('Y-m-d h:i A')) ?? 'Unverified'}}</td> --}}
                                                <td>{{ $user->email_verified_at == null ? 'unverified' : App\Facade\NepDate::getNepaliDateTimeA($user->email_verified_at->format('Y-m-d h:i A')) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {!! $users->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection

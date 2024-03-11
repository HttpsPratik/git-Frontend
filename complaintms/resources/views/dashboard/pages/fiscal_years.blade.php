@extends('dashboard.layouts.app',['name' => 'Fiscal Year'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Fiscal Year</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Fiscal Year</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_fiscal_year">
                                    Add Fiscal Year
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Fiscal Year</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($fiscalYears as $fiscalYear)

                                        <tr class="text-center">
                                            @if($fiscalYear->active == 1 )
                                                <td class="text-green"><b>{{$fiscalYear->year . ' (चालु वर्ष)' }}</b></td>
                                            @else
                                                <td>{{$fiscalYear->year }}</td>
                                            @endif
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_fiscal_year"
                                                       data-id="{{$fiscalYear->id}}"
                                                       data-year="{{$fiscalYear->year}}"
                                                       data-active="{{$fiscalYear->active}}"
                                                       class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    &nbsp;&nbsp;
                                                    <a href="#" data-toggle="modal" data-target="#delete_modal"
                                                       data-url="{{url('/dashboard/fiscal-year/delete/'.$fiscalYear->id)}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span></a>
                                                </div>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_fiscal_year">
        @include('dashboard.pages.modals.add_edit_fiscal_year', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_fiscal_year">
        @include('dashboard.pages.modals.add_edit_fiscal_year', ['task' => 'update' ]);
    </div>

    <div class="modal fade" id="delete_modal">
        @include('dashboard.pages.modals.delete_modal');
    </div>

@endsection

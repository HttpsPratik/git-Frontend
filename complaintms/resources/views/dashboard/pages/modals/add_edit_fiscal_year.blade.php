<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add Fiscal Year' : 'Edit Fiscal Year'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/dashboard/fiscal-year/save' : '/dashboard/fiscal-year/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="year">Fiscal Year</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="year" id="year" placeholder="Enter Fiscal Year" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Active Year</label>
                        </div>
                        <div class="col-md-8">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="active" id="{{$task == 'save' ? 'active' : 'active_edit'}}">
                                <label for="{{$task == 'save' ? 'active' : 'active_edit'}}"></label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{$task == 'save' ? 'Save' : 'Save changes'}}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-District -->

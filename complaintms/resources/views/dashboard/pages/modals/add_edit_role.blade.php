<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add Role' : 'Edit Role'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/dashboard/role/save' : '/dashboard/role/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Department" autocomplete="off">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" id="role" placeholder="Enter Role" autocomplete="off">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" autocomplete="off">
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

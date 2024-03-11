<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" >Update Name</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url('dashboard/admin/name-update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{ method_field('put') }}

                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">

                        <label for="Name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Enter Name" autocomplete="off">

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->



<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" >Change Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url('/dashboard/admin/role-update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{ method_field('put') }}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group">
                        <label for="role_id">Change Role</label>
                        <select class="form-control" name="role_id" id="role_id" >
                            {{--will append values from ajax--}}
                        </select>
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



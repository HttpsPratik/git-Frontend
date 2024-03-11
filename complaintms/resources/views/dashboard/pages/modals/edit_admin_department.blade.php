<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Department</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url('/dashboard/admin/department-update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{ method_field('put') }}
                <input type="hidden" name="id" id="id">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="edit_admin_department_id">Change Department</label>
                        <select class="form-control" name="department_id" id="edit_admin_department_id">
                            {{--will be populated via ajax--}}
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



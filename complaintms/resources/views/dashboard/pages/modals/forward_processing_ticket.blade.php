<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-gradient-success">
            <h4 class="modal-title"> Forward Department </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{ url('/dashboard/ticket/processing/forward') }}" method="post">
            <div class="modal-body">

                @csrf
                <input type="hidden" name="ticket_id" id="ticket_id">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="SelectDepartment">Select Department</label>
                        <select class="form-control" name="department_id" id="forward_ticket_department_id">
                            {{-- will be populated via ajax --}}
                        </select>
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-forward"></i> Forward
                    Ticket</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-District -->

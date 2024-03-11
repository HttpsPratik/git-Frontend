<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Change Favourites</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="post" action="{{url('/favourites/update')}}">
            <div class="modal-body">
                @csrf

                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group">
                                            <label for="user_id">User ID</label>
                                            <input type="number" class="form-control" name="user_id" id="user_id"
                                                   placeholder="Enter User's ID" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label for="listing_id">Listing ID</label>
                                            <input type="number" class="form-control" name="listing_id"
                                                   id="employee_id"
                                                   placeholder="Enter listing's ID" autocomplete="off">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
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



<div class="modal-dialog  modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="title">Add Favourites</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form form-horizontal" method="post" action={{url("/favourites/save") }} >
            @csrf

            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">User ID</label>
                                        <input type="number" class="form-control" name="user_id" id="user_id"
                                               placeholder="Enter User ID" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="listing_id">Listing ID</label>
                                        <input type="number" class="form-control" name="listing_id" id="listing_id"
                                               placeholder="Enter Listing ID" autocomplete="off">
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ADD</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </form>



    </div>
</div>



<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Change Reviews</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="post" action="{{url('/reviews/update')}}">
            <div class="modal-body">
                @csrf

                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12">
                                        <label for="user_id">User ID</label>
                                        <input type="number" class="form-control" name="user_id" id="user_id"
                                               placeholder="Enter User ID" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="listing_id">Listing ID</label>
                                        <input type="number" class="form-control" name="listing_id" id="listing_id"
                                               placeholder="Enter Listing ID" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <input type="number" class="form-control" name="rating" id="rating" min="1" max="5"
                                               placeholder="Enter Rating" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="review_content">Review Content</label>
                                        <input type="text" class="form-control" name="review_content" id="review_content"
                                               placeholder="Enter Review Content" autocomplete="off">
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



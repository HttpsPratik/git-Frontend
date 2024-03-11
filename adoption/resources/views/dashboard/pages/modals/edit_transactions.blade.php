<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Change Transactions</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="post" action="{{url('/transactions/update')}}">
            <div class="modal-body">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-md-6">
                                        <input type="hidden" id="id" name="id" >
                                        <div class="form-group">
                                            <label for="buyer_id">Buyer ID</label>
                                            <input type="number" class="form-control" name="buyer_id" id="buyer_id"
                                                   placeholder="Enter Buyer ID" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="seller_id">Seller ID</label>
                                            <input type="number" class="form-control" name="seller_id" id="seller_id"
                                                   placeholder="Enter Seller ID" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="listing_id">Listing ID</label>
                                            <input type="number" class="form-control" name="listing_id" id="listing_id"
                                                   placeholder="Enter Listing ID" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transaction_date">Transaction Date</label>
                                            <input type="date" class="form-control" name="transaction_date" id="transaction_date"
                                                   placeholder="Enter Transaction Date" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount"
                                               placeholder="Enter Amount" autocomplete="off">
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



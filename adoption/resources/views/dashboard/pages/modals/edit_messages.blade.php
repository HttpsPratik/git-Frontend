<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Change messages</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="post" action="{{url('/messages/update')}}">
            <div class="modal-body">
                @csrf

                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for= "name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   placeholder="Enter Name" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                   placeholder="Enter Email" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                   placeholder="Enter Subject" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message_content">Message Content</label>
                                            <input type="text" class="form-control" name="message_content" id="message_content"
                                                   placeholder="Enter Message Content" autocomplete="off">
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



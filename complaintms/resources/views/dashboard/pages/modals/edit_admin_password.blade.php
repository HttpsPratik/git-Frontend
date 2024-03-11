<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" >Update Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url('/dashboard/admin/password-update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{ method_field('put') }}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password1" autocomplete="off" placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text fa fa-eye toggle-password" toggle="#password1"> </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Repeat Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation1" autocomplete="off" placeholder="Repeat Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text fa fa-eye toggle-password" toggle="#password_confirmation1"></span>
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



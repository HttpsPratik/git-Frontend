<div class="modal-dialog  modal-dialog-scrollable modal-lg"  role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="title">Add User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form form-horizontal" method="post" action={{url("/dashboard/admin/save") }} >
            @csrf
            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name2">Name</label>
                                        <input type="text" class="form-control" name="name" id="name2" placeholder="Enter Name" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="password2">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password2" autocomplete="off" placeholder="Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-eye toggle-password" toggle="#password1"> </span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Email</label>
                                        <input type="email" class="form-control" name="email" id="email2" placeholder="Enter Email Address" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation2">Repeat Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation2" autocomplete="off" placeholder="Repeat Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-eye toggle-password" toggle="#password_confirmation2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="add_admin_department_id">Select Department</label>
                                        <select class="form-control" name="department_id" id="add_admin_department_id">
                                            {{--will be populated via ajax--}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SelectRole">Select Role</label>
                                        <select class="form-control" name="role_id" id="role_id2">
                                            {{--will be populated via ajax--}}
                                        </select>
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



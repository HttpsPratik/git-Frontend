<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="title">Add Listings</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form form-horizontal" method="post" action="{{ url('/listings/save') }}">
            @csrf
            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" autocomplete="off">
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                       placeholder="Enter Description" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                    <option value="bird">Bird</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pet's Gender</label><br>
                                <input type="radio" name="gender" id="male" value="male">
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="female">
                                <label for="female">Female</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="available">Available</option>
                                    <option value="adopted">Adopted</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Select Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ADD</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

            </div>
        </form>
    </div>
</div>

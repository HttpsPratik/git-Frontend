<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-gradient-info">
            <h4 class="modal-title" >Edit Ticket</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url('/dashboard/ticket/open/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="open_ticket_model_category">Category</label>
                        <select class="form-control" name="category_id" id="open_ticket_model_category">
                            {{--will be populated via ajax--}}
                        </select>
                    </div>
                </div>
                @if($showSubject)
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject"
                               placeholder="Subject" autocomplete="off">
                    </div>
                </div>
                @endif
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-District -->
{{--<script>
    $('#open_ticket_model_category').select2({
        dropdownParent: $('#edit_open_ticket')
    });
</script>--}}

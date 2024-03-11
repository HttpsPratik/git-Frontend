<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" >इमेल ठेगाना परिवर्तन गर्नुहोस्</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form class="form-horizontal" action="{{url('user/email-update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{ method_field('put') }}

                <input type="hidden" name="id" id="id1">

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">नयाँ इमेल ठेगाना</label>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">परिवर्तन सुरक्षित गर्नुहोस</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">बन्द गर्नुहोस</button>
            </div>

        </form>

    </div>
</div>



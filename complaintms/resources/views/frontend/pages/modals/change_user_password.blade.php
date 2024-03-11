<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">पासवर्ड परिवर्तन गर्नुहोस्</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form class="form-horizontal" action="{{route('password.update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{ method_field('put') }}

                <input type="hidden" name="id" id="id">

                <div class="input-group mb-3">
                    <div class="form-floating" style="flex: 85%;">
                        <input type="password" name="current_password" class="form-control" id="current_password" placeholder="current_Password">
                        <label for="current_password">पुरानो पासवर्ड</label>
                    </div>
                    <span class="input-group-text toggle-password" toggle="#current_password" style="flex: 15%; place-content: center;"><i class="fa fa-eye" ></i></span>
                </div>

                <div class="input-group mb-3">
                    <div class="form-floating" style="flex: 85%;">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">नयाँ पासवर्ड</label>
                    </div>
                    <span class="input-group-text toggle-password" toggle="#password" style="flex: 15%; place-content: center;"><i class="fa fa-eye" ></i></span>
                </div>

                <div class="input-group mb-3">
                    <div class="form-floating" style="flex: 85%;">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password_confirmation">
                        <label for="password_confirmation">पूनः नयाँ पासवर्ड</label>
                    </div>
                    <span class="input-group-text toggle-password" toggle="#password_confirmation" style="flex: 15%; place-content: center;"><i class="fa fa-eye" ></i></span>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">परिवर्तन सुरक्षित गर्नुहोस</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">बन्द गर्नुहोस</button>
            </div>

        </form>

    </div>
</div>



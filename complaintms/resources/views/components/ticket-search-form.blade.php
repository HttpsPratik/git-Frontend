<div class="form-group">
    <form action="{{ url($action) }}" method="get" id="ticket_search_form">
        <div class="row align-items-baseline">

            <div class="col-md-1 col-sm-12 col-12  mb-md-0 mb-sm-2 mb-2">
                <label for="search-form-fiscal-year">Fiscal Year :</label>
            </div>
            <div class="col-md-3 col-sm-12 col-12  mb-md-0 mb-sm-2 mb-2">
                <select class="custom-select" name="fiscal_year" id="search-form-fiscal-year"></select>
            </div>

            <div class="col-md-4 col-sm-12 col-12 mb-md-0 mb-sm-2 mb-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right"
                           name="date_range_ticket"
                           autocomplete="off" id="date_range_search_ticket">
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-12">
                <div class="input-group">
                    <input type="text" class="form-control " placeholder="Search..."
                           name="search_term" autocomplete="off" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary form-control"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(function () {
        $.ajax({
            url: '/dashboard/all-fiscal-years',
            type: 'get',
            success: function (response) {
                let parameter = false;

                if (getParameter('fiscal_year') !== undefined) {
                    parameter = true
                }

                response.forEach(function (data) {
                    $('#search-form-fiscal-year').append(
                        $('<option>', {
                            value: data.id,
                            text: data.year
                        })
                    )

                    if (data.active === 1 && parameter === false) {
                        $('#search-form-fiscal-year').val(data.id).change();
                    }

                });

                if (parameter === true) {
                    $('#search-form-fiscal-year').val(getParameter('fiscal_year')).change();
                }
            }
        });

    });
</script>

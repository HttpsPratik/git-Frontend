</div>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-5 bg-primary-dark-gradient">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-10 col-10 text-center text-white ">
                        <h5 class="fw-bold d-block mb-3">सम्पर्क</h5>
                        <p class="mb-0 fw-bold">हेटौँडा उपमहानगरपालिका</p>
                        <p class="mb-0">नगर कार्यपालिकाको कार्यालय</p>
                        <p>मकवानपुर</p>
                        <p class="mb-0">१६६००१२३४५</p>
                        <p>email@hetaudamun.gov.np</p>
                    </div>
                </div>
            </div>
            <div class="col-12 bg-primary-dark-gradient text-center">
                <p class="mb-0 py-3 text-white">"एक कल समस्या हल" हेटौँडा उपमहानगरपालिकाद्वारा सञ्चालित गुनासो सम्बोधन प्रणाली
                    हो । सर्वाधिकार <a class="text-white mb-0" target="_blank" href="https://hetaudamun.gov.np/">हेटौँडा
                        उपमहानगरपालिका</a>मा निहित । निर्माण तथा व्यवस्थापन <a href="https://prabidhee.com" target="_blank"><img
                            class="developer-footer" src="{{url('frontend/images/developer_logo.png')}}"></a></p>
            </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--<!-- ChartJS -->--}}
<script src="{{url('/backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{url('/frontend/js/app.js')}}"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
<script>
    @if(Session::has('ticket_number') and Session::has('ticket_password'))
        $("#anonymous-ticket-block").removeClass('d-none');
        $("#anonymous-ticket-number").val("{{Session::get('ticket_number')}}");
        $("#anonymous-ticket-password").val("{{Session::get('ticket_password')}}");
    @endif
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @php
        Session::forget('success');
    @endphp
    @endif

    @if(Session::has('customError'))
    toastr.error("{{ Session::get('customError') }}");
    @php
        Session::forget('CustomError');
    @endphp
    @endif

    @if(Session::has('update'))
    toastr.success("{{ Session::get('update') }}");
    @php
        Session::forget('update');
    @endphp
    @endif

    @if(Session::has('destroy'))
    toastr.success("{{ Session::get('destroy') }}");
    @php
        Session::forget('destroy');
    @endphp
    @endif

    @if($errors->any())
    @foreach( array_reverse($errors->all()) as $error )
    toastr.error("{{ $error }}");
    @endforeach
    @endif

    $(".toggle-password").click(function () {
        $(this).children('i').toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

</script>


</body>
</html>

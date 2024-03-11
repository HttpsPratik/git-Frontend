<header>
    <div class="container-fluid py-2 small bg-dark-grey">
        <div class="row text-white">
            <div class="col-md-4 col-sm-12 col-12 text-start mb-md-0 mb-sm-2 mb-2"><p class="mb-0 fw-bold">हेटौँडा उपमहानगरपालिकाको आधिकारिक गुनासो प्रणाली</p></div>
            <div class="col-md-4 col-sm-6 col-6 text-md-center text-sm-start text-start"><i class="fa-solid fa-phone fa-shake"></i>&nbsp;&nbsp;<a class="text-white text-decoration-none" href="tel:16660012345">१६६००१२३४५</a></div>
            <div class="col-md-4 col-sm-6 col-6 text-end">
                <ul class="list-unstyled d-inline-flex mb-0">
                    <li class="mx-1"><a class="text-white" target="_blank" href="https://facebook.com/submetrohetauda"><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li class="mx-1"><a class="text-white" target="_blank" href="https://hetaudamun.gov.np/"><i class="fa-solid fa-globe"></i></a></li>
                    @if(Auth::guard('web')->check())
                        <li class="ms-3 me-1">
                            <div class="dropdown">
                                <a class="text-white text-decoration-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="me-1 fa-regular fa-user"></i> {{Auth::guard('web')->user()->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{url('/user-profile')}}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; प्रयोगकर्ताको विवरण</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{url('user-tickets')}}">
                                            <i class="fa fa-ticket" aria-hidden="true"></i> &nbsp; मेरो टिकटहरु</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <form id="logout-form" method="post" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; लग आउट</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="mx-1"><a class="text-white text-decoration-none" href="{{url('/login')}}">&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;<i class="fa-regular fa-user"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="container py-3 branding">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-12 text-md-start text-sm-center text-center align-self-center">
                <a href="{{url('/')}}"><img class="brand-logo" src="{{url('/frontend/images/app-logo.png')}}"></a>
            </div>
            <div class="col-md-6 col-sm-12 col-12 text-center align-self-center">
                <div class="ms-2 brand-title">
                    <p class="mb-0">हेटौँडा उपमहानगरपालिका</p>
                    <h2 class="fw-bold text-primary">सार्वजनिक गुनासो र समाधान प्रणाली</h2>
                </div>
            </div>
            <div class="col-md-3 d-md-block d-sm-none d-none text-md-end align-self-center">
                <img class="brand-logo" src="{{url('/frontend/images/hetaudamun-logo.png')}}">
            </div>
        </div>
    </div>
</header>



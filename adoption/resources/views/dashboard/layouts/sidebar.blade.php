{{--<!-- Main Sidebar Container -->--}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{--<!-- Brand Logo -->--}}
    <a href="{{url('/dashboard/')}}" class="brand-link">
        <img src="{{ url('https://ui-avatars.com/api/?name='.config('app.name') . '&background=d6d8d9&color=343a40&length=4&size=256&font-size=0.33&bold=true')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    {{--<!-- Sidebar -->--}}
    <div class="sidebar">

        {{--<!-- Sidebar Menu -->--}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fa fa-person"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="/listings" class="nav-link">
                        <i class="fa-solid fa-list"></i>
                        <p>Listings</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="/messages" class="nav-link">
                        <i class="fa-solid fa-envelope"></i>
                        <p>Messages</p>
                    </a>
                </li> <li class="nav-item menu-open">
                    <a href="/favourites" class="nav-link">
                        <i class="fa-solid fa-star"></i>
                        <p>Favourites</p>
                    </a>
                </li> <li class="nav-item menu-open">
                    <a href="/reviews" class="nav-link">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <p>Reviews</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="/transactions" class="nav-link">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                        <p>Transactions</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        {{--<!-- /.sidebar-menu -->--}}
    </div>
    {{--<!-- /.sidebar -->--}}
</aside>

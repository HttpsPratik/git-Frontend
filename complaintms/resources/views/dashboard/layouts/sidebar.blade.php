{{--<!-- Main Sidebar Container -->--}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{--<!-- Brand Logo -->--}}
    <a href="{{url('/dashboard/')}}" class="brand-link">
        <img src="{{ url('https://ui-avatars.com/api/?name='.config('app.name') . '&background=d6d8d9&color=343a40&length=4&size=256&font-size=0.33&bold=true')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    {{--<!-- Sidebar -->--}}
    <div class="sidebar">
        {{--<!-- Sidebar user panel (optional) -->--}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           <div class="image">
               <img src="{{'https://ui-avatars.com/api/?name='.implode("+", explode(" ", \Illuminate\Support\Facades\Auth::guard('admin')->user()->name)).'&background=0D8ABC&color=fff'}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{url('/dashboard/admin/profile')}}" class="d-block">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>
        {{--@endif--}}
        {{--<!-- Sidebar Menu -->--}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item @if($name=="Open Ticket" || $name=="Processing Ticket" || $name=="Closed Ticket" || $name=="Rejected Ticket")  menu-open @endif">
                    <a href="#" class="nav-link @if($name=="Open Ticket" || $name=="Processing Ticket" || $name=="Closed Ticket" || $name=="Rejected Ticket") active @endif">
                        <i class="nav-icon fa fa-ticket" aria-hidden="true"></i>
                        <p>
                            Tickets
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        @can('open-ticket')
                        <li class="nav-item">
                            <a href="{{url('/dashboard/ticket/open')}}" class="nav-link @if($name == "Open Ticket") active @endif">
                                <i class="nav-icon fa fa-envelope-open" aria-hidden="true"></i>
                                <p>Open</p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{url('/dashboard/ticket/processing')}}" class="nav-link @if($name == "Processing Ticket") active @endif">
                                <i class="nav-icon fa fa-spinner nav-icon"></i>
                                <p>Processing</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('/dashboard/ticket/closed')}}" class="nav-link @if($name == "Closed Ticket") active @endif">
                                <i class="nav-icon fa fa-check" aria-hidden="true"></i>
                                <p>Closed</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/ticket/rejected')}}" class="nav-link @if($name == "Rejected Ticket") active @endif">
                                <i class="nav-icon fa fa-eject" aria-hidden="true"></i>
                                <p>Rejected</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @can('admin-management')
                    <li class="nav-item @if($name=="Department" || $name=="Administrator" || $name=="User" || $name=="Role")  menu-open @endif">
                        <a href="#" class="nav-link @if($name=="Department" || $name=="Administrator" || $name=="User" || $name=="Role") active @endif">
                            <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
                            <p>
                                User Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{url('/dashboard/admins')}}" class="nav-link @if($name == "Administrator") active @endif">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Administrators</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/dashboard/users')}}" class="nav-link @if($name == "User") active @endif">
                                    <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                                    <p>User</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('dashboard/roles')}}" class="nav-link @if($name == "Role") active @endif">
                                    <i class="nav-icon fa fa-dot-circle" aria-hidden="true"></i>
                                    <p>Role</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/dashboard/departments')}}" class="nav-link @if($name == "Department") active @endif">
                                    <i class="nav-icon fa fa-fax" aria-hidden="true"></i>
                                    <p>Department</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('setting')

                    <li class="nav-item @if($name=="Category" || $name=="Fiscal Year" || $name == "Activity" )  menu-open @endif">
                        <a href="#" class="nav-link @if($name=="Category" || $name=="Fiscal Year" || $name == "Activity" ) active @endif">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{url('/dashboard/categories')}}" class="nav-link @if($name == "Category") active @endif">
                                    <i class="nav-icon fa fa-object-ungroup" aria-hidden="true"></i>
                                    <p>Category</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/dashboard/fiscal-years')}}" class="nav-link @if($name == "Fiscal Year") active @endif">
                                    <i class="nav-icon fa fa-clock" aria-hidden="true"></i>
                                    <p>Fiscal Year</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/dashboard/activities')}}" class="nav-link @if($name == "Activity") active @endif">
                                    <i class="nav-icon fa fa-briefcase" aria-hidden="true"></i>
                                    <p>Activity</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/reports') }}" class="nav-link @if($name == "Report") active @endif">
                            <i class="nav-icon fa fa-bar-chart"></i>
                            <p>Reports</p>
                        </a>
                    </li>

                @endcan

                <form id="logout-form" method="post" action="{{route('admin.logout')}}">
                    @csrf
                </form>
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

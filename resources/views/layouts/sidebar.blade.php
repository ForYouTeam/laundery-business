<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('AdminLTE-master') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">LAUNDRY-BUSINESS</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('user.view') ? 'menu-open' : '' }}">
                <a href="{{route('user.view')}}" class="nav-link {{ Route::is('user.view') ? 'active' : '' }}">
                    <i class="fas fa-user nav-icon"></i>
                    <p>
                        User
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('laundry.view') ? 'menu-open' : '' }}">
                <a href="/laundry" class="nav-link {{ Route::is('laundry.view') ? 'active' : '' }}">
                    <i class="fas fa-tshirt nav-icon"></i>
                    <p>
                        Laundry
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('paket.view') ? 'menu-open' : '' }}">
                <a href="/paket" class="nav-link {{ Route::is('paket.view') ? 'active' : '' }}">
                    <i class="fas fa-box nav-icon"></i>
                    <p>
                        Paket
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('order.view') ? 'menu-open' : '' }}">
                <a href="/order" class="nav-link {{ Route::is('order.view') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart nav-icon"></i>
                    <p>
                        Order
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('member.view') ? 'menu-open' : '' }}">
                <a href="/member" class="nav-link {{ Route::is('member.view') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>
                        Member
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item {{Route::is('report.view') ? 'menu-open' : ''}}">
                <a href="/report" class="nav-link {{Route::is('report.view') ? 'active' : ''}}">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p>
                        Report
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

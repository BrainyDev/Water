<nav class="sidebar sidebar-offcanvas" id="sidebar">
    {{-- <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
            <img src="{{ asset('assets/images/logo.svg') }}"alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">
            <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" />
        </a>
    </div> --}}
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    {{-- <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{asset("assets/images/faces/face15.jpg")}}" alt="">
                        <span class="count bg-success"></span>
                    </div> --}}
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Admin Name</h5>
                        <span>Administator</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        {{-- home/dashboard --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('admin/Dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>  

        {{-- billing --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Billing</span>
                <i class="menu-arrow"></i>
            </a>
            {{-- billing dropdown components --}}
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/Billing')}}">Request Token in(Ksh)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Request Token in(m^3)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/Visa')}}">Receipts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Clear Token</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Tamper Check</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Refunds</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- customers --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Clients</span>
                <i class="menu-arrow"></i>
            </a>
            {{-- tasks dropdown components --}}
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Apartments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Companies</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- tasks --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Tasks</span>
                <i class="menu-arrow"></i>
            </a>
            {{-- tasks dropdown components --}}
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="">To do list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">All enquiries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Pending enquiries</a>
                    </li>
                </ul>
            </div>
        </li>

        <div class="dropdown-divider"></div>

        {{-- services --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
            </a>
            {{-- services dropdown components --}}
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('create/Service')}}">Create Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/Service')}}">All Services</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- system --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('admin/Dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">System Analysis</span>
            </a>
        </li>

    </ul>
</nav>
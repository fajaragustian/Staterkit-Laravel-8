<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <span><i class="fas fa-rocket"></i></span>
        </div>
        <div class="sidebar-brand-text mx-3">Stater Kit </div>
    </a>
    <hr class="sidebar-divider my-0">
    @hasanyrole('Superadmin|Admin')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Admin</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Management Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-users-cog" style="color: #6777ef"></i>
            <span>User Control</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 mt-3 collapse-inner rounded">
                <h6 class="collapse-header">Action</h6>
                @can('role-list')
                <a class="collapse-item" href="{{route('roles.index')}}"><i class="fas fa-cogs pr-2"></i>&nbsp;Role</a>
                @endcan
                @can('permission-list')
                <a class="collapse-item" href="{{route('permissions.index')}}"><i
                        class="fas fa-cog pr-2"></i>&nbsp;Permissions</a>
                @endcan
            </div>
        </div>
    </li>
    @can('user-list')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span>
        </a>
    </li>
    @endcan

    @can('categories-list')
    <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Categories</span>
        </a>
    </li>
    @endcan
    @else
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home ')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pages Dashboard
    </div>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User Management</span>
        </a>
    </li>
    @endhasanyrole
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Setting
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Profile</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 mt-3 collapse-inner rounded">
                <h6 class="collapse-header">Action</h6>
                <a class="collapse-item" href="{{route('profile')}}">Update Profile</a>
                <a class="collapse-item" href="{{route('password')}}">Change Password</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Logout</span>
        </a>
    </li>
    <hr class="sidebar-divider">
</ul>
<!-- Sidebar -->

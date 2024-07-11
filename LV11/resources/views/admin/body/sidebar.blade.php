<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('admin.weight') }}" class="nav-link">
                    <i class="link-icon" data-feather="cash"></i>
                    <span class="link-title">Weight Collection</span>
                </a>
            </li> -->

            <li class="nav-item">
                <a href="{{ route('admin.payment') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Payments</span>
                </a>
            </li>
            <li class="nav-item nav-category">Roles & permissions</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Role and Permissions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.permissions')}}" class="nav-link">All Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/compose.html" class="nav-link">Compose</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>
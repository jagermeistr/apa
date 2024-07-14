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
            <li class="nav-item nav-category">Payment Records</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#salary" role="button" aria-expanded="false" aria-controls="salary">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Salary</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="salary">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">All Payments</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Add Payment</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Collection centres</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#collections" role="button" aria-expanded="false" aria-controls="collections">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Manage collection centres</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="collections">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.collections')}}" class="nav-link">All Collection Center</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.collections')}}" class="nav-link">Add Collection Center</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Farmer </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#farmer" role="button" aria-expanded="false" aria-controls="farmer">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Manage Farmer</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="farmer">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.farmers')}}" class="nav-link">All Farmers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.farmer')}}" class="nav-link">Add Collection Centre</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Plucker </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#plucker" role="button" aria-expanded="false" aria-controls="plucker">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Manage Plucker</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="plucker">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.pluckers')}}" class="nav-link">All Pluckers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.plucker')}}" class="nav-link">Add Plucker</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            
            <li class="nav-item nav-category">Roles & permissions</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#rp" role="button" aria-expanded="false" aria-controls="rp">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Role and Permissions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="rp">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.permissions')}}" class="nav-link">All Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('add.roles.permission')}}" class="nav-link">Role in Permission</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('all.roles.permission')}}" class="nav-link">All Role in Permission</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>
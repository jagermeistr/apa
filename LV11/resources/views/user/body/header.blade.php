<!-- partial:partials/_navbar.html -->
<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-text">
                    <i data-feather="search"></i>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>
        <ul class="navbar-nav">
            @php
            $id = Auth::User()->id;
            $profileData= App\Models\User::find($id); 
            // <!-- Updates the header area with the info from profile -->
            @endphp
            
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="grid"></i>
                <!-- <img class="wd-30 ht-30 rounded-circle" src=" (!empty($profileData->photo)) ? url('input/admin_images/'.$profileData->photo) : url('input/no_image.jpg') }}" alt="profile"> -->

                </a>

                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <!-- <img class="wd-80 ht-80 rounded-circle" src="(!empty($profileData->photo)) ? url('input/admin_images'.$profileData->photo):url('input/no_image.jpg') }}" alt=""> -->
                            <i data-feather="grid"></i>

                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{$profileData->name}}</p>
                            <p class="tx-12 text-muted">{{$profileData->email}}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ route('user.profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('user.change.password') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{route('user.records')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Records</span>
                            </a>
                        </li>
                        <!-- <li class="dropdown-item py-2">
                            <a href="{{route('agent.login')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Switch User</span>
                            </a>
                        </li> -->
                        <!-- <li class="dropdown-item py-2">
                            <a href="{{route('agent.login')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Switch User</span>
                            </a>
                        </li> -->
                        <li class="dropdown-item py-2">
                            <a href="{{ route('user.logout') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
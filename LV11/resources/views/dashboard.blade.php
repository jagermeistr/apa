<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-8 center-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Farmer Profile</h6>

                        <form method="POST" action="{{ route('agent.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <!-- @csrf induces users to perform actions they do not intend to perform -->
                            <!-- enctype="multipart/form-data" is used to upload the image-->

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData-> username}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData-> name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData-> email}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData-> phone}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Photo</label>
                                <input class="form-control" name="photo" type="file" id="image">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('input/admin_images'.$profileData->photo):url('input/no_image.jpg') }}" alt="profile picture">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded"> 
                <div class="card-body">
                    <h6 class="card-title"> Add Collection Center</h6>
                    <form  method="POST" action="{{route('store.collections')}}"  class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Collection Center</label>
                            <input type="text" name="collection_centres" class="form-control @error('collection_centres') is invalid @enderror ">
                            @error('collection_centres')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input type="text" name="collection_centre_address" class="form-control @error('collection_centre_address') is invalid @enderror">
                            @error('collection_centre_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                            <button type="Submit" class="btn btn-primary me-2">Save Changes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
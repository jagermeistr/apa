@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <h6 class="card-title"> Edit Plucker</h6>
                    <form  method="POST" action="{{route('update.plucker')}}"  class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" class="form-control" value="{{$pluckers->id}}">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Farmer Name</label>
                            <input type="text" name="name" class="form-control @error('name') is invalid @enderror" value="{{$pluckers->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Farm Name</label>
                            <input type="text" name="farm" class="form-control @error('farm') is invalid @enderror" value="{{$pluckers->farm}}">
                            @error('farm')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is invalid @enderror" value="{{$pluckers->phone}}">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">weight collected</label>
                            <input type="text" name="weight_collected" class="form-control @error('weight_collectd') is invalid @enderror" value="{{$pluckers->weight_collected}}">
                            @error('weight_collected')
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
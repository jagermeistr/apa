@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <h6 class="card-title"> Add Permission</h6>
                    <form id="my Form" action="{{route('store.permission')}}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{$permission->name}}">
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="exampleInputUsername1">
                                    <option selected="" disabled="">Select Group Name</option>
                                    <option value="rent">For Rent</option>
                                    <option value="buy">For buy</option>
                                    <!-- <option value="buy"{{$permission->group_name == 'type'?'selected':''}}>For buy</option> THIS IS HOW THE EXAMPLE WILL LOOK-->


                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
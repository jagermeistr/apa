@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
<nav class="page-breadcrumb"> 
    <ol class="breadcrumb">
      <a href="{{ route('export')}}" class="btn btn-inverse-danger">Download Xlsx</a>
    </ol>
  </nav>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <h6 class="card-title"> Import Permission</h6>
                    <form id="myForm" action="{{route('import')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Xlsx File Import</label>
                            <input type="file" name="import_file" class="form-control">
                        </div>
                        <button type="Submit" class="btn btn-inverse-warning">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
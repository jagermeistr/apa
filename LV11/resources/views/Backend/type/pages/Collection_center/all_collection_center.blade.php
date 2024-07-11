@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.collection.centers')}}" class="btn btn-inverse-info">Add Collection Center</a>
      
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">All farmers</h6>

          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>S1</th>
                  <th>Collection center</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($collections as $key => $item)
                <tr>
                  <td> {{ $key+1}}</td> 
                  <td> {{$item->collection_centres}}</td>
                  <td> {{$item->collection_centre_address}}</td>

                  <td>
                    <a href="{{ route('edit.collection.centers',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('delete.collection.centers',$item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
                  </td>
                  @endforeach
                </tr>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>



@endsection
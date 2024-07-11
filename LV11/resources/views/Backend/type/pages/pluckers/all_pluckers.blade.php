@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.farmer')}}" class="btn btn-inverse-info">Add Plucker</a>
      
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">All pluckers</h6>

          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>S1</th>
                  <th>Plucker Name</th>
                  <th>Farm Name</th>
                  <th>Phone Number</th>
                  <th>weight Collected</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pluckers as $key => $item)
                <tr>
                  <td> {{ $key+1}}</td> 
                  <td> {{$item->name}}</td>
                  <td> {{$item->farm}}</td>
                  <td> {{$item->phone}}</td> 
                  <td> {{$item->weight_collected}}</td>

                  <td>
                    <a href="{{ route('edit.plucker',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('delete.plucker',$item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
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
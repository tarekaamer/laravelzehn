@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
      <ol class="breadcrumb">
        <a href="{{route('add.ameneties')}}" class="btn btn-inverse-info">Add Ameneties</a>
          </ol>
    </nav>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Ameneties </h6>
           <div class="table-responsive">
              <table id="dataTableExample" class="table">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Ameneties Name</th>
                   
                    <th>Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ameneties as $key=>$item )
                        
                   
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->ameneties_name}}</td>
                   
                    
                   
                    <td>

                        <a href="{{route('edit.ameneties',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                        <a href="{{route('delete.ameneties',$item->id)}}" class="btn btn-inverse-danger">Delete</a>

                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
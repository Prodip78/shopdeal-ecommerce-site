@extends('admin.layouts.master')
@section('admin_content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Slider</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Slider List
            <a href="" class="btn btn-warning" style="float: right;"  data-toggle="modal" data-target="#exampleModal">Add New</a>

        </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                	
                  <tr>
                    <th>Slider Id</th>
                    <th>Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                	@foreach($slider as $result)
                	<tr>
                		<td>{{$result->slider_id}}</td>
                    
                    <td><img src="{{URL::to($result->slider_image)}}" style="height: 70px;width: 100px;"></td>
                    <td>{{$result->publication_status}}</td>
                      
                		<td>
                      <a href="{{URL::to('edit/slider'.$result->slider_id)}}" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{URL::to('delete/slider'.$result->slider_id)}}" class="btn btn-sm btn-danger" id="#delate">Delete</a>
                    </td>                
                    	</tr>
                	@endforeach
                </tbody>
                
                </table>
            </div>
          </div>
{{-- <..modal..> --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <form method="post" action="{{route('store.slider')}}" enctype="multipart/form-data">
      	@csrf
    <div class="modal-body">    
  
  <div class="form-group">
    <label class="control-label" for="date01">Image</label>
    <div class="controls">
      <input type="file" class="form-control"  name="slider_image">
    </div>
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <input type="checkbox" class="form-control"  name="publication_status" value="1">
  </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

    </div>
  </div>
</div>


@endsection
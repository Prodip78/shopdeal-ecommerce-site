@extends('admin.layouts.master')
@section('admin_content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Brand</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Brand List
            <a href="" class="btn btn-warning" style="float: right;"  data-toggle="modal" data-target="#exampleModal">Add Brand</a>

        </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                	
                  <tr>
                    <th>Id</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                	@foreach($brand as $view)
                	<tr>
                		<td>{{$view->brand_idid}}</td>
                		<td>{{$view->brand_name}}</td>
                    <td>{{$view->description}}</td>                	
                     <td>
                        
                      {{$view->publication_status}}
                       
                    </td >

                    	<td>
                			<a href="{{URL::to('edit/brand'.$view->brand_id)}}" class="btn btn-sm btn-info">Edit</a>
                			<a href="{{URL::to('delete/brand'.$view->brand_id)}}" class="btn btn-sm btn-danger" id="delate">Delete</a>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
                
                </table>
            </div>
          </div>
        </div>
{{-- <..modal..> --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brand title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

   


      <form method="post" action="{{route('store.brand')}}" enctype="multipart/form-data">
      	@csrf
    <div class="modal-body">    
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" placeholder="Brand" name="brand_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Description</label>
    <input type="text" class="form-control" placeholder="Brand Description" name="description">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <input type="checkbox" class="form-control"  name="publication_status" value="1">
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
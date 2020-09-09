@extends('admin.layouts.master')
@section('admin_content')

    
<div id="content-wrapper">

      <div class="container-fluid">


      <form method="post" action="{{URL::to('update/brand'.$brand->brand_id)}}">
      	@csrf
     <div class="modal-body pd-20">  
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" value="{{$brand->brand_name}}" name="brand_name">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" class="form-control" value="{{$brand->description}}" name="description">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <input type="text" class="form-control" value="{{$brand->publication_status}}" name="publication_status">
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

  </div>
        
      </form>

    </div>
  </div>



@endsection
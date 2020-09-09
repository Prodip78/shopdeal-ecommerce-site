@extends('admin.layouts.master')
@section('admin_content')

    
<div id="content-wrapper">

      <div class="container-fluid">


      <form method="post" action="{{URL::to('update/category'.$category->category_id)}}">
      	@csrf
     <div class="modal-body pd-20">  
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" value="{{$category->category_name}}" name="category_name">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" class="form-control" value="{{$category->description}}" name="description">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <input type="text" class="form-control" value="{{$category->publication_status}}" name="publication_status">
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

  </div>
        
      </form>

    </div>
  </div>



@endsection
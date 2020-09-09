@extends('admin.layouts.master')
@section('admin_content')

    
<div id="content-wrapper">

      <div class="container-fluid">


      <form method="post" action="{{URL::to('update/slider'.$slider->slider_id)}}">
        @csrf
    
   

  
  <div class="form-group">
    <label for="exampleInputEmail1">Slider Image</label>
    <input type="file" class="form-control"  name="slider_image">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Old Image</label>
    <img src="{{URL::to($slider->slider_image)}}" style="height: 50px;width: 80px;">
    <input type="hidden" class="form-control" value="{{$slider->slider_image}}" name="old_image">
  </div>


    



   <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <input type="checkbox" class="form-control"  name="publication_status" value="{{$slider->publication_status}}">
  </div>



      </div>

    <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

  </div>
        
      </form>

    </div>
  </div>



@endsection
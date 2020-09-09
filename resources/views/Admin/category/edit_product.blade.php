@extends('admin.layouts.master')
@section('admin_content')

    
<div id="content-wrapper">

      <div class="container-fluid">


      <form method="post" action="{{URL::to('update/product'.$product->product_id)}}">
        @csrf
     <div class="modal-body pd-20">  
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" value="{{$product->product_name}}" name="brand_name">
    
  </div>

   <div class="form-group">
    <label class="control-label" for="selectError3">Product Category</label>
    <option>Select Category</option>
<select name="category_id">
<?php
$show_category=DB::table('categories')
                ->where('publication_status',1)
                ->get();


foreach ($show_category as $value) {?>

  <option value="{{$value->category_id}}">{{$value->category_name}}</option>
  <?php } ?>
</select>
</div>


<div class="form-group">
    <label class="control-label" for="selectError3">Brand Name</label>
    <option>Select Brand</option>
<select name="brand_id">
  <?php
$show_brand=DB::table('brands')
                ->where('publication_status',1)
                ->get();


foreach ($show_brand as $value) {?>

  <option value="{{$value->brand_id}}">{{$value->brand_name}}</option>
  <?php } ?>
  
</select>
</div>
 <div class="form-group">
    <label for="textarea">Short Description</label>
    <div class="controls">
      <textarea class="cledito" name="product_short_description"  rows="3" value="{{$product->product_short_description}}"></textarea>
    </div>
  </div>

   <div class="form-group">
    <label for="textarea">Long Description</label>
    <div class="controls">
      <textarea class="cledito" name="product_long_description" rows="3"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label" for="date01">Price</label>
    <div class="controls">
      <input type="number" class="form-control" value="{{$product->product_price}}"  name="product_price">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label" for="date01">Image</label>
    <div class="controls">
      <input type="file" class="form-control"  name="product_image">
    </div>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Old image</label>
    <img src="{{URL::to($product->product_image)}}" style="height: 50px;width: 80px;">
    <input type="hidden" class="form-control" value="{{$product->product_image}}" name="old_image">
  </div>


  <div class="form-group">
    <label class="control-label" for="date01">Size</label>
    <div class="controls">
      <input type="text" class="form-control" value="{{$product->product_size}}"  name="product_size">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label" for="date01">Color</label>
    <div class="controls">
      <input type="text" class="form-control" value="{{$product->product_color}}"  name="product_color">
    </div>
  </div>



   <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <input type="checkbox" class="form-control"  name="publication_status" value="{{$product->publication_status}}">
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
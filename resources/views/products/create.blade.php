@extends('base')

@section('main')

<?php $title = 'Create Product'; ?>


<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Product</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" aria-label="{{ __('Upload') }}" action="{{ route('products.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Name ar:</label>
              <input type="text" class="form-control" name="name_ar"  />
          </div>
          <div class="form-group">    
              <label for="first_name">Name en:</label>
              <input type="text" class="form-control" name="name_en" />
          </div>   
          <div class="form-group">
              <label for="description">Description ar:</label>
              <input type="text" class="form-control" name="description_ar" />
          </div>
          <div class="form-group">
              <label for="description">Description en:</label>
              <input type="text" class="form-control" name="description_en" />
          </div>

          <div class="form-group">
              <label for="email">Price</label>
              <input type="varchar" class="form-control" name="price" />
          </div>
          <div class="form-group">
              <label for="city">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="country">Expire Date:</label>
              <input type="date" class="form-control" name="expired_date"/>
          </div>
            <strong>Categories</strong><br>
            @forelse ($category as $categories)

            <input type="radio" id="category_id" name="category_id" value="{{$categories->id}}">
            <label for="category_id">{{$categories->title}}</label><br>

            @empty
            <p>No Categories yet</p>
            @endforelse
          </select>
          <strong>Taxes: </strong>
          <input type="checkbox" id="myCheck" name="flag" value="1" onclick="myFunction()">
          <br>
              <div id="text" style="display:none; width: 30px;">
                <select name="taxes[]" multiple>
                  @foreach($taxes as $tax)
                  <option value="{{$tax->id}}">{{$tax->name}}</option>
                  @endforeach
                </select>
                  
              </div>
          <button type="submit" class="btn btn-primary-outline">Add Product</button>
      </form>
  </div>
</div>
</div>


<script type="text/javascript">
  function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text

  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";

  } else {
    text.style.display = "none";
  }
}
</script>
@endsection
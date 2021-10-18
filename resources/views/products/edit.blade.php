@extends('base') 
@section('main')

<?php $title = 'Edit Product'; ?>


<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a product</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}">
          @csrf

          @method('PUT')
          <div class="form-group">    
              <label for="first_name">Name ar:</label>
              <input type="text" class="form-control" name="name_ar"  value="{{$data['name']['ar']}}"/>
          </div>
          <div class="form-group">    
              <label for="first_name">Name en:</label>
              <input type="text" class="form-control" name="name_en" value="{{$data['name']['en']}}"/>
          </div>   
          <div class="form-group">
              <label for="description">Description ar:</label>
              <input type="text" class="form-control" name="description_ar" value="{{$data['description']['ar']}}"/>
          </div>
          <div class="form-group">
              <label for="description">Description en:</label>
              <input type="text" class="form-control" name="description_en" value="{{$data['description']['en']}}"/>
          </div>

          <div class="form-group">
              <label for="email">Price</label>
              <input type="varchar" class="form-control" name="price" value={{ $product->price }} />
          </div>
          <!-- <div class="form-group">
              <label for="city">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div> -->
          <div class="form-group">
              <label for="country">Expire Date:</label>
              <input type="date" class="form-control" name="expired_date" value={{ $product->expired_date }}/>
          </div>
            
            @forelse ($category as $categories)

            <input type="radio" id="category_id" name="category_id" value="{{$categories->id}}">
            <strong>{{$categories->title}}</strong><br>

            @empty
            <p>No Categories yet</p>
            @endforelse
          </select>
          <br>
          <div>
            <strong>Taxes:</strong>
            @foreach($taxes as $tax)
                  <p>{{$tax->name}} 
                    <a href="{{ route('products.edit',$product->id)}}" class="button">delete</a>
                  
              @endforeach
          </div>
          <!-- {{$taxes}} -->
               @if($taxes == '')
                <input type="checkbox" id="myCheck" name="flag" value="1" onclick="myFunction()">
                  <br>
                <div id="text" style="display:none; width: 30px;">
                  <select name="taxes[]" multiple>
                    @foreach($taxes as $tax)
                    <option value="{{$tax->id}}">{{$tax->name}}</option>
                    @endforeach
                  </select>
                    
                </div>
               @else
                <input type="checkbox" id="myCheck" name="flag" value="1" checked>
                
                <select name="taxes[]" multiple>
                    @foreach($changeTaxes as $tax)
                        <option value="{{$tax->id}}">{{$tax->name}}
                        </option>
                      
                    @endforeach
                </select>
               @endif
               

          <button type="submit" class="btn btn-primary-outline">Add Product</button>
      </form>



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


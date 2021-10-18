@extends('base') 
@section('main')
<?php $title = $product->name; ?>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1>
                {{ $product->name }}
            </h1>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">


            <p><strong>Description: </strong>{{$product->description}}</p>
            <p><strong>Price: </strong>{{$product->price}}</p>
            <p><strong>Expired Date: </strong>{{$product->expired_date}}</p>
            <?php if(!empty($category)){ ?>
            <p><strong>Category name: </strong>{{$category->title}}</p>
            <?php }else{ ?>
            <p><strong>Category name: </strong>Empty</p>
            <?php } ?>

            @forelse($product->taxes as $tax)
                <p><strong>taxes: </strong>{{$tax->name}}</p>
            @empty
                <p><strong>No taxes on this product</strong></p>
            @endforelse
        </div>
    </div>
    <table>
    <tr>
        
            <td>
                <a class="btn btn-primary" href="{{ route('products.index') }}"> 

            <button>    Back </button>
            </a>
            </td>
            <td>
            <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">
                <button>    Edit </button>
            </a>
        </td>
        <td>
            <form action="{{ route('products.destroy', $product->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
          </form>
      </td>


</tr>
</table>
  </div>

@endsection




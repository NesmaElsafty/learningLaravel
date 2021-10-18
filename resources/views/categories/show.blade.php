@extends('base')
@section('main')
<?php $title = $show->title ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $show->title }}
            </div>
        </div>
    </div>
    <h3>Products of Category</h3>
       
<table class="table table-bordered">
        
       @forelse ($category->products as $product)
        <tr>
                <td>
                {{$product['name']}}
                </td>
                <td> 
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                </td>
                <td>
                    <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
        </tr>
       @empty
            No products found in this category
       @endforelse
    </table>
@endsection

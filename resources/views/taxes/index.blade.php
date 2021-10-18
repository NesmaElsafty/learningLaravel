@extends('base')

@section('main')
<?php $title = 'All taxes'; ?>

<div>
    <a style="margin: 19px;" href="{{ route('taxes.create')}}" class="btn btn-primary">New tax</a>
</div>  

<div class="col-sm-12">

  @if(session()->get('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}  
  </div>
  @endif
</div>

<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Taxes</h1>    
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Value</td>
                  <td>ValueType</td>
                  <td>Start Date</td>
                  <td>End Date</td>
                  <td colspan = 3>Actions</td>
              </tr>
          </thead>
          <tbody>
            @foreach($taxes as $taxe)
            <tr>
                <td>{{$taxe->id}}</td>
                <td>{{$taxe->name}}</td>
                <td>{{$taxe->value}}</td>
                <td>{{$taxe->valueType}}</td>
                <td>{{$taxe->start_date}}</td>
                <td>{{$taxe->end_date}}</td>
                
                
                <td>
                     <a class="btn btn-info" href="{{ route('taxes.show',$taxe->id) }}">Show</a>
                </td>
                <td>  
                    <a class="btn btn-primary" href="{{ route('taxes.edit',$taxe->id) }}">Edit</a>
                </td>
                <td>
                <form action="{{ route('taxes.destroy',$taxe->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          @endforeach
      </tbody>
  </table>
  <div>
  </div>
  @endsection
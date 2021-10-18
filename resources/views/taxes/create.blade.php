@extends('base')

@section('main')

<?php $title = 'Create Tax'; ?>


<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Tax</h1>
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
      <form method="post" action="{{ route('taxes.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name_ar">Arabic Name:</label>
              <input type="text" class="form-control" name="name_ar"  />
          </div>
          <div class="form-group">    
              <label for="name_en">English Name:</label>
              <input type="text" class="form-control" name="name_en" />
          </div>   

          <div class="form-group">
              <label for="Value">Value</label>
              <input type="number" class="form-control" name="value" />
          </div>
          
          <div class="form-group">
              <label for="Start Date">Start Date:</label>
              <input type="date" class="form-control" name="start_date"/>
          </div>

          <div class="form-group">
              <label for="End Date">End Date</label>
              <input type="date" class="form-control" name="end_date"/>
          </div>

          <div class="form-group">
          <label for="valueTypes">Value Types</label>

            <select name="valueType" id="valueTypes">
              <option value="presentage">Presentage</option>
              <option value="number">Number</option>
            </select>
          </div>  
          <button type="submit" class="btn btn-primary-outline">Add Tax</button>
      </form>
  </div>
</div>
</div>
@endsection
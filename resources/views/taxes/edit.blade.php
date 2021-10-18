@extends('base') 
@section('main')

<?php $title = 'Edit tax'; ?>


<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a tax</h1>

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

        <form method="POST" action="{{ route('taxes.update', $taxes->id) }}">
          @csrf

          @method('PUT')
          <div class="form-group">    
              <label for="name_ar">Name ar:</label>
              <input type="text" class="form-control" name="name_ar"  value="{{$data['name']['ar']}}"/>
          </div>
          <div class="form-group">    
              <label for="name_en">Name en:</label>
              <input type="text" class="form-control" name="name_en" value="{{$data['name']['en']}}"/>
          </div>   
          
          <div class="form-group">
              <label for="value">value</label>
              <input type="number" class="form-control" name="value" value={{ $taxes->value }} />
          </div>
          
          <div class="form-group">
              <label for="Start Date">Start Date:</label>
              <input type="date" class="form-control" name="start_date" value={{ $taxes->start_date }} />
          </div>

          <div class="form-group">
              <label for="End Date">End Date</label>
              <input type="date" class="form-control" name="end_date" value={{ $taxes->end_date }} />
          </div>
          <br>
          <div class="form-group">
            <select name="valueType" id="valueTypes">
              <option value="presentage">Presentage</option>
              <option value="number">Number</option>
            </select>
          </div>
          <br> 
          <button type="submit" class="btn btn-primary-outline">Update tax</button>
      </form>



    </div>
</div>
@endsection
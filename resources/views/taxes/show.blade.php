@extends('base') 
@section('main')
<?php $title = $data['name']['en']; ?>



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">


            <p><strong>Arabic Name: </strong>{{ $data['name']['ar'] }}</p>
            <p><strong>English Name: </strong>{{ $data['name']['en'] }}</p>

            <p><strong>Value: </strong>{{ $taxes['value'] }}</p>
            <p><strong>Value Type: </strong>{{$taxes->valueType}}</p>
            <p><strong>Start Date: </strong>{{$taxes->start_date}}</p>
            <p><strong>End Date: </strong>{{$taxes->end_date}}</p>            

        </div>
    </div>
    <table>
    
</table>
  </div>

@endsection




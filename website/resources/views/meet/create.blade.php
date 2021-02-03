@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Register Meet</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::open(array('route' => 'meet.store','method'=>'POST')) !!}
<div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="Meet_appointment_id" value="{{$appointment->Appointment_id}}" hidden>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Treatment given  </strong>
                <input type="text" class="form-control" name="Meet_treatment" placeholder = "Treatment given ">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meeting date </strong>
                <input type="date" class="form-control" name="Meet_date" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_note </strong>
                <input type="text" class="form-control" name="Meet_note" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_charges </strong>
                <input type="text" class="form-control" name="Meet_charges" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_isPaid </strong>

                <select name="Meet_isPaid" class="form-control" >
            <option value="0"> YES </option>
            <option value="1"> NO </option>
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_isHomeVisit </strong>

                <select name="Meet_isHomeVisit" class="form-control" >
            <option value="0"> YES </option>
            <option value="1"> NO </option>
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_isAdvancePaid </strong>

                <select name="Meet_isAdvancePaid" class="form-control" >
            <option value="0"> YES </option>
            <option value="1"> NO </option>
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_status </strong>

                <select name="Meet_status" class="form-control" >
            <option value="0"> Appointment booked </option>
            <option value="1"> Meets ongoing </option>
            <option value="2"> Appointment completed </option>
            
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_note </strong>
                <input type="text" class="form-control" name="Meet_note" >
            </div>
        </div>

      

       








    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
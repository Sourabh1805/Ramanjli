@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Doctor Profile</h2>
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


{!! Form::open(array('route' => 'doctor.store','method'=>'POST')) !!}
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Doctor Name:</strong>
        <input type="text" class="form-control" name="Doctor_name">
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Degrees Obtained:</strong>
        <input type="text" class="form-control" name="Doctor_degree">
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Specialization in?:</strong>
        <input type="text" class="form-control" name="Doctor_specialization">
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Address of Clinic:</strong>
        <input type="text" class="form-control" name="Doctor_address">
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Where can patients contact you?</strong>
        <input type="number" class="form-control" name="Doctor_contact_number">
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Maximum number of appointments in a day? </strong>
        <input type="number" class="form-control" name="Doctor_maximum_number_of_appointments">
        </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Clinic timing from and to</strong>
        <br>
        <strong>From</strong>
        <input type="time" class="form-control" name="Doctor_clinic_time_from">
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>To </strong>
        <input type="time" class="form-control" name="Doctor_clinic_time_to">
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Maximum number of Home Visits in a day? </strong>
        <input type="number" class="form-control" name="Doctor_homevisit_max_appointments">
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Home Visits timing from and to</strong>
        <br>
        <strong>From</strong>
        <input type="time" class="form-control" name="Doctor_homevisit_time_from">
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>To </strong>
        <input type="time" class="form-control" name="Doctor_homevisit_time_to">
        </div>
        </div>      

        

        

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Holiday on?:</strong>
        <select name="Doctor_homevisit_holiday" class="form-control" >
            <option value="0"> Sunday </option>
            <option value="1"> Monday </option>
            <option value="2"> Tuesday </option>
            <option value="3"> Wednesday </option>
            <option value="4"> Thursday </option>
            <option value="5"> Friday </option>
            <option value="6"> Saturday </option>
        </select>
        </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
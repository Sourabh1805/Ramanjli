@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Reschedule the appointment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('appointments.index') }}"> Back</a>
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



{!! Form::model($appointment, ['method' => 'PATCH','route' => ['appointments.update', $appointment->appointment_id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name of Patient:</strong>
            <input type="text" name="Patient_username" value="{{$appointment->Patient_username}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Reason:</strong>
            <input type="text" name="reason" value="{{$appointment->reason}}" class="form-control" readonly>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            <input type="date" name="Time_and_Date" value="{{$appointment->Time_and_Date}}" class="form-control">
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"><small>Appointment Management Software</small></p>
@endsection
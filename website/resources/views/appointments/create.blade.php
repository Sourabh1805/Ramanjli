@extends('layouts.sbadmin')


@section('content')



{!! Form::open(array('route' => 'appointments.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name of Patient:</strong>
            <select name="Patient_username" class="form-control" >
            @foreach($patient as $p)
            <option value="{{$p->Patient_id}}"> {{$p->Patient_username}} </option>
            @endforeach
            </select>        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Reason:</strong>
            {!! Form::textarea('reason', null, array('placeholder' => 'Reason','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {!! Form::date('Appointment_date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"><small>Appointment Management Software</small></p>
@endsection
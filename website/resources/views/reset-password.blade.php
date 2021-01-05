@extends('layouts.sbadmin')

@section('content')

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

{!! Form::open(array('route' => 'resetpassword','method'=>'POST')) !!}
<div class="row">
 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {!! Form::password('current_password', array('placeholder' => 'Current Password','class' => 'form-control', "required")) !!}
        </div>
    </div>

    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {!! Form::password('password', array('placeholder' => 'Choose a new password','class' => 'form-control', "required")) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {!! Form::password('confirm-password', array('placeholder' => 'Re-enter new password','class' => 'form-control', "required")) !!}
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}



@endsection
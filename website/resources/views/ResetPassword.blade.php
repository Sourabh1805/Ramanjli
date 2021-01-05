@extends('layouts.app')

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enter your OTP') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(array('route' => 'resetpasswordemail','method'=>'POST')) !!}
<div class="row">
 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="email" name="email" value="{{$email}}" class="form-control" readonly required>
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

</div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Prescription for :: {{$Appointment[0]->patient_name}}</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('appointments.index') }}"> Back</a>
        </div>

        <div class="pull-right">

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

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <br>
        Appointment Date: {{$Appointment[0]->Time_and_Date}}
        <br>
        <table class="table table-bordered" width="100%" cellspacing="0">

    <thead>
    <th>Medicine Type</th>
    <th>Medicine Name</th>
        <th>Medicine Quantity</th>
        <th>Morning</th>
        <th>Afternoon</th>
        <th>Night </th>
    </thead>
    <tbody>
    @foreach($prescriptionData as $p)
    <tr>
    <td>
    @if($p["Medicine_Type"] == 0)
    Tablet
    @endif
    @if($p["Medicine_Type"] == 1)
    Injection
    @endif
    @if($p["Medicine_Type"] == 2)
    Syrup
    @endif
    @if($p["Medicine_Type"] == 3)
    Saline
    @endif

        </td><td>
       {{ $p["Medicine_name"]}}
        </td>
        
        <td>        {{$p["Medicine_quantity"]}}

        </td>

        
        <td>      
        @if($p["morning"] == 1)
        &#10003;
        @else
        &#10007;
        @endif

        </td>

        
        <td>         
          @if($p["afternoon"] == 1)
          &#10003;
          @else
          &#10007;
          @endif
        </td> 

        <td>         
          @if($p["night"] == 1)
          &#10003;
          @else
          &#10007;
          @endif
        </td>
    </tr>
    @endforeach

   </table>
  

   </div>
   </div>

   </div>
   </div>
   </div>
   </div>
{!! Form::close() !!}
@endsection

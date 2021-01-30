@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('appointments.create') }}">Register new appointment</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Patient Name</th>
   <th>Reason</th>
   <th width="280px">Write Prescription</th>
 </tr>
 <?php $i=0 ?>
 @foreach ($appoint as $key => $a)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $a->Patient_username }}</td>
    <td>{{ $a->reason }}</td>
    <td>   

    <a class="btn btn-success" href="{{ route('prescription.edit',$a->Appointment_id) }}">Make Prescription</a>
    </td>
   
  </tr>
 @endforeach
</table>


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
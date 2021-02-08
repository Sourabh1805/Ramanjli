@extends('layouts.sbadmin')


@section('content')



@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

@if($ok ?? '' != NULL)
<h1>{{$ok ?? ''}}</h1>
<a class="btn btn-success" href= "{{url('today')}}"> View Today's Appointments</a>
@else
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('appointments.create') }}">Register new appointment</a>
        </div>
    </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Patient Name</th>
   <th>Reason</th>
   <th>Appointment Status</th>
   <th>Appointment Date</th>
   <th width="280px">Accept Appointments</th>
   <th width="280px">Reject Appointments</th>
 </tr>
 
<?php $i=0 ?>

 @foreach ($appoint as $key => $row)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $row->Patient_username }}</td>
    <td>{{ $row->Appointment_reason }}</td>
    <td>
    @if($row->Appointment_status == 0)
    Booked by Patient
    @elseif($row->Appointment_status==1)
    Confirmed by Doctor
    @elseif($row->Appointment_status==2)
    Confirmed by Patient
    @elseif($row->Appointment_status==3)
    Rejected by Doctor
    @elseif($row->Appointment_status==4)
    Appointment completed
    @else
    Unable to load status
    @endif
    </td>
<td>
{{$row->Appointment_date}}
</td>


    <td>   

    <!-- @if($row->Appointment_status==1)
    <a class="btn btn-success" href="{{ route('appointments.edit',$row->Appointment_id) }}">Reschedule this Appointment</a>
    </td>
    <td>
    {!! Form::open(['method' => 'DELETE','route' => ['appointments.destroy', $row->Appointment_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Reject Appointment', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!} -->
    <!-- @else -->
       <a class="btn btn-info" href="{{ route('appointments.show',$row->Appointment_id) }}">Confirm Appointment</a>
       </td>
       <td>
        {!! Form::open(['method' => 'DELETE','route' => ['appointments.destroy', $row->Appointment_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Reject Appointment', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    <!-- @endif -->
        <!-- <a class="btn btn-primary" href="{{ route('appointments.edit',$row->Appointment_id) }}">Reschedule</a> -->
        

    </td>
  </tr>
 @endforeach
 @endif
</table>


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
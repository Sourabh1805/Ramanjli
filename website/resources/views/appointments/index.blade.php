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
<table class="table table-bordered">
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

 @foreach ($appoint as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->Patient_username }}</td>
    <td>{{ $user->reason }}</td>
    <td>
    @if($user->appointment_status == 0)
    Booked by Patient
    @elseif($user->appointment_status==1)
    Confirmed by Doctor
    @elseif($user->appointment_status==2)
    Confirmed by Patient
    @elseif($user->appointment_status==3)
    Rejected by Doctor
    @elseif($user->appointment_status==4)
    Appointment completed
    @else
    Unable to load status
    @endif
    </td>
<td>
{{$user->Time_and_Date}}
</td>


    <td>   

    <!-- @if($user->appointment_status==1)
    <a class="btn btn-success" href="{{ route('appointments.edit',$user->Appointment_id) }}">Reschedule this Appointment</a>
    </td>
    <td>
    {!! Form::open(['method' => 'DELETE','route' => ['appointments.destroy', $user->Appointment_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Reject Appointment', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!} -->
    <!-- @else -->
       <a class="btn btn-info" href="{{ route('appointments.show',$user->Appointment_id) }}">Confirm Appointment</a>
       </td>
       <td>
        {!! Form::open(['method' => 'DELETE','route' => ['appointments.destroy', $user->Appointment_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Reject Appointment', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    <!-- @endif -->
        <!-- <a class="btn btn-primary" href="{{ route('appointments.edit',$user->Appointment_id) }}">Reschedule</a> -->
        

    </td>
  </tr>
 @endforeach
 @endif
</table>


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
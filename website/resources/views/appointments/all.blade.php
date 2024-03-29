@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>All Appointments Till today</h2>
        </div>
       
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Patient Name</th>
   <th>Reason</th>
   <th>Booking Date</th>
   <th width="280px">Status</th>
 </tr>
 <?php $i=0 ?>
 @foreach ($appoint as $key => $a)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $a->Patient_username }}</td>
    <td>{{ $a->Appointment_reason }}</td>
    <td>{{ $a->Appointment_date }}</td>
    <td>
    @if($a->Appointment_status == 0)
    Booked by Patient
    @elseif($a->Appointment_status==1)
    Confirmed by Doctor
    @elseif($a->Appointment_status==2)
    Confirmed by Patient
    @elseif($a->Appointment_status==3)
    Rejected by Doctor
    @elseif($a->Appointment_status==4)
    Appointment completed
    @else
    Unable to load status
    @endif
    </td>   
  </tr>
 @endforeach
</table>


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
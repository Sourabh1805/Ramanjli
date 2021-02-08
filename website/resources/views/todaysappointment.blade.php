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


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Parent Name</th>
   <th>Reason</th>
   <th width="280px">Show meets</th>
 </tr>
 <?php $i=0 ?>
 @foreach ($appoint as $key => $a)
  <tr>
    <td>{{ ++$i }}</td>
    <?php 
    $user = DB::table("users")->where("id", "=", $a->Appointment_patient_id)
    ->get()->toArray(); 
    ?>
    <td>{{ $user[0]->name }}</td>
    <td>{{ $a->Appointment_reason }}</td>
    <td>   

    <a class="btn btn-success" href="{{ route('meet.edit',$a->Appointment_id) }}">Show Meets</a>
    </td>
   
  </tr>
 @endforeach
</table>


<p class="text-center text-primary"><small>Appointment</small></p>
@endsection
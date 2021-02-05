@extends('layouts.sbadmin')


@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name of Patient:</strong>
                {{ $patient->Patient_username }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                {{ $patient->Patient_dob }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                 @if($patient->Patient_gender == "M")
                 Male
                 @else
                 Female
                 @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Secret Key:</strong>
                {{ $patient->Secret_key }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                @if($patient->Patient_status == 0) 
                Active 
                @else
                Inactive 
                @endif
            </div>
        </div>
    </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        @if($history == NULL)
            No appointments booked by this patient
        @else
        <th>Appointment_reason</th>
        
        <th>Appointment_date</th>
        <th>Appointment_charges</th>
        <th>Appointment_status</th>
        <th>Appointment_isPaymentComplete</th>
        @foreach ($history as $h)
	    <tr>
        <td> {{$i}} </td>
        <?php $i = $i + 1 ?>
	        <td>{{ $h["Appointment_reason"] }}</td>
	        <td>{{ $h["Appointment_date"] }}</td>
            <td>{{ $h["Appointment_charges"] }}</td>
	        <td>{{ $h["Appointment_status"] }}</td>
	        <td>{{ $h["Appointment_isPaymentComplete"] }}</td>
            <td>
                <form action="{{ route('patients.destroy',$patient->Patient_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('patients.show',$patient->Patient_id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('patients.edit',$patient->Patient_id) }}">Edit</a>

                    @csrf
                </form>
	        </td>
	    </tr>
	    @endforeach
        @endif
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection
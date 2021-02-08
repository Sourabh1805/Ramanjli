@extends('layouts.sbadmin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Meets </h2>
            </div>
        </div>
    </div>
<div>
<a class="btn btn-success" href="{{ route('meet.show',$Appointment_id) }}">
            Register for new meet 
            </a></div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Meet_treatment</th>
            <th>Meet_date</th>
            <th>Meet_note</th>
            <th>Meet_charges</th>
            <th>Meet_isPaid</th>
            <th>Meet_isHomeVisit</th>
            <th>Meet_isAdvancePaid</th>
            <th>Meet_status</th>
            <th>Create Prescription</th>
        </tr>
        <?php $i = 1; ?>
	    @foreach ($meetlist as $meet)
	    <tr>
        <td> {{$i}} </td>
        <?php $i = $i + 1 ?>
	        <td>{{ $meet->Meet_treatment }}</td>
            
	        <td>{{ $meet->Meet_date }}</td>
	        <td>{{ $meet->Meet_note }}</td>
	        <td>{{ $meet->Meet_charges }}</td>
	        <td>
                 @if( $meet->Meet_isPaid == 1)
                    Yes
                 @else
                    No
                 @endif
            </td>
	        <td>
            @if( $meet->Meet_isHomeVisit == 1)
                    Yes
                 @else
                    No
                 @endif
            </td>
            <td>
            @if( $meet->Meet_isAdvancePaid == 1)
                    Yes
                 @else
                    No
                 @endif
            </td>
            <td>
            @if( $meet->Meet_status == 0)
            Appointment booked
            @elseif( $meet->Meet_status == 1)
            Meets ongoing
            @else
            Meets completed 
                 @endif
            </td>

            <td>
            <?php 
            $pre = DB::table("prescriptions")
                        ->where("Meet_id", "=", $meet->Meet_id)
                        ->get()->toArray(); 
            ?>
            @if($pre == NULL)
            <a class="btn btn-success" href="{{ route('prescription.edit',$meet->Meet_id) }}">
            
            Create Prescription 
            </a>

            @else
            <a class="btn btn-success" href="{{ route('prescription.show',$meet->Meet_id) }}">
            View Prescription 
            </a>
            @endif
            </td>
	       
	    </tr>
	    @endforeach
    </table>
@endsection
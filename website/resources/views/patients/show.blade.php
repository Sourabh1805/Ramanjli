@extends('layouts.sbadmin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Patient Data</h2>
            </div>
            
        </div>
    </div>


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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
        </tr>
        @foreach ($patients as $patient)
	    <tr>
        <td> {{$i}} </td>
        <?php $i = $i + 1 ?>
	        <td>{{ $patient->Patient_username }}</td>
	        <td>{{ $patient->name }}</td>
            <td>{{ $patient->Patient_dob }}</td>
	        <td>{{ $patient->Patient_gender }}</td>
            <td>
                <form action="{{ route('patients.destroy',$patient->Patient_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('patients.show',$patient->Patient_id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('patients.edit',$patient->Patient_id) }}">Edit</a>

                    @csrf
                </form>
	        </td>
	    </tr>
	    @endforeach
    </div>
@endsection
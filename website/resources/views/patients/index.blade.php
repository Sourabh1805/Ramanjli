@extends('layouts.sbadmin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Patients</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('patients.create') }}"> Create Patient</a>
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
            <th>Name</th>
            <th>User id</th>
            <th>DOB</th>
            <th>Gender</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($patients as $patient)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $patient->Patient_name }}</td>
	        <td>{{ $patient->User_id }}</td>
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
    </table>
    {!! $patients->links() !!}
@endsection
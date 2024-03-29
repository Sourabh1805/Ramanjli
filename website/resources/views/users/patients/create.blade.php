@extends('layouts.sbadmin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Register new Patient</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<form action="{{ route('patients.store') }}" method="POST">
    	@csrf
        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="Patient_username" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Date of Birth:</strong>
                    <input type="date" name="Patient_dob" class="form-control" placeholder="Shop Name">
                </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Gender:</strong>
		            <input type="text" name="Patient_gender" class="form-control" placeholder="M/F/T">
		        </div>
		    </div>
                           
                    <input type="text" name="Patient_user_id" value = "{{$user->id}}" hidden>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Key:</strong>
		            <input type="text" name="Patient_secret_key" class="form-control" placeholder="Key">
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>

@endsection
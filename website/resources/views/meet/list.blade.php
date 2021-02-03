@extends('layouts.sbadmin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Meets </h2>
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
            <th>Meet_treatment</th>
            <th>Meet_date</th>
            <th>Meet_note</th>
            <th>Meet_charges</th>
            <th>Meet_isPaid</th>
            <th>Meet_isHomeVisit</th>
            <th>Meet_isAdvancePaid</th>
            <th>Meet_status</th>
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
	        <td>{{ $meet->Meet_isPaid }}</td>
	        <td>{{ $meet->Meet_isHomeVisit }}</td>
	        <td>{{ $meet->Meet_isAdvancePaid }}</td>
	        <td>{{ $meet->Meet_status }}</td>
	    </tr>
	    @endforeach
    </table>
@endsection
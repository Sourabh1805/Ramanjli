@extends('layouts.sbadmin')
@section('content')


<div class="col-md-8">
</div>

<div class="col-md-12">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
                            <tr>
                              <th>Date</th>
                              <th>Available</th>
                              <th>Number of appointments for the day</th>
                              <th>Action</th>
                            </tr>
</thead>  
                        @foreach($slots as $row)
                        <tr>
                        <td>{{$row->Slot_date}}</td>
                        
                        
                        <td>{{$row->Slot_is_available}}</td>
                        

                        
                        <td>{{$row->Slot_max_appointment_count_change}}</td>
                        
                         <td>
                         <a class="btn btn-primary" href="{{ route('slots.edit',$row->Slot_id) }}">Delete this slot</a>
                        </td>
                        </tr>
                        @endforeach
                        </table>
               
                <br>
                <br>
                <a href="{{url('slots/create')}}" class="btn-primary btn-lg"> Add Date </a>

            </div>
      


@endsection

@extends('layouts.sbadmin')


@section('content')



@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'prescription.store','method'=>'POST')) !!}
    
<div class="row col-xs-12 col-sm-12 col-md-6">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="Meet_appointment_id" value="{{$meetInfo->Meet_appointment_id}}" hidden>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="Meet_id" value="{{$meetInfo->Meet_id}}" hidden>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Treatment given  </strong>
                <input type="text" class="form-control" name="Meet_treatment" value="{{$meetInfo->Meet_treatment}}" placeholder = "Treatment given" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meeting date </strong>
                <input type="date" class="form-control" name="Meet_date" value="{{$meetInfo->Meet_date}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_note </strong>
                <input type="text" class="form-control" name="Meet_note" value="{{$meetInfo->Meet_note}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_charges </strong>
                <input type="number" class="form-control" name="Meet_charges" value="{{$meetInfo->Meet_charges}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_isPaid </strong>

                <select name="Meet_isPaid" class="form-control" value="{{$meetInfo->Meet_isPaid}}" required>
            <option value="0"> YES </option>
            <option value="1"> NO </option>
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_isHomeVisit </strong>

                <select name="Meet_isHomeVisit" class="form-control" value="{{$meetInfo->Meet_isHomeVisit}}" required>
            <option value="0"> YES </option>
            <option value="1"> NO </option>
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_isAdvancePaid </strong>

                <select name="Meet_isAdvancePaid" class="form-control" value="{{$meetInfo->Meet_isAdvancePaid}}" required>
            <option value="0"> YES </option>
            <option value="1"> NO </option>
        </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong> Meet_status </strong>

                <select name="Meet_status" class="form-control" value="{{$meetInfo->Meet_status}}" required>
            <option value="1"> Add new meeting </option>
            <option value="2"> End meetings for this appointment </option>
            
        </select>
            </div>
        </div>

       
   
</div>


<table class="table table-bordered">
<thead>
<th>Type of Medicine</th>
<th>Name of medicine</th>
<th>Quantity</th>
<th> Morning</th>
<th> Afternoon</th>
<th> Night</th>
<button type="button" onClick="addRow()" class="btn btn-primary addRow"> + Add medicine </button>
<br>
</thead>
<tbody>
</tbody>

   </table>
   <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
{!! Form::close() !!}
@endsection

<script type="text/javascript">
$('.addRow').on('click', function(){
 addRow();
});

function addRow()
{
 
        var tr =  '<tr>' +
            '<td>' + 
            '<div class="col-xs-12 col-sm-12 col-md-12">' +
            '<div class="form-group">        '+
            '<div class="col-xs-12 col-sm-12 col-md-12">'+
            '    <div class="form-group">' +
            '<select class="form-control" name="Medicine_Type[]" required>'+
            '<option value="0"> '+
            'Tablet'+
            '</option>'+
            '<option value="1"> '+
            'Injection'+
            '</option> <option value="2"> Syrup</option>'+
            '<option value="3">Saline</option></select>'+
            '</div></div></div></div></div></td><td><div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">' +
            '{!! Form::text("Medicine_name[]", null, array("placeholder" => "Medicine Name","class" => "form-control", "required")) !!}'+
            '</div></div></td><td><div class="col-xs-12 col-sm-12 col-md-12">        <div class="form-group">        '+
            '    {!! Form::number("Medicine_quantity[]", null, array("placeholder" => "Quantity","class" => "form-control", "required")) !!}  '+
            '      </div>    </div>    </td>   '+
            '<td><select class="form-control" name="morning[]">'+
            '<option value="1"> YES </option> '+
            '<option value="0"> NO </option></td>'+

            '<td><select class="form-control" name="afternoon[]">'+
            '<option value="1"> YES </option> '+
            '<option value="0"> NO </option> </td>'+

            '<td><select class="form-control" name="night[]">'+
            '<option value="1"> YES </option> '+
            '<option value="0"> NO </option> </td>'+
            
            '<button type="button" onClick="deletethis()" class="btn btn-danger"> - </button>'+
            '        </td>   </tr>'+
  '          <button type="button" onClick="addRow()" class="btn btn-primary addRow"> + Add medicine </button>'  ; 
  $('tbody').append(tr);
};

$('tbody').on('click', '.remove', function(){
  $(this).parent().parent().remove();
  });

</script>
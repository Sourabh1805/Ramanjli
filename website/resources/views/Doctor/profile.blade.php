@extends('layouts.sbadmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Doctor Profile</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('doctor.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $DoctorData->Doctor_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_degree:</strong>
            {{ $DoctorData->Doctor_degree }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_specialization:</strong>
            {{ $DoctorData->Doctor_specialization }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_address:</strong>
            {{ $DoctorData->Doctor_address }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_contact_number:</strong>
            {{ $DoctorData->Doctor_contact_number }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_clinic_max_appointments:</strong>
            {{ $DoctorData->Doctor_clinic_max_appointments }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_clinic_time_from:</strong>
            {{ $DoctorData->Doctor_clinic_time_from }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_clinic_time_to:</strong>
            {{ $DoctorData->Doctor_clinic_time_to }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_holiday:</strong>
            @if($DoctorData->Doctor_clinic_holiday == 0)
            Sunday            @endif

            @if($DoctorData->Doctor_holiday == 1)
            Monday            @endif

            @if($DoctorData->Doctor_holiday == 2)
            Tuesday            @endif

            @if($DoctorData->Doctor_holiday == 3)
            Wednesday            @endif

            @if($DoctorData->Doctor_holiday == 4)
            Thursday            @endif

            @if($DoctorData->Doctor_holiday == 5)
            Friday            @endif

            @if($DoctorData->Doctor_holiday == 6)
            Saturday
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_homevisit_max_appointments:</strong>
            {{ $DoctorData->Doctor_homevisit_max_appointments }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_homevisit_time_from:</strong>
            {{ $DoctorData->Doctor_homevisit_time_from }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_homevisit_time_to:</strong>
            {{ $DoctorData->Doctor_homevisit_time_to }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor_homevisit_max_appointments:</strong>
            {{ $DoctorData->Doctor_homevisit_max_appointments }}
        </div>
    </div>

    <a class="btn btn-primary" href="{{ route('doctor.edit',$DoctorData->Doctor_id) }}">Edit My Profile</a>

   
</div>
@endsection
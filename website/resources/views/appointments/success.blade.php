@extends('layouts.sbadmin')


@section('content')

<h1> Your appointment request has been sent to the doctor<h1> 

<h2>Please wait 3 hours for confirmation </h2>

<a href="{{url('/home')}}">Go home</a>

@endsection
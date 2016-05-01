@extends('master.master')

@section('PageTitle') File Paths @stop

@section('Navigation')
        <!-- Add Logic Here to change navigation heading. -->
@include('layouts.navigation.visitor')
@stop

@section('BodyContent')
    <div class="container" style="padding-top: 4%; padding-bottom: 10%">
        <h1>{{$destination_id->destination}}</h1>

    </div>
@stop
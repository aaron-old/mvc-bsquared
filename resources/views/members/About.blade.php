@extends('layouts.app')

@section('PageTitle') {{$username}}'s About @stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container memberForm">
        @include('forms.AboutForm')
    </div>
@stop
@extends('layouts.app')

@section('PageTitle') Edit Statement @stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container memberForm">
        @include('forms.StatementForm')
    </div>
@stop

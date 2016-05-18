@extends('layouts.app')

@section('PageTitle')
    Edit Portfolio Works
@stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container memberForm">
        @include('forms.WorksForm')
    </div>
@stop
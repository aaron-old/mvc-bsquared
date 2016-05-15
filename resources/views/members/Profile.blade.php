@extends('layouts.app')

@section('PageTitle')
    {{$username}}
@stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container memberForm">
        @include('forms.ProfileForm')
    </div>
@stop
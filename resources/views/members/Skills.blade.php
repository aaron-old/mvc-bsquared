@extends('layouts.app')

@section('PageTitle')
    Edit Skills
@stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container memberForm">
        @include('forms.SkillsForm')
    </div>
@stop
@extends('layouts.app')

@section('PageTitle') Edit Statement @stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container memberForm">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @include('forms.StatementForm')
    </div>
@stop

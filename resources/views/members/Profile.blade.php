@extends('layouts.app')

@section('PageTitle')
    Edit Profile
@stop

@section('Navigation')
    @include('layouts.navigation')
@stop



@section('BodyContent')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="main" class="container memberForm">
        @include('forms.ProfileForm')
    </div>
@stop
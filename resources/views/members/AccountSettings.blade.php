@extends('layouts.app')

@section('PageTitle')
    {{$username}}'s Settings
@stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main" class="container">
        @include('forms.ChangePasswordForm')
        @include('forms.DeleteMemberAccountForm')
    </div>
@stop

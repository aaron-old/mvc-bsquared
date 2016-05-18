@extends('layouts.app')

@section('PageTitle')
    {{$username}}'s Settings
@stop

@section('Navigation')
    @include('forms.ChangePasswordForm')

    @include('forms.DeleteMemberAccountForm')
@stop
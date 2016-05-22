@extends('layouts.app')

@section('PageTitle')
    {{$username}}'s Settings
@stop

@section('Navigation')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @include('forms.ChangePasswordForm')

    @include('forms.DeleteMemberAccountForm')
@stop
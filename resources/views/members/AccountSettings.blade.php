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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @include('forms.ChangePasswordForm')

    @include('forms.DeleteMemberAccountForm')
@stop
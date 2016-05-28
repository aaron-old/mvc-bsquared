@extends('layouts.app')

@section('uniqueHeaderInformation')

@stop

@section('PageTitle')
    Edit Profile
@stop

@section('Navigation')
    @include('layouts.navigation')
@stop

@section('BodyContent')
    <div id="main">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            @if (count($errors) > 0)fa
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @include('forms.ProfileForm')
    </div>
@stop
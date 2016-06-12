@extends('layouts.app')

@section('PageTitle') {{$username}}'s About @stop

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
        @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @include('forms.AboutForm')
    </div>
@stop
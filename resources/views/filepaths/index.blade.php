@extends('master.master')

@section('PageTitle') File Paths @stop

@section('Navigation')
        <!-- Add Logic Here to change navigation heading. -->
@include('layouts.navigation.visitor')
@stop

@section('BodyContent')
<div class="container" style="padding-top: 4%; padding-bottom: 10%">
    <h1>File Paths</h1>

    @foreach ($filePaths as $filPath)
        <div class="container">
            {{ $filPath->destination }}
        </div>

    @endforeach
</div>
@stop
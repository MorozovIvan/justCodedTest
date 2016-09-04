@extends('layouts.app')
@section('content')
    <h2>Create Product</h2>

    {!! Form::open(['url' => 'foo/bar']) !!}



    {!! Form::close() !!}
@stop

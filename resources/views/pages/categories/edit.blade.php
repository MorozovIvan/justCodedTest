@extends('layouts.app')
@section('content')

    @if($errors->all())
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">There are some errors</h3>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <h2>Edit Category</h2>

    @include('partials.form.category')
@stop

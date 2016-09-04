@extends('layouts.app')
@section('content')
    <h2>Categories</h2>
    @if($categories->count())
        <div class="panel panel-default">
            <div class="panel-body">
                {!! build_tree($categories, null) !!}
            </div>
        </div>
    @else
        <p>
            There are no categories
        </p>
    @endif

    <a href="{{ route('category_create') }}" class="btn btn-success">Add Category</a>
@stop

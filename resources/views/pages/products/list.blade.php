@extends('layouts.app')
@section('content')
    <h2>Products</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            Basic panel example
        </div>
    </div>

    <a href="{{ route('product_create') }}" class="btn btn-success">Add Product</a>
@stop

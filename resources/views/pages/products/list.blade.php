@extends('layouts.app')
@section('content')
    <h2>Products</h2>
    @if($products->count())
        <div class="panel panel-default">
            <div class="panel-body">
                <ul>
                    @foreach($products as $product)
                        <li><a href="{{ route('product_edit', $product->id) }}">{{ $product->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <p>
            There are no products
        </p>
    @endif

    <a href="{{ route('product_create') }}" class="btn btn-success">Add Product</a>
@stop

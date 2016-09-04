{!! Form::open(['route' => !empty($product) ? ['product_edit', $product] : 'product_create', 'method' => !empty($product) ? 'put' : 'post', 'files' => true]) !!}

@if($categories->count())
    <div class="form-group">
        {!! Form::label('categories', 'Categories') !!}
        {!! Form::select('categories[]', $categories, !empty($product) ? $product->categories->pluck('id')->toArray() : old('categories'), ['multiple' => 'multiple', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', !empty($product) ? $product->name : old('name'), ['class' => 'form-control', 'placeholder' => 'Enter...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price') !!}
        {!! Form::number('price', !empty($product) ? $product->price : old('price'), ['class' => 'form-control', 'step' => 0.01, 'min' => 0, 'placeholder' => 'Enter...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantity', 'Quantity') !!}
        {!! Form::number('quantity', !empty($product) ? $product->quantity : old('quantity'), ['class' => 'form-control', 'min' => 0, 'placeholder' => 'Enter...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', !empty($product) ? $product->description : old('description'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Enter...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Images') !!}
        {!! Form::file('images[]', ['multiple' => true]) !!}

        @if(!empty($product))
            @foreach($product->images->all() as $image)
                <img src="{{ $image->path }}" alt="{{ $image->name }}">
                <a href="{{ route('image_delete', ['product' => $product, 'image' => $image]) }}"><strong>&times;</strong></a>
            @endforeach
        @endif
    </div>

    <div class="form-group">
        @if(!empty($product))
            @foreach($product->discount->all() as $index => $item)
                <div class="discount-item" data-index="{{ $index }}">
                    <span>Amount: </span><input type="number" name="discounts[{{ $index }}][amount]" value="{{ $item->amount }}">
                    <span>Quantity: </span><input type="number" name="discounts[{{ $index }}][quantity]" value="{{ $item->quantity }}">
                </div>
            @endforeach
        {!! Form::button('Add Discount', ['class' => 'btn btn-warning add-discount']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}

    @if(!empty($product))
        {!! Form::open(['route' => ['product_delete', $product], 'method' => 'delete']) !!}

        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}
    @endif
@else
    <p>Firstly create a category!</p>
@endif



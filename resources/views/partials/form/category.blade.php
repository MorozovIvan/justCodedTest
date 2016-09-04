{!! Form::open(['route' => !empty($category) ? ['category_edit', $category] : 'category_create', 'method' => !empty($category) ? 'put' : 'post']) !!}

@if($categories->count())
    <div class="form-group">
        {!! Form::label('parent_id', 'Parent Category') !!}
        {!! Form::select('parent_id', $categories, !empty($category) ? $category->parent_id : old('parent_id'), ['class' => 'form-control', 'placeholder' => 'Choose a category...']) !!}
    </div>
@endif

<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', !empty($category) ? $category->name : old('name'), ['class' => 'form-control', 'placeholder' => 'Enter...']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', !empty($category) ? $category->description : old('description'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Enter...']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

@if(!empty($category))
    {!! Form::open(['route' => ['category_delete', $category], 'method' => 'delete']) !!}

        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

    {!! Form::close() !!}
@endif
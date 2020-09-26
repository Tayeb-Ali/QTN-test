<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', __('models/products.fields.logo').':') !!}
    <p>{{ $product->logo }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/products.fields.status').':') !!}
    <p>{{ $product->status }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/products.fields.price').':') !!}
    <p>{{ $product->price }}</p>
</div>

<!-- Cost Field -->
<div class="form-group">
    {!! Form::label('cost', __('models/products.fields.cost').':') !!}
    <p>{{ $product->cost }}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', __('models/products.fields.qty').':') !!}
    <p>{{ $product->qty }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', __('models/products.fields.category_id').':') !!}
    <p>{{ $product->category_id }}</p>
</div>


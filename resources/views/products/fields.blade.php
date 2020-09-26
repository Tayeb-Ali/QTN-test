<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', __('models/products.fields.logo').':') !!}
    <input type="file" name="logo">
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/products.fields.status').':') !!}
    <select class="form-control" name="status">
        <option value="1">is active</option>
        <option value="2">disable</option>
    </select>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('models/products.fields.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost', __('models/products.fields.cost').':') !!}
    {!! Form::number('cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', __('models/products.fields.qty').':') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', __('models/products.fields.category_id').':') !!}
    <select class="form-control" name="category_id">
        @foreach($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-default">{{__('lang.cancel')}}</a>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/suppliers.fields.name').':') !!}
    <p>{{ $supplier->name }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/suppliers.fields.image').':') !!}
    <p>{{ $supplier->image }}</p>
</div>

<!-- Company Name Field -->
<div class="form-group">
    {!! Form::label('company_name', __('models/suppliers.fields.company_name').':') !!}
    <p>{{ $supplier->company_name }}</p>
</div>

<!-- Vat Number Field -->
<div class="form-group">
    {!! Form::label('vat_number', __('models/suppliers.fields.vat_number').':') !!}
    <p>{{ $supplier->vat_number }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/suppliers.fields.email').':') !!}
    <p>{{ $supplier->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', __('models/suppliers.fields.phone_number').':') !!}
    <p>{{ $supplier->phone_number }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/suppliers.fields.address').':') !!}
    <p>{{ $supplier->address }}</p>
</div>


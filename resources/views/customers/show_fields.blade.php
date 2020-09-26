<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/customers.fields.name').':') !!}
    <p>{{ $customer->name }}</p>
</div>

<!-- Company Name Field -->
<div class="form-group">
    {!! Form::label('company_name', __('models/customers.fields.company_name').':') !!}
    <p>{{ $customer->company_name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/customers.fields.email').':') !!}
    <p>{{ $customer->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', __('models/customers.fields.phone_number').':') !!}
    <p>{{ $customer->phone_number }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/customers.fields.address').':') !!}
    <p>{{ $customer->address }}</p>
</div>


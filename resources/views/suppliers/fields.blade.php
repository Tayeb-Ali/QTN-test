<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/suppliers.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/suppliers.fields.image').':') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', __('models/suppliers.fields.company_name').':') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vat_number', __('models/suppliers.fields.vat_number').':') !!}
    {!! Form::text('vat_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/suppliers.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', __('models/suppliers.fields.phone_number').':') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/suppliers.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('suppliers.index') }}" class="btn btn-default">{{__('lang.cancel')}}</a>
</div>

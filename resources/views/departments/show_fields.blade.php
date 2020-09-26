<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/departments.fields.name').':') !!}
    <p>{{ $department->name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/departments.fields.address').':') !!}
    <p>{{ $department->address }}</p>
</div>


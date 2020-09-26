<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/branches.fields.name').':') !!}
    <p>{{ $branches->name }}</p>
</div>

<!-- Manager Id Field -->
<div class="form-group">
    {!! Form::label('manager_id', __('models/branches.fields.manager_id').':') !!}
    <p>{{ $branches->manager_id }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/branches.fields.address').':') !!}
    <p>{{ $branches->address }}</p>
</div>


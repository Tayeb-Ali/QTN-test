<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/managers.fields.name').':') !!}
    <p>{{ $manager->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/managers.fields.email').':') !!}
    <p>{{ $manager->email }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', __('models/managers.fields.phone').':') !!}
    <p>{{ $manager->phone }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/managers.fields.user_id').':') !!}
    <p>{{ $manager->user_id }}</p>
</div>


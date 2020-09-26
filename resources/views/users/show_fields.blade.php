<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', __('models/users.fields.phone').':') !!}
    <p>{{ $user->phone }}</p>
</div>

<!-- Company Name Field -->
<div class="form-group">
    {!! Form::label('company_name', __('models/users.fields.company_name').':') !!}
    <p>{{ $user->company_name }}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', __('models/users.fields.role_id').':') !!}
    <p>{{ $user->role_id }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', __('models/users.fields.remember_token').':') !!}
    <p>{{ $user->remember_token }}</p>
</div>


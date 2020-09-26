<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/employees.fields.name').':') !!}
    <p>{{ $employee->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/employees.fields.email').':') !!}
    <p>{{ $employee->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', __('models/employees.fields.phone_number').':') !!}
    <p>{{ $employee->phone_number }}</p>
</div>

<!-- Department Id Field -->
<div class="form-group">
    {!! Form::label('department_id', __('models/employees.fields.department_id').':') !!}
    <p>{{ $employee->department_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/employees.fields.user_id').':') !!}
    <p>{{ $employee->user_id }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/employees.fields.image').':') !!}
    <p>{{ $employee->image }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/employees.fields.address').':') !!}
    <p>{{ $employee->address }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', __('models/employees.fields.city').':') !!}
    <p>{{ $employee->city }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', __('models/employees.fields.country').':') !!}
    <p>{{ $employee->country }}</p>
</div>


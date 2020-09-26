<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/branches.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Manager Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manager_id', __('models/branches.fields.manager_id').':') !!}
    {!! Form::number('manager_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', __('models/branches.fields.address').':') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('branches.index') }}" class="btn btn-default">{{__('lang.cancel')}}</a>
</div>

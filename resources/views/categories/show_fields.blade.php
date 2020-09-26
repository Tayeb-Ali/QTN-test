<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/categories.fields.name').':') !!}
    <p>{{ $categorie->name }}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', __('models/categories.fields.logo').':') !!}
    <img src="{{ $categorie->logo }}" height="200" width="200">
</div>


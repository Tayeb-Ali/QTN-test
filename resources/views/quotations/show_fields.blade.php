<!-- Reference No Field -->
<div class="form-group col-md-4">
    {!! Form::label('reference_no', __('models/quotations.fields.reference_no').':') !!}
    <p>{{ $quotation->reference_no }}</p>
</div>

<!-- Total Qty Field -->
<div class="form-group col-md-4">
    {!! Form::label('total_qty', __('models/quotations.fields.total_qty').':') !!}
    <p>{{ $quotation->total_qty }}</p>
</div>

<!-- Total Price Field -->
<div class="form-group col-md-4">
    {!! Form::label('total_price', __('models/quotations.fields.total_price').':') !!}
    <p>{{ $quotation->total_price }}</p>
</div>


<!-- Quotation Status Field -->
<div class="form-group col-md-4">
    {!! Form::label('quotation_status', __('models/quotations.fields.quotation_status').':') !!}
    <br/>
    @if ($quotation->quotation_status == 1)
        <p class="btn btn-primary">Pending</p>
    @elseif($quotation->quotation_status == 2)
        <p class="btn btn-done">Sent</p>
    @else
        <p class="btn btn-danger">cancelled</p>
    @endif
</div>

<!-- Document Field -->
<div class="form-group col-md-4">
    {!! Form::label('document', __('models/quotations.fields.document').':') !!}
    @if ($quotation->document)
        <p>
            <button class="btn btn-info"><a href="{{$quotation->document}}">download</a></button>
        </p>
    @else
        <p>
            <button disabled class="btn btn-info"><a href="{{$quotation->document}}">download</a></button>
        </p>
    @endif
</div>

<!-- Note Field -->
<div class="form-group col-md-4">
    {!! Form::label('note', __('models/quotations.fields.note').':') !!}
    @if ($quotation->note)
        <p>
        <p>{{ $quotation->note }}</p>
    @else
        <p>
            empty note </p>
    @endif
</div>

<!-- User Id Field -->
<div class="form-group col-md-4">
    {!! Form::label('user_id', __('models/quotations.fields.user_id').':') !!}
    <p> {{\App\Models\User::find($quotation->user_id)->name}}</p>
</div>

<!-- Supplier Id Field -->
<div class="form-group col-md-4">
    {!! Form::label('supplier_id', __('models/quotations.fields.supplier_id').':') !!}
    <p> {{\App\Models\Supplier::find($quotation->supplier_id)->name}}</p>

</div>

<!-- Customer Id Field -->
<div class="form-group col-md-4">
    {!! Form::label('customer_id', __('models/quotations.fields.customer_id').':') !!}
    <p> {{\App\Models\Customer::find($quotation->customer_id)->name}}</p>

</div>

<!-- Department Id Field -->
<div class="form-group col-md-4">
    {!! Form::label('department_id', __('models/quotations.fields.department_id').':') !!}
    <p> {{\App\Models\Department::find($quotation->department_id)->name}}</p>

</div>


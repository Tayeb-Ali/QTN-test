<!-- Product  Field -->
{{--<div class="form-group col-sm-4">--}}
{{--    {!! Form::label('Products') !!}--}}
{{--    <select class="form-control" onchange="getProduct(this);" id="product" data-role="select-dropdown" name="product">--}}
{{--        @foreach($product as $item)--}}
{{--            <option value="{{$item->price}}">{{$item->name}} </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--</div>--}}
{{--<!-- Add  Field -->--}}
{{--<div class="form-group col-sm-1">--}}
{{--    {!! Form::label('More') !!}--}}

{{--    <button onclick="" class="btn btn-info" type="button" id="add"><b>+</b></button>--}}

{{--</div>--}}


{{--start code--}}

<section class="forms">
    <!-- Reference No Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('reference_no', __('models/quotations.fields.reference_no').':') !!}
        {!! Form::text('reference_no', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Supplier Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('supplier_id', __('models/quotations.fields.supplier_id').':') !!}
        <select id="supplier_id" name="supplier_id" class="form-control" data-role="select-dropdown">
            @foreach($supplier as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Customer Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('customer_id', __('models/quotations.fields.customer_id').':') !!}
        <select id="customer_id" name="customer_id" class="form-control" data-role="select-dropdown">
            @foreach($customer as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Department Id Field -->
    <div class="form-group col-sm-5">
        {!! Form::label('department_id', __('models/quotations.fields.department_id').':') !!}
        <select id="department_id" name="department_id" class="form-control" data-role="select-dropdown">
            @foreach($department as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Select Product</h4>
                        <div class="table-responsive mt-3">
                            <table id="myTable" class="table table-hover order-list">
                                <tbody id="tables">
                                <div class="form-group col-sm-5">
                                    <select class="form-control" onchange="getProduct(this);" id="product"
                                            data-role="select-dropdown" name="product_id[]">
                                        @foreach($product as $item)
                                            <option value="{{$item->id}}">{{$item->name}} ${{$item->price}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-5">

                                    <select class="form-control" onchange="getProduct(this);" id="product"
                                            data-role="select-dropdown" name="product_id[]">
                                        @foreach($product as $item)
                                            <option value="{{$item->id}}">{{$item->name}} ${{$item->price}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h5>Order Table</h5>
                                <div class="table-responsive mt-3">
                                    <table id="myTable" class="table table-hover order-list">
                                        <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Edit total</th>
                                            <th>Edit Quantity</th>
                                            <th><i class="dripicons-trash"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot class="tfoot active">
                                        <th id="total-qty">0</th>
                                        <th id="total">0.00</th>
                                        <th><input id="subtotal" name="total_price"></th>
                                        <th><input id="total-qty2" name="total_qty"></th>
                                        <th><i class="dripicons-trash"></i></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if (Auth::user()->role()->first('name')->name =='admin'|| Auth::user()->role()->first('name')->name=='supervisors')
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="quotation_status">
                                        <option value="1">Pending</option>
                                        <option value="2">Sent</option>
                                        <option value="3">cancelled</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Attach Document</label>
                                    <i class="dripicons-question" data-toggle="tooltip"
                                       title="Only jpg, jpeg, png, gif, pdf, csv, docx, xlsx and txt file is supported"></i>
                                    <input type="file" name="document" class="form-control"/>
                                    @if($errors->has('extension'))
                                        <span>
                                                   <strong>{{ $errors->first('extension') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea rows="5" name="note" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--end code--}}
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quotations.index') }}" class="btn btn-default">@lang('lang.cancel')@endlang</a>
</div>

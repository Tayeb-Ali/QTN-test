@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/quotations.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'quotations.store']) !!}

                    @include('quotations.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@section('js')

    <script>

        $(document).ready(function () {
            $('#supplier_id').select2();
            $('#customer_id').select2();
            $('#department_id').select2();
            $('#product').select2();
        });
        // $('select').on('change', function() {
        //     alert( this.value );
        // });
        var price, qty = 0;


        function getProduct(sel) {
            var setPrice = JSON.parse(sel.value);
            qty = ++qty;
            calcTotal(setPrice)
        }

        function calcTotal(setPrice) {
            total = document.getElementById("total").innerText;
            td =  document.getElementById("tables").innerHTML =
                ``;



            total = parseFloat(total);
            setPrice = parseFloat(setPrice);
            newPrice = Number(setPrice + total);
            document.getElementById("total-qty").innerHTML = qty;
            document.getElementById("total").innerHTML = newPrice;
            // td = ++ td;

            $("#subtotal").val(newPrice);
            $("#total-qty2").val(qty);


            console.log('newPrice: ', newPrice, 'setPrice: ', setPrice);
        }

        $("#add").click(function (e) {
//Append a new row of code to the "#items" div
            $("#tables").append('<td id="total-qty">0</td>' +
                '<td><input id="product" name="product[]"></td> <br/>');
        });

    </script>


@endsection
@endsection

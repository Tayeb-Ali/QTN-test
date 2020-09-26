@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/customers.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('customers.show_fields')
                    <a href="{{ route('customers.index') }}" class="btn btn-default">
                        @lang('lang.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

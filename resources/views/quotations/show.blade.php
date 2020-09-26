@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/quotations.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('quotations.show_fields')
                    <a href="{{ route('quotations.index') }}" class="btn btn-default">
                        @lang('lang.back')
                    </a>
                    <a href="{{ route('quotations.edit', $quotation->id) }}" class="btn btn-info">
                       edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

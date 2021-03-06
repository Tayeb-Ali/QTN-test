@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/departments.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('departments.show_fields')
                    <a href="{{ route('departments.index') }}" class="btn btn-default">
                        @lang('lang.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

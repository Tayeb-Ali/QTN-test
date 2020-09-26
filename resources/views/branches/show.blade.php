@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/branches.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('branches.show_fields')
                    <a href="{{ route('branches.index') }}" class="btn btn-default">
                        @lang('lang.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

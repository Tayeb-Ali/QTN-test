@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/branches.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($branches, ['route' => ['branches.update', $branches->id], 'method' => 'patch']) !!}

                        @include('branches.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

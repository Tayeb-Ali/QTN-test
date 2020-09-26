@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/managers.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($manager, ['route' => ['managers.update', $manager->id], 'method' => 'patch']) !!}

                        @include('managers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

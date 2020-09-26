@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/categories.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categorie, ['route' => ['categories.update', $categorie->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

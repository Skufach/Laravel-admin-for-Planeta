@extends('admin.layouts.basic')

@section('title', 'Редактировать категорию')

@section('content')

    {!! Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
    {{csrf_field()}}

    <div class="form-group">

        <div class="col-md-4">
            {{ Form::label('category_name', 'Категория')}}
        </div>

        <div class="col-md-8">
            {{ Form::text('category_name', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Редактировать категорию', ['class' => 'btn btn-primary'])}}
        </div>
    </div>



    {!! Form::close() !!}

@endsection
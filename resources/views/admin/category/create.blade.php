@extends('admin.layouts.basic')

@section('title', 'Добавить категорию')

@section('content')

    {!! Form::open(['route' => 'categories.store', 'enctype' => 'multipart/form-data']) !!}
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
            {{ Form::submit('Добавить категорию', ['class' => 'btn btn-primary'])}}
        </div>
    </div>



    {!! Form::close() !!}

@endsection
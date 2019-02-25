@extends('admin.layouts.basic')

@section('title', 'Редактировать страну')

@section('content')

    {!! Form::model($country, array('route' => array('countries.update', $country->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
    {{csrf_field()}}

    <div class="form-group">

        <div class="col-md-4">
            {{ Form::label('country_name', 'Страна')}}
        </div>

        <div class="col-md-8">
            {{ Form::text('country_name', null, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Редактировать страну', ['class' => 'btn btn-primary'])}}
        </div>
    </div>



    {!! Form::close() !!}

@endsection
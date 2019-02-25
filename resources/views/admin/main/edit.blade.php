@extends('admin.layouts.basic')

@section('title', 'Добавить Пост')

@section('content')
    <script src="{{ asset('js/app.js') }}"></script>

    {!! Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
    {{csrf_field()}}

    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <h3>Заголовок поста</h3>
            </div>

            <div class="col-md-8">
                {{ Form::text('title', null, ['class' => 'form-control'])}}
            </div>
        </div>
    </div>

    <div class="form-group my-5">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <h3>Категории</h3>
                <select name="categories_mas[]" multiple style="width: 300px;">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5">
                <h3>Страны</h3>
                <select name="countries_mas[]" multiple style="width: 300px;">
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group d-block ">
        <div class="col-md-3">
            <h3>Текст поста</h3>
        </div>

        <div class="col-md-10 offset-md-1">
            {{ Form::textarea('post_content',  null, ['class' => 'form-control, summernote'])}}
        </div>
    </div>

    <div class="form-group my-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Фоток к посту</h3>
            </div>

            <div class="col-md-3">
                {{ Form::file('url_image')}}
            </div>
        </div>
    </div>

    <div class="form-group d-block ">
        <div class="col-md-3">
            <h3>Описание к посту</h3>
        </div>

        <div class="col-md-10 offset-md-1">
            {{ Form::textarea('post_description',  null, ['class' => 'form-control, summernote'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Редактировать пост', ['class' => 'btn btn-primary'])}}
        </div>
    </div>



    {!! Form::close() !!}
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script>


@endsection
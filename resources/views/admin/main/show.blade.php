@extends('admin.layouts.basic')

@section('title')
    Просмотр поста
@endsection

@section('content')

    <h3 class="p-3 text-success">Название</h3>
    <h1>{{ $post->title }}</h1>

    <h3 class="p-3 text-success">Контент</h3>
    <p>{!!$post->content!!}</p>

    <h3 class="p-3 text-success">Иконка поста</h3>
    <img src="{{asset('/storage/'. $post->url_image)}}" style="height: 200px; width: 200px;">

    <h3 class="p-3 text-success">Категории</h3>
    <p>{{$post->categories()->pluck('category_name')->implode(', ')}}</p>

    <h3 class="p-3 text-success">Страны</h3>
    <p>{{$post->countries()->pluck('country_name')->implode(', ')}}</p>

    <h3 class="p-3 text-success">Краткое описание</h3>
    <p>{!!$post->description!!}</p>

@endsection

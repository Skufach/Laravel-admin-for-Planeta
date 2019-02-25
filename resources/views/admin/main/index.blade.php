@extends('admin.layouts.basic')

@section('title')
    Посты
@endsection

@section('content')
    <h1>Посты</h1>
    <a href="{{route('posts.create')}}"
       class="btn btn-info">Добавить пост</a>


    @foreach($post as $p)

        <hr>

        <div class="row">
            <div class="col-md-3">
                <h1>{{ $p->title }}</h1>

                <img src="{{asset('/storage/'. $p->url_image)}}" style="height: 200px; width: 200px;">

                <p>{{$p->categories()->pluck('category_name')->implode(', ')}}</p>

                <p>{{$p->countries()->pluck('country_name')->implode(', ')}}</p>
            </div>
            <div class="col-md-7">
                <p>{!!$p->description!!}</p>
            </div>
            <div class="col-md-2">
                <div class="btn-group-vertical">
                    <a href="{{route('posts.show', $p->id )}}"
                       class="btn btn-success ">Просмотреть</a>

                    <a href="{{URL::to('AdminPanel/posts/' . $p->id . '/edit')}}"
                       class="btn btn-outline-dark ">Редактировать</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $p->id]]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger'])!!}
                    {!! Form::close() !!}
                </div>


            </div>
        </div>






    @endforeach

@endsection

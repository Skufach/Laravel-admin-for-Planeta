@extends('admin.layouts.basic')

@section('title')
    Редактор категорий
@endsection

@section('content')
    <h1>Категории</h1>
    <a href="{{route('categories.create')}}"
       class="btn btn-info">Добавить новую</a>

    <table class="table table-light  mt-2 col-md-8 offset-md-2">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Категория</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $category)

            <tr>
                <th>{{$category->id}}</th>
                <td>{{ $category->category_name }}</td>

                <td><a href="{{URL::to('AdminPanel/categories/' . $category->id) . '/edit'}}"
                       class="btn btn-outline-dark ">Редактировать</a>
                </td>

                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger'])!!}
                    {!! Form::close() !!}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
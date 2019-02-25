@extends('admin.layouts.basic')

@section('title')
    Редактор стран
@endsection

@section('content')
    <h1>Страны</h1>
    <a href="{{route('countries.create')}}"
       class="btn btn-info">Добавить новую</a>

    <table class="table table-light  mt-2 col-md-8 offset-md-2">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Страна</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($countries as $country)

            <tr>
                <th>{{$country->id}}</th>
                <td>{{ $country->country_name }}</td>

                <td><a href="{{URL::to('AdminPanel/countries/' . $country->id) . '/edit'}}"
                       class="btn btn-outline-dark ">Редактировать</a>
                </td>

                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['countries.destroy', $country->id]]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger'])!!}
                    {!! Form::close() !!}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
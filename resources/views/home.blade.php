@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Главная</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($activeLine)
                            <b>Выбранная строка</b>
                            <h1>{{$activeLine->string}}</h1>
                        @else
                            <b>Строка не выбрана</b>
                        @endif

                            <form class="form-inline" action="{{route('lines.store')}}" method="post">
                                {{ csrf_field() }}
                                <div class="input-group" style="width: 100%">
                                    <input type="text" class="form-control" aria-label="Строка" placeholder="Введите строку" name="string" required>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default dropdown-toggle">Создать строку</button>
                                    </div>
                                </div>
                            </form>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Активна</th>
                                <th>Строка</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lines as $line)
                                <tr>
                                    <th scope="row">{{$line->id}}</th>
                                    <td><input type="checkbox" disabled @if($line->active) checked @endif></td>
                                    <td>{{$line->preview}}</td>
                                    <td>
                                        <a href="{{route('lines.make_active', ['lineId' => $line->id])}}" class="btn btn-primary">Сделать активной</a>
                                        <a href="{{route('lines.delete', ['lineId' => $line->id])}}" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

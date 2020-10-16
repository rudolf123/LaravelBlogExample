@extends('layouts.app')

@section('content')
    <h2>Категории</h2>
    <div class="row">
        <a href="{{ route('category.create') }}" class="waves-effect waves-light red lighten-1 btn"><i class="material-icons">add</i>Добавить новую</a>
    </div>
    <div class="divider"></div>

    <div class="row">
        @foreach($categories as $key => $value)

        <div class="col s6">
            <div class="card">
                <div class="card-image">
                    <img src="{{Storage::url($value->image)}}">
                    <span class="card-title">{{$value->name}}</span>
                </div>
                <div class="card-content">
                    <p>{{$value->description}}</p>
                </div>
                <div class="card-action">
                    <a href="#">Перейти</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h2 class="center-align">Категории</h2>
    <div class="row">
        <a href="{{ route('category.create') }}" class="waves-effect waves-light green lighten-1 btn"><i class="material-icons">add</i>Добавить новую</a>
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
                        <div class="row">
                            <div class="col s2">
                                <a href="#" class="waves-effect waves-light yellow lighten-2 blue-text btn">Перейти</a>
                            </div>
                            <div class="col s2 right">
                                <form action="{{ route('category.destroy', [$value->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="waves-effect waves-light btn red darken-1" type="submit" name="action">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                            <div class="right">
                                <a href="{{ route('category.edit', [$value]) }}" class="waves-effect waves-light blue btn"><i class="material-icons">edit</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

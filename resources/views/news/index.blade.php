@extends('layouts.app')

@section('content')
    <h2 class="center-align">Новости в категории {{$category->name}}</h2>
    <div class="row">
        <a href="{{ route('news.create', ['category_id' => $category->id]) }}" class="waves-effect waves-light green lighten-1 btn"><i class="material-icons">add</i>Добавить новую</a>
    </div>
    <div class="divider"></div>

    <div class="row">
        @foreach($news as $key => $value)

            <div class="row">
                <div class="col s12 m12">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{$value->header}}</span>
                            <p>{{$value->content}}</p>
                        </div>
                        <div class="card-action">
                            <div class="row">
                            <div class="col s2 right">
                                <form action="{{ route('news.destroy', [$value->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="waves-effect waves-light btn red darken-1" type="submit" name="action">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                            <div class="right">
                                <a href="{{ route('news.edit', [$value]) }}" class="waves-effect waves-light blue btn"><i class="material-icons">edit</i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection

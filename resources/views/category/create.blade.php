@extends('layouts.app')

@section('content')
    <div class="row">
        <h4>Новая категория</h4>
        <div class="card-panel">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" placeholder="Название" name="name" type="text" class="validate" required>
                        <label for="name">Название</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea placeholder="Описание" name="description" class="materialize-textarea validate" required></textarea>
                        <label for="description">Описание</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Изображение</span>
                            <input type="file" name="image">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Добавить
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
    </div>
@endsection

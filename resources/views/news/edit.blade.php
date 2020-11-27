@extends('layouts.app')

@section('content')
    <div class="row">
        <h4>редактировать новость</h4>
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
            <form method="post" action="{{ route('news.update', [$news,'r' => $r]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <select name="category_id">
                            @foreach($categories as $key => $value)
                                <option value="{{ $value->id }}" @if($value->id == $news->category_id) selected @endif>{{ $value->name }} </option>
                            @endforeach
                        </select>
                        <label>Категория</label>
                        <script>
                            $(document).ready(function(){
                                $('select').formSelect();
                            });
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" placeholder="Заголовок" name="header" type="text" value="{{ $news->header }}" class="validate" required>
                        <label for="header">Заголовок</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea placeholder="Содержание" name="content" class="materialize-textarea validate"  required>{{ $news->content }}</textarea>
                        <label for="content">Содержание</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Сохранить
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
    </div>
@endsection

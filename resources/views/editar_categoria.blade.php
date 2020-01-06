@extends('layouts.app', ["current" => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nome_categoria">Nome da categoria: </label>
                    <input type="text" class="form-control" name="nome_categoria" 
                           value="{{ $categoria->name }}" id="nome_categoria">
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                <button type="cancel" class="btn btn-sm btn-danger">Cancelar</button>
            </form>
        </div>
    </div>    
@endsection
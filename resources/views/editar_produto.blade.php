@extends('layouts.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome_produto">Nome do produto: </label>
                    <input type="text" class="form-control" name="nome_produto"
                           id="nome_produto" value="{{ $produto->nome }}">
                </div>

                <div id="selecao">
                    <label for="select_categoria">Categoria: </label>
                    <select class="custom-select my-1 mr-sm-2" id="select_categoria" name="select_categoria">
                        <option>Escolha</option>

                        @foreach ($categorias as $cat)
                            @if ($cat->id == $produto->categoria_id)
                                <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                            @else
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                </div>

                <div id="numbers">
                    <div id="price_def">
                        <label for="price">Preço: R$</label>
                        <input type="number" name="price" id="price" step="any" value="{{ $produto->price }}">
                    </div>
                    <br>
                    <div id="stock-def">
                        <label for="stock">Estoque: </label>
                        <input type="number" name="stock" id="stock" value="{{ $produto->stock }}">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                <button type="cancel" class="btn btn-sm btn-danger">Cancelar</button>
            </form>
        </div>        
    </div>    
@endsection
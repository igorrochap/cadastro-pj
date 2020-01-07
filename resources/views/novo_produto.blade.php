@extends('layouts.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome_produto">Nome do produto: </label>
                    <input type="text" class="form-control" name="nome_produto"
                           id="nome_produto" placeholder="Produto">
                </div>
                <div id="selecao">
                    <label for="select_categoria">Categoria: </label>
                    <select class="custom-select my-1 mr-sm-2" id="select_categoria" name="select_categoria">
                        <option selected>Escolha</option>

                        @foreach ($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div id="numbers">
                    <div id="price_def">
                        <label for="price">Preço: </label>
                        <input type="number" name="price" id="price" step="any" placeholder="R$ 0.00">
                    </div>
                    <br>
                    <div id="stock-def">
                        <label for="stock">Estoque: </label>
                        <input type="number" name="stock" id="stock">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
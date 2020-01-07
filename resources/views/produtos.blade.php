@extends('layouts.app', ["current"=>"produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Qtd. em Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $prod)
                    <tr>
                        <td> {{ $prod->id }} </td>
                        <td> {{ $prod->nome }} </td>
                        <td> 
                            @foreach ($categorias as $cat)
                                @if ($prod->categoria_id == $cat->id)
                                    {{ $cat->name }}
                                @endif
                            @endforeach
                        </td>
                        <td> R$ {{ $prod->price }} </td>
                        <td> {{ $prod->stock }} </td>
                        <td>
                            <a href="{{ route('produtos.edit', $prod->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('produtos.destroy', $prod->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Apagar" class="btn btn-sm btn-danger">
                            </form>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo produto</a>
        </div>
    </div>
@endsection
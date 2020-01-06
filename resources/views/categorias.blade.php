@extends('layouts.app', ["current"=>"categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
            
            @if(count($categoria) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Código da Categoria</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categoria as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>
                                    <a href="edit" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="destroy" class="btn btn-sm btn-danger">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        
        </div>
        <div class="card-footer">
            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-primary" role="button">
                Nova categoria
            </a>
        </div>
    </div>    
@endsection
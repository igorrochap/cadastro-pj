@extends('layouts.app', ["current"=>"categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
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
                                <a href="{{ route('categorias.edit', $cat->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <br>
                                <form action="{{ route('categorias.destroy', $cat->id) }}" method="POST">
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
            <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova categoria</a>
        </div>
    </div>    
@endsection
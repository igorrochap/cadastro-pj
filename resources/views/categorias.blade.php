@extends('layouts.app', ["current"=>"categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
            <table class="table table-bordered table-hover" id="tabela_categorias">
                <thead>
                    <tr>
                        <th>Código da Categoria</th>
                        <th>Nome da Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" role="button" onclick="novaCategoria()"> Nova categoria </button>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="dlg_categorias">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="form_categorias">
                    <div class="modal-header">
                        <h5 class="modal-title">Nova Categoria</h5>
                    </div>
                    
                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome_categoria"
                                   id="nome_categoria" placeholder="Categoria">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function buildRow(categoria){
            var row = '<tr>'+
                    '<td>' + categoria.id + '</td>' +
                    '<td>' + categoria.name + '</td>' +
                    '<td>' +
                        '<button class="btn btn-sm btn-primary" onclick="editarCategoria(' + categoria.id + ')" > Editar </button> ' +
                        '<button class="btn btn-sm btn-danger" onclick="apagarCategoria(' + categoria.id + ')" > Apagar </button>' +
                    '</td>' +
                  '</tr>';

            return row;
        }

        function carregaCategorias(){
            $.getJSON('api/categorias', function(data){
                for(i = 0; i < data.length; i++){
                    row = buildRow(data[i]);

                    $('#tabela_categorias>tbody').append(row);
                }
            });
        }

        function novaCategoria(){
            $('#id').val('');
            $('#nome_categoria').val('');

            $('#dlg_categorias').modal('show');
        }

        function salvarCategoria(){
            categoria = {
                nome_categoria: $('#nome_categoria').val()
            }

            $.post('/api/categorias', categoria, function(data){
                categoria = JSON.parse(data);
                row = buildRow(categoria)

                $('#tabela_categorias>tbody').append(row)
            })
        }

        function apagarCategoria(id){
            $.ajax({
                type: "DELETE",
                url: "/api/categorias/" + id,
                context: this,
                success: function(){
                    console.log('OK');
                    rows = $('#tabela_categorias>tbody>tr');
                    erase = rows.filter(function(i, element){
                        return element.cells[0].textContent == id;
                    });

                    if(erase){
                        erase.remove();
                    }
                },
                error: function(error){
                    console.log(error);
                } 
            });
        }

        function editarCategoria(id){
            $.getJSON('/api/categorias/' + id, function(data){
                $('#id').val(data.id);
                $('#nome_categoria').val(data.name);

                $('#dlg_categorias').modal('show');
            });
        }

        function atualizaCategoria(){
            categoria = {
                id: $('#id').val(),
                nome_categoria: $('#nome_categoria').val()
            }

            $.ajax({
                type: "PUT",
                url: "/api/categorias/" + categoria.id,
                context: this,
                data: categoria,
                success: function(data){
                    categoria = JSON.parse(data);
                    console.log('OK');
                    rows = $('#tabela_categorias>tbody>tr');
                    update = rows.filter(function(i, element){
                        return element.cells[0].textContent == categoria.id;
                    });

                    if(update){
                        update[0].cells[0].textContent = categoria.id;
                        update[0].cells[1].textContent = categoria.name;
                    }
                },

                error: function(error){ console.log(error); }
            });
        }

        $('#form_categorias').submit( function(event){
            event.preventDefault();

            if($('#id').val() != '')
                atualizaCategoria();
            else
                salvarCategoria();
                
            $('#dlg_categorias').modal('hide');
        });

        $(function(){
            carregaCategorias();
        });

    </script>
@endsection
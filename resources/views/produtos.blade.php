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
                    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" role="button" onClick="novoProduto()"> Novo produto </button>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlg_produtos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="form_produto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <label for="nome_produto" class="control-label">Nome do produto: </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nome_produto"
                                       id="nome_produto" placeholder="Produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="control-label">Preço: R$</label>
                            <div class="input-group">
                                <input type="number" name="price" id="price" min="0" 
                                       class="form-control" placeholder="0.00">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock" class="control-label">Quantidade: </label>
                            <div class="input-group">
                                <input type="number" name="stock" id="stock" min="0" 
                                       class="form-control" placeholder="0">    
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categorias" class="control-label">Categoria: </label>
                            <select class="form-control" id="categorias">
                                <option selected>Escolha...</option>    
                            
                            </select>
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
        function novoProduto(){
            $('#id').val('');
            $('#nome_produto').val('');
            $('#price').val('');
            $('#stock').val('');

            $('#dlg_produtos').modal('show');
        }

        function carregarCategorias(){
            $.getJSON("/api/categorias", function(data){
                for(i = 0; i < data.length; i++){
                   option = '<option value = "' + data[i].id + '" >' + data[i].name + '</option>';

                   $('#categorias').append(option);
                }
            });
        }

        $(function(){
            carregarCategorias();
        });

    </script>
@endsection
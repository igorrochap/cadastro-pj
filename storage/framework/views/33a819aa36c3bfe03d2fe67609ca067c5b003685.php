<?php $__env->startSection('body'); ?>
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <table class="table table-bordered table-hover" id="tabela_produtos">
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
                            <select class="form-control" name="categorias" id="categorias" >
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            }
        });

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

        function buildRow(produto){
            var row = '<tr>' +
                        '<td>' + produto.id + '</td>' +
                        '<td>' + produto.nome + '</td>' +
                        '<td>' + produto.categoria_id + '</td>' +
                        '<td>' + produto.price + '</td>' +
                        '<td>' + produto.stock + '</td>' +
                        '<td>' +
                            '<button class="btn btn-sm btn-primary"> Editar </button> ' +
                            '<button class="btn btn-sm btn-danger"> Apagar </button> ' +
                        '</td>' +
                      '</tr>';

            return row;
        }

        function carregarProdutos(){
            $.getJSON("api/produtos", function(data){
                for(i = 0; i < data.length; i++){
                    row = buildRow(data[i]);

                    $('#tabela_produtos>tbody').append(row);
                }
            });
        }

        function salvarProduto(){
            produto = {
                nome_produto: $('#nome_produto').val(),
                stock: $('#stock').val(),
                price: $('#price').val(),
                categorias: $('#categorias').val()
            }

            $.post('/api/produtos', produto, function(data){
                produto = JSON.parse(data);
                row = buildRow(produto);

                $('#tabela_produtos>tbody').append(row);
            });
        }

        $('#form_produto').submit( function(event){
            event.preventDefault();
            salvarProduto();
            $('#dlg_produtos').modal('hide');
        });

        $(function(){
            carregarCategorias();
            carregarProdutos();
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ["current"=>"produtos"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/estagiariodev/Documentos/Igor/projetos/cadastro-pj/resources/views/produtos.blade.php ENDPATH**/ ?>
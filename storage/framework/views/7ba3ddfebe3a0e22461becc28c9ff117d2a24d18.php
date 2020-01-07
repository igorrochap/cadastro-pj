<?php $__env->startSection('body'); ?>
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui você cadastra seus produtos.
                            Não esqueça de cadastrar previamente suas categorias.
                        </p>
                        <a href="<?php echo e(route('produtos.index')); ?>" class="btn btn-primary">Cadastre seus produtos</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                            Cadaste as categorias dos seus produtos.
                        </p>
                        <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-primary">Cadastre suas Categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ["current"=>"home"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/estagiariodev/Documentos/Igor/projetos/cadastro-pj/resources/views/index.blade.php ENDPATH**/ ?>
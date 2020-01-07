<?php $__env->startSection('body'); ?>
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
                    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($prod->id); ?> </td>
                        <td> <?php echo e($prod->nome); ?> </td>
                        <td> 
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($prod->categoria_id == $cat->id): ?>
                                    <?php echo e($cat->name); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td> R$ <?php echo e($prod->price); ?> </td>
                        <td> <?php echo e($prod->stock); ?> </td>
                        <td>
                            <a href="<?php echo e(route('produtos.edit', $prod->id)); ?>" class="btn btn-sm btn-primary">Editar</a>
                            <form action="<?php echo e(route('produtos.destroy', $prod->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input type="submit" value="Apagar" class="btn btn-sm btn-danger">
                            </form>    
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="<?php echo e(route('produtos.create')); ?>" class="btn btn-primary">Novo produto</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ["current"=>"produtos"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/estagiariodev/Documentos/Igor/projetos/cadastro-pj/resources/views/produtos.blade.php ENDPATH**/ ?>
<?php $__env->startSection('body'); ?>
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
                    <?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cat->id); ?></td>
                            <td><?php echo e($cat->name); ?></td>
                            <td>
                                <a href="edit" class="btn btn-sm btn-primary">Editar</a>
                                <br>
                                <form action="<?php echo e(route('categorias.destroy', $cat->id)); ?>" method="POST">
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
            <a href="<?php echo e(route('categorias.create')); ?>" class="btn btn-sm btn-primary">Nova categoria</a>
        </div>
    </div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ["current"=>"categorias"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/estagiariodev/Documentos/Igor/projetos/cadastro-pj/resources/views/categorias.blade.php ENDPATH**/ ?>
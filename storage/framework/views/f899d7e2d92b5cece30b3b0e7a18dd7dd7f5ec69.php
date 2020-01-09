<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script src="https://kit.fontawesome.com/efa587470c.js" crossorigin="anonymous"></script>

    <style>
        body{
            padding: 10px;
        }

        .navbar{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php $__env->startComponent('components.navbar', ["current" => $current]); ?>
            
        <?php echo $__env->renderComponent(); ?>
        <main role="main">
            <?php if (! empty(trim($__env->yieldContent('body')))): ?>
                <?php echo $__env->yieldContent('body'); ?>                
            <?php endif; ?>
        </main>
    </div>


    <script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript"></script>
    
    <?php if (! empty(trim($__env->yieldContent('javascript')))): ?>
        <?php echo $__env->yieldContent('javascript'); ?>
    <?php endif; ?>

</body>
</html><?php /**PATH /home/estagiariodev/Documentos/Igor/projetos/cadastro-pj/resources/views/layouts/app.blade.php ENDPATH**/ ?>
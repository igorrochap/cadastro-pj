<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li <?php if($current == "home"): ?>
              class="nav-item active"
            <?php else: ?>
              class="nav-item"
            <?php endif; ?> >
          <a class="nav-link" href="/">Home <i class="fas fa-home"></i></a>
        </li>
        <li <?php if($current == "produtos"): ?>
              class="nav-item active"
            <?php else: ?>
              class="nav-item"
            <?php endif; ?> >
          <a class="nav-link" href="<?php echo e(route('produtos.index')); ?>">Produtos </a>
        </li>
        <li <?php if($current == "categorias"): ?>
              class="nav-item active"
            <?php else: ?>
              class="nav-item"
            <?php endif; ?> >
          <a class="nav-link" href="<?php echo e(route('categorias.index')); ?>">Categorias </a>
        </li>
      </ul>
    </div>
  </nav><?php /**PATH /home/estagiariodev/Documentos/Igor/projetos/cadastro-pj/resources/views/components/navbar.blade.php ENDPATH**/ ?>
<nav class="navbar navbar-expand-md mb-2">
  <!-- Brand -->
  <a class="navbar-brand" href="<?=base_url()?>">MerCampo</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link enlaces" href="<?=base_url()?>"><i class="fas fa-home"></i> Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link enlaces" href="<?=base_url('quienes')?>"><i class="fas fa-users"></i> Quienes somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link enlaces" href="<?=base_url('faq')?>"><i class="fas fa-question"></i> FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link enlaces" href="<?=base_url('contacto')?>"><i class="fas fa-phone"></i> Contacto</a>
      </li>
      
    </ul>

    <?php if($this->session->login): ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link enlaces dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-power-off"></i> <?=$this->session->usuario?></a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?=base_url('perfil')?>"><i class="fas fa-user"></i> Perfil</a>
          <a class="dropdown-item" href="<?=base_url('login/logout')?>"><i class="fas fa-power-off"></i> Salir</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link enlaces" href="<?=base_url('carrito')?>"><i class="fas fa-cart-plus"></i></a>
      </li>
    </ul>
    
<?php else:?>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link enlaces" href="#"  data-toggle="modal" data-target="#modal_registro"><i class="fas fa-user-plus"></i> Registrarse</a>
      </li>
      <li class="nav-item">
        <a class="nav-link enlaces" href="#"  data-toggle="modal" data-target="#myModal"><i class="fas fa-power-off"></i> Login</a>
      </li>
    </ul>
    <?php endif;?>
    
  </div>
</nav> 
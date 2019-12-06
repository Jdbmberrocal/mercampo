
<div class="container mt-5">
  <div class="row">
    <?php foreach($productos as $producto):?>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-header p-0">
          <img src="<?=base_url('plantilla/img/'.$producto->imagen)?>" class="rounded-top img-fluid">
        </div>
        <div class="card-body">
          <h5><?=$producto->nombre?></h5>
          <code>$ <?=number_format($producto->precio,0)?> pesos</code>
          <div class="btn-group">
            <a href="#" class="btn btn-primary">Detalles</a>
            <a href="#" class="btn btn-success">Añadir al carrito</a>
          </div> 
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    
  </div>
</div>
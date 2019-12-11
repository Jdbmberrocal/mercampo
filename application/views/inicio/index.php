
<div class="container mt-5">
  <div class="row">
    <?php foreach($productos->result() as $producto):?>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-header p-0">
          <img src="<?=base_url('plantilla/img/'.$producto->imagen)?>" class="rounded-top img-fluid">
        </div>
        <div class="card-body">
          <h5><?=$producto->nombre?></h5>
          <code>$ <?=number_format($producto->precio,0)?> pesos</code>
          <?php
            $date = DateTime::createFromFormat("Y-m-d", $producto->fecha);
            $fecha = $date->format("F d Y");
            //fracmentar la fecha
            $day = $date->format("d");
            $month = $date->format("m");
            $year = $date->format("Y");
            $titulo = str_replace(" ", "_", $producto->nombre);
            $titulo_codificado = urlencode($titulo);
          ?>
          
            <a href="<?= base_url('inicio/articulo/'.$day.'/'.$month.'/'.$year.'/'.$titulo_codificado); ?>" class="btn btn-block btn-sm btn-primary">Detalles</a>
            <!--<a href="#" class="btn btn-success">Añadir al carrito</a>-->
           
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    
    
  </div>
  <?php echo $pagination; ?>
</div>
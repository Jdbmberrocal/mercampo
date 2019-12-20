<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="<?=base_url('producto/insertar')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto">
                  <?php echo form_error("nombre","<span class='text-danger'>","</span>"); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="precio" placeholder="Precio del producto">
                    <?php echo form_error("precio","<span class='text-danger'>","</span>"); ?>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="cantidad" placeholder="Cantidad del producto">
                    <?php echo form_error("cantidad","<span class='text-danger'>","</span>"); ?>
                  </div>
                  <div class="form-group">
                    <textarea name="descripcion" class="form-control"  placeholder="Descripción del producto"></textarea>
                    <?php echo form_error("descripcion","<span class='text-danger'>","</span>"); ?>
                  </div>
                  <div class="form-group">
                    <input type="file" name="imagen" placeholder="Imagen del producto" class="form-control-file border">
                  </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form> 
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
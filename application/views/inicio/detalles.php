<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Detalles del vendedor</h4>
                    <a href="<?=base_url('perfil/calificacion/'._encode($idproductor))?>"><?=$nombre_productor.' '.$apellidos_productor?></a>

                    <div class="progress">
                        <div class="progress-bar bg-success" style="width:<?=$porcentaje_pos?>%">
                            Positivo
                        </div>
                        <div class="progress-bar bg-danger" style="width:<?=$porcentaje_neg?>%">
                            Negativos
                        </div>
                    </div> 
                    <span class="badge badge-pill badge-success"><?=round($porcentaje_pos)?>%</span>
                    <span class="badge badge-pill badge-danger"><?=round($porcentaje_neg)?>%</span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Detalles del producto</h4>
                    
                    <div class="row">
                        <div class="col-md-6"><img src="<?=base_url('plantilla/img/'.$imagen)?>" class="rounded-top img-fluid"></div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Descripción</dt>
                                <dd>- <?=$descripcion?></dd>
                                <dt>Cantidad</dt>
                                <dd>- <?=$cantidad?></dd>
                            </dl>
                        </div>
                    </div>
                    <h5><?=$pagina?></h5>
                    <code>$<?=number_format($precio,0)?> pesos</code>

                    <?php if($this->session->login): ?>

                    <form action="<?=base_url('carrito/addcart')?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=_encode($idproducto)?>">
                            <input type="hidden" name="price" value="<?=$precio?>">
                            <input type="hidden" name="name" value="<?=$pagina?>">
                            <label for="pwd">Cantidad</label>
                            <input type="number" class="form-control" value="1" name="qty" min="1" max="<?=$cantidad?>">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Comprar</button>
                    </form> 
                    <?php endif; ?>
                </div>
            </div>
            <div id="comentarios">
            
            </div>
            
            <div class="card border ">
                <?php if($this->session->login): ?>
                <form action="#" method="POST" id="frm_comentario">
                    <input type="hidden" name="idproducto" value="<?=_encode($idproducto)?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="comentario" placeholder="Dejanos tu comentario sobre el producto o el vendedor">
                        
                        <div class="input-group-append">
                          <button class="btn btn-success" id="btn_comentario" type="submit">Comentar</button>
                        </div>
                    </div>
                    <span id="comentario_error" class="text-danger"></span>
                </form>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>
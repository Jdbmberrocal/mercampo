<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">Calificar</div>
            <div class="card-body">
                <form action="<?=base_url('perfil/calificar_productor')?>" method="POST">
                    <input type="hidden" name="idproductor" value="<?=$this->uri->segment(3)?>">
                    <input type="hidden" name="idproducto" value="<?=$this->uri->segment(4)?>">
                    <div class="form-group">
                        <label for="sel1">Calificación</label>
                        <select class="form-control" name="calificacion">
                            <option value="">Escoja una opción</option>
                            <option value="buena">Buena</option>
                            <option value="mala">Mala</option>
                        </select>
                        <?php echo form_error("calificacion","<span class='text-danger'>","</span>"); ?>
                    </div> 
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1" name="optradio"> 1
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="2" name="optradio"> 2
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="3" name="optradio"> 3
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="4" name="optradio"> 4
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="5" name="optradio"> 5
                        </label>
                    </div><br>
                    <?php echo form_error("optradio","<span class='text-danger'>","</span>"); ?>
                    <div class="form-group">
                        <textarea name="comentario" class="form-control" cols="30" rows="10" placeholder="Comentario"></textarea>
                    </div>
                    <?php echo form_error("comentario","<span class='text-danger'>","</span>"); ?>
                    <button type="submit" class="btn btn-primary">Calificar</button>
                    </form> 
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
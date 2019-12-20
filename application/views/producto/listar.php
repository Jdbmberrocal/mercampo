<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Mis productos</h2>
            <a href="<?=base_url('producto/nuevo')?>" class="btn btn-success">Nuevo producto</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imágen</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($productos as $producto): ?>
                    <tr>
                        <td><?=$producto->nombre?></td>
                        <td> <img src="<?=base_url('plantilla/img/'.$producto->imagen)?>" class="rounded" width="50" height="50"></td>
                        <td>$<?=number_format($producto->precio,0)?></td>
                        <td><?=$producto->cantidad?></td>
                        <td><?=$producto->fecha?></td>
                        <td>
                        <a href="<?=base_url('producto/eliminar/'._encode($producto->idproducto))?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
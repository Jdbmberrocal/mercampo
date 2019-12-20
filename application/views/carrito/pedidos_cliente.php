<div class="container">
  <h2>Listado de pedidos</h2>
  <div class="table-responsive">            
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Comentar</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $pedido): ?>
        <tr>
            <td><?=$pedido->nombre?></td>
            <td><?=$pedido->precio*$pedido->cantidad?></td>
            <td><?=$pedido->cantidad?></td>
            <td><?=$pedido->fecha?></td>
            <td>
                <?php 
                if($pedido->estado == 1)
                {
                    echo "<span class='badge badge-pill badge-warning'>Pendiente</span>";
                }else{
                    echo "<span class='badge badge-pill badge-success'>Enviado</span>";
                }
                
                ?>
            </td>
            <td><a href="<?=base_url('perfil/calificar/'._encode($pedido->idproductor).'/'._encode($pedido->idproducto))?>" class="btn btn-info btn-xs">Calificar</a></td>
        </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2>Listado de pedidos</h2>
        <div class="table-responsive">            
            <table class="table">
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
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
                    <td><a class="btn btn-info" href="<?=base_url('carrito/estado/'._encode($pedido->idventas))?>">Estado</a></td>
                </tr>
                <?php endforeach; ?>                
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
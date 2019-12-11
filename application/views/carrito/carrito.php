
<div class="container mt-5">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form method="POST" action="<?=base_url('carrito/confirmar_pedido')?>">
            <?php $i = 1; ?>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->cart->contents() as $items): ?>
                <input type="hidden" name="<?=$i.'[rowid]'?>">
                <input type="hidden" name="">
                <tr>
                    <td><?php echo $items['name']; ?></td>
                    <td><?=$items['qty']?></td>
                    <td><?php echo $this->cart->format_number($items['price'],0); ?></td>
                    <td>$<?php echo $this->cart->format_number($items['subtotal'],0); ?></td>
                    <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right">$<?php echo $this->cart->format_number($this->cart->total(),0); ?></td>
                    <td class="right"><a href="" class="btn btn-success">Confirmar Compra</a></td>
                </tr>
                
                </tbody>
            </table>
        </form>
        <a href="<?=base_url('carrito/vaciar')?>" class="btn btn-danger btn-sm">Vaciar</a>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
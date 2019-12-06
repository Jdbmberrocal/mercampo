
<div class="container mt-5">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form method="POST" action="">
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
                <tr>
                    <td><?php echo $items['name']; ?></td>
                    <td><?=$items['qty']?></td>
                    <td><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
                
                </tbody>
            </table>
        </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
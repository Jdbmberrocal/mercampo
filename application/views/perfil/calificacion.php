<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
            <div class="container">
                <h2>Calificación</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th>Productor</th>
                            <th>Producto</th>
                            <th>Cliente</th>
                            <th>Calificación</th>
                            <th>Estrellas</th>
                            <th>Comentarios</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($calificacion as $cal): ?>
                                <?php if($cal->calificacion == 'buena'): ?>
                                <tr class="table-success">
                                    <td><?=$cal->nombre_productor.' '.$cal->apellidos_productor?></td>
                                    <td><?=$cal->producto?></td>
                                    <td><?=$cal->nombre.' '.$cal->apellidos?></td>
                                    <td><?php
                                        if($cal->calificacion == 'buena')
                                        {
                                            echo "<span class='badge badge-pill badge-success'>Positivo</span>";
                                        }elseif($cal->calificacion == 'mala')
                                        {
                                            echo "<span class='badge badge-pill badge-danger'>Negativo</span>";
                                        }
                                    ?></td>
                                    <td><?php
                                        if($cal->estrellas == 1)
                                        {
                                            echo "<i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 2){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 3){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 4){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 5){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }
                                    ?></td>
                                    <td><?=$cal->comentario?></td>
                                    <td><?=$cal->fecha?></td>
                                </tr>
                                <?php elseif($cal->calificacion == 'mala'): ?>
                                <tr class="table-danger">
                                    <td><?=$cal->nombre_productor.' '.$cal->apellidos_productor?></td>
                                    <td><?=$cal->producto?></td>
                                    <td><?=$cal->nombre.' '.$cal->apellidos?></td>
                                    <td>
                                        <?php
                                            if($cal->calificacion == 'buena')
                                            {
                                                echo "<span class='badge badge-pill badge-success'>Positivo</span>";
                                            }elseif($cal->calificacion == 'mala')
                                            {
                                                echo "<span class='badge badge-pill badge-danger'>Negativo</span>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php
                                        if($cal->estrellas == 1)
                                        {
                                            echo "<i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 2){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 3){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 4){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }elseif($cal->estrellas == 5){
                                            echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                                        }
                                    
                                    ?></td>
                                    <td><?=$cal->comentario?></td>
                                    <td><?=$cal->fecha?></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                        
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
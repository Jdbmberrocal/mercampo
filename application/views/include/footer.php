
<footer class="container mt-2 mb-3">
  <div class="card">
    <h5 class="text-center">Mercampo - Todos los derechos reservados</h5>
  </div>
</footer>

<!-- Modal Login -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Iniciar Sesión</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
        <span id="success_message"></span>
          <form action="#" method="POST" id="frm_login">
              <div class="form-group">
                  <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario y/o Correo">
                  <span id="usuario_error" class="text-danger"></span>
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
                  <span id="clave_error" class="text-danger"></span>
              </div>

              <div class="form-group">
                  <select class="form-control" name="rol" id="rol">
                      <option value="">Seleccione su rol</option>
                      <option value="cliente">Cliente</option>
                      <option value="productor">Productor</option>
                  </select>
                  <span id="rol_error" class="text-danger"></span>
              </div>
              
              <button type="submit" class="btn btn-block btn-primary" id="btn_login">Entrar</button>
          </form>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<!-- Modal Registro -->
<div class="modal" id="modal_registro">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registrarse</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card-body">
        <!--<span id="success_message"></span>
          <form action="#" method="POST" id="frm_login">
              <div class="form-group">
                  <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario y/o Correo">
                  <span id="usuario_error" class="text-danger"></span>
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
                  <span id="clave_error" class="text-danger"></span>
              </div>
              
              <button type="submit" class="btn btn-block btn-primary" id="btn_login">Entrar</button>
          </form>-->
           <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Cliente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Productor</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active container" id="home">
                <h3 class="text-center">Registrar Cliente</h3>
                <span id="success_message"></span>
                <form action="#" method="POST" id="frm_registro_cliente">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                        <span id="nombre_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                        <span id="apellidos_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                        <span id="usuario_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo">
                        <span id="correo_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña">
                        <span id="contrasena_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="ccontrasena" id="ccontrasena" placeholder="Confirmar Contraseña">
                        <span id="ccontrasena_error" class="text-danger"></span>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-primary" id="btn_registro_cliente">Entrar</button>
                </form>
              </div>
              <div class="tab-pane container" id="menu1">
              <h3 class="text-center">Registrar Productor</h3>
                <span id="success_message"></span>
                <form action="#" method="POST" id="frm_registro_productor">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombrep" id="nombrep" placeholder="Nombre">
                        <span id="nombrep_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="apellidosp" id="apellidosp" placeholder="Apellidos">
                        <span id="apellidosp_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="usuariop" id="usuariop" placeholder="Usuario">
                        <span id="usuariop_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="correop" id="correop" placeholder="Correo">
                        <span id="correop_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="contrasenap" id="contrasenap" placeholder="Contraseña">
                        <span id="contrasenap_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="ccontrasenap" id="ccontrasenap" placeholder="Confirmar Contraseña">
                        <span id="ccontrasenap_error" class="text-danger"></span>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-primary" id="btn_registro_productor">Entrar</button>
                </form>
              </div>
            </div> 
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

  <script src="<?=base_url('plantilla/')?>js/jquery.min.js"></script>
  <script src="<?=base_url('plantilla/')?>js/popper.min.js"></script>
  <script src="<?=base_url('plantilla/')?>js/bootstrap.min.js"></script>
  <script>

    $(document).ready(function(e){
      <?php if(($this->uri->segment(1) == 'inicio') && ($this->uri->segment(2) !='' && $this->uri->segment(3) !='' && $this->uri->segment(4) !='' && $this->uri->segment(5) !='')): ?>
      cargar_listado_comentarios();
      <?php endif;?>
    });

<?php if(($this->uri->segment(1) == 'inicio') && ($this->uri->segment(2) !='' && $this->uri->segment(3) !='' && $this->uri->segment(4) !='' && $this->uri->segment(5) !='')): ?>
function cargar_listado_comentarios() 
  {
    $.ajax({
        url:"<?=base_url('producto/listado_comentarios/'._encode($idproducto))?>",
        method:"POST",
        data:{p:1},
        dataType:"json",
        beforeSend:function(){
          
        },
        success:function(data)
        {
          $('#comentarios').html(data);
        }
      })
  }
<?php endif;?>

    $('#frm_login').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url:"<?=base_url()?>login/sesion",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#btn_login').attr('disabled', 'disabled');
        },
        success:function(data)
        {
          if(data.error)
          {
            if(data.usuario_error != '')
            {
              $('#usuario_error').html(data.usuario_error);
            }
            else
            {
              $('#usuario_error').html('');
            }

            if(data.clave_error != '')
            {
              $('#clave_error').html(data.clave_error);
            }
            else
            {
              $('#clave_error').html('');
            }

            if(data.rol_error != '')
            {
              $('#rol_error').html(data.rol_error);
            }
            else
            {
              $('#rol_error').html('');
            }
           
          }
          if(data.success)
          {
              $('#success_message').html(data.success);
              $('#usuario_error').html('');
              $('#clave_error').html('');
              $('#rol_error').html('');
             
              $('#frm_login')[0].reset();
              if(data.login == 'exitoso' && data.rol == 'cliente')
              {

                window.location.href = '<?=base_url()?>';
              }else if(data.login == 'exitoso' && data.rol == 'productor')
              {
                window.location.href = '<?=base_url("carrito/pedidos")?>';
              } 
              console.log(data);
          }
          $('#btn_login').attr('disabled', false);
        }
      })
    });

    /*==============REGISTRO CLIENTE=================== */
    $('#frm_registro_cliente').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url:"<?=base_url()?>cliente/registrarse",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#btn_registro_cliente').attr('disabled', 'disabled');
        },
        success:function(data)
        {
          if(data.error)
          {
            if(data.nombre_error != '')
            {
              $('#nombre_error').html(data.nombre_error);
            }
            else
            {
              $('#nombre_error').html('');
            }

            if(data.apellidos_error != '')
            {
              $('#apellidos_error').html(data.apellidos_error);
            }
            else
            {
              $('#apellidos_error').html('');
            }
            
            if(data.usuario_error != '')
            {
              $('#usuario_error').html(data.usuario_error);
            }
            else
            {
              $('#usuario_error').html('');
            }

            if(data.correo_error != '')
            {
              $('#correo_error').html(data.correo_error);
            }
            else
            {
              $('#correo_error').html('');
            }

            if(data.contrasena_error != '')
            {
              $('#contrasena_error').html(data.contrasena_error);
            }
            else
            {
              $('#contrasena_error').html('');
            }

            if(data.ccontrasena_error != '')
            {
              $('#ccontrasena_error').html(data.ccontrasena_error);
            }
            else
            {
              $('#ccontrasena_error').html('');
            }
           
          }
          if(data.success)
          {
              $('#success_message').html(data.success);
              $('#nombre_error').html('');
              $('#apellidos_error').html('');
              $('#correo_error').html('');
              $('#usuario_error').html('');
              $('#contrasena_error').html('');
              $('#ccontrasena_error').html('');
             
              $('#frm_registro_cliente')[0].reset();
              if(data.login == 'exitoso')
              {
                window.location.href = 'inicio';
              } 
          }
          $('#btn_registro_cliente').attr('disabled', false);
        }
      })
    });


    /*==============REGISTRO PRODUCTOR=================== */
    $('#frm_registro_productor').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url:"<?=base_url()?>productor/registrarse",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#btn_registro_productor').attr('disabled', 'disabled');
        },
        success:function(data)
        {
          if(data.error)
          {
            if(data.nombrep_error != '')
            {
              $('#nombrep_error').html(data.nombrep_error);
            }
            else
            {
              $('#nombrep_error').html('');
            }

            if(data.apellidosp_error != '')
            {
              $('#apellidosp_error').html(data.apellidosp_error);
            }
            else
            {
              $('#apellidosp_error').html('');
            }
            
            if(data.usuariop_error != '')
            {
              $('#usuariop_error').html(data.usuariop_error);
            }
            else
            {
              $('#usuariop_error').html('');
            }

            if(data.correop_error != '')
            {
              $('#correop_error').html(data.correop_error);
            }
            else
            {
              $('#correop_error').html('');
            }

            if(data.contrasenap_error != '')
            {
              $('#contrasenap_error').html(data.contrasenap_error);
            }
            else
            {
              $('#contrasenap_error').html('');
            }

            if(data.ccontrasenap_error != '')
            {
              $('#ccontrasenap_error').html(data.ccontrasenap_error);
            }
            else
            {
              $('#ccontrasenap_error').html('');
            }
           
          }
          if(data.success)
          {
              $('#success_message').html(data.success);
              $('#nombrep_error').html('');
              $('#apellidosp_error').html('');
              $('#correop_error').html('');
              $('#usuariop_error').html('');
              $('#contrasenap_error').html('');
              $('#ccontrasenap_error').html('');
             
              $('#frm_registro_productor')[0].reset();
              if(data.login == 'exitoso')
              {
                window.location.href = 'inicio';
              } 
          }
          $('#btn_registro_productor').attr('disabled', false);
        }
      })
    });



    /*==============SISTEMA DE COMENTARIO=================== */
    $('#frm_comentario').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url:"<?=base_url('producto/comentar/')?>",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#btn_comentario').attr('disabled', 'disabled');
        },
        success:function(data)
        {
          if(data.error)
          {
            if(data.comentario_error != '')
            {
              $('#comentario_error').html(data.comentario_error);
            }
            else
            {
              $('#comentario_error').html('');
            }

            
          }
          if(data.success)
          {
              $('#success_message').html(data.success);
              $('#comentario_error').html('');
              
              $('#frm_comentario')[0].reset();
              cargar_listado_comentarios();
              if(data.login == 'exitoso')
              {
                cargar_listado_comentarios();
              }
          }
          $('#btn_comentario').attr('disabled', false);
        }
      })
    });
  </script>
</body>

</html>

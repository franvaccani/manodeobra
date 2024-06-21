<?php
if ($_SESSION['autenticado'] == 'SI') {
    $filtros = '';
    $filtrando = '';
    $userid = $_SESSION['perfil']['userid'];
    $consultacompleta = "SELECT * FROM `contactos`
INNER JOIN usuarios ON usuarios.id_usuario = contactos.idDestino_contacto AND usuarios.estado_usuario = 1
WHERE (idDestino_contacto = $userid OR idUser_contacto = $userid) AND estado_contacto = 1
ORDER BY `contactos`.`cuando_contacto` DESC ";
    $sql_contact = $link->query($consultacompleta);
    $cantidad_consulta = mysqli_num_rows($sql_contact);


?>


<?php
$tomo_id = $_GET['id'];
$sql_detalle= "SELECT *, CONCAT(ciudad.ciudad_nombre,', ',provincia.provincia_nombre) as zona FROM `ofertas`
INNER JOIN categorias on categorias.id_categoria = ofertas.categoria_oferta and estado_categoria = 1
INNER JOIN ciudad on ciudad.id_ciudad = ofertas.zona_oferta
INNER JOIN provincia on provincia.id_provincia = ciudad.provincia_id
WHERE `id_oferta` = $tomo_id AND `estado_oferta` = 1";
$consulta = $link->query($sql_detalle);
$oferta='';
if($con = mysqli_fetch_assoc($consulta)){
  $oferta = $con;
};


 ?>
    <style>
        .ui-autocomplete {
            z-index: 9999;
        }

        .card .avatar {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 5px;
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        .card ul.team-members li:not(:last-child) {
            border-bottom: 1px solid #F1EAE0;
        }

        .card ul.team-members li {
            padding: 10px 0px;
        }

        /*card user*/
        .card-user .image {
            border-radius: 8px 8px 0 0;
            height: 150px;
            position: relative;
            overflow: hidden;
        }

        .card .image {
            width: 100%;
            overflow: hidden;
            height: 260px;
            border-radius: 6px 6px 0 0;
            position: relative;
            -webkit-transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .card-user .image img {
            width: 100%;
        }

        .card-user .author {
            text-align: center;
            text-transform: none;
            margin-top: -65px;
        }

        .card .author {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .card .btn.btn-icon {
            padding: 7px;
        }

        .card .btn-sm {
            font-size: 12px;
            border-radius: 26px;
            padding: 4px 4px;
        }

        .card .btn {
            box-sizing: border-box;
            border-width: 2px;
            background-color: transparent;
            font-size: 14px;
            font-weight: 500;
            padding: 7px 18px;
            border-color: #66615B;
            color: #66615B;
            -webkit-transition: all 150ms linear;
            -moz-transition: all 150ms linear;
            -o-transition: all 150ms linear;
            -ms-transition: all 150ms linear;
            transition: all 150ms linear;
        }

        .card .btn-success {
            border-color: #7AC29A;
            color: #7AC29A;
        }

        .chat-list {
            padding: 0;
            font-size: .8rem;
        }

        .chat-list li {
            margin-bottom: 10px;
            overflow: auto;
            color: #ffffff;
        }

        .chat-list .chat-img {
            float: left;
            width: 48px;
        }

        .chat-list .chat-img img {
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
            width: 100%;
        }

        .chat-list .chat-message {
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
            background: #5a99ee;
            display: inline-block;
            padding: 10px 20px;
            position: relative;
        }

        .chat-list .chat-message:before {
            content: "";
            position: absolute;
            top: 15px;
            width: 0;
            height: 0;
        }

        .chat-list .chat-message h5 {
            margin: 0 0 5px 0;
            font-weight: 600;
            line-height: 100%;
            font-size: .9rem;
        }

        .chat-list .chat-message p {
            line-height: 18px;
            margin: 0;
            padding: 0;
        }

        .chat-list .chat-body {
            margin-left: 20px;
            float: left;
            width: 70%;
        }

        .chat-list .in .chat-message:before {
            left: -12px;
            border-bottom: 20px solid transparent;
            border-right: 20px solid #5a99ee;
        }

        .chat-list .out .chat-img {
            float: right;
        }

        .chat-list .out .chat-body {
            float: right;
            margin-right: 20px;
            text-align: right;
        }

        .chat-list .out .chat-message {
            background: #fc6d4c;
        }

        .chat-list .out .chat-message:before {
            right: -12px;
            border-bottom: 20px solid transparent;
            border-left: 20px solid #fc6d4c;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .form-group label{
            color: #fff;
        }
    </style>
    <main style="transform: none; padding-top: 50px;">
    <div class="container-parallax3">
					<div class="TituloParallax">
						<h1>Mis datos</h1>
					</div>
			</div>
        <!-- /hero_single -->

        <div class="container margin_60_30" style="width:500px; height:700px;">
            <div class="row">
                <div id="left_list" class="col-xl-4 col-lg-2 col-md-2 bg_yellow">
<!--
                    <div class="card bg_yellow">
                        <div class="header" style="margin-top: 20px;text-align: center;background: black;color: white;">
                            <?php
                            $titulo_plan = "";
                            $detalle_plan = "";
                            if ($_SESSION['perfil']['plan'] == 1) {
                                $titulo_plan = "Plan Gratuito";
                                $detalle_plan = '<ul>
                      <li style="color:#fff;" >Mensajeria interna
                        <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span></li>
                      <li style="color:#fff;">Publicaciones Ilimitadas
                        <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span>
                      </li>
                      <li style="color:#fff;">Solicitud de Presupuestos Ilimitadas
                        <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span></li>
                    </ul>';
                            }
                            if ($_SESSION['perfil']['plan'] == 2) {
                                $titulo_plan = "Plan Basico";
                                $detalle_plan = '<ul>
 		                		<li style="color:#fff;">Mensajeria interna
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span></li>
 		                		<li style="color:#fff;">Publicaciones ilimitadas
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span></li>
 		                		<li style="color:#fff;">Solicitud de Presupuestos ilimitadas
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span></li>
                        <li style="color:#fff;">2 Publicaciones destacadas
                          <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span></li>
                        <li style="color:#fff;">5 Promociones de Publicaciones
                          <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span></li>

 		                	</ul>';
                            }
                            if ($_SESSION['perfil']['plan'] == 3) {
                                $titulo_plan = "Plan Avanzado";
                                $detalle_plan = '<ul>
                        <li style="color:#fff;">Mensajeria interna
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span>
                        </li>
                        <li style="color:#fff;">Publicaciones Ilimitadas
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span></li>
                        <li style="color:#fff;">Solicitud de Presupuestos Ilimitadas
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span></li>
                        <li style="color:#fff;">5 Publicaciones destacadas
                          <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span></li>
                        <li style="color:#fff;">10 Promociones de Publicaciones
                          <span class="pricing-item">
                          <i class="fas fa-check"></i>
                        </span></li>
                      </ul>';
                            }
                            ?>
                            <h4 class="title" style="color:white;margin-top: 5px;">Mi Plan: <?php echo $titulo_plan; ?></h4>
                        </div>
                        <div class="content" style="margin-left: 15px">
                            <hr>
                            <div class="main">
                                <h6 style="color:#fff;">Incluye</h6>
                                <?php echo $detalle_plan; ?>

                            </div>
                            
                            <center><a style="color: #fff;" href="index.php?pagina=planes">>> Modificar Plan << </a>
                            </center>
                        -->
                        </div>
                    </div>
                 

                        <!--  -->


                        <!--  -->

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000;
        }
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 500;
        }
        #popupMessage {
            font-size: 16px;
        }
        .close-btn {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .close-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
        <body>
        <div style="width:100%;" class="text_center">
                        <div class="header header-datos" style="display: flex; align-items: center;  border-radius: 5px; background-color: #fff; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
                         justify-content: center; background-color: #f4d80c; height: 100px; font-family: helveticaTitulo;">
                            <h4 class="title" style="color: #232323; margin-bottom: 0px;">Actualizar perfil</h4>
                        </div>
                    </div>
            <form id="updateForm">
                <label class="label-perfil" for="nombre">Nombre:</label>
                <input  class="form-control4" type="text" id="nombre" name="nombre"  placeholder="<?php echo $_SESSION['perfil']['nombre']  ?>" required=""><br>
                
                <label class="label-perfil"  for="telefono">Teléfono:</label>
                <input class="form-control4" type="text" id="telefono" name="telefono"  placeholder="<?php echo $_SESSION['perfil']['telefono']  ?>"  required=""> <br>
                <?php echo $oferta['telefono_oferta'];?>
                <label class="label-perfil" for="email">Email:</label>
                <input class="form-control4" type="email" id="email" name="email"  placeholder="<?php echo $_SESSION['perfil']['email']  ?>"  required=""><br>
                <div class="perfilcontenedor">
                <button class="btn_1 BotonesBackend" style="margin-left:8px; margin-bottom:8px;" type="submit">Actualizar</button>

                </div>
            </form>


            <script>
                // Función para validar el formulario antes de enviar
                function validarFormulario() {
                    var nombre = document.getElementById('nombre').value.trim();
                    var telefono = document.getElementById('telefono').value.trim();
                    var email = document.getElementById('email').value.trim();

                    // Validar correo electrónico con expresión regular básica
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        alert('Ingrese un correo electrónico válido.');
                        return false; // Detener el envío del formulario
                    }

                    // Aquí puedes agregar más validaciones según sea necesario

                    return true; // Permitir el envío del formulario
                }

                // Asociar la función validarFormulario() al evento submit del formulario
                document.getElementById('updateForm').addEventListener('submit', function(event) {
                    if (!validarFormulario()) {
                        event.preventDefault(); // Evitar el envío del formulario si la validación falla
                    }
                });
            </script>

       

            <div id="overlay"></div>
            <div id="popup">
                <span id="popupMessage"></span>
                <br><br>
                <button onclick="closePopup()">Cerrar</button>
            </div>

            <script>
                $(document).ready(function(){
                    $('#updateForm').on('submit', function(event){
                        event.preventDefault();

                        $.ajax({
                            url: './assets/php/update_config.php',
                            method: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                $('#popupMessage').html(response);
                                $('#overlay').show();
                                $('#popup').show();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                $('#popupMessage').text('Error al actualizar los datos: ' + textStatus);
                                $('#overlay').show();
                                $('#popup').show();
                            }
                        });
                    });
                });

                function closePopup() {
                    $('#overlay').hide();
                    $('#popup').hide();
                }
            </script>



                      <!--   <form action="./assets/php/guardar_datos.php" method="post">
                            Nombre: <input type="text" name="nombre1" required = ""><br>
                            Email: <input type="email" name="email1"  required = ""><br>
                            Celular: <input type="text" name="celular1"  required = ""><br>
                            <input type="submit" value="Guardar">
                        </form> -->

                    </div>
                    <!--
                    <div class="card bg_yellow">
                        <div class="header" style="margin-top: 20px;text-align: center;background: black;color: white;">
                            <h4 class="title" style="color:white;margin-top: 5px;">Ultima Actividad</h4>
                        </div>
                        <div class="content" style="margin-left: 15px">
                            <ul class="list-unstyled team-members">
                                <?php
                                $recorre = 0;
                                $ultimo_msg = '';
                                /*  while($wil= mysqli_fetch_assoc($sql_contact)){
              if($recorre==0){$ultimo_msg = $wil['id_usuario'];}
              echo '  <li onclick="pone_mensajes('.$wil['id_usuario'].')">
                    <div class="row" >
                        <div class="col-2">
                            <div class="avatar">

                                <img style="width:100%" src="'.$wil['avatar_usuario'].'" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-7" style="font-weight: 600;">
                            '.$wil['nombre_contacto'].'
                            <br>
                            <span class="text-muted"><small>'.date('d/m/Y H:i:s', strtotime($wil['cuando_contacto'])).'</small></span>
                        </div>

                        <div class="col-3 text-right">';
                        if($wil['leido_contacto']==0){echo '<i class="icon_mail_alt" title="Mensajes Nuevos"></i>';}

                        echo '
                        </div>
                    </div>
                </li>';
              $recorre++;
            }*/
                                ?>
                            </ul>
                        </div>
                    </div>




                </div>
                <div id="mensaje_content" class="col-xl-8 col-lg-10 col-md-10">
                    <div class="card">
                        <input type="hidden" id="interlocutor" value="<?php echo $ultimo_msg; ?>">
                        <div class="card-header">Estado de Cuenta $<span id="estadocuenta">0.00</span></div>
                        <div class="card-body height3">
                            <div class="list_articles add_bottom_25 clearfix">
                                <ul>
      
                                    
                                      <
                                      ?php
                                    $mi_id = $_SESSION['perfil']['userid'];
                                    $sql_pagos = "SELECT * FROM `pagos` inner join planes on planes.id_plan = pagos.plan_pagos
                                        where cliente_pagos = $mi_id AND link_pagos !='' and idMP_pagos !='' order by id_pagos desc";
                                    $resp_pagos = $link->query($sql_pagos);
                                    $acumula_estado = 0;
                                    while ($pag = mysqli_fetch_assoc($resp_pagos)) {
                                        echo '<li>$' . $pag['monto_pagos'] . ' <a href="' . $pag['link_pagos'] . '" target="_blank" style="color: #000;"><i class="icon_documents_alt"></i>' . $pag['nombre_plan'] . ' - ' . $pag['periodo_pagos'] . '</a> || ';
                                        if ($pag['estado_pagos'] == 2) {
                                            echo 'ABONADO';
                                        }
                                        if ($pag['estado_pagos'] == 1) {
                                            echo 'PENDIENTE';
                                            $acumula_estado = $acumula_estado + $pag['monto_pagos'];
                                        }
                                        if ($pag['estado_pagos'] == 0) {
                                            echo 'CANCELADO';
                                        }
                                        '</li>';
                                    } ?> 
 -->


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- /container -->


    </main>

<?php

} else {
    echo '<br><br><br><br><center><h3>Necesita ingresar a su perfil</h3></center><br><br>';
} ?>
<!-- /main -->
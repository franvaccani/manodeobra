<link href="assets/css/booking-sign_up.css" rel="stylesheet">
  <main class="bg_gray pattern" style="transform: none; padding-top: 50px;">

		<div class="container margin_60_40">
		    <div class="row justify-content-center">
		        <div class="col-lg-4">


                      <div class="box_booking_2">
                            <div class="head">
                                <div class="title">
                                  <?php if($_GET['id']==1){echo '<h3>Plan Gratuito</h3>';} ?>
                                  <?php if($_GET['id']==2){echo '<h3>Plan Basico</h3>';} ?>
                                  <?php if($_GET['id']==3){echo '<h3>Plan Avanzado</h3>';} ?>
                                  <input type="hidden" id="plan_id" value="<?php echo $_GET['id'] ?>">

                            <!--    txt adicional - <a href="#" target="blank">ver link</a> -->
                            </div>
                            </div>
                            <!-- /head -->
                            <div class="main">
                              <h6>Complete el formulario</h6>
                              <div class="form-group">
                              <input class="form-control" id="plan_nombre" placeholder="Ingrese el Nombre" value="<?php echo $_SESSION['perfil']['nombre'] ?>" require>
                              <i class="icon_pencil"></i>
                            </div>
                             <div class="form-group">
                             <input class="form-control" id="plan_apellido" placeholder="Ingrese el Apellido" value="<?php echo $_SESSION['perfil']['apellido'] ?>" require>
                             <i class="icon_pencil"></i>
                           </div>
                           <div class="form-group">
                             <label for="plan_nombre">Telefono</label>
                             <input class="form-control" id="plan_telefono" placeholder="Ingrese su Telefono" value="<?php echo $_SESSION['perfil']['telefono'] ?>" require>
                           </div>
                           <div class="form-group">
                             <label for="plan_nombre">Provincia</label>
                                <select class="form-control" id="plan_provincia" onchange="cambia_prov()" require>
                                    <option disabled selected>Seleccione una provincia</option>
                                </select>
                           </div>
                           <div class="form-group">
                             <label for="plan_nombre">Localidad</label>
                              <select class="form-control" id="plan_localidad" require ><option disabled selected>Seleccione una localidad</option></select>
                           </div>
                           <div class="form-group">
                             <label for="plan_nombre">Calle</label>
                             <input class="form-control" id="plan_calle" placeholder="Ingrese la calle" value="<?php echo $_SESSION['perfil']['direccion_calle'] ?>" require> 
                           </div>
                           <div class="form-group">
                             <label for="plan_nombre">Numero Calle</label>
                             <input class="form-control" id="plan_numero" placeholder="Ingrese el numero" value="<?php echo $_SESSION['perfil']['direccion_calle_num']?>" require>
                           </div>
                            <?php
                            if($_GET['id']==1){echo '
                              <h6>Incluye</h6>
                              <ul>
                                <li>Mensajeria interna
                                  <span class="pricing-item">
                                    <i class="fas fa-check"></i>
                                  </span></li>
                                <li>Publicaciones Ilimitadas
                                  <span class="pricing-item">
                                    <i class="fas fa-check"></i>
                                  </span>
                                </li>
                                <li>Solicitud de Presupuestos Ilimitadas
                                  <span class="pricing-item">
                                    <i class="fas fa-check"></i>
                                  </span></li>
                                <li>Publicaciones destacadas
                                  <span class="pricing-item desactivado">
                                    <i class="fas fa-times"></i>
                                </span></li>
                                <li>Promocion de Publicaciones
                                  <span class="pricing-item desactivado">
                                  <i class="fas fa-times"></i>
                                </span></li>
                              </ul>
                              <hr>
                              <h6>Precio</h6>
                              <div class="pricing-price">
                                <div>$0</div>
                              </div>
           		                <a href="#" onclick="confirma_plan(1)" class="btn_1 full-width mb_5">Confirmar Plan</a>

                              ';}
                              if($_GET['id']==2){echo '
                                <h6>Incluye</h6>
                                <ul>
                                  <li>Mensajeria interna
                                    <span class="pricing-item">
                                      <i class="fas fa-check"></i>
                                    </span></li>
                                  <li>Publicaciones ilimitadas
                                    <span class="pricing-item">
                                      <i class="fas fa-check"></i>
                                    </span></li>
                                  <li>Solicitud de Presupuestos ilimitadas
                                    <span class="pricing-item">
                                      <i class="fas fa-check"></i>
                                    </span></li>
                                  <li>2 Publicaciones destacadas
                                    <span class="pricing-item">
                                    <i class="fas fa-check"></i>
                                  </span></li>
                                  <li>5 Promociones de Publicaciones
                                    <span class="pricing-item">
                                    <i class="fas fa-check"></i>
                                  </span></li>

                                </ul>
                                <hr>
                                <h6>Precio</h6>
                                <div class="pricing-price">
                                  <div>$300</div>
                                  <div class="pricing-pricesmall">Mensual</div>
                                </div>
                                 <a href="#" onclick="confirma_plan(2)" class="btn_1 full-width mb_5">Confirmar Plan</a>
                                ';}
                                if($_GET['id']==3){echo '
                                  <h6>Incluye</h6>
                                  <ul>
                                    <li>Mensajeria interna
                                      <span class="pricing-item">
                                        <i class="fas fa-check"></i>
                                      </span>
                                    </li>
                                    <li>Publicaciones Ilimitadas
                                      <span class="pricing-item">
                                        <i class="fas fa-check"></i>
                                      </span></li>
                                    <li>Solicitud de Presupuestos Ilimitadas
                                      <span class="pricing-item">
                                        <i class="fas fa-check"></i>
                                      </span></li>
                                    <li>5 Publicaciones destacadas
                                      <span class="pricing-item">
                                      <i class="fas fa-check"></i>
                                    </span></li>
                                    <li>10 Promociones de Publicaciones
                                      <span class="pricing-item">
                                      <i class="fas fa-check"></i>
                                    </span></li>

                                  </ul>
                                  <hr>
                                  <h6>Precio</h6>
                                  <div class="pricing-price">
                                    <div>$500</div>
                                    <div class="pricing-pricesmall">Mensual</div>
                                  </div>
               		                <a href="#" onclick="confirma_plan(3)" class="btn_1 full-width mb_5">Confirmar Plan</a>

                                  ';}
                              ?>


		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>
		        <!-- /col -->

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!-- /main -->

<script>

function confirma_plan(plan){

  var plan_nombre = $('#plan_nombre').val();
  var plan_apellido = $('#plan_apellido').val();
  var plan_telefono = $('#plan_telefono').val();
  var plan_provincia = $('#plan_provincia').val();
  var plan_localidad = $('#plan_localidad').val();
  var plan_calle = $('#plan_calle').val();
  var plan_numero = $('#plan_numero').val();
  var plan_periodo = $('#plan_periodo').val();
  var plan_id = $('#plan_id').val();

  if(plan_nombre !== "" && plan_apellido !== "" && plan_telefono !== "" && plan_provincia !== "" && plan_localidad !== "" && plan_calle !== "" && plan_numero !== "" && plan_periodo !== "" && plan_id !== "" ){
    var string = 'plan_nombre='+plan_nombre+'&plan_apellido='+plan_apellido+'&plan_telefono='+plan_telefono+'&plan_provincia='+plan_provincia+'&plan_localidad='+plan_localidad+'&plan_calle='+plan_calle+'&plan_numero='+plan_numero+'&plan_periodo='+plan_periodo+'&plan_id='+plan_id;
    $.ajax(
        {
        url: "assets/php/link_mp.php",
        data: string,
        type: "POST",
        success: function(data){
            if(data!='false'){
                window.open(data,"popup","width=700,height=900,scrollbars=SI")
                window.location='index.php?pagina=perfil';
            }else{
            alert('error al generar cupon de pago');
            }
        }
        })
  }else{
    alert("Ingrese todos los datos!")
  }

  

}
</script>

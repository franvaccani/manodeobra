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
 <main class="bg_gray pattern">

 		<div class="container margin_60_40 margin_mobile">
 		    <div class="row justify-content-center">

     <div class="col-lg-4">
 		        	<div class="box_booking_2">
 		                <div class="head">
 		                    <div class="title">
 		                    <h3>Plan Gratuito</h3>
 		                <!--    txt adicional - <a href="#" target="blank">ver link</a> -->
 		                </div>
 		                </div>
 		                <!-- /head -->
 		                <div class="main">
                      <h6>Incluye</h6>
                      <ul>
                        <li>Mensajeria interna
                          <span class="pricing-item">
                            <i class="fas fa-check"></i>
                          </span></li>
                        <li>10 (diez) Publicaciones mensuales
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
                        <!--  <div class="pricing-pricesmall">Mensual</div> -->
                      </div>
                      <?php if($_SESSION['perfil']['plan']==1){
                        echo '<a href="#" class="btn_1 full-width mb_5" style="background-color:#fba50d">Plan Actual</a>';
                      }else{
                        echo '<a href="index.php?pagina=planes&id=1" class="btn_1 full-width mb_5">Activar</a>';
                      }
                        ?>


 		                   <div class="text-center"><small>-</small></div>
 		                </div>
 		            </div>
 		            <!-- /box_booking -->
 		        </div><div class="col-lg-4">
 		        	<div class="box_booking_2">
 		                <div class="head">
 		                    <div class="title">
 		                    <h3>Plan Basico</h3>
 		                    <!--    txt adicional - <a href="#" target="blank">ver link</a> -->
 		                </div>
 		                </div>
 		                <!-- /head -->
 		                <div class="main">
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
                        <!--  <div class="pricing-pricesmall">Mensual</div> -->
                      </div>
                      <?php 
                        if($_SESSION['perfil']['plan']==2){
                            echo '<a href="#" class="btn_1 full-width mb_5" style="background-color:#fba50d">Plan Actual</a>';
                        }else{
                            echo '<a href="index.php?pagina=planes&id=2" class="btn_1 full-width mb_5">Activar</a>';
                        }
                        ?>
 		                   <div class="text-center"><small>Costo Mensual</small></div>
 		                </div>
 		            </div>
 		            <!-- /box_booking -->
 		        </div>
 		        <div class="col-lg-4">
 		        	<div class="box_booking_2">
 		                <div class="head">
 		                    <div class="title">
 		                    <h3>Plan Avanzado</h3>
 		                    <!--    txt adicional - <a href="#" target="blank">ver link</a> -->
 		                </div>
 		                </div>
 		                <!-- /head -->
 		                <div class="main">
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
                      <!--  <div class="pricing-pricesmall">Mensual</div> -->
                      </div>
                      <?php if($_SESSION['perfil']['plan']==3){
                        echo '<a href="#" class="btn_1 full-width mb_5" style="background-color:#fba50d">Plan Actual</a>';
                      }else{
                        echo '<a href="index.php?pagina=planes&id=3" class="btn_1 full-width mb_5">Activar</a>';
                      }
                        ?>
 		                   <div class="text-center"><small>Costo Mensual</small></div>
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

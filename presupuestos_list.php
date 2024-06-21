<?php
  if($_SESSION['autenticado']=='SI'){
$filtros='';
$filtrando='';
$userid= $_SESSION['perfil']['userid'];
$consultacompleta = "SELECT *, (SELECT CONCAT (ciudad_nombre,', ',provincia_nombre) FROM ciudad INNER JOIN provincia on provincia_id = id_provincia WHERE id_ciudad = localidad_presupuesto ) as localidad FROM presupuestos
INNER JOIN categorias on categorias.id_categoria = presupuestos.rubro_presupuesto and estado_categoria = 1
WHERE estado_presupuesto = 1  ";
$sql_ofer = $link->query($consultacompleta);
$cantidad_consulta = mysqli_num_rows($sql_ofer);

 ?>
  <main style="transform: none; padding-top: 50px;">
    		<div class="hero_single inner_pages background-image" data-background="url(assets/img/bg_ofertas.jpg)" style="background-image: url(&quot;assets/img/bg_ofertas.jpg&quot;);height: 180px;">
    			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)" style="background-color: rgba(0, 0, 0, 0.4);">
    				<div class="container">
    					<div class="row justify-content-center">
    						<div class="col-xl-9 col-lg-10 col-md-8">
    							<h1>Lista de Presupuestos</h1>
    							<p>Explore los presupuestos solicitado por los usuarios.</p>
    						</div>
    					</div>
    					<!-- /row -->
    				</div>
    			</div>
    		</div>
    		<!-- /hero_single -->

    		<div class="container margin_60_30">
            
    			<div class="row">
          <?php
          while($row = mysqli_fetch_array($sql_ofer)){
            if($row['foto_presupuesto']==NULL){
              $foto_presupuesto='categorias/'.$row['imagen_categoria'];
            }else{
                  $foto_presupuesto='presu/'.$row['foto_presupuesto'];
            }
            echo'	<div id="ofer_'.$row['id_oferta'].'" class="col-xl-4 col-lg-6 col-md-6">
      					 <div class="strip">
      			            <figure>';
                        if($row['tipo_promocion']=='1'){echo '<span class="ribbon off">-'.$row['valor_promocion'].'%</span>';}
                        if($row['tipo_promocion']=='2'){echo '<span class="ribbon off">-$'.$row['valor_promocion'].'</span>';}
                  echo '<img src="assets/img/'.$foto_presupuesto.'" data-src="assets/img/'.$foto_presupuesto.'" class="img-fluid lazy loaded" alt="" data-was-processed="true">
                          <a href="index.php?pagina=detalle&id='.$row['id_oferta'].'" class="strip_info">
                              <small>'.$row['nombre_categoria'].'</small>
                              <div class="item_title">
                                  <h3><i class="arrow_carrot-right"></i>  '.$row['titulo_presupuesto'].'</h3>
                                  <small><i class="icon_pin"></i>  '.$row['localidad'].'</small>
                              </div>
                          </a>
      			            </figure>
      			            <ul>
                            <li><a href="javascript:void(0)" onclick="pasaiddel('.$row['id_oferta'].')" class="btn wish_bt"><i class="icon_pencil-edit_alt"></i> Editar</a></li>
      			                <li><a href="javascript:void(0)" onclick="pasaedit('.$row['id_oferta'].')" class="btn wish_bt"><i class="icon_trash_alt"></i> Eliminar</a></li>
                            <li><div class="score">';
														if($row['canticalif']==0){
															echo '<span><em>Sin Calificaciones</em></span><strong>-</strong></div>';
														}else{
															echo '<span>Muy Bueno<em>'.$row['canticalif'].' Calificaciones</em></span><strong>'.$row['promedio'].'</strong></div>';
														}
									        echo '</li>
      			            </ul>
      			        </div>
      				</div>
      				<!-- /box_grid -->';
          }
          if($cantidad_consulta == 0){
          echo '<center style="width: 100%;"><h4>Aun no le han solicitado presupuestos</h4></center> ';
          }
          ?>

    			</div>

    		</div>
    		<!-- /container -->


	</main>
<?php } else {echo '<br><br><br><br><center><h3>Necesita ingresar a su perfil</h3></center><br><br>';} ?>
	<!-- /main -->

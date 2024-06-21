<?php
  if($_SESSION['autenticado']=='SI'){
$filtros='';
$filtrando='';
$userid= $_SESSION['perfil']['userid'];
$consultacompleta = "SELECT *, (SELECT CONCAT (ciudad_nombre,', ',provincia_nombre) FROM ciudad INNER JOIN provincia on provincia_id = id_provincia WHERE id_ciudad = localidad_presupuesto ) as localidad FROM presupuestos
INNER JOIN categorias on categorias.id_categoria = presupuestos.rubro_presupuesto and estado_categoria = 1
LEFT JOIN presupuestos_imagenes on id_imgpresu = presupuestos.foto_presupuesto
WHERE estado_presupuesto = 1 and user_presupuesto = '$userid'";
$sql_presu = $link->query($consultacompleta);
$cantidad_consulta = mysqli_num_rows($sql_presu);

 ?>
  <main style="transform: none; padding-top: 50px;">
  <div class="container-parallax2">
					<div class="TituloParallax">
						<h1>Mis presupuestos</h1>
					</div>
			</div>
    		<!-- /hero_single -->

    		<div class="container margin_60_30">
            <center><a href="javascript:void(0)" onclick="add_presupuesto()" class="btn_1">+ Presupuesto</a></center><br>
    			<div class="row">
          <?php
          while($row = mysqli_fetch_array($sql_presu)){
            if($row['foto_presupuesto']==NULL){
              $foto_presupuesto='assets/img/categorias/'.$row['imagen_categoria'];
            }else{
                  $foto_presupuesto=$row['url_imgpresu'];
            }
            echo'	<div id="ofer_'.$row['id_oferta'].'" class="col-xl-4 col-lg-6 col-md-6">
      					 <div class="strip">
      			            <figure>';
                        if($row['tipo_promocion']=='1'){echo '<span class="ribbon off">-'.$row['valor_promocion'].'%</span>';}
                        if($row['tipo_promocion']=='2'){echo '<span class="ribbon off">-$'.$row['valor_promocion'].'</span>';}
                  echo '<img src="'.$foto_presupuesto.'" data-src="'.$foto_presupuesto.'" class="img-fluid lazy loaded" alt="" data-was-processed="true">
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

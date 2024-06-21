<?php
  if($_SESSION['autenticado']=='SI'){
$filtros='';
$filtrando='';
$userid= $_SESSION['perfil']['userid'];
$consultacompleta = "SELECT * , AVG(puntaje_calificacion) as promedio ,(select count(id_calificacion)
  FROM calificaciones
  WHERE oferta_calificacion = ofertas.id_oferta) as canticalif
FROM `ofertas`
INNER JOIN categorias on categorias.id_categoria = ofertas.categoria_oferta and estado_categoria = 1
LEFT JOIN ofertas_imagenes on id_imgoferta = ofertas.foto_oferta
LEFT JOIN promociones on promociones.oferta_promocion = ofertas.id_oferta and estado_promocion = 1 and desde_promocion <= NOW() and hasta_promocion >= NOW() LEFT JOIN calificaciones on calificaciones.oferta_calificacion = ofertas.id_oferta and estado_calificacion = 1
WHERE estado_oferta = 1 and pretador_oferta = $userid $filtrando group by id_oferta; ";
$sql_ofer = $link->query($consultacompleta);
$cantidad_consulta = mysqli_num_rows($sql_ofer);

 ?>
 <style>
 .ui-autocomplete{
   z-index: 9999;
 }
 </style>
  <main style="transform: none; padding-top: 50px;">
    		<div class="container-parallax">
					<div class="TituloParallax">
						<h1>Mis publicaciones</h1>
					</div>
			</div>
    		<!-- /hero_single -->

    		<div class="container margin_60_30">
          <center><a href="javascript:void(0)" onclick="add_oferta()" class="btn_1">+ Publicacion</a></center><br>
    			<div class="row">
          <?php
          while($row = mysqli_fetch_array($sql_ofer)){
            echo'	<div id="ofer_'.$row['id_oferta'].'" class="col-xl-4 col-lg-6 col-md-6">
      					 <div class="strip">
      			            <figure>';
                        if($row['tipo_promocion']=='1'){echo '<span class="ribbon off">-'.$row['valor_promocion'].'%</span>';}
                        if($row['tipo_promocion']=='2'){echo '<span class="ribbon off">-$'.$row['valor_promocion'].'</span>';}
                  echo '<img src="'.$row['url_imgoferta'].'" data-src="'.$row['url_imgoferta'].'" class="img-fluid lazy loaded" alt="" data-was-processed="true">
                          <a href="index.php?pagina=detalle&id='.$row['id_oferta'].'" class="strip_info">
                              <small>'.$row['nombre_categoria'].'</small>
                              <div class="item_title">
                                  <h3>'.$row['titulo_oferta'].'</h3>
                                  <small>'.$row['slogan_oferta'].'</small>
                              </div>
                          </a>
      			            </figure>
      			            <ul>
                            <li><a href="javascript:void(0)" onclick="edita_oferta('.$row['id_oferta'].')" class="btn wish_bt"><i class="icon_pencil-edit_alt"></i> Editar</a></li>
      			                <li><a href="javascript:void(0)" onclick="pasaiddel('.$row['id_oferta'].')" class="btn wish_bt"><i class="icon_trash_alt"></i> Eliminar</a></li>
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
          ?>

    			</div>

    		</div>
    		<!-- /container -->


	</main>
<?php } else {echo  'class="paddingN" <br><br><br><br><center><h3>Necesita ingresar a su perfil</h3></center><br><br>';} ?>
	<!-- /main -->

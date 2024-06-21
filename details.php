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
  <main style="transform: none; padding-top: 100px;">

		<div class="container margin_detail" style="transform: none; overflow:hidden;">
		    <div class="row" style="transform: none;">
		        <div class="col-lg-8">
		            <div style="margin-bottom: 50px;margin-top: 10px;" class="detail_page_head clearfix">
		                <div class="breadcrumbs">
		                    <ul style="margin-top: 30px;">
		                        <li><a href="#">Inicio</a></li>
		                        <li><a href="index.php?pagina=buscador&p=1&cat=<?php echo $oferta['id_categoria']?>"><?php echo $oferta['nombre_categoria']; ?></a></li>
		                        <li><?php echo strtolower(str_replace(' ','_',$oferta['titulo_oferta']));?></li>
		                    </ul>
		                </div>
						<div class="title">
						<?php
							// Dirección almacenada en $oferta['zona']
							$direccion = $oferta['zona'];

							// URL de Google Maps con la dirección como parámetro
							$url_maps = "https://www.google.com/maps?q=" . urlencode($direccion);
						?>
		                    <h1><?php echo $oferta['titulo_oferta'];?><?php if($oferta['pretador_oferta']==$_SESSION['perfil']['userid']){echo '&nbsp;&nbsp;<i onclick="edita_oferta('.$oferta['id_oferta'].')" class="btn_1 icon_pencil-edit  btn-edita-publicacion"></i>';}?></h1>
		                    <?php echo $oferta['zona'];?> - 	<button class="buttonMap"; ><i style=" " class="fa-solid fa-map-location-dot"></i>
							<a href="<?php echo $url_maps; ?>"target="_blank">Ver en Google Maps</a>		</button> 	
							
						
		                  
		                </div>
						<!--
		                <div class="rating">
		                    <div class="score"></div>
		                </div>
-->
		            </div>
		            <!-- /detail_page_head -->

		            <div class="owl-carousel owl-theme carousel_1 magnific-gallery owl-loaded owl-drag">
                  <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-1646px, 0px, 0px); transition: all 0.25s ease 0s;">
                  <?php
                  $sql_img= "SELECT * FROM `ofertas_imagenes` WHERE `estado_imgoferta` = 1 AND `oferta_imgoferta` = $tomo_id ORDER BY `url_imgoferta` ASC";
                  $consulta_img = $link->query($sql_img);
                  $im=0;
                  while($img = mysqli_fetch_assoc($consulta_img)){
                    echo '
                    <div class="owl-item" style="width: 823.328px;">
                      <div class="item">
		                    <a href="'.$img['url_imgoferta'].'" title="'.$oferta['titulo_oferta'].'" data-effect="mfp-zoom-in">
                          <img src="'.$img['url_imgoferta'].'" alt="'.$oferta['titulo_oferta'].'" onerror="this.onerror=null;this.src=\'https://i.ebayimg.com/images/g/AFoAAOSw5e5cbgL6/s-l400.jpg\';">
                        </a>
		                  </div>
                    </div>
                    ';
                    if($im==0){
                      echo "<script>
                        var link_img = document.createElement('meta');
                        link_img.setAttribute('property', 'og:image');
                        link_img.content = '//desarrollo.manodeobra.ar/".$img['url_imgoferta']."'; //document.location;
                        document.getElementsByTagName('head')[0].appendChild(link_img);
                      </script>";
                    }
                  $im++;
                }
                ?>
                </div>
              </div>
          </div>
		            <!-- /carousel -->

		            <div class="tabs_detail">
					<ul class="share-buttons" style="margin-bottom : 60px;">
		                <li><a class="fb-share" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2F%2Emanodeobra%2Ear%2Findex.php%3Fpagina%3Ddetalle%26id%3D<?php echo $tomo_id; ?>" target="_blank"><i class="social_facebook"></i> Compartir</a></li>
		                <li><a class="whatsapp-share" href="https://api.whatsapp.com/send?text=Link:%20https%3A%2F%2F%2Emanodeobra%2Ear%2Findex.php%3Fpagina%3Ddetalle%26id%3D<?php echo $tomo_id; ?>"><i class="fab fa-whatsapp"></i> Compartir</a></li>
		            </ul>
		                <ul class="nav nav-tabs" role="tablist">
		                    <li class="nav-item">
		                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Información</a>
		                    </li>
		                    <li class="nav-item">
		                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Calificaciones</a>
		                    </li>
		                </ul>

		                <div class="tab-content" role="tablist">
		                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
		                        <div class="card-header" role="tab" id="heading-A">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
		                                    Informacion
		                                </a>
		                            </h5>
		                        </div>
		                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
		                            <div class="card-body info_content">
		                                <h2 style="font-size: 2rem;">Información del servicio:</h2>
                                    <?php echo $oferta['detalle_oferta'];?>
                                    <script>

                                      var link_titulo = document.createElement('meta');
                                      link_titulo.setAttribute('property', 'og:title');
                                      link_titulo.content = '<?php echo preg_replace( "/[\r\n|\n|\r]+/", "", $oferta['titulo_oferta'] );?>';
                                      document.getElementsByTagName('head')[0].appendChild(link_titulo);

                                      var link_descripcion = document.createElement('meta');
                                      link_descripcion.setAttribute('property', 'og:description');
                                      link_descripcion.content = '<?php echo preg_replace( "/[\r\n|\n|\r]+/", "", $oferta['detalle_oferta']);?>';
                                      document.getElementsByTagName('head')[0].appendChild(link_descripcion);
                                    </script>
		                               <!-- <h3>Starters</h3>
		                                <div class="menu_item">
		                                    <em>€9.90</em>
		                                    <h4>Imported Salmon Steak</h4>
		                                    <p>Base de arroz, aguacate, salmón noruego, semillas de sésamo, edamame, wakame y soja light</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€7.90</em>
		                                    <h4>Poke bol</h4>
		                                    <p>Queso de cabra light, dátiles, jamón serrano y rúcula</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€8.90</em>
		                                    <h4>Ensalada cesar</h4>
		                                    <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                </div>
		                                <hr>
		                                <h3>Main Course</h3>
		                                <div class="menu_item">
		                                    <em>€15.90</em>
		                                    <h4>Oriental</h4>
		                                    <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€11.90</em>
		                                    <h4>Vegan Burguer</h4>
		                                    <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€10.90</em>
		                                    <h4>Indio Fit</h4>
		                                    <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                </div>
		                                <div class="content_more" style="display: none;">
		                                    <div class="menu_item">
		                                        <em>€15.90</em>
		                                        <h4>Oriental</h4>
		                                        <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€11.90</em>
		                                        <h4>Vegan Burguer</h4>
		                                        <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€10.90</em>
		                                        <h4>Indio Fit</h4>
		                                        <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                    </div>
		                                </div>

		                                <a href="#0" class="show_hide" data-content="toggle-text">Read More</a>
		                                <hr>
		                                <h3>Dessert</h3>
		                                <div class="menu_item">
		                                    <em>€15.90</em>
		                                    <h4>Oriental</h4>
		                                    <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€11.90</em>
		                                    <h4>Vegan Burguer</h4>
		                                    <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                </div>
		                                <div class="menu_item">
		                                    <em>€10.90</em>
		                                    <h4>Indio Fit</h4>
		                                    <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                </div>
		                                <div class="content_more" style="display: none;">
		                                    <div class="menu_item">
		                                        <em>€15.90</em>
		                                        <h4>Oriental</h4>
		                                        <p>Cama de tabule con taquitos de pollo a la mostaza light</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€11.90</em>
		                                        <h4>Vegan Burguer</h4>
		                                        <p>Medio pollo asado acompañado de arroz o patatas al toque masala</p>
		                                    </div>
		                                    <div class="menu_item">
		                                        <em>€10.90</em>
		                                        <h4>Indio Fit</h4>
		                                        <p>lechuga, tomate, espinacas, pollo asado, picatostes, queso proteínico y salsa césar 0%</p>
		                                    </div>
		                                </div>

		                                <a href="#0" class="show_hide" data-content="toggle-text">Read More</a>
                                    -->
		                                <div class="add_bottom_45"></div>
                                    <!--
		                                <h2>Trabajos Realizados</h2>
		                                <div class="pictures magnific-gallery clearfix">
		                                    <figure><a href="assets/img/detail_1.jpg" title="Photo title" data-effect="mfp-zoom-in"><img src="assets/img/thumb_detail_1.jpg" data-src="assets/img/thumb_detail_1.jpg" class="lazy loaded" alt="" data-was-processed="true"></a></figure>
		                                    <figure><a href="assets/img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"><img src="assets/img/thumb_detail_2.jpg" data-src="assets/img/thumb_detail_2.jpg" class="lazy loaded" alt="" data-was-processed="true"></a></figure>
		                                    <figure><a href="assets/img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"><img src="assets/img/thumb_detail_3.jpg" data-src="assets/img/thumb_detail_3.jpg" class="lazy loaded" alt="" data-was-processed="true"></a></figure>
		                                    <figure><a href="assets/img/detail_4.jpg" title="Photo title" data-effect="mfp-zoom-in"><img src="assets/img/thumb_detail_4.jpg" data-src="assets/img/thumb_detail_4.jpg" class="lazy loaded" alt="" data-was-processed="true"></a></figure>
		                                    <figure><a href="assets/img/detail_5.jpg" title="Photo title" data-effect="mfp-zoom-in"><span class="d-flex align-items-center justify-content-center">+10</span><img src="assets/img/thumb_detail_5.jpg" data-src="assets/img/thumb_detail_5.jpg" class="lazy loaded" alt="" data-was-processed="true"></a></figure>
		                                </div>
		                                 /pictures -->

                                     <?php
                                     $ahora = date('Y-m-d H:i:s');
                                     $sql_promo= "SELECT * FROM `promociones` WHERE `oferta_promocion` = $tomo_id and `desde_promocion` <= '$ahora' and hasta_promocion >= '$ahora' and estado_promocion= 1";
                                     $consulta_promo = $link->query($sql_promo);

                                     if($prom = mysqli_fetch_assoc($consulta_promo)){
                                       if($prom['tipo_promocion']=='1'){
                                         $tipo = '%';
                                       }else{
                                         $tipo = '$';
                                       }
                                     echo '
		                                <div class="special_offers add_bottom_45">
		                                    <h2>PROMOCIONES</h2>
		                                    <div class="menu_item">
		                                        <em>'.$tipo.' '.$prom['valor_promocion'].' OFF</em>
		                                        <h4>'.$prom['titulo_promocion'].'</h4>
		                                        <p>'.$prom['detalle_promocion'].'</p>
		                                    </div>

		                                </div>
		                                <!-- /special_offers -->
                                    ';
                                       };
                                 ?>

		                                <div class="other_info" style="display:none">
		                                <h2>How to get to Pizzeria Alfredo</h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		<h3>Address</h3>
		                                		<p>27 Old Gloucester St, 4530<br><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="blank"><strong>Ver Ubicacion</strong></a></p>
		                                		<strong>Follow Us</strong><br>
		                                		<p class="follow_us_detail">
                                          <a href="#0"><i class="social_facebook_square"></i></a>
                                          <a href="#0"><i class="social_instagram_square"></i></a>
                                          <a href="#0"><i class="social_twitter_square"></i></a>
                                        </p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Opening Time</h3>
		                                		<p><strong>Lunch</strong><br> Mon. to Sat. 11.00am - 3.00pm</p><p>
		                                		</p><p><strong>Dinner</strong><br> Mon. to Sat. 6.00pm- 1.00am</p>
		                                		<p><span class="loc_closed">Sunday Closed</span></p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Services</h3>
		                                		<p><strong>Credit Cards</strong><br> Mastercard, Visa, Amex</p>
		                                		<p><strong>Other</strong><br> Wifi, Parking, Wheelchair Accessible</p>
		                                	</div>
		                                </div>
		                                <!-- /row -->
		                            	</div>
		                            </div>
		                        </div>
		                    </div>
		                    <!-- /tab -->

		                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
		                        <div class="card-header" role="tab" id="heading-B">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
		                                    Calificaciones
		                                </a>
		                            </h5>
		                        </div>
                            <?php
                            $sql_calif_gral = "SELECT AVG(puntaje_calificacion) as progeneral, count(id_calificacion) as cantidad, AVG(`respon_calificacion`) as responsabilidad, AVG(`horario_calificacion`) as horarios, AVG(`plazo_calificacion`) as plazos, AVG(`prol_calificacion`) as limpieza, AVG(`modale_calificacion`) as modales, AVG(`calidad_calificacion`) as precio FROM `calificaciones` INNER JOIN usuarios on usuarios.id_usuario = calificaciones.prestador_calificacion WHERE estado_calificacion = 1 and oferta_calificacion = $tomo_id ";

                            // echo $sql_calif_gral;

                            $grlcalif = $link->query($sql_calif_gral);
                            $cantidad_calif=0;
                            $progeneral_calif=0;
                            $str_calif='Sin Calificar';
                            if($con_grlcalif = mysqli_fetch_assoc($grlcalif)){
                              $cantidad_calif= $con_grlcalif['cantidad'];
                              $progeneral_calif=$con_grlcalif['progeneral'];

                              if(is_float($con_grlcalif['responsabilidad']+0)){
                                  $responsabilidad = str_replace('.','',$con_grlcalif['responsabilidad']);
                                  $responsabilidad_muestra = $con_grlcalif['responsabilidad'];
                              }else{
                                  $responsabilidad = $con_grlcalif['responsabilidad'];
                                  $responsabilidad_muestra = $con_grlcalif['responsabilidad'].'.0';
                              }
                              if(strlen($responsabilidad) == 1){$responsabilidad_porc = $responsabilidad.'0';}
                              if(strlen($responsabilidad) > 1 ){$responsabilidad_porc = $responsabilidad;}

                              if(is_float($con_grlcalif['horarios']+0)){
                                  $horarios = str_replace('.','',$con_grlcalif['horarios']);
                                  $horarios_muestra = $con_grlcalif['horarios'];
                              }else{
                                  $horarios = $con_grlcalif['horarios'];
                                  $horarios_muestra = $con_grlcalif['horarios'].'.0';
                              }
                              if(strlen($horarios) == 1){$horarios_porc = $horarios.'0';}
                              if(strlen($horarios) > 1 ){$horarios_porc = $horarios;}

                              if(is_float($con_grlcalif['plazos']+0)){
                                  $plazos = str_replace('.','',$con_grlcalif['plazos']);
                                  $plazos_muestra = $con_grlcalif['plazos'];

                              }else{
                                  $plazos = $con_grlcalif['plazos'];
                                  $plazos_muestra = $con_grlcalif['plazos'].'.0';
                              }
                              if(strlen($plazos) == 1){$plazos_porc = $plazos.'0';}
                              if(strlen($plazos) > 1 ){$plazos_porc = $plazos;}

                              if(is_float($con_grlcalif['limpieza']+0)){
                                  $limpieza = str_replace('.','',$con_grlcalif['limpieza']);
                                  $limpieza_muestra = $con_grlcalif['limpieza'];
                              }else{
                                  $limpieza = $con_grlcalif['limpieza'];
                                  $limpieza_muestra = $con_grlcalif['limpieza'].'.0';
                              }
                              if(strlen($limpieza) == 1){$limpieza_porc = $limpieza.'0';}
                              if(strlen($limpieza) > 1 ){$limpieza_porc = $limpieza;}

                              if(is_float($con_grlcalif['modales']+0)){
                                  $modales = str_replace('.','',$con_grlcalif['modales']);
                                  $modales_muestra = $con_grlcalif['modales'];
                              }else{
                                  $modales = $con_grlcalif['modales'];
                                  $modales_muestra = $con_grlcalif['modales'].'.0';
                              }
                              if(strlen($modales) == 1){$modales_porc = $modales.'0';}
                              if(strlen($modales) > 1 ){$modales_porc = $modales;}

                              if(is_float($con_grlcalif['precio']+0)){
                                  $precio = str_replace('.','',$con_grlcalif['precio']);
                                  $precio_muestra = $con_grlcalif['precio'];
                              }else{
                                  $precio = $con_grlcalif['precio'];
                                  $precio_muestra = $con_grlcalif['precio'].'.0';
                              }
                              if(strlen($precio) == 1){$precio_porc = $precio.'0';}
                              if(strlen($precio) > 1 ){$precio_porc = $precio;}

                            }else{
                              $responsabilidad='0';
                              $horarios='0';
                              $plazos='0';
                              $limpieza='0';
                              $modales='0';
                              $precio='0';
                            };
                            if($progeneral_calif < 10 && $progeneral_calif !=0){$str_calif='Muy Bueno';}
                            if($progeneral_calif < 7 && $progeneral_calif !=0){$str_calif='Bueno';}
                            if($progeneral_calif < 5 && $progeneral_calif !=0){$str_calif='Regular';}
                             ?>
		                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
		                            <div class="card-body reviews">
		                                <div class="row add_bottom_45 d-flex align-items-center">
		                                    <div class="col-md-3">
		                                        <div id="review_summary">
		                                            <strong> <?php echo $progeneral_calif ?></strong>
		                                            <em><?php echo $str_calif ?></em>
                                                <?php
                                                if($progeneral_calif !=0){
                                                  echo '<small>Basado en '.$cantidad_calif.' calificaciones</small>';
                                                }
                                                 ?>

		                                        </div>
		                                    </div>
		                                    <div class="col-md-9 reviews_sum_details">
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <h6>Responsabilidad</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $responsabilidad_porc;?>%" aria-valuenow="<?php echo $responsabilidad_porc;?>" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong><?php  echo $responsabilidad_muestra?></strong></div>
		                                                </div>
		                                                <!-- /row -->
		                                                <h6>Respeto de Horarios</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $horarios_porc;?>%" aria-valuenow="<?php echo $horarios_porc;?>" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong><?php  echo $horarios_muestra; ?></strong></div>
		                                                </div>
		                                                <!-- /row -->
                                                    <h6>Cumplimientos de plazos</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo $plazos_porc?>%" aria-valuenow="<?php echo $plazos_porc?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong><?php  echo $plazos_muestra?></strong></div>
                                                    </div>
                                                    <!-- /row -->

		                                            </div>


		                                            <div class="col-md-6">
		                                                <h6>Prolijidad & Limpieza</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $limpieza_porc ?>%" aria-valuenow="<?php echo $limpieza_porc ?>" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong><?php echo $limpieza_muestra ?></strong></div>
		                                                </div>
		                                                <!-- /row -->
		                                                <h6>Respeto & Modales</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $modales_porc ?>%" aria-valuenow="<?php echo $modales_porc ?>" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong><?php echo $modales_muestra ?></strong></div>
		                                                </div>
                                                    <!-- /row -->
                                                   <h6>Relacion Calidad/Precio</h6>
                                                   <div class="row">
                                                       <div class="col-xl-10 col-lg-9 col-9">
                                                           <div class="progress">
                                                               <div class="progress-bar" role="progressbar" style="width: <?php echo $precio_porc ?>%" aria-valuenow="<?php echo $precio_porc ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                           </div>
                                                       </div>
                                                       <div class="col-xl-2 col-lg-3 col-3"><strong><?php echo $precio_muestra ?></strong></div>
                                                   </div>
		                                            </div>
		                                        </div>
		                                        <!-- /row -->
		                                    </div>
		                                </div>

		                                <div id="reviews">
                                      <?php
                                      $sql_calif = "SELECT
                                        puntaje_calificacion as puntaje,
                                        titulo_calificacion as titulo,
                                        detalle_calificacion as detalle,
                                        cuando_calificacion as fecha,
                                        (SELECT `nombre_usuario` FROM `usuarios` WHERE id_usuario = user_calificacion) as emisor,
                                        (SELECT `avatar_usuario` FROM `usuarios` WHERE id_usuario = user_calificacion) as foto
                                      FROM `calificaciones`
                                      INNER JOIN usuarios on usuarios.id_usuario = calificaciones.prestador_calificacion
                                      WHERE estado_calificacion = 1 and oferta_calificacion = $tomo_id ORDER BY fecha DESC ";

                                      $con_calif = $link->query($sql_calif);
                                      $i=0;

                                      while ($cal = mysqli_fetch_assoc($con_calif)) {

                                        echo '
		                                    <div class="review_card" id="calif_'.$i.'">
		                                        <div class="row">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="'.$cal['foto'].'" alt=""></figure>
		                                                <h5>'.$cal['emisor'].'</h5>
		                                            </div>
		                                            <div class="col-md-10 review_content">
		                                                <div class="clearfix add_bottom_15">
		                                                    <span class="rating">'.$cal['puntaje'].'<small>/10</small> <strong>Promedio</strong></span>
		                                                    <em>Calificado el '.date('d/m/Y', strtotime($cal['fecha'])).' </em>
		                                                </div>
		                                                <h4>"'.$cal['titulo'].'"</h4>
		                                                <p>'.$cal['detalle'].'</p>
		                                                <ul class="ocultar_calif">
		                                                   <!-- <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
		                                                    <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
                                                        -->
		                                                    <li><a href="javascript:void(0)" onclick="respondecomntario('.$i.')"><i class="arrow_back"></i> <span>Responder</span></a></li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                        <!-- /row -->
		                                    </div>
		                                    <!-- /review_card -->
                                        ';
                                        $i++;
                                        } ?>

		                               <!--
		                                    <div class="review_card">
		                                        <div class="row">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="assets/img/avatar1.jpg" alt=""></figure>
		                                                <h5>Marika</h5>
		                                            </div>
		                                            <div class="col-md-10 review_content">
		                                                <div class="clearfix add_bottom_15">
		                                                    <span class="rating">9.0<small>/10</small> <strong>Rating average</strong></span>
		                                                    <em>Published 11 Oct. 2019</em>
		                                                </div>
		                                                <h4>"Really great dinner!!"</h4>
		                                                <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.</p>
		                                                <ul>

		                                                    <li><a href="#0"><i class="arrow_back"></i> <span>Responder</span></a></li>
		                                                </ul>
		                                            </div>
		                                        </div>

		                                        <div class="row reply">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="assets/img/avatar.jpg" alt=""></figure>
		                                            </div>
		                                            <div class="col-md-10">
		                                                <div class="review_content">
		                                                    <strong>Reply from Foogra</strong>
		                                                    <em>Published 3 minutes ago</em>
		                                                    <p><br>Hi Monika,<br><br>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.<br><br>Thanks</p>
		                                                </div>
		                                            </div>
		                                        </div>

		                                    </div>
                                      -->
		                                </div>

		                                <div class="text-right"><a href="index.php?pagina=review&id=<?php echo $tomo_id ?>" class="btn_1">Dejanos tu calificacion</a></div>
		                            </div>
		                        </div>
		                    </div>

		                </div>
		                <!-- /tab-content -->
		            </div>
		            <!-- /tabs_detail -->
		        </div>
		       
				<?php
							session_start();
							include("conect.php");

							// Consulta SQL para seleccionar todos los datos de la tabla 'ofertas'
							$sql = "SELECT id_oferta,nombre_oferta,telefono_oferta,email_oferta FROM ofertas";
							$result = $link->query($sql);

							if ($result->num_rows > 0) {
								echo "<h2>Datos de la tabla 'ofertas'</h2>";
								echo "<table border='1'><tr>";
								// Encabezados de columna
								$finfo = $result->fetch_fields();
								foreach ($finfo as $field) {
									echo "<th>{$field->name}</th>";
								}
								echo "</tr>";

								// Datos de la tabla
								while ($row = $result->fetch_assoc()) {
									echo "<tr>";
									foreach ($row as $value) {
										echo "<td>$value</td>";
									}
									echo "</tr>";
								}
								echo "</table>";
							} else {
								echo "No se encontraron datos en la tabla 'ofertas'.";
							}

							// Cerrar la conexión
							$link->close();
					?> 
		        <div class="col-lg-4" id="sidebar_fixed" >

		         

		        <div class="theiaStickySidebar" ><div style="    border: 2px solid #d2d8dd; border-radius: 23px; margin-bottom: 25px; background-color: #fff; padding-top: 15px;"; class="box_booking">
		                <div class="head">
		                    <h3>Informacion de Contacto</h3>
		                  
		                </div>

		                <div class="main">
								<h6>Datos del prestador</h6>
								<div class="row">
									<div class="col-lg-12 mb_10">
										<div class="form-group pb_10">
																
																	
										<b>Nombre: </b> <?php echo $oferta['nombre_oferta'];?></br>
										<b>Telefono: </b><?php echo $oferta['telefono_oferta'];?></br>
                     					<b>Email: </b><?php echo $oferta['email_oferta'];?></br>
										</div>
									</div>
								</div>

					
								<h6>Solicitar Presupuesto:</h6>
								<?php
								// Verificar si se ha enviado el formulario
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									// Recuperar los datos del formulario
									$nombre = $_POST['nombre'];
									$email = $_POST['email'];
									$direccion = $_POST['direccion'];
									$localidad = $_POST['localidad'];
									$mensaje = $_POST['message'];
									$titulo = $oferta['titulo_oferta'];
									$telefono = $_POST['telefono'];

									// Cabeceras del correo electrónico
									$header = 'From: ' . $email . "\r\n";
									$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
									$header .= "Mime-Version: 1.0\r\n";
									$header .= "Content-Type: text/plain; charset=utf-8\r\n";

									// Construir el mensaje
									$mensaje_email = "Enviado el día " . date('d/m/Y') . "\r\n";
									$mensaje_email .= "Este mensaje fue enviado desde la Página Mano de obra por " . $nombre . "\r\n" . "para pedir un presupuesto sobre" . ""  . $titulo .  "\r\n" ;
									$mensaje_email .= "Su e-mail es: " . $email . "\r\n";
									$mensaje_email .= "Dirección: " . $direccion . "\r\n";
									$mensaje_email .= "Localidad: " . $localidad . "\r\n";
									$mensaje_email .= "Telefono: " . $telefono . "\r\n";
									$mensaje_email .= "Detalle del presupuesto : " . $mensaje . "\r\n";

									// Dirección de correo electrónico a la que se enviará el mensaje (puedes cambiar esto si es necesario)
									$para =  $oferta['email_oferta']; // Cambia esto por tu dirección de correo electrónico

									$asunto = 'Mensaje enviado desde la página Mano De Obra';

									// Enviar el correo electrónico y comprobar el resultado
									if (@mail($para, $asunto, utf8_decode($mensaje_email), $header)) {
										// Si el mensaje se envía correctamente, redirigir a una página de confirmación
										header('Location: enviar.html');
									} else {
										// Si ocurre un error, mostrar un mensaje de error
										echo "Ocurrió un error inesperado al enviar el mensaje.";
									}
								}
								?>


						 	<form action="" method="post" id="contactForm2">
							 <input type="hidden" name="id_publicacion" value=" <?php echo $oferta['id_oferta'];?>">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group3">
											<input type="text" class="form-control3" name="nombre" placeholder="Ingresa tu nombre" id="nombre_presu" required = "">
										</div>
									</div>
								</div>

             
                				<div class="row">
									<div class="col-lg-12">
										<div class="form-group3">
											<input type="email" class="form-control3" name="email" placeholder="Ingresa tu email" id="email_presu" required = "">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-12">
										<div class="form-group3">
											<input type="email" class="form-control3" name="telefono" placeholder="Ingresa tu telefono" id="telefono_presu" >
										</div>
									</div>
								</div>

							
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group2">
											<input type="text" class="form-control3 " name="direccion" placeholder="Direccion / Zona" id="dir_presu" required = "">
										</div>
									</div>
								</div>
						
								<div class="row add_bottom_15">
									<div class="col-md-12">
										<div class="form-group3">
											<input type="text" class="form-control3 localidades" name="localidad" placeholder="Localidad > Provincia" id="ciudad_presu" required = "">
										</div>
									</div>

								</div>		
								<h6>Trabajo a realizar:</h6>
								<div class="row add_bottom_5">
									<div class="col-lg-12">
										<div class="form-group3">
											<textarea id="descripcion_presu" class="form-control3" placeholder="Ingrese en detalle el trabajo a realizar por el profesional" name="message" rows="8"></textarea>
										</div>
									</div>
								</div>
							
							<div class="col-lg-12 col-md-12 ">
                        		<div class="d-flex justify-content-center ">
                            		<button style="margin-bottom:20px; margin-top: 10px; width:183px; font-size: 21px !important; " class="botonPresu" type="submit" name="enviar"> <i class="fa-regular fa-envelope"></i>
                               		 	Enviar
                            		</button>
                        		</div>
                    		</div>


						
							</form>

							<?php
						// Número de teléfono
						$telefono =  $oferta['telefono_oferta']; // Ejemplo, puedes obtener este valor dinámicamente desde tu base de datos u otro origen

						// URL de WhatsApp con el número de teléfono y mensaje predeterminado
						$whatsapp_url = 'https://wa.me/+549' . $telefono . '?text=Hola%20enviado%20desde%20mano%20de%20obra';
						?>
						
						<div class="row">
							<div class="col-lg-12 col-md-12">
									<div  class="d-flex justify-content-center">
										<a href="<?php echo $whatsapp_url; ?>">	
											<button style="margin-bottom:20px; width:100%; font-size: 21px !important;" class="botonWhs" type="submit" name="enviar"> 
												<i style=" animation: beat 2s ease-in-out infinite;" class="fab fa-whatsapp"></i>
												Contactar
											</button>
										</a>
									</div>
							</div>
						</div>
							


		            <!--        <div class="dropdown time">
		                        <a href="#" data-toggle="dropdown">Hour <span id="selected_time"></span></a>
		                        <div class="dropdown-menu">
		                            <div class="dropdown-menu-content">
		                                <h4>Lunch</h4>
		                                <div class="radio_select add_bottom_15">
		                                    <ul>
		                                        <li>
		                                            <input type="radio" id="time_1" name="time" value="12.00am">
		                                            <label for="time_1">12.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_2" name="time" value="08.30pm">
		                                            <label for="time_2">12.30<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_3" name="time" value="09.00pm">
		                                            <label for="time_3">1.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_4" name="time" value="09.30pm">
		                                            <label for="time_4">1.30<em>-40%</em></label>
		                                        </li>
		                                    </ul>
		                                </div>

		                                <h4>Dinner</h4>
		                                <div class="radio_select">
		                                    <ul>
		                                        <li>
		                                            <input type="radio" id="time_5" name="time" value="08.00pm">
		                                            <label for="time_1">20.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_6" name="time" value="08.30pm">
		                                            <label for="time_2">20.30<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_7" name="time" value="09.00pm">
		                                            <label for="time_3">21.00<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="time_8" name="time" value="09.30pm">
		                                            <label for="time_4">21.30<em>-40%</em></label>
		                                        </li>
		                                    </ul>
		                                </div>

		                            </div>
		                        </div>
		                    </div>

		                    <div class="dropdown people">
		                        <a href="#" data-toggle="dropdown">People <span id="selected_people"></span></a>
		                        <div class="dropdown-menu">
		                            <div class="dropdown-menu-content">
		                                <h4>How many people?</h4>
		                                <div class="radio_select">
		                                    <ul>
		                                        <li>
		                                            <input type="radio" id="people_1" name="people" value="1">
		                                            <label for="people_1">1<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="people_2" name="people" value="2">
		                                            <label for="people_2">2<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="people_3" name="people" value="3">
		                                            <label for="people_3">3<em>-40%</em></label>
		                                        </li>
		                                        <li>
		                                            <input type="radio" id="people_4" name="people" value="4">
		                                            <label for="people_4">4<em>-40%</em></label>
		                                        </li>
		                                    </ul>
		                                </div>

		                            </div>
		                        </div>
		                    </div>

		                    <a href="#0" class="btn_1 full-width mb_5">Reserve Now</a>
		                    <a href="wishlist.html" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i> Add to wishlist</a>
                      -->
					
		                </div>
		            </div>
                

              </div>
            </div>

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!-- /main -->

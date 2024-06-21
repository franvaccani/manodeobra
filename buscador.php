<?php
$filtros = '';
$filtrando = '';
//if(isset($_GET['filtro'])){$filtros = explode(',',$_GET['filtro']);$filtrando = " and categoria_oferta into ".$_GET['filtro'];}
if (isset($_GET['cat'])) {
    $filtros = explode(',', $_GET['cat']);
    $str_cate = $_GET['cat'];
    $filtrando .= " and (padre_categoria in ($str_cate) OR id_categoria in ($str_cate) ) ";

}

if (isset($_GET['word'])) {
    $filtros_p = explode(' ', $_GET['word']);



    for ($i = 0; $i < count($filtros_p); $i++) {
        if ($i == 0) {
            $filtrando .= " AND (";
        } else {
            $filtrando .= " OR ";
        }
        $filtrando .= "  titulo_oferta like '%$filtros_p[$i]%' OR slogan_oferta like '%$filtros_p[$i]%' OR detalle_oferta like '%$filtros_p[$i]%'";

    }
    $filtrando .= " )";




}

$consultacompleta = "SELECT * , AVG(puntaje_calificacion) as promedio ,(select count(id_calificacion) FROM calificaciones
  WHERE oferta_calificacion = ofertas.id_oferta) as canticalif
  FROM `ofertas`
  INNER JOIN categorias on categorias.id_categoria = ofertas.categoria_oferta and estado_categoria = 1
  LEFT JOIN promociones on promociones.oferta_promocion = ofertas.id_oferta and estado_promocion = 1 and desde_promocion <= NOW() and hasta_promocion >= NOW()
  LEFT JOIN calificaciones on calificaciones.oferta_calificacion = ofertas.id_oferta and estado_calificacion = 1
  WHERE  desde_oferta <= NOW() and (hasta_oferta >= NOW() or hasta_oferta ='0000-00-00 00:00:00') and estado_oferta = 1 $filtrando group by id_oferta; ";
$sql_ofer = $link->query($consultacompleta);

$cantidad_consulta = mysqli_num_rows($sql_ofer);
$cantidad_x_pagina = 18;
$paginas_num = $cantidad_consulta / $cantidad_x_pagina;
$paginas_num = ceil($paginas_num);
$inicia_num = ($_GET['p'] - 1) * $cantidad_x_pagina;

$consulta_pagina = "SELECT * , AVG(puntaje_calificacion) as promedio ,(select count(id_calificacion) FROM calificaciones WHERE oferta_calificacion = ofertas.id_oferta) as canticalif FROM `ofertas`
  INNER JOIN categorias on categorias.id_categoria = ofertas.categoria_oferta and estado_categoria = 1
  LEFT JOIN ofertas_imagenes on id_imgoferta = ofertas.foto_oferta
  LEFT JOIN promociones on promociones.oferta_promocion = ofertas.id_oferta and estado_promocion = 1 and desde_promocion <= NOW() and hasta_promocion >= NOW()
  LEFT JOIN calificaciones on calificaciones.oferta_calificacion = ofertas.id_oferta and estado_calificacion = 1
  WHERE  desde_oferta <= NOW() and (hasta_oferta >= NOW() or hasta_oferta ='0000-00-00 00:00:00') and estado_oferta = 1  $filtrando group by id_oferta LIMIT $inicia_num,$cantidad_x_pagina; ";
$sql_ofer_pag = $link->query($consulta_pagina);

if (!$_GET['p']) {
    header('Location: index.php?pagina=buscador&p=1');
}


?>
<main style="transform: none;padding-top: 50px;">
    <div class="page_header element_to_stick">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="#">Categorias</a></li>
                            <li>
                                <?php if (count(explode(',', $_GET['cat'])) == 1) {
                                    echo ' <span class="nom_cate"></span>';
                                } ?>
                            </li>
                        </ul>

                    </div>
                    <?php
                    if (count(explode(',', $_GET['cat'])) == 1 && !$_GET['word']) {
                        echo '<h1>' . $cantidad_consulta . ' Resultados en la categoria <span class="nom_cate"></span></h1>';
                    } else {
                        if (isset($_GET['word'])) {
                            echo '<h1>' . $cantidad_consulta . ' Resultados que contienen "' . $_GET['word'] . '"</h1>';
                        } else {
                            echo '<h1> Total de Resultados ' . $cantidad_consulta . '</h1>';
                        }
                    }

                    // depuracion  echo $consulta_pagina;
                    ?>

                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                    <input class="form-control" name="word" id="categoria" type="text" placeholder="Qué estás buscando..." style="width: 200px;">
                    <input style="position:absolute; right: -24px; " type="submit" onclick="buscador()"  value="Buscar">
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->
    <div class="collapse" id="collapseMap">
        <div id="map" class="map" style="position: relative; overflow: hidden;">
        </div>

    </div>
    <!-- /Map -->

    <div class="container container-buscador margin_30_40" style="transform: none;">
        <div class="row" style="transform: none;">
            <aside class="col-lg-3" id="sidebar_fixed"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: relative; transform: none;">
                    <div style="height: 215px;" class="clearfix">
                        <a class="btn_map d-flex align-items-center justify-content-center" data-toggle="collapse"
                            href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><span
                                class="btn_map_txt" data-text-swap="Ocultar Mapa"
                                data-text-original="Ver en el Mapa">Ver en el Mapa</span></a>
                        <div class="sort_select">
                            <select name="sort" id="sort">
                                <option value="popularity" selected="selected">Ordenar por Popularidad</option>
                                <option value="rating">Ordenar por Calificacion</option>
                                <option value="date">Ordenar por antiguedad</option>
                                <option value="price">Ordenar por precio: de menos a mayor</option>
                                <option value="price-desc">Ordenar por precio: de mayor a menor</option>
                            </select>
                        </div>
                        <a class="btn_map mobile btn_filters" data-toggle="collapse" href="#collapseMap"><i
                                class="icon_pin_alt"></i></a>
                        <a href="#0" class="open_filters btn_filters"><i
                                class="icon_adjust-vert"></i><span>Filtros</span></a>
                    </div>
                    <div class="filter_col">
                        <div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
                        <div class="filter_type">
                            <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categorias</a></h4>
                            <div class="collapse show" id="filter_1">
                                <ul>
                                    <?php
                                    $sql_con = $link->query("SELECT *, (select count(id_oferta) FROM ofertas
                  INNER JOIN categorias c on c.id_categoria = ofertas.categoria_oferta
                  where estado_oferta = 1 and desde_oferta <= NOW() and (hasta_oferta >= NOW() or hasta_oferta ='0000-00-00 00:00:00') and (categoria_oferta = ca.id_categoria OR c.padre_categoria = ca.id_categoria)) as cantidad FROM
                  categorias ca WHERE ca.estado_categoria = 1 and ca.padre_categoria = 0 ORDER BY ca.nombre_categoria ASC;");
                                    while ($row = mysqli_fetch_array($sql_con)) {
                                        $padreId = $row['id_categoria'];
                                        echo '<li>
                      <input type="hidden" id="nombreCat_' . $row['id_categoria'] . '" value="' . $row['nombre_categoria'] . '">
								        <label class="container_check">' . $row['nombre_categoria'] . ' <small>' . $row['cantidad'] . '</small>
								            <input type="checkbox" ';
                                        if (in_array($row['id_categoria'], $filtros)) {
                                            echo ' checked ';
                                        }
                                        echo ' id="check_' . $row['id_categoria'] . '">
								            <span class="checkmark"></span>
								        </label>
                        <!-- subCategoria -->
                        <ul>
                        ';

                                        $sql_con2 = $link->query("SELECT *, (select count(id_oferta) FROM ofertas where estado_oferta = 1 and categoria_oferta = id_categoria) as cantidad FROM `categorias` WHERE `estado_categoria` = 1 and padre_categoria = $padreId ORDER BY `nombre_categoria` ASC;");
                                        while ($row2 = mysqli_fetch_array($sql_con2)) {
                                            echo '
                            <li style="margin-left: 25px;">
                              <input type="hidden" id="nombreCat_' . $row2['id_categoria'] . '" value="' . $row2['nombre_categoria'] . '">
        								        <label class="container_check">' . $row2['nombre_categoria'] . ' <small>' . $row2['cantidad'] . '</small>
        								            <input type="checkbox" ';
                                            if (in_array($row2['id_categoria'], $filtros)) {
                                                echo ' checked ';
                                            }
                                            echo ' id="check_' . $row2['id_categoria'] . '">
        								            <span class="checkmark"></span>
        								        </label>
                            </li> ';
                                        }
                                        echo '</ul>
                        <!-- FIN subCategoria -->
								    </li>';

                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- /filter_type -->
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type">
                            <h4><a href="#filter_2" data-toggle="collapse" class="closed">Calificacion</a></h4>
                            <div class="collapse" id="filter_2">
                                <ul>
                                    <li>
                                        <label class="container_check">Recomendado 9+ <small>06</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Muy Bueno 8+ <small>12</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Bueno 7+ <small>17</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Neutral 5+ <small>43</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type">
                            <h4><a href="#filter_3" data-toggle="collapse" class="closed">Distancia</a></h4>
                            <div class="collapse" id="filter_3>
                                <div class="distance"><span>30</span> km de radio desde mi ubicacion</div>
                                <div class="add_bottom_15">
                                    <input type="range" min="10" max="100" step="10" value="30"
                                        data-orientation="horizontal"
                                        style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                                </div>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type">
                            <h4><a href="#filter_4" data-toggle="collapse" class="closed">Precio</a></h4>
                            <div class="collapse" id="filter_4">
                                <ul>
                                    <li>
                                        <label class="container_check">$0 — $50<small>11</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$50 — $100<small>08</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$100 — $150<small>05</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$150 — $200<small>18</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="buttons botonFiltrar">
                            <a style="margin-bottom:10px;" href="#" onclick="filtrabusqueda()" id="botonFiltrar" class="btn_1 botonFiltrar full-width">Filtrar</a>
                        </div>
                    </div>
                    <div class="resize-sensor"
                        style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div
                                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 300px; height: 703px;">
                            </div>
                        </div>
                        <div class="resize-sensor-shrink"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                            </div>
                        </div>
                    </div>
                
            </aside>

            <div class="col-lg-9">
                <div class="row">

                    <?php
                    if (mysqli_num_rows($sql_ofer_pag) > 0) {
                        while ($row = mysqli_fetch_array($sql_ofer_pag)) {
                            echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
									<div class="strip">
									    <figure>';
                            if ($row['tipo_promocion'] == '1') {
                                echo '<span class="ribbon off">-' . $row['valor_promocion'] . '%</span>';
                            }
                            if ($row['tipo_promocion'] == '2') {
                                echo '<span class="ribbon off">-$' . $row['valor_promocion'] . '</span>';
                            }


                            echo '<img src="' . $row['url_imgoferta'] . '" data-src="' . $row['url_imgoferta'] . '" class="img-fluid lazy loaded" alt="" data-was-processed="true">
									        <a href="index.php?pagina=detalle&id=' . $row['id_oferta'] . '" class="strip_info">
									            <small>' . $row['nombre_categoria'] . '</small>
									            <div class="item_title">
									                <h3>' . $row['nombre_oferta'] . '</h3>
									                <small>' . $row['titulo_oferta'] . '</small>
									            </div>
									        </a>
									    </figure>
									    <ul>
									        <li><span>Disponible</span></li>
									        <li>
									        	<div class="score">';
                            if ($row['canticalif'] == 0) {
                                echo '<span><em>Sin Calificaciones</em></span><strong>-</strong></div>';
                            } else {
                                echo '<span>Muy Bueno<em>' . $row['canticalif'] . ' Calificaciones</em></span><strong>' . $row['promedio'] . '</strong></div>';
                            }
                            echo '</li>
									  </ul>
								</div>
						</div>';
                        }
                    } else {
                        echo '<div class="col-12"><center><h5>No se encontraron resultados';
                        if ($_GET['word']) {
                            echo ' con la palabra "' . $_GET['word'] . '"';
                        }
                        if ($_GET['loc']) {
                            echo ' En la localidad ' . $_GET['loc'];
                        }
                        echo '</h5></center></div>';

                    }
                    ?>

                </div>
                <!-- /row -->
                <div class="pagination_fg">

                    <?php

                    if ($_GET['p'] > 1) {
                        echo '<a href="index.php?pagina=buscador&p=' . ($_GET['p'] - 1) . '">«</a>';
                    }

                    //  $paginas_num = 10;
                    
                    for ($i = 1; $i <= $paginas_num; $i++) {
                        echo '<a href="index.php?pagina=buscador&p=' . $i . '" ';
                        if ($i == $_GET['p'] || !$_GET['p'] && $i == 1) {
                            echo ' class="active" ';
                        }
                        echo '>' . $i . '</a>';
                    }

                    if ($_GET['p'] < $paginas_num && isset($_GET['p'])) {
                        echo '<a href="index.php?pagina=buscador&p=' . ($_GET['p'] + 1) . '">»</a>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->

</main>
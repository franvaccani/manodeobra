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
	<main class="bg_gray pattern" style="transform: none; padding-top: 50px;" >

		<div class="container margin_60_40">
		   <div class="row justify-content-center" >
				<div class="col-lg-8">
					<div class="box_general write_review" >
						<h1 class="add_bottom_15">Escribe una reseña para <?php echo '"'.$oferta['nombre_oferta']. '" ('.$oferta['nombre_categoria'].')';?></h1>

						<label class="d-block add_bottom_15">Calificación</label>
						<div class="row">
							<div class="col-md-4 add_bottom_25">
							   <div class="add_bottom_15">Responsabilidad <strong class="responsabilidad_val">0</strong></div>
			           <input type="range" min="0" max="10" step="1" value="5" data-orientation="horizontal" id="responsabilidad" name="responsabilidad" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
							</div>
							<div class="col-md-4 add_bottom_25">
								<div class="add_bottom_15">Respeto de Horarios <strong class="horarios_val">0</strong></div>
			          <input type="range" min="0" max="10" step="1" value="5" data-orientation="horizontal" id="horarios" name="horarios" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
							</div>
							<div class="col-md-4 add_bottom_25">
								<div class="add_bottom_15">Cumplimientos de plazos <strong class="plazos_val">0</strong></div>
			          <input type="range" min="0" max="10" step="1" value="5" data-orientation="horizontal" id="plazos" name="plazos" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
							</div>
							<div class="col-md-4 add_bottom_25">
								<div class="add_bottom_15">Prolijidad & Limpieza <strong class="limpieza_val">0</strong></div>
			          <input type="range" min="0" max="10" step="1" value="5" data-orientation="horizontal" id="limpieza" name="limpieza" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
							</div>
              <div class="col-md-4 add_bottom_25">
								<div class="add_bottom_15">Respeto & Modales <strong class="modales_val">0</strong></div>
			          <input type="range" min="0" max="10" step="1" value="5" data-orientation="horizontal" id="modales" name="modales" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
							</div>
              <div class="col-md-4 add_bottom_25">
								<div class="add_bottom_15">Relacion Calidad/Precio<strong class="precio_val">0</strong></div>
			          <input type="range" min="0" max="10" step="1" value="5" data-orientation="horizontal" id="precio" name="precio" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
							</div>
						</div>

						<div class="form-group">
							<input id="oferta_calif" type="hidden" value="<?php echo $_GET['id']; ?>">
							<label>Titulo de la calificación</label>
							<input class="form-control" id="titulo_calif" type="text" placeholder="Si pudieras decirlo en una oración, ¿qué dirías?">
						</div>
						<div class="form-group">
							<label>Deja tu Reseña</label>
							<textarea class="form-control" id="msg_calif" style="height: 180px;" placeholder="Escriba su reseña para ayudar a otros a conocer más sobre este prestador."></textarea>
						</div>
						<div class="form-group">
							<label>Añade una fotografia (opcional)</label>
							<div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
						</div>
						<div class="form-group">
							<div class="checkboxes float-left add_bottom_15 add_top_15">
								<label class="container_check">Confirmo que soy el titular de la cuena y deslindo a manodeobra.ar de toda responsabilidad.
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<a href="#" onclick="envia_calificacion()" class="btn_1">Enviar Calificación</a>
					</div>
				</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!-- /main -->

//funcion crea oferta
function add_oferta(){

  var esqueleto ='  <div class="modal" id="oferta_add" tabindex="-1" role="dialog" style="z-index: 99999;">'
                +'      <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">'
                +'        <div class="modal-content">'
                +'          <div class="modal-header" style="background: #ffdd00;">'
                +'            <h5 class="modal-title">Nueva publicación</h5>'
                +'            <button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                +'              <span aria-hidden="true">&times;</span>'
                +'            </button>'
                +'          </div>'
                +'          <div style="display:flex; flex-direction:column; flex-wrap:nowrap; padding-right: 25px;" class="modal-body ">'
                +'            <h5 class="boton-nva-publicacion">Informacion Basica</h5>'
                +'            <div class="main  nva_publicacion">'                         
              	+'				        <div class="row">'
                  +'				            <input type="hidden" value="'+token()+'" id="token_modofe" required="" >'
                  +'                  <div class="col-md-6 col-xs-12">'
                  +'				            <div class="form-group">'
                  +'				               <label>Titulo</label>'
                  +'				                  <input class="form-control" id="titulo_modofe" placeholder="Ej. Pintura de Obras" required="">'
                  +'				            </div>'
                  +'				          </div>'
                  +'                 <div class="col-md-6 col-xs-12">'
                  +'                    <div class="form-group">'
                  +'                      <label>Seleccione el rubro</label>'
                  +'                      <select class="form-control" id="rubro_modofe" ><option disabled selected>Seleccione un rubro</option></select>'
                  +'				            </div>'
                  +'	               </div>'
                  +'               </div>'
                +'                <div class="row">'
                +'				            <div class="col-md-6">'
              	+'				                <div class="form-group">'
              	+'				                    <label>Detalle de la publicación</label>'
              	+'				                    <textarea class="form-control" type="text" id="detalle_modofe" placeholder="Trabajos de pintura en latex y sintetico. Presupustos. Excelente terminación, mucha experiencía. Tel Si Whats app" rows="5"></textarea>'
              	+'				                </div>'
              	+'				            </div>'
                +'				            <div class="col-md-6 col-xs-12">'
                +'				                <div class="form-group">'
                +'	      			            <label>Slogan o Frase promocional</label>'
                +'				                  <input class="form-control" id="slogan_modofe" placeholder="Ej. Damos color a tu vida" required="">'
                +'				            </div>'
                +'				        </div>'
                +'				        </div>'
                +'                <div class="row">'
              	
              	+'				        </div>'
                +'          <hr>'
                +'            <h5>Zona de la Publicacion</h5>'
                +'                <div id="zona-publicacion" class="row">'
                +'				            <div class="col-md-6 col-xs-12">'
                +'				                <div class="form-group">'
                +'				                    <select class="form-control" id="provincia_modofe" onchange="cambia_prov()"><option disabled selected>Seleccione una provincia</option></select>'
                +'				                </div>'
                +'				            </div>'
                +'				            <div class="col-md-6 col-xs-12">'
                +'				                <div class="form-group">'
                +'				                    <select class="form-control" id="localidad_modofe" ><option disabled selected>Seleccione una localidad</option></select>'
                +'				                </div>'
                +'				            </div>'
                +'				        </div>'
              	+'				    </div>'
                +'          <hr>'
                +'            <h5>Imagenes de Trabajos realizados</h5>'
                +'              <div id="zona-publicacion" class ="contenedor-img-publicaciones">'
                +'                 <div id="zona-publicacion"  class="row">'
                +'                    <div class="col-md-3 col-xs-12 " id="img-dg-1">'
                +'                      <label for="img_1">'
                +'                         <img id="uimg_1" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
                +'                         <span class="btn btn-success btn-block" >Cargar Imagen 1</span>'
                +'                         <input type="file" id="img_1" onchange="cargaimg(1)" style="display:none" required="">'
                +'                      </label>'
                +'                        <div id="load_1" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
                +'                  </div>'
               +'				            <div class="col-md-3 col-xs-12"  id="img-dg-2">'
               +'                      <label for="img_2">'
               +'                         <img id="uimg_2" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
               +'                         <span class="btn btn-success btn-block" >Cargar Imagen 2</span>'
               +'                         <input type="file" id="img_2" onchange="cargaimg(2)" style="display:none" required="">'
               +'                      </label>'
               +'                      <div id="load_2" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
               +'				            </div>'
               +'				            <div class="col-md-3 col-xs-12"  id="img-dg-3">'
               +'                      <label for="img_3">'
               +'                         <img id="uimg_3" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
               +'                         <span class="btn btn-success btn-block" >Cargar Imagen 3</span>'
               +'                         <input type="file" id="img_3" onchange="cargaimg(3)" style="display:none" required="">'
               +'                      </label>'
               +'                      <div id="load_3" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
               +'				            </div>'
               +'				            <div class="col-md-3 col-xs-12"  id="img-dg-4">'
               +'                      <label for="img_4">'
               +'                         <img id="uimg_4" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
               +'                         <span class="btn btn-success btn-block" >Cargar Imagen 4</span>'
               +'                         <input type="file" id="img_4" onchange="cargaimg(4)" style="display:none" required="">'
               +'                      </label>'
               +'                      <div id="load_4" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
               +'				            </div>'
               +'				        </div>'
               +'               </div>'
               +'          <hr>'
               +'            <label for="activa_oferta"><h5 class= "boton-nva-publicacion">Ofertas de la Publicacion <input type="checkbox" id="activa_oferta" onchange="controla_promo()"></h5></label>'
               +'         <div class = "nva_publicacion">'
               +'                 <div class="row" id="promoofer_pop" style="display:none">'
               +'				            <div class="col-md-6 col-xs-12">'
               +'				                <div class="form-group">'
               +'	      			            <label>Descuento Desde</label>'
               +'				                  <input class="form-control" type="date" id="desde_modofe" required="">'
               +'				                </div>'
               +'				            </div>'
               +'				            <div class="col-md-6 col-xs-12">'
               +'				                <div class="form-group">'
               +'	      			            <label>Descuento Hasta</label>'
               +'				                  <input class="form-control" type="date" id="hasta_modofe" required="" >'
               +'				                </div>'
               +'				            </div>'
               +'				            <div class="col-md-6 col-xs-12">'
               +'				                <div class="form-group">'
               +'	      			            <label>Tipo de promocion</label>'
               +'				                  <select class="form-control" id="tipopromo_modofe" ><option>Sin promocion</option><option value="$">$</option><option value="%">%</option></select>'
               +'				                </div>'
               +'				            </div>'
               +'				            <div class="col-md-6 col-xs-12">'
               +'				                <div class="form-group">'
               +'	      			            <label>Valor de promocion</label>'
               +'				                  <input class="form-control" type="number" step="any" id="valorpromo_modofe" required="" >'
               +'				                </div>'
               +'				            </div>'
               +'				            <div class="col-md-12">'
               +'				                <div class="form-group">'
               +'				                   <label>Titulo</label>'
               +'				                   <input class="form-control" id="titulopromo_modofe" placeholder="Ej. Descuento en Revear" required="">'
               +'				                </div>'
               +'				            </div>'
               +'				            <div class="col-md-12">'
               +'				                <div class="form-group">'
               +'				                   <label>Detalle de promocion</label>'
               +'				                   <textarea class="form-control" id="detallepromo_modofe" placeholder="Aprovecha nuestro descuento en aplicaciones de revear" rows="3"></textarea>'
               +'				                </div>'
               +'				            </div>'               
                +'              </div>'
                +'            <div/>'
                +'          <div class="modal-footer">'
                +'            <button type="button" class="btn_1 BotonesBackend" onclick="carga_oferta()">Guardar</button>'
                +'            <button type="button" class="btn_1 BotonesBackend" data-dismiss="modal">Cerrar</button>'
                +'          </div>'
                +'        </div>'
                +'      </div>'
                +'    </div>';

$('modals').html(esqueleto);
pone_rubros('rubro_modofe');
pone_provincias('provincia_modofe');
//auto_localidad('loc_modofe');
$('#oferta_add').modal('show');
}

////////////////////////////////////////////////////////////////////////////////

//funcion carga imagen
function cargaimg(num){

    $('#load_'+num).show();
    var url ='assets/php/insert_img.php?';
    var formData = new FormData();
    var token = $('#token_modofe').val();
    var fotito = $('#img_'+num).prop('files')[0];
    formData.append("token",token);
    formData.append("img",fotito);

   $.ajax({
     url: url,
     data: formData,
     cache: false,
     contentType: false,
     processData: false,
     method: 'POST',
     type: 'POST', // For jQuery < 1.9
      success: function(data) {
        // console.log(data.split('@')[0]);
          if(data.split('@')[0]== 'true'){

            var imagenf = data.split('@')[1];
            imagenf = imagenf.replace('.png', '.jpg');
            $('#uimg_'+num).attr('src', 'assets/img/works/'+imagenf);
            $('#load_'+num).hide();

          }



      }
  })


}

////////////////////////////////////////////////////////////////////////////////

//funcion elimina oferta
function pasaiddel(id){}

////////////////////////////////////////////////////////////////////////////////

//funcion edita oferta
function edita_oferta(id){
  var url ='assets/php/detalle_oferta.php?';
  var string = 'id='+id;

     $.ajax({
       url: url,
       data: string,
       method: 'POST',
       type: 'POST', // For jQuery < 1.9
      success: function(data) {

        if(data!='failed'){
    // llena modal
    var esqueleto ='  <div class="modal" id="oferta_edita" tabindex="-1" role="dialog" style="z-index: 99999;">'
                  +'      <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">'
                  +'        <div class="modal-content">'
                  +'          <div class="modal-header" style="background: #ffdd00;">'
                  +'            <h5 class="modal-title nva-publicacion">Editar publicación</h5>'
                  +'            <button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                  +'              <span aria-hidden="true">&times;</span>'
                  +'            </button>'
                  +'          </div>'
                  +'          <div class="modal-body contenedor-edita-publicacion">'
                  +'            <div class="main">'
                  +'              <h5>Informacion Basica</h5>'
                	+'				        <div class="row">'
                  +'				            <input type="hidden" value="'+token()+'" id="token_modofe" required="" >'
                  +'                  <div class="col-md-6">'
                  +'				            <div class="form-group">'
                  +'				               <label>Titulo</label>'
                  +'				                  <input class="form-control" id="titulo_modofe" placeholder="Ej. Pintura de Obras" required="">'
                  +'				            </div>'
                  +'				          </div>'
                  +'                 <div class="col-md-6">'
                  +'                    <div class="form-group">'
                  +'                      <label>Seleccione el rubro</label>'
                  +'                      <select class="form-control" id="rubro_modofe" ><option disabled selected>Seleccione un rubro</option></select>'
                  +'				          </div>'
                  +'	               </div>'
                  +'               </div>'
                  +'                <div class="row">'				                            			           
                  +'				            <div class="col-md-12">'
                  +'				                <div class="form-group">'
                  +'	      			            <label>Slogan o Frase promocional</label>'
                  +'				                  <input class="form-control" id="slogan_modofe" placeholder="Ej. Damos color a tu vida" required="">'
                  +'				                </div>'
                  +'				            </div>'
                  +'				        </div>'
                  +'                <div class="row">'
                	+'				            <div class="col-md-12">'
                	+'				                <div class="form-group">'
                	+'				                    <label>Detalle de la publicación</label>'
                	+'				                    <textarea class="form-control" type="text" id="detalle_modofe" placeholder="Trabajos de pintura en latex y sintetico. Presupustos. Excelente terminación, mucha experiencía. Tel Si Whats app" rows="5"></textarea>'
                	+'				                </div>'
                	+'				            </div>'
                	+'				        </div>'
                  +'          <hr>'
                  +'            <h5>Zona de la Publicacion</h5>'
                  +'                <div class="row">'
                  +'				            <div class="col-md-6">'
                  +'				                <div class="form-group">'
                  +'				                    <select class="form-control" id="provincia_modofe" onchange="cambia_prov()"><option disabled selected>Seleccione una provincia</option></select>'
                  +'				                </div>'
                  +'				            </div>'
                  +'				            <div class="col-md-6">'
                  +'				                <div class="form-group">'
                  +'				                    <select class="form-control" id="localidad_modofe" ><option disabled selected>Seleccione una localidad</option></select>'
                  +'				                </div>'
                  +'				            </div>'
                  +'				        </div>'
                	+'				    </div>'
                  +'          <hr>'
                  +'            <h5>Imagenes de trabajos realizados</h5>'
                  +'                 <div class="row contenedor-img-publicaciones2">'
                  +'                    <div class="col-md-3" id="img-dg-1">'
                  +'                      <label for="img_1">'
                  +'                         <img id="uimg_1" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom:20px;"><br>'
                  +'                         <span class="btn_1 img1 boton-img" >Cargar Imagen 1</span>'
                  +'                         <input type="file" id="img_1" onchange="cargaimg(1)" style="display:none" required="">'
                  +'                      </label>'
                  +'                      <div id="load_1" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
                  +'                  </div>'
                 +'				            <div class="col-md-3"  id="img-dg-2">'
                 +'                      <label for="img_2">'
                 +'                         <img id="uimg_2" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
                 +'                         <span class="btn_1 img2 boton-img" >Cargar Imagen 2</span>'
                 +'                         <input type="file" id="img_2" onchange="cargaimg(2)" style="display:none" required="">'
                 +'                      </label>'
                 +'                      <div id="load_2" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
                 +'				            </div>'
                 +'				            <div class="col-md-3"  id="img-dg-3">'
                 +'                      <label for="img_3">'
                 +'                         <img id="uimg_3" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
                 +'                         <span class="btn_1 img3 boton-img" style="width:120px;" >Cargar Imagen 3</span>'
                 +'                         <input type="file" id="img_3" onchange="cargaimg(3)" style="display:none" required="">'
                 +'                      </label>'
                 +'                      <div id="load_3" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
                 +'				            </div>'
                 +'				            <div class="col-md-3"  id="img-dg-4">'
                 +'                      <label for="img_4">'
                 +'                         <img id="uimg_4" src="assets/img/works/subir-imagen.png" style="max-width:150px;margin-bottom: 20px;"><br>'
                 +'                         <span class="btn_1 img4 boton-img" style="width:120px;" >Cargar Imagen 4</span>'
                 +'                         <input type="file" id="img_4" onchange="cargaimg(4)" style="display:none" required="">'
                 +'                      </label>'
                 +'                      <div id="load_4" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
                 +'				            </div>'
                 +'				        </div>'
                 +'          <hr>'
                 +'            <label for="activa_oferta"><h5 class= "boton-nva-publicacion">Ofertas de la Publicacion <input type="checkbox" id="activa_oferta" onchange="controla_promo()"></h5></label>'
                 +'         <div class = "nva_publicacion">'
                 +'                 <div class="row" id="promoofer_pop" style="display:none">'
                 +'				            <div class="col-md-6">'
                 +'				                <div class="form-group">'
                 +'	      			            <label>Descuento Desde</label>'
                 +'				                  <input class="form-control" type="date" id="desde_modofe" >'
                 +'				                </div>'
                 +'				            </div>'
                 +'				            <div class="col-md-6">'
                 +'				                <div class="form-group">'
                 +'	      			            <label>Descuento Hasta</label>'
                 +'				                  <input class="form-control" type="date" id="hasta_modofe" >'
                 +'				                </div>'
                 +'				            </div>'
                 +'				            <div class="col-md-6">'
                 +'				                <div class="form-group">'
                 +'	      			            <label>Tipo de promocion</label>'
                 +'				                  <select class="form-control" id="tipopromo_modofe" ><option>Sin promocion</option><option value="$">$</option><option value="%">%</option></select>'
                 +'				                </div>'
                 +'				            </div>'
                 +'				            <div class="col-md-6">'
                 +'				                <div class="form-group">'
                 +'	      			            <label>Valor de promocion</label>'
                 +'				                  <input class="form-control" type="number" step="any" id="valorpromo_modofe" >'
                 +'				                </div>'
                 +'				            </div>'
                 +'				            <div class="col-md-12">'
                 +'				                <div class="form-group">'
                 +'				                   <label>Titulo</label>'
                 +'				                   <input class="form-control" id="titulopromo_modofe" placeholder="Ej. Descuento en Revear">'
                 +'				                </div>'
                 +'				            </div>'
                 +'				            <div class="col-md-12">'
                 +'				                <div class="form-group">'
                 +'				                   <label>Detalle de promocion</label>'
                 +'				                   <textarea class="form-control" id="detallepromo_modofe" placeholder="Aprovecha nuestro descuento en aplicaciones de revear" rows="3"></textarea>'
                 +'				                </div>'
                 +'				            </div>'               
                  +'              </div>'
                  +'            <div/>'
                  +'          <div class="modal-footer">'
                  +'            <button type="button" class="btn_1" onclick="edita_of_confirma('+id+')">Editar Publicación</button>'
                  +'            <button type="button" class="btn_1" data-dismiss="modal">Cancelar</button>'
                  +'          </div>'
                  +'        </div>'
                  +'      </div>'
                  +'    </div>';

      $('modals').html(esqueleto);
      $('#titulo_modofe').val(data.titulo);
      $('#slogan_modofe').val(data.slogan);
      $('#detalle_modofe').val(data.detalle);
      pone_rubros('rubro_modofe',data.rubro);
      pone_provincias('provincia_modofe',data.provincia);
      var num=0;
      if(data.imagenes.length > 0 ){
        for (var i = 0; i < data.imagenes.length; i++) {
          num = i+1;
          var esq =  '<label for="img_'+num+'">'
          +'        <img id="uimg_'+num+'" src="'+data.imagenes[i]+'" style="width:100%;max-width: 160px; margin-bottom:20px;"><br>'
          +'        <span style="width:120px;" class="btn_1 img4" >Cargar imagen</span>'
          +'      </label>';

            $('#img-dg-'+num).html(esq);
        }
        cambia_prov(data.provincia,data.localidad);

      }
      //auto_localidad('loc_modofe');
      $('#oferta_edita').modal('show');
    }else{
      alert('problema al buscar detalle de oferta');
    }
    }
  })
}

////////////////////////////////////////////////////////////////////////////////
//funcion Envia Datos Edita Oferta
function edita_of_confirma(id){
    var token = $('#token_modofe').val();
    var rubro = $('#rubro_modofe').val();
    var localidad = $('#localidad_modofe').val();
    var provincia = $('#provincia_modofe').val();
    var titulo = $('#titulo_modofe').val();
    var slogan = $('#slogan_modofe').val();
    var detalle = $('#detalle_modofe').val();
    if($('#activa_oferta').is(':checked')){
          var oferta = true;
      }else{
          var oferta = false;
      }
    var desdeofe = $('#desde_modofe').val();
    var hastaofe = $('#hasta_modofe').val();
    var tipoofe = $('#tipopromo_modofe').val();
    if(tipoofe=='$'){
      tipoofe=2;
    }else{
      tipoofe=1;
    };
    var valorofe = $('#valorpromo_modofe').val();
    var tituloofe = $('#titulopromo_modofe').val();
    var detalleofe = $('#detallepromo_modofe').val();

    var string = 'id='+id+'&token='+token+'&localidad='+localidad+'&titulo='+titulo+'&slogan='+slogan+'&detalle='+detalle+'&oferta='+oferta+'&desdeofe='+desdeofe+'&hastaofe='+hastaofe+'&tipoofe='+tipoofe+'&valorofe='+valorofe+'&tituloofe='+tituloofe+'&detalleofe='+detalleofe+'&rubro='+rubro+'&provincia='+provincia;

     /********/

  if(localidad!='' && titulo !='' && detalle !='' && slogan!='' && rubro!='' && id!='' ){

        $.ajax({
          url: 'assets/php/edita_oferta.php',
          data: string,
          method: 'POST',
          type: 'POST', // For jQuery < 1.9
          success: function(data) {
              console.log(data);
                    if(data=='true'){
                    location.href = 'index.php?pagina=publicaciones';
                    }
           }
       })


     } else{ // fin de comprobacion
       console.log(string);
       alert('Complete los campor Obligatorios') //mejorar con sweet alert

     }
}
////////////////////////////////////////////////////////////////////////////////

//funcion Cargar oferta al backedn
function carga_oferta(){

  var token = $('#token_modofe').val();
  var rubro = $('#rubro_modofe').val();
  var localidad = $('#localidad_modofe').val();
  var provincia = $('#provincia_modofe').val();
  var titulo = $('#titulo_modofe').val();
  var slogan = $('#slogan_modofe').val();
  var detalle = $('#detalle_modofe').val();
  if($('#activa_oferta').is(':checked')){
        var oferta = true;
    }else{
        var oferta = false;
    }
  var desdeofe = $('#desde_modofe').val();
  var hastaofe = $('#hasta_modofe').val();
  var tipoofe = $('#tipopromo_modofe').val();
  if(tipoofe=='$'){
    tipoofe=2;
  }else{
    tipoofe=1;
  };
  var valorofe = $('#valorpromo_modofe').val();
  var tituloofe = $('#titulopromo_modofe').val();
  var detalleofe = $('#detallepromo_modofe').val();

  var string = 'token='+token+'&localidad='+localidad+'&titulo='+titulo+'&slogan='+slogan+'&detalle='+detalle+'&oferta='+oferta+'&desdeofe='+desdeofe+'&hastaofe='+hastaofe+'&tipoofe='+tipoofe+'&valorofe='+valorofe+'&tituloofe='+tituloofe+'&detalleofe='+detalleofe+'&rubro='+rubro+'&provincia='+provincia;

   /********/

if(localidad!='' && titulo !='' && detalle !='' && slogan!='' && rubro!='' ){

    

    $.ajax({
    url: 'assets/php/insert_oferta.php',
    data: string,
    method: 'POST',
    type: 'POST', // For jQuery < 1.9
    success: function(data) {
        console.log(data);
                if(data=='true'){
                location.href = 'index.php?pagina=publicaciones';
                }
        }
    })


   } else{ // fin de comprobacion
     console.log(string);
     alert('Complete los campor Obligatorios') //mejorar con sweet alert

   }


}

////////////////////////////////////////////////////////////////////////////////

//funcion edita oferta
function controla_promo(){
  if($('#activa_oferta').is(':checked')){
    $('#promoofer_pop').show();
  }else{
    $('#promoofer_pop').hide();
  }
}

////////////////////////////////////////////////////////////////////////////////

//funcion carga localidades
function cambia_prov(id,select){
  if(id){
    var prov = id;
  }else{
  var prov = $('#provincia_modofe').val();
  }

  $.ajax({
    type: "POST",
    url: "assets/php/localidad.php",
    data: "id="+prov,
    dataType: "json",
    crossDomain: true,
    cache: false,
    success: function(data){
      var opciones ='<option disabled selected>Seleccione una Localidad</option>';
      for (var i = 0; i < data.length; i++) {
        opciones +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

      }
    $('#localidad_modofe').html(opciones);
      if(select){
        $('#localidad_modofe').val(select);
      }
    }
  })
}
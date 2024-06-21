//funcion crea oferta
function add_presupuesto(){

  var esqueleto ='  <div class="modal" id="presupuesto_add" tabindex="-1" role="dialog" style="z-index: 99999;">'
                +'      <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">'
                +'        <div class="modal-content">'
                +'          <div class="modal-header" style="background: #ffdd00;">'
                +'            <h5 class="modal-title">Solicitar Nuevo Presupuesto</h5>'
                +'            <button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                +'              <span aria-hidden="true">&times;</span>'
                +'            </button>'
                +'          </div>'
                +'          <div class="modal-body">'
                +'            <div class="main">'
                +'              <h5>Informacion Basica</h5>'
              	+'				        <div class="row">'
                +'				        <input type="hidden" value="'+token()+'" id="token_modpresu" >'
                +'                  <div class="col-md-12">'
                +'				            <div class="form-group">'
                +'				               <label>Trabajo a Realizar</label>'
                +'				                  <input class="form-control" id="titulo_modpresu" placeholder="Ej. Pinturar exterior de mi casa">'
                +'				            </div>'
                +'				          </div>'
                +'				        </div>'
                +'                <div class="row">'
              	+'				            <div class="col-md-12">'
              	+'				                <div class="form-group">'
              	+'				                    <label>Detalle de la publicación</label>'
              	+'				                    <textarea class="form-control" type="text" id="detalle_modpresu" placeholder="Trabajos de pintura en latex y sintetico. Presupustos. Excelente terminación, mucha experiencía. Tel Si Whats app" rows="5"></textarea>'
              	+'				                </div>'
              	+'				            </div>'
              	+'				        </div>'
                +'          <hr>'
                +'            <h5>Zona de la Publicacion</h5>'
                +'                <div class="row">'
                +'				            <div class="col-md-4">'
                +'				                <div class="form-group">'
                  +'				                    <label>Seleccione una provincia</label>'
                +'				                    <select class="form-control" id="provincia_modpresu" onchange="cambia_prov()"><option disabled selected>Seleccione una provincia</option></select>'
                +'				                </div>'
                +'				            </div>'
                +'				            <div class="col-md-4">'
                +'				                <div class="form-group">'
                  +'				                    <label>Seleccione una localidad</label>'
                +'				                    <select class="form-control" id="localidad_modpresu" ><option disabled selected>Seleccione una localidad</option></select>'
                +'				                </div>'
                +'				            </div>'
                +'				            <div class="col-md-4">'
                +'				                <div class="form-group">'
                +'				                    <label>Seleccione el rubro</label>'
                +'				                    <select class="form-control" id="rubro_modpresu" ><option disabled selected>Seleccione un rubro</option></select>'
                +'				                </div>'
                +'				            </div>'
                +'				        </div>'
              	+'				    </div>'
                +'          <hr>'
                +'            <h5>Imagenes sobre el trabajo a realizar</h5>'
                +'                 <div class="row">'
                +'                    <div class="col-md-3" id="img-dg-1">'
                +'                      <label for="img_1">'
                +'                         <img id="uimg_1" src="assets/img/works/images_default.jpg" style="max-width:150px;margin-bottom: 20px;"><br>'
                +'                         <span class="btn btn-success btn-block" >Cargar Imagen 1</span>'
                +'                         <input type="file" id="img_1" onchange="cargaimg(1)" style="display:none">'
                +'                      </label>'
                +'                      <div id="load_1" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
                +'                  </div>'
               +'				            <div class="col-md-3"  id="img-dg-2">'
               +'                      <label for="img_2">'
               +'                         <img id="uimg_2" src="assets/img/works/images_default.jpg" style="max-width:150px;margin-bottom: 20px;"><br>'
               +'                         <span class="btn btn-success btn-block" >Cargar Imagen 2</span>'
               +'                         <input type="file" id="img_2" onchange="cargaimg(2)" style="display:none">'
               +'                      </label>'
               +'                      <div id="load_2" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
               +'				            </div>'
               +'				            <div class="col-md-3"  id="img-dg-3">'
               +'                      <label for="img_3">'
               +'                         <img id="uimg_3" src="assets/img/works/images_default.jpg" style="max-width:150px;margin-bottom: 20px;"><br>'
               +'                         <span class="btn btn-success btn-block" >Cargar Imagen 3</span>'
               +'                         <input type="file" id="img_3" onchange="cargaimg(3)" style="display:none">'
               +'                      </label>'
               +'                      <div id="load_3" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
               +'				            </div>'
               +'				            <div class="col-md-3"  id="img-dg-4">'
               +'                      <label for="img_4">'
               +'                         <img id="uimg_4" src="assets/img/works/images_default.jpg" style="max-width:150px;margin-bottom: 20px;"><br>'
               +'                         <span class="btn btn-success btn-block" >Cargar Imagen 4</span>'
               +'                         <input type="file" id="img_4" onchange="cargaimg(4)" style="display:none">'
               +'                      </label>'
               +'                      <div id="load_4" style="padding-top: -50%;display:none"><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-warning"></i><span class="sr-only">Loading...</span></center></div>'
               +'				            </div>'

               +'				        </div>'
                +'          <hr>'
                +'          </div>'
                +'          <div class="modal-footer">'
                +'            <button type="button" class="btn_1" onclick="carga_presupuesto()">Publicar Presupuestos</button>'
                +'            <button type="button" class="btn_1" data-dismiss="modal">Cerrar</button>'
                +'          </div>'
                +'        </div>'
                +'      </div>'
                +'    </div>';

$('modals').html(esqueleto);
pone_rubros('rubro_modpresu');
pone_provincias('provincia_modpresu');
//auto_localidad('loc_modpresu');
$('#presupuesto_add').modal('show');
}

////////////////////////////////////////////////////////////////////////////////

//funcion carga imagen
function cargaimg(num){

    $('#load_'+num).show();
    var url ='assets/php/insert_img_presu.php?';
    var formData = new FormData();
    var token = $('#token_modpresu').val();
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
            $('#uimg_'+num).attr('src', 'assets/img/presu/'+imagenf);
            $('#load_'+num).hide();

          }



      }
  })


}



//funcion Cargar presupuestos al backedn
function carga_presupuesto(){

  var token = $('#token_modpresu').val();
  var rubro = $('#rubro_modpresu').val();
  var localidad = $('#localidad_modpresu').val();
  var provincia = $('#provincia_modpresu').val();
  var titulo = $('#titulo_modpresu').val();
  var detalle = $('#detalle_modpresu').val();


  var string = 'token='+token+'&localidad='+localidad+'&titulo='+titulo+'&detalle='+detalle+'&rubro='+rubro+'&provincia='+provincia;

   /********************/

if(localidad!='' && titulo !='' && detalle !='' && rubro!='' ){

      $.ajax({
        url: 'assets/php/insert_presu.php',
        data: string,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data) {
            console.log(data);
                  if(data=='true'){
                  location.href = 'index.php?pagina=presupuestos';
                  }
         }
     })


   } else{ // fin de comprobacion
     console.log(string);
     alert('Complete los campor Obligatorios') //mejorar con sweet alert

   }


}


////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////

//funcion carga localidades
function cambia_prov(id,select){
  if(id){
    var prov = id;
  }else{
  var prov = $('#provincia_modpresu').val();
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
    $('#localidad_modpresu').html(opciones);
      if(select){
        $('#localidad_modpresu').val(select);
      }
    }
  })
}

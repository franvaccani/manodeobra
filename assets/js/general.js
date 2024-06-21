function pone_rubros(donde,select){

  $.ajax({
    type: "POST",
    url: "assets/php/rubros.php",
    dataType: "json",
    crossDomain: true,
    cache: false,
    success: function(data){
      var opciones ='<option disabled selected>Seleccione un rubro</option>';
      for (var i = 0; i < data.length; i++) {
        opciones +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

      }
    $('#'+donde).html(opciones);
    if(select){
      $('#'+donde).val(select);
    }
    }
  })
}

////////////////////////////////////////////////////////////////////////////////

function pone_mensajes(id){
    $('#interlocutor').val('');
    $.ajax({
        type: "POST",
        url: "assets/php/contactos.php?",
        data:'id_contacto ='+id,
        cache: false,
        success: function(data){
            console.log("datos",data);
            var esqueleto ='';
            if(data != "failed" ){
                for (var i = 0; i < data.length; i++) {
                    var yo='';
                    if(data[i].mio){
                    yo="out";
                    }else{
                    yo="in";
                    }
                    esqueleto += '  <li class="'+yo+'"> '+
                    '  <div class="chat-img">'+
                    '    <img alt="Avtar" src="'+data[i].avatar+'">'+
                    '  </div>'+
                    '  <div class="chat-body">'+
                    '    <div class="chat-message">'+
                    '      <h5>'+data[i].nombre+' <small> '+data[i].fecha+' </small></h5>'+
                    '      <p>'+data[i].mensaje+'</p>'+
                    '    </div>'+
                    '  </div>'+
                    ' </li>';
                }

                $('#interlocutor').val(id);
            }else{
                esqueleto += 'No se encontraron conversaciones';
            }

            $('.chat-list').html(esqueleto);

        }
  });
}

////////////////////////////////////////////////////////////////////////////////

function envia_mensajes(){

  var destinatario = $('#interlocutor').val();
  var mensaje = $('.write_msg').val();

  $.ajax({
    type: "POST",
    url: "assets/php/inserta_msg.php?",
    data: "msg="+mensaje+'&destino='+destinatario,
    cache: false,
    success: function(data){
      var esqueleto ='';
      if(data!='false'){
        $('.write_msg').val('');
        pone_mensajes(destinatario);

      }else{
        alert('no se pudo guardar el mensaje');
      }
    }

  })
}

////////////////////////////////////////////////////////////////////////////////

function buscador(){
  location.href='index.php?pagina=buscador&word='+$('#categoria').val()+'&loc='+$('#localidades').val()+'&p=1';
}
//////////////////////////////////////////////////////////////////////////

function pone_provincias(donde,select){

  $.ajax({
    type: "POST",
    url: "assets/php/provincias.php",
    dataType: "json",
    crossDomain: true,
    cache: false,
    success: function(data){
      var opciones ='<option disabled selected>Seleccione una Provincia</option>';
      for (var i = 0; i < data.length; i++) {
        opciones +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

      }
    $('#'+donde).html(opciones);
    if(select){
      $('#'+donde).val(select);
    }
    }
  })
}

////////////////////////////////////////////////////////////////////////////////

// Inserta la zona de trabajo como string ( Localidad > Provincia )
function auto_localidad(donde){
      $("#"+donde).autocomplete({

          source:function(request,response){
              $.ajax({
                  url:"assets/php/localidades.php",
                  data:{
                      search: request.term
                  },
                  success:function(data){
                      response(data);
                  }
              })
          },
           minLength: 3,

      })
      }
////////////////////////////////////////////////////////////////////////////////


function random() {
    return Math.random().toString(36).substr(2); // Eliminar `0.`
};

function token() {
    return random() + random(); // Para hacer el token más largo
};

function nomcate(id){
  $('.nom_cate').html($('#nombreCat_'+id).val());
}

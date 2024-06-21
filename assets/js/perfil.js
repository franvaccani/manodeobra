pone_provincias('perfil_provincia');

////////////////////////////////////////////////////////////////////////////////

//funcion carga localidades
function cambia_prov(id,select){
  if(id){
    var prov = id;
  }else{
  var prov = $('#perfil_provincia').val();
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
    $('#perfil_localidad').html(opciones);
      if(select){
        $('#perfil_provincia').val(id);
        $('#perfil_localidad').val(select);

      }
    }
  })
}

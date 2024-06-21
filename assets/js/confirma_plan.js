pone_provincias('plan_provincia');

////////////////////////////////////////////////////////////////////////////////

//funcion carga localidades
function cambia_prov(id,select){
  if(id){
    var prov = id;
  }else{
  var prov = $('#plan_provincia').val();
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
    $('#plan_localidad').html(opciones);
      if(select){
        $('#plan_provincia').val(id);
        $('#plan_localidad').val(select);

      }
    }
  })
}

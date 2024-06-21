<script src="assets/js/common_scripts.min.js"></script>
<script src="assets/js/common_func.js"></script>
<script src="assets/js/validate.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="assets/js/general.js?v='.date('YmdHis').'"></script>

<?php  if($_GET['pagina']=='detalle'){
  echo '<script src="assets/js/sticky_sidebar.min.js"></script>
        <script src="assets/js/details.js?v='.date('YmdHis').'"></script>
        <script>
        var progeneral_calif="'.$progeneral_calif.'";
        var cantidad_calif="'.$cantidad_calif.'";
        var str_calif="'.$str_calif.'";
        var esqueleto ="<span>"+str_calif+"<em>"+cantidad_calif+" Calificaciones</em></span><strong>"+progeneral_calif+"</strong>";
        $(".score").html(esqueleto);
        </script>';
}

if(!$_GET['pagina']){
  echo '<script src="assets/js/inicio.js?v='.date('YmdHis').'"></script>';
}

if($_GET['pagina']=='buscador'){
  echo '<script src="assets/js/sticky_sidebar.min.js"></script>';
  echo '<script src="assets/js/specific_listing.js"></script>';
  echo '<script src="assets/js/main_map_scripts.js"></script>';
  echo '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoAvNW8S5jjbTnjQ50M2ItHqVm-123b0A&callback=initMap"></script>';
  echo '<script>nomcate('.$_GET['cat'].');</script>';
  echo '<script src="assets/js/buscador.js"></script>';

}

if($_GET['pagina']=='presupuestos' || $_GET['pagina']=='presupuestos_list' ){
  echo '<script src="assets/js/presupuestos.js?v='.date('YmdHis').'"></script>';
}
if($_GET['pagina']=='publicaciones' || $_GET['pagina']=='detalle'){
  echo '<script src="assets/js/publicaciones.js?v='.date('YmdHis').'"></script>';
}

if($_GET['pagina']=='perfil'){
  echo '<script src="assets/js/perfil.js?v='.date('YmdHis').'"></script>';
  echo "<script>cambia_prov(".$_SESSION['perfil']['provincia'].",".$_SESSION['perfil']['localidad'].");$('#estadocuenta').html('".number_format($acumula_estado,2,',','.')."')</script>";
}

if($_GET['pagina']=='planes' && $_GET['id']!=''){
  echo '<script src="assets/js/confirma_plan.js?v='.date('YmdHis').'"></script>';
  echo "<script>cambia_prov(".$_SESSION['perfil']['provincia'].",".$_SESSION['perfil']['localidad'].");</script>";
}

if($_GET['pagina']=='review'){
  echo '<script src="assets/js/review.js?v='.date('YmdHis').'"></script>';
}

if($_GET['pagina']=='buzon'){
  echo "<script >pone_mensajes($('#interlocutor').val())</script>";
}





?>
  <script src="./register.js"></script>

<!-- BASE CSS -->
<link href="assets/css/bootstrap_customized.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="/back/assets/css/estilosR.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">


<!-- SPECIFIC CSS -->

<?php
  if(!$_GET['pagina']){
    echo '<link href="assets/css/home.css" rel="stylesheet">';
  }

  if($_GET['pagina']=='review'){echo '<link href="assets/css/review.css" rel="stylesheet">';}
  if($_GET['pagina']=='detalle'){echo '<link href="assets/css/detail.css" rel="stylesheet">';}
  if($_GET['pagina']=='planes'){echo '<link href="assets/css/planes.css" rel="stylesheet">';}
  if($_GET['pagina']=='publicaciones'){echo '<link href="assets/css/addoferta.css" rel="stylesheet">';}
  if($_GET['pagina']=='buscador'){echo '<link href="assets/css/listing.css" rel="stylesheet">';}
?>

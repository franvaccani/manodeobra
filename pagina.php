<?php if(!$_GET['pagina']){ include('inicio.php');} ?>
<?php if($_GET['pagina']=='detalle'){ include('details.php');} ?>
<?php if($_GET['pagina']=='registro'){ include('account.php');} ?>
<?php if($_GET['pagina']=='acceso'){ include('login.php');} ?>
<?php if($_GET['pagina']=='buscador'){ include('buscador.php');} ?>
<?php if($_GET['pagina']=='publicaciones'){ include('publicaciones.php');} ?>
<?php if($_GET['pagina']=='presupuestos'){ include('presupuestos.php');} ?>
<?php if($_GET['pagina']=='presupuestos_list'){ include('presupuestos_list.php');} ?>
<?php if($_GET['pagina']=='buzon'){ include('buzon.php');} ?>
<?php if($_GET['pagina']=='perfil'){ include('perfil.php');} ?>
<?php if($_GET['pagina']=='confirma'){ include('confirm.php');} ?>
<?php if($_GET['pagina']=='review'){ include('review.php');} ?>
<?php if($_GET['pagina']=='planes' && !$_GET['id']){ include('planes.php');} ?>
<?php if($_GET['pagina']=='planes' && $_GET['id']!=''){ include('confirma_plan.php');} ?>

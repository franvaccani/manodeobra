<?php
session_start();
include("conect.php");
$id =  $_SESSION['perfil']['userid'];
$link->query("Update usuarios Set online='0' where id= '$miid' ") ;
session_destroy();
header("Location: ../../index.php" );

?>

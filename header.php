



<header class="header clearfix <?php if (!$_GET['pagina']) {
    echo 'element_to_stick';
} else {
    echo 'sticky';
} ?>">
    <div style="margin-top: 40px;" class="container">
        <div id="logo" <?php if ($_SESSION['autenticado'] == 'SI') {
            echo 'class="oculto_movile"';
        } ?>>     
            <a class="navbar-brand" href="index.php">manodeobra.</a>
                               
        </div>



        

        <ul id="top_menu" class="drop_user">
            <?php
            if ($_SESSION['autenticado'] == 'SI') {

                echo '
                    <li ">
                            <div class="dropdown user clearfix">
                            <a href="#" data-toggle="dropdown" aria-expanded="false">';
                if ($_SESSION['perfil']['avatar'] != '') {
                    echo '<figure><img src="' . $_SESSION['perfil']['avatar'] . '" alt=""></figure>';
                } else {
                    echo '<figure><img src="assets/img/avatar1.jpg" alt=""></figure>';
                }
                echo $_SESSION['perfil']['nombre'] . '
                            </a>
                            <div class="dropdown-menu" style="">
                                <div class="dropdown-menu-content">
                                    <ul>
                                        <li style="width: 100%"><a href="index.php?pagina=perfil">Perfil</a></li> 
                                        <li style="width: 100%"><a href="index.php?pagina=publicaciones">Mis Publicaciones</a></li>             
                                        <li style="width: 100%"><a href="assets/php/logout.php" onlick="signOut()">Salir</a></li>

                                    </ul>
                                </div>
                            </div>
                            </div>
                    <!-- /dropdown -->
                    </li>';
            } 
            ?>
        </ul>


     

        <!-- /top_menu -->
        <a href="#" class="open_close">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu main-menu-mobile">
            <div id="header_menu">
                <a href="#" class="open_close">
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a class="navbar-brand" href="#">manodeobra.</a>
            </div>

            <ul>
                <li>
                    <div class="nav-item">
                        <a href="index.php">Home</a>
                    </div>
                </li>
                <li>
                    <div class="nav-item">
                        <a href="index.php?pagina=buscador&p=1">Categorias</a>
                    </div>
                </li>
                <?php if (!$_SESSION['autenticado']): ?>
                    <div class="nav-item">
                        <li><a href="#sign-in-dialog" id="sign-in">Ingresar</a></li>
                    </div>
                   <div class="nav-item">
                        <li>
                            <div class="borde">
                                <a id="asd" href="index.php?pagina=registro" class="add" style="color: white;">Registrarse</a>
                            </div>                
                        </li>
                   </div>
                   
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- /header -->
<!-- /header -->


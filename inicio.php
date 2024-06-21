<body>


    <div class="containerBuscador">
        <div class="row probar">
            <div class="col-lg-12 w-100">
                <h2 class="titulo">Encontrá la mano de obra <br> que estás necesitando</h2>
            </div>
            <form class="form_buscar" method="get" action="/">
                <input type="hidden" name="pagina" value="buscador">
                <div class="row no-gutters custom-search-input">
                    <div class="col-lg-10 contenedorBuscador">
                        <div class="form-group">
                            <input class="form-control" name="word" id="categoria" type="text" placeholder="Qué estás buscando...">

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <a class="btn_1 text-center" style="margin-top: 5px;width: 100%; " href="#" onclick="buscador()">Buscar</a>
                    </div>
                </div>
                <!-- /row -->
            </form>
        </div>
    </div>
    </div>
    <main>
        <div class="BuscarServicio">
            <div class="row contenedor">
                <div class="col-lg-12">
                    <h4 style="color: white; font-size: 5.5rem;">¿Qué querés hacer hoy?</h4>
                </div>
                <div class="col-lg-12 containerBotones">
                    <button class="boton"> <a href="index.php?pagina=buscador&p=1">Buscar servicio</a>
                    </button>
                    <button class="boton">
                        <a href="index.php?pagina=publicaciones">Ofrecer servicio</a>
                    </button>
                </div>
            </div>
        </div>
    </main>
    <div class="container container-encontra-experto">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-xs-12 container-textos-encontra">
                <h1 class="titulo-encontra">¡Encontra al Experto</h1>
                <br />
                <h1 class="titulo-encontra-2">que necesitas!</h1>
            </div>
        </div>

        <div class="row container-imagenes-expertos">
            <div class="col-lg-7 col-md-12 col-xs-12 container-imagenes-expertos">
                <div class="container-img-mix">
                    <a href="https://www.manodeobra.ar/index.php?pagina=buscador&p=1&cat=18"><img  src="/back/img-restalyng/Asset_6.png" width="80px" alt="Hogar" /></a>
                    <p></a>Hogar</p>
                </div>

                <div class="container-img-mix">
                    <a href="https://www.manodeobra.ar/index.php?pagina=buscador&p=1&cat=16"><img src="/back/img-restalyng/Asset_4.png" width="80px" alt="Hogar" /></a>
                    <p>Automotriz</p>
                </div>
                <div class="container-cons-varios">
                    <div class="container-img-mix">
                        <a href="https://www.manodeobra.ar/index.php?pagina=buscador&p=1&cat=19"><img src="/back/img-restalyng/Asset_5.png" width="80px" alt="Hogar" /></a>
                        <p>Construcción</p>
                    </div>

                    <div class="container-img-mix img-varios">
                        <a href="https://www.manodeobra.ar/index.php?pagina=buscador&p=1&cat=20"><img class="" src="/back/img-restalyng/Asset_3.png" width="80px" alt="Hogar" /></a>
                        <p>Varios</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-contacto">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center titulo-contactanos">
                    no te quedes con<br />dudas <u>contactanos</u>
                </h1>
            </div>
        </div>
        <div class="container container-inputs">
            <form name="formPrincipal" action="contact.php" method="post" id="contactForm">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Nombre" required="" />
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" name="apellidos" placeholder="Apellido" required="" />
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="mail" placeholder="ejemplo@correo.com" required="" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 container-mensaje-contacto">
                        <textarea class="form-control text-area" type="text" name="message" placeholder="Mensaje" required=""></textarea>
                    </div>
                    <div class="col-lg-12 col-md-12 container-boton-contacto">
                        <div class="justify-content-center boton-contacto">
                            <button class="btn btn-primary" id="submitButton" type="submit" name="enviar">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function sobreicono(icono) {
            $('#' + icono).removeClass('rotate-x');
            $('#' + icono).addClass('rotate-x');

        }

        const searchCategoria = (id) => {
            window.location.href = `index.php?pagina=buscador&p=1&cat=${id} `
        }
    </script>

<head>
<meta name="google-signin-client_id" content="132680092967-s1q9ea2ljugp73cnbl5ms7ok9ghoodua.apps.googleusercontent.com
">
<link href="assets/css/booking-sign_up.css" rel="stylesheet">
</head>


                <main class="bg_gray pattern" style="transform: none; padding-top: 50px;">

<div class="container margin_60_40">
    <div class="row justify-content-center">
        <div class="col-lg-4 contenedor-registro">
            <div class="sign_up">
                <div class="head">
                    <div class="title">
                        <h3 class="text-light">Registro</h3>
                    </div>
                </div>
                <!-- /head -->
                <div class="main">
                    <!--
                  <a href="" class="social_bt facebook">Registrate con Facebook</a>
                  <a href="" class="social_bt google">Registrate con Google</a>
                        <div class="divider"><span>O</span></div> -->
                    <h6>Complete el formulario</h6>
                    <div class="form-group-registro">
                        <input class="form-control form-registro" id="reg_nombre" placeholder="Ingrese el Nombre" required="">
                        <i class="icon_pencil"></i>
                    </div>
                    <div class="form-group-registro">
                        <input class="form-control form-registro" id="reg_apellido" placeholder="Ingrese el Apellido" required="">
                        <i class="icon_pencil"></i>
                    </div>
                    <div class="form-group-registro">
                        <input class="form-control form-registro" id="reg_email" type="email" placeholder="tu_casilla@correo.com" required="">
                        <i class="icon_mail"></i>
                    </div>

                    <div class="form-group-registro">
                        <input class="form-control form-registro" id="reg_telefono" type="telefono" placeholder="Ingrese su telefono" required="">
                        <i style="padding-left: 28px !important"; class="icon_phone"></i>
                    </div>

                    <div class="form-group-registro add_bottom_15">
                        <input class="form-control form-registro" type="password" placeholder="Password" id="reg_password"
                            name="password_sign" required="">
                        <i class="icon_lock"></i>
                    </div>
                    <div class="contenedor-registrarse">
                    <a href="#" onclick="enviar_registro()" class="boton-registro">Registrate Ahora</a>
                    <a href="" class="social_bt facebook">Registrate con Facebook</a>
                    <a href="#" class="social_bt google"
                    onclick="gapi.load('auth2', function() {
                                    gapi.auth2.init({
                                        client_id: '132680092967-s1q9ea2ljugp73cnbl5ms7ok9ghoodua.apps.googleusercontent.com',
                                        scope: 'profile email'
                                    }).then(() => {
                                        gapi.signin2.render('google-signin-button', {
                                            'scope': 'profile email',
                                            'longtitle': true,
                                            'onsuccess': onSignIn,
                                            'onfailure': function(error) {
                                                console.error('Error al iniciar sesión con Google:', error);
                                            }
                                        });
                                    });
                                }); return false;">
                        Registrate con Google
                    </a>                           
                                
                </div>
            </div>
            <!-- /box_booking -->
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->
</div>
<!-- /container -->

</main>
<!-- /main -->
        <script>

        function enviar_registro() {
            var reg_email = $('#reg_email').val();
            var reg_password = $('#reg_password').val();
            var reg_nombre = $('#reg_nombre').val();
            var reg_apellido = $('#reg_apellido').val();
            var reg_telefono = $('#reg_telefono').val();

            // Validación de datos
          
            if (reg_password.length < 6) {
                alert('La contraseña debe tener al menos 6 caracteres.');
                return;
            }
            // Validaciones adicionales según sea necesario

        // Validación de correo electrónico
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(reg_email)) {
        alert('Ingrese un correo electrónico válido.');
        return;
    }

  /*    // Validación de teléfono
     var phonePattern = /^[1-10][0-10]{8}$/; // El teléfono no debe comenzar con 0 y debe tener 9 dígitos
        if (!phonePattern.test(reg_telefono)) {
            alert('Ingrese un número de teléfono válido (sin el 0 inicial y con 10 dígitos).');
            return;
        }
 */


            var string = 'u=' + reg_email + '&p=' + reg_password + '&n=' + reg_nombre + '&a=' + reg_apellido +  '&t=' + reg_telefono;
            $.ajax({
                url: "assets/php/register.php?",
                data: string,
                type: "POST",
                success: function (data) {
                    if (data == 'true'){
                        window.location = 'index.php?pagina=confirma&email=' + reg_email;
                    } else {
                        alert('error al registrar cuenta');
                    }
                }
            });
        }

        </script>

        	<!-- COMMON SCRIPTS -->
    <script src="assets/js/common_scripts.min.js"></script>
    <script src="assets/js/common_func.js"></script>
    <script src="assets/js/validate.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>


    <div id="google-signin-button"></div>

<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var id_token = googleUser.getAuthResponse().id_token;

        // Envía el ID token al servidor
        enviarIdToken(id_token);
    }

    function enviarIdToken(id_token) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'assets/php/verificar_token_google.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log('Respuesta del servidor:', xhr.responseText);
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Redireccionar al usuario al dashboard o página principal
                window.location.href = 'index.php';
            } else {
                // Manejar el error, por ejemplo, mostrar un mensaje al usuario
                alert('Error al autenticar con Google');
            }
        };
        xhr.send('id_token=' + id_token);
    }

   
</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
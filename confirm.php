<link href="assets/css/booking-sign_up.css" rel="stylesheet">
<main class="bg_gray pattern" style="transform: none; padding-top: 50px;">

    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="sign_up">
                    <div class="head">
                        <div class="title">
                            <h3 class="titulo-ingreso">Ingreso</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <center>
                            <h6>Su registro se realizo correctamente <br> ¡Por favor inicia sesión! </h6>
                        </center>
                        <!--              <div class="sign-in-wrapper">
    <a href="#" class="social_bt facebook">Ingresar con Facebook</a>
    <a href="#" class="social_bt google">Ingresar con Google</a>
    <div class="divider"><span>O</span></div>
-->
                        <div class="form-group form-sign">
                            <label>Email</label>
                            <input type="email" class="form-control form-ingreso" value="<?php echo $_GET['email'] ?>" name="email2"
                                id="email2">
                            <i style="padding-top: 25px;" class="icon_mail_alt"></i>
                        </div>
                        <div class="form-group form-sign">
                            <label>Password</label>
                            <input type="password" class="form-control form-ingreso hideShowPassword-field" name="password2"
                                id="password2" value="" autocomplete="current-password"
                                style="margin: 0px; padding-right: 0px;">
                            <i style="padding-top: 25px;" class="icon_lock_alt"></i>
                        </div>
                    </div>
                    <div class="form-group" id="error_login" style="display:none;color:#e9ca00;text-align: center">Datos
                        incorrectos, revise su informacion.</div>
                    <div class="clearfix add_bottom_15">
                        <div class="checkboxes">
                            <label class="container_check">Recordarme
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="mt-1"><a id="forgot" href="javascript:void(0);">¿Perdiste la
                                Password?</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="javascript:void(0)" onclick="login()" class="btn_1 text_center mb_5 botonIngresar">Ingresar</a>
                    </div>
                    <div id="forgot_pw">
                        <div class="form-group">
                            <label>Please confirm login email below</label>
                            <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                            <i class="icon_mail_alt"></i>
                        </div>
                        <p>You will receive an email containing a link allowing you to reset your password to a new
                            preferred one.</p>
                        <div class="text-center"><input type="" value="Reset Password" class="btn_1"></div>
                    </div>
                </div>
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




    /*
    function enviar_registro(){
      var reg_email = $('#reg_email').val();
      var reg_password = $('#reg_password').val();
      var reg_nombre = $('#reg_nombre').val();
      var reg_apellido= $('#reg_apellido').val();
      var string = 'u='+reg_email+'&p='+reg_password+'&n='+reg_nombre+'&a='+reg_apellido;
      $.ajax(
        {
          url: "assets/php/register.php?",
          data: string,
          type: "POST",
          success: function(data){
            if(data == 'true'){
                console.log("a ver si es aca");
            }else{
              alert('error al registrar cuenta');
            }
          }
          })
    
    }*/

</script>
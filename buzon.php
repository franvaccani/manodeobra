<?php
  if($_SESSION['autenticado']=='SI'){
$filtros='';
$filtrando='';
$userid= $_SESSION['perfil']['userid'];
$consultacompleta = "SELECT *, inter.avatar_usuario as avatar_u FROM `contactos`
INNER JOIN usuarios ON usuarios.id_usuario = contactos.idDestino_contacto AND usuarios.estado_usuario = 1
INNER JOIN usuarios as inter ON inter.id_usuario = contactos.idUser_contacto AND inter.estado_usuario = 1
WHERE (idDestino_contacto = $userid OR idUser_contacto = $userid) AND estado_contacto = 1
GROUP by idUser_contacto ORDER BY `contactos`.`cuando_contacto` DESC ";
$sql_contact = $link->query($consultacompleta);
$cantidad_consulta = mysqli_num_rows($sql_contact);

 ?>
 <style>
 .ui-autocomplete{
   z-index: 9999;
 }
 .card .avatar {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%;
    margin-right: 5px;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}

.card ul.team-members li:not(:last-child) {
    border-bottom: 1px solid #F1EAE0;
}

.card ul.team-members li {
    padding: 10px 0px;
}

/*card user*/
.card-user .image {
    border-radius: 8px 8px 0 0;
    height: 150px;
    position: relative;
    overflow: hidden;
}
.card .image {
    width: 100%;
    overflow: hidden;
    height: 260px;
    border-radius: 6px 6px 0 0;
    position: relative;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
.card-user .image img {
    width: 100%;
}
.card-user .author {
    text-align: center;
    text-transform: none;
    margin-top: -65px;
}
.card .author {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.card .btn.btn-icon {
    padding: 7px;
}

.card .btn-sm {
    font-size: 12px;
    border-radius: 26px;
    padding: 4px 4px;
}

.card .btn {
    box-sizing: border-box;
    border-width: 2px;
    background-color: transparent;
    font-size: 14px;
    font-weight: 500;
    padding: 7px 18px;
    border-color: #66615B;
    color: #66615B;
    -webkit-transition: all 150ms linear;
    -moz-transition: all 150ms linear;
    -o-transition: all 150ms linear;
    -ms-transition: all 150ms linear;
    transition: all 150ms linear;
}

.card .btn-success {
    border-color: #7AC29A;
    color: #7AC29A;
}

.chat-list {
    padding: 0;
    font-size: .8rem;
}

.chat-list li {
    margin-bottom: 10px;
    overflow: auto;
    color: #ffffff;
}

.chat-list .chat-img {
    float: left;
    width: 48px;
}

.chat-list .chat-img img {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    width: 100%;
}

.chat-list .chat-message {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    background: #5a99ee;
    display: inline-block;
    padding: 10px 20px;
    position: relative;
}

.chat-list .chat-message:before {
    content: "";
    position: absolute;
    top: 15px;
    width: 0;
    height: 0;
}

.chat-list .chat-message h5 {
    margin: 0 0 5px 0;
    font-weight: 600;
    line-height: 100%;
    font-size: .9rem;
}

.chat-list .chat-message p {
    line-height: 18px;
    margin: 0;
    padding: 0;
}

.chat-list .chat-body {
    margin-left: 20px;
    float: left;
    width: 70%;
}

.chat-list .in .chat-message:before {
    left: -12px;
    border-bottom: 20px solid transparent;
    border-right: 20px solid #5a99ee;
}

.chat-list .out .chat-img {
    float: right;
}

.chat-list .out .chat-body {
    float: right;
    margin-right: 20px;
    text-align: right;
}

.chat-list .out .chat-message {
    background: #fc6d4c;
}

.chat-list .out .chat-message:before {
    right: -12px;
    border-bottom: 20px solid transparent;
    border-left: 20px solid #fc6d4c;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.sent_msg p {
 background: #05728f none repeat scroll 0 0;
 border-radius: 3px;
 font-size: 14px;
 margin: 0; color:#fff;
 padding: 5px 10px 5px 12px;
 width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
 float: right;
 width: 46%;
}
.input_msg_write input {
 background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
 border: medium none;
 color: #4c4c4c;
 font-size: 15px;
 min-height: 48px;
 width: 100%;
}
 </style>
  <main style="transform: none; padding-top: 50px;">
    		<div class="hero_single inner_pages background-image" data-background="url(assets/img/bg_ofertas.jpg)" style="background-image: url(&quot;assets/img/bg_ofertas.jpg&quot;);height: 180px;">
    			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)" style="background-color: rgba(0, 0, 0, 0.4);">
    				<div class="container">
    					<div class="row justify-content-center">
    						<div class="col-xl-9 col-lg-10 col-md-8">
    							<h1>Centro de Consultas</h1>
    							<p>Gestione su mensajeria desde Aqui!</p>
    						</div>
    					</div>
    					<!-- /row -->
    				</div>
    			</div>
    		</div>
    		<!-- /hero_single -->

    		<div class="container margin_60_30">
    			<div class="row">
            <div id="left_list" class="col-xl-4 col-lg-2 col-md-2 bg_yellow">
              <div class="card bg_yellow">
      <div class="header" style="margin-top: 20px;text-align: center;background: black;color: white;">
          <h4 class="title" style="color:white;margin-top: 5px;">Mensajes Recientes</h4>
      </div>
      <div class="content" style="margin-left: 15px">
          <ul class="list-unstyled team-members">
            <?php
            $recorre=0;
            $ultimo_msg='';
            while($wil= mysqli_fetch_assoc($sql_contact)){
              if($wil['id_usuario']==$userid){
                $a_consultar = $wil['idUser_contacto'];
              }else{
                $a_consultar = $wil['id_usuario'];
              }
              
              if($recorre==0){$ultimo_msg = $a_consultar;}
              echo '  <li onclick="pone_mensajes('.$a_consultar.')">
                    <div class="row" >
                        <div class="col-2">
                            <div class="avatar">

                                <img style="width:100%" src="'.$wil['avatar_u'].'" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-7" style="font-weight: 600;">
                            '.$wil['nombre_contacto'].'
                            <br>
                            <span class="text-muted"><small>'.date('d/m/Y H:i:s', strtotime($wil['cuando_contacto'])).'</small></span>
                        </div>

                        <div class="col-3 text-right">';
                        if($wil['leido_contacto']==0){echo '<i class="icon_mail_alt" title="Mensajes Nuevos"></i>';}

                        echo '
                        </div>
                    </div>
                </li>';
              $recorre++;
            }
             ?>
          </ul>
      </div>
  </div>
            </div>
            <div id="mensaje_content" class="col-xl-8 col-lg-10 col-md-10">
              <div class="card">
                <input type="hidden" id="interlocutor" value="<?php echo $ultimo_msg; ?>">
                <div class="card-header">Consulta</div>
                <div class="card-body height3">
                  <ul class="chat-list">

                  </ul>
                  <div class="type_msg">
                    <div class="input_msg_write">
                      <input type="text" class="write_msg" placeholder="Ingrese la respuesta">
                      <button class="msg_send_btn" onclick="envia_mensajes()" type="button">
                        <i class="arrow_carrot-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          	</div>
          </div>
    		</div>

    		</div>
    		<!-- /container -->


	</main>
<?php } else {echo '<br><br><br><br><center><h3>Necesita ingresar a su perfil</h3></center><br><br>';} ?>
	<!-- /main -->

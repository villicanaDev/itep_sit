<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/vendor/animate/animate.css">	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/vendor/select2/select2.min.css">	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/logincss/css/main.css">
<!-- css personalizado -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css-personalizado/personalizado-login.css">


<div class="container-login100 wrapper">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="<?= base_url();?>Login/loginUsuario" method="POST" id="postLogin" class="margin-bottom-0">
			  <center><img src="<?php echo base_url(); ?>assets/plugins/logincss/logo_itesp.png" class="headerLogin"/></center>
			    <div class="wrap-input100 validate-input m-b-20" data-validate="Usuario">
				    <input class="input100" type="text" name="user" placeholder="Usuario">
					<span class="focus-input100"></span>
			    </div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Contraseña">
					<input class="input100" type="password" name="password" placeholder="Contraseña">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Entrar
					</button>
				</div>			
				<div class="text-center">
					<!-- another page -->
					<!-- <a href="<?//= base_url();?>Registro/registroUsuario" class="txt2 hov1">
						Registrarse
					</a> -->
					<!-- modal register -->
					<!-- <a href="#" data-toggle="modal" data-target="#modal_registro" class="txt2 hov1">
						Registrarse
					</a> -->
				</div>
			</form>
		</div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/animsition/js/animsition.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/vendor/countdowntime/countdowntime.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/logincss/js/main.js"></script>

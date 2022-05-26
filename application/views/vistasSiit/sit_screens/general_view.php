<!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-1.9.1.min.js"></script> -->
<!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
<!-- <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets\plugins\logincss\vendor\bootstrap\css\bootstrap.css" rel="stylesheet" /> 
<link href="<?php echo base_url(); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.css" rel="stylesheet" />-->

<!-- css personalizado -->
<link href="<?php echo base_url(); ?>assets/css-personalizado/css-generalView.css" rel="stylesheet"/>

<section class="admin-content">
	<div class="m-b-10 bg-stars">
		<div class="row container">
			<div class="col-lg-10">
				<div class="titulos">Academias - ITEPS</div>	
			</div>
			<hr style="width: 100%;">
			<div class="boxCarreras">

				<a href="<?= base_url();?>SiiT/tics" class="boxCarrera w-100 card col-xl-5">
					<div class="boxCarrera">
						<div class="holderLogo">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/tics.png">					
						</div>
						<div>
							<p class="infoCarrera"><b>Ingeniería en Tecnologia de la Información y Comunicación</b></p>	
							<div class="detalleCarrra">
								<p class="infStatic">Grupos:</p>
								<p class="infDinamic">6</p>
								<p class="infStatic">Alumnos:</p>
								<p class="infDinamic">150</p>
							</div>
						</div>						
					</div>
				</a>

				<a href="#" onclick="carrera(2);" class="boxCarrera w-100 card col-xl-5">
					<div class="boxCarrera">
						<div class="holderLogo">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/desCominitario.png">
						</div>
						<div>
							<p class="infoCarrera"><b>Ingeniería en Desarrollo Comunitario</b></p>
							<div class="detalleCarrra">
								<p class="infStatic">Grupos:</p>
								<p class="infDinamic">6</p>
								<p class="infStatic"> Alumnos:</p>
								<p class="infDinamic">150</p>
							</div>
						</div>
					</div>
				</a>

				<a href="#" onclick="carrera(7);" class="boxCarrera w-100 card col-xl-5">
					<div class="boxCarrera">
						<div class="holderLogo">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/alimentarias.png">					
						</div>
						<div>
							<p class="infoCarrera"><b>Ingeniería en Industrias Alimentarias</b></p>
							<div class="detalleCarrra">
								<p class="infStatic">Grupos:</p>
								<p class="infDinamic">6</p>
								<p class="infStatic"> Alumnos:</p>
								<p class="infDinamic">150</p>
							</div>
						</div>
					</div>
				</a>

				<a href="#" onclick="carrera(6);" class="boxCarrera w-100 card col-xl-5">
					<div class="boxCarrera">
						<div class="holderLogo">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/gestEmpresarial.png">					
						</div>
						<div>
							<p class="infoCarrera"><b>Ingeniería en Gestión Empresarial</b></p>
							<div class="detalleCarrra">
								<p class="infStatic">Grupos:</p>
								<p class="infDinamic">6</p>
								<p class="infStatic"> Alumnos:</p>
								<p class="infDinamic">150</p>
							</div>
						</div>
					</div>
				</a>

				
				<a href="#" onclick="carrera(3);" class="boxCarrera w-100 card col-xl-5">
					<div class="boxCarrera">
						<div class="holderLogo">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/ingIndustrial.png">					
						</div>
						<div>
							<p class="infoCarrera"><b>Ingeniería Industrial</b></p>
							<div class="detalleCarrra">
								<p class="infStatic">Grupos:</p>
								<p class="infDinamic">6</p>
								<p class="infStatic"> Alumnos:</p>
								<p class="infDinamic">150</p>
							</div>
						</div>
					</div>
				</a>

				<a href="#" onclick="carrera(5);" class="boxCarrera w-100 card col-xl-5">
					<div class="boxCarrera">
						<div class="holderLogo">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/ingMecanica.png">					
						</div>
						<div>
							<p class="infoCarrera"><b>Ingeniería Mecánica</b></p>
							<div class="detalleCarrra">
								<p class="infStatic">Grupos:</p>
								<p class="infDinamic">6</p>
								<p class="infStatic"> Alumnos:</p>
								<p class="infDinamic">150</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>	
	</div>
</section>

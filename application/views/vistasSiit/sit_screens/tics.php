<!-- css general de carreras -->
<link href="<?=base_url(); ?>assets/css-personalizado/css-estiloCarreras.css" rel="stylesheet"/>
<link href="<?=base_url(); ?>assets/css-personalizado/estilo_tics.css" rel="stylesheet"/>
<!-- Graphics source -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js" integrity="sha512-Lii3WMtgA0C0qmmkdCpsG0Gjr6M0ajRyQRQSbTF6BsrVh/nhZdHpVZ76iMIPvQwz1eoXC3DmAg9K51qT5/dEVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<? //var_dump($almn_data);?>
<section class="admin-content">
	<div class="m-b-10 bg-stars">
		<div class="row container">
			<div class="col-lg-10">
				<div class="titulos">Ingeniería en Tecnologia de la Información y Comunicación</div>	
			</div>
			<hr style="width: 100%;">
			<div class="detalleCarrera">
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/logos/tics.png" style="width: 220px;margin-left: 2rem;">
            </div>
			<div class="contenedorTablas col-lg-8" style="margin-left: 4rem; margin-bottom: 2rem;">
				<ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
					<li class="nav-item">
                        <a class="tabContent nav-link active" data-toggle="tab" href="#general" role="tab" aria-selected="true" style="font-size:15px;">Datos generales</a>
                    </li>
					<? foreach ($grupo_data as $grupos) {?>								
					
					<?}?>
					
				</ul>
				<div class="tab-content w-100 card col-lg-12 tarjeta_carrerea_general">

					<div class="tab-pane show fade active" id="general" role="tabpanel" aria-labelledby="post-tab">
						<!-- <p class="text-center">Datos generales de la carrera</p> -->
						<div style="height: 250px !important;width: 250px;float: left;margin: 2rem;">						
							<canvas id="general_chart"></canvas>				
						</div>

						<div class="d-flex flex-wrap optiones_carrera">

							<!-- href="<?= base_url(); ?>SiiT/detalle_grupos" -->
							<a href="#" onclick="detalle_grupos();" class="card col-lg-5 opcion_grupo">
								<div class="d-flex flex-row align-items-center">
									<img src="<?php echo base_url();?>assets/img/icons/users-solid.svg" alt="grupos" style="width: 50px;">
									<p class="text_opcion" id="num_grupos">"9" Grupos</p>								 
								</div>
							</a>
						 	
							<a href="#" class="card col-lg-5 opcion_almn">
								<div class="d-flex flex-row align-items-center">
									<img src="<?php echo base_url();?>assets/img/icons/user-graduate-solid.svg" alt="almn_cursantes" style="width: 37px;">
									<p class="text_opcion" id="total_almn">"150" Alumnos cursantes</p>
								</div>

							</a>
						 	
							<a href="#" class="card col-lg-5 opcion_apro">
								<div class="d-flex flex-row align-items-center">
									<img src="<?php echo base_url();?>assets/img/icons/check-circle-solid.svg" alt="aprovados" style="width: 45px;">
									<p class="text_opcion" id="almn_apro"></p>
								</div>
							</a>
						 	
							<a href="#" class="card col-lg-5 opcion_repro">
								<div class="d-flex flex-row align-items-center">
									<img src="<?php echo base_url();?>assets/img/icons/exclamation-triangle-solid.svg" alt="en_riesgo" style="width: 47px;">
									<p class="text_opcion" id="almn_repro"></p>
								</div>
							</a>

						</div>

					</div>
					<div id="appending" class="d-flex justify-content-center" style="margin: 1rem 3rem 2rem;">

					</div>	

				</div>
			</div>
        </div>
    </div>
</section>
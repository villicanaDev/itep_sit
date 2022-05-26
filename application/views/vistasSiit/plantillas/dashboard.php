
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tittle?></title>
	<!-- css bootstrap -->
    <?php $this->load->view(THEME_PROJECT.'/plantillas/header'); ?>
    <!-- Css -->
	<link href="<?= base_url(); ?>assets/css-personalizado/css-dashboard.css" rel="stylesheet"/>
	

</head>
<body class="sidebar-pinned">
    <aside class="admin-sidebar">
	    <div class="admin-sidebar-wrapper js-scrollbar">
		    <ul class="menu">
			    <p>
				    <li class="menu-item">
						<span class="menu-label">
							<span class="menu-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>SiiT</b></span>
						</span>
				    </li>
			    </p>
			    <p>	
				    <li class="menu-item active ">
					    <a href="#" class=" menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-house-user"></i>
							    <!-- <img  style="width:24px;height:24px"> -->
						    </span>
						    <span class="menu-label">
							    <span class="menu-name">&nbsp;Academias</span>
						    </span>						
					    </a>
				    </li>
					<li class="menu-item">
						<a href="social" class=" menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-user-group"></i>
								<!-- <img  style="width:22px;height:18px"> -->
							</span>
							<span class="menu-label">
								<span class="menu-name">&nbsp;&nbsp;Grupos</span>
							</span>							
						</a>
					</li>
					<li class="menu-item">
						<a href="social" class=" menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-graduation-cap"></i>
								<!-- <img  style="width:22px;height:18px"> -->
							</span>
							<span class="menu-label">
								<span class="menu-name">&nbsp;&nbsp;Docentes</span>
							</span>							
						</a>
					</li>
			    </p>
			    <hr>
			    <p>
				    <li class="menu-item">
						<span class="menu-label">
							<span class="menu-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>OTHERS</b></span>
						</span>
				    </li>
			    </p>
			    <p>
				    <!-- <li class="menu-item">
					    <a href="contact" class=" menu-link">
							<span class="menu-icon">
							    <img style="width:24px;height:24px">
						    </span>
                            <span class="menu-label">
                                <span class="menu-name">&nbsp;&nbsp;Contact Us</span>
                            </span>						
					    </a>
				    </li>
				    <li class="menu-item">
					    <a href="faqs" class=" menu-link">
							<span class="menu-icon">
							    <img style="width:24px;height:24px">
						    </span>
                            <span class="menu-label">
                                <span class="menu-name">&nbsp;&nbsp;FAQ's</span>
                            </span>
                        </a>
				    </li> -->
				    <li class="menu-item">
					    <a href="terms-conditions" class=" menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-question"></i>
							    <!-- <img style="width:24px;height:24px"> -->
						    </span>
                            <span class="menu-label">
                                <span class="menu-name">&nbsp;&nbsp;Info</span>
                            </span>
                        </a>
				    </li>
			    </p>
		    </ul>
	    </div>
    </aside>
<!-- <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div> class="sidebar-toggle"-->
<header class="headBar admin-header">
<nav class="row my-auto" style="justify-content: space-around; margin-bottom:1rem;">

	<a href="#" data-toggleclass="sidebar-open" data-target="body"><img class="sidebar-toggle" src="<?= base_url(); ?>assets/img/icons/side-barIcon-white.png" style="width: 64px;height: 51px; margin-top: 1.5rem;"></a>
	

    <ul class="nav align-items-center">
        <img alt="LOGO" src="<?= base_url(); ?>assets/img/logo_itesp.png" style="width: 190px;height: 80px;">
    </ul>
    <ul class="nav align-items-center">
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar"> 
                    <span class="avatar-title rounded-circle"></span>
                </div>
            </a>
            <div class="dropdown-menu"   >
                <a class="dropdown-item" href="profile" style="font-size: 15px;">  Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout" style="font-size: 15px;"> Logout</a>
            </div>
        </li>

    </ul>
</nav>
</header>
    <?php  $this->load->view(THEME_PROJECT.$page); ?>
    <!-- /#page-wrapper -->

<!-- path del footer de dashboard -->
<?php  $this->load->view(THEME_PROJECT.'/footers/foot_dashboard'); ?>

<?php  if($foot_page){
	$this->load->view(THEME_PROJECT.$foot_page); 
}?>

</body>
</html>
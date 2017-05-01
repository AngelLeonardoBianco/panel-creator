	<div class="top-navbar">
			<div class="top-navbar-inner">					
					
					<!-- COMIENZA LOGO EMPRESA-->
					<?php include("logo_empresa.php"); ?>
					<!-- TERMINA LOGO EMPRESA -->
					
					<div class="top-nav-content">
						
						<!-- COMENZAR BOTON IZQUIERDA -->
						<div class="btn-collapse-sidebar-left"><i class="fa fa-bars"></i></div>
						<!-- FINALIZAR BOTON IZQUIERDA -->
						
						<!-- COMENZAR BOTON DERECHA -->
						<div class="btn-collapse-sidebar-right"><i class="fa fa-comments"></i></div>
						<!-- FINALIZAR BOTON DERECHA -->
						
						<!-- COMIENZA BOTON MENU  -->
						<div class="btn-collapse-nav" data-toggle="collapse" data-target="#main-fixed-nav"><i class="fa fa-plus icon-plus"></i></div>
						<!-- FINALIZA BOTON MENU -->
						
						
						<!-- COMIENZA PERFIL SUPERIOR -->
						<ul class="nav-user navbar-right">
							<li class="dropdown">
							  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
								<img src="http://demo.warungthemes.com/themeforest/sentir/1.3.0/assets/img/avatar/avatar-1.jpg" class="avatar img-circle" alt="Avatar">
								NOMBREAGENTE
							  </a>
							  <ul class="dropdown-menu square primary margin-list-rounded with-triangle">
								<li><a href="#fakelink">Modificar</a></li>
								<li><a href="#fakelink">Cuentas</a></li>
								<li><a href="#fakelink">Cambiar contraseña</a></li>
								<li><a href="#fakelink">Mi perfil público</a></li>
								<li class="divider"></li>
								<li><a href="lock-screen.html">Lock screen</a></li>
								<li><a href="login.html">Cerrar Sesión</a></li>
							  </ul>
							</li>
						</ul>
						<!-- FINALIZA PERFIL SUPERIOR -->
						
						<!-- COMENZAR BOTONES MENU SUPERIOR -->
						<div class="collapse navbar-collapse" id="main-fixed-nav">
							<ul class="nav navbar-nav navbar-left">
								<!-- COMIENZA MENU SUPERIOR NOTIFICACIONES -->
								<?php include("menu_superior_notificaciones.php"); ?>
								<!-- TERMINA COMIENZA MENU SUPERIOR NOTIFICACIONES -->
								
								<!-- COMIENZA MENU SUPERIOR TAREAS -->
								<?php include("menu_superior_tareas.php"); ?>
								<!-- TERMINA MENU SUPERIOR TAREAS -->
								
								<!-- COMIENZA MENU SUPERIOR MENSAJES -->
								<?php include("menu_superior_mensajes.php"); ?>
								<!-- TERMINA MENU SUPERIOR MENSAJES -->
								
								<!-- COMIENZA MENU SUPERIOR AGENTES -->
								<?php include("menu_superior_agentes.php"); ?>
								<!-- TERMINA MENU SUPERIOR AGENTES -->
							</ul>
						</div>
						<!-- FINALIZAR BOTONES MENU SUPERIOR -->
						
					</div><!-- /.top-nav-content -->
			</div><!-- /.top-navbar-inner -->
	</div><!-- /.top-navbar -->					
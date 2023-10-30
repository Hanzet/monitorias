<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Super-Administrador" || $_SESSION["perfil"] == "Administrador"){

			echo'<li>

				<a href="bienvenida">

					<i class="fa fa-hand-paper-o"></i>
					<span>¡Bienvenidos!</span>

				</a>
			
				<li>';

		}

		if($_SESSION["perfil"] == "Super-Administrador"){


			echo '<li class="active">

					<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

					</a>

				</li>
			
				<li>

				<a href="usuarios-administradores">

					<i class="fa fa-user"></i>
					<span>Usuarios Administradores</span>

				</a>

				</li>
			
				<li>

				<a href="evaluacion">

				<i class="fa fa-address-book-o"></i>
				<span>Evaluación de Monitores</span>

				</a>

				</li>
				
				<li>

				<a href="reportes">

				<i class="fa fa-bar-chart"></i>
				<span>Reportes</span>

				</a>

				</li>
				
				<li>

				<a href="administrar-pago">

				<i class="fa fa-money"></i>
				<span>Administrar Pago</span>

				</a>

				</li>';

		}

		if($_SESSION["perfil"] == "Super-Administrador" || $_SESSION["perfil"] == "Administrador"){

			echo'<li>

				<a href="usuarios-monitores-practicantes">

					<i class="fa fa-users"></i>
					<span>Monitores y Practicantes</span>

				</a>

				</li>

				<li>

				<a href="registro-novedades">

					<i class="fa fa-address-card"></i>
					<span>Registro de Monitores</span>

				</a>

				</li>';

		}

		if($_SESSION["perfil"] == "Super-Administrador" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Monitor-Practicante"){

		echo'<li>

		<a href="consulta">

			<i class="fa fa-search-plus"></i>
			<span>Consulta de monitoría</span>

		</a>

		</li>';

		}

		?>

		</ul>

	 </section>

</aside>
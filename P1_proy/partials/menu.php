<table>
	<tr>
		<td class="imgIzq"><img class="imgMenu" src="./img/Logo.png" id="logo" alt="logo" /></td>
		<td>
			<nav>
				<ul>
					<li>
						<a href="./portal.php?action=home">Home</a>
					</li>
					<li>
						<a href="?action=sobre_nosotros">Sobre nosotros</a>
					</li>
					<li>
						<a href="?action=movil">Móvil</a>
					</li>
					<li>
						<a href="?action=listar_productos">Productos</a>
					</li>
					<?php 
		
		 				if (!isset($_SESSION['usuario'])){
							echo '<li><a href="?action=login">Iniciar sesión</a></li>';
							echo '<li><a href="?action=registrar_usuario">Registrarse</a></li>';
		 				}
						elseif (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'admin')
							echo '<li><a href="?action=registrar_producto">Registrar Producto</a></li>';
						elseif (isset($_SESSION['usuario']))
							echo '<li><a href="?action=ver_cesta">Cesta de Compra</a></li>';
							echo '<li><a href="?action=cerrar_sesion">Cerrar sesión</a></li>';
        			?>
				</ul>
			</nav>
		</td>
	</tr>
</table>
<main>
	<h1>Datos de registro: </h1>
	<form class="form_usuario" action="?action=registrar_usuario" method="POST">
		<br>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_required" size="20" maxlength="50" value=""
		 placeholder="Miguel Cervantes" />
		<br/>
		<br>
		<label for="email">Email</label>
		<br/>
		<input type="text" name="email" class="item_required" size="20" maxlength="50" value=""
		 placeholder="kiko@ic.es" />
		<br/>
		<br>
		<label for="clave">Clave</label>
		<br/>
		<input type="password" name="clave" class="item_required" size="8" maxlength="50" value=""
		/>
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>
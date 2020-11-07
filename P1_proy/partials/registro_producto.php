<main>
	<h1>Registrar producto : </h1>
	<form action="?action=insertar_producto" method="POST">
		<br>
		<label for="product_id">Identificador</label>
		<br/>
		<input type="number" name="product_id" class="item_required" size="20" maxlength="5" value=""
		 placeholder="123" />
		<br/>
		<br>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_required" size="20" maxlength="100" value=""
		 placeholder="Teclado" />
		<br/>
		<br>
		<label for="imagen">Url imagen</label>
		<br/>
		<input type="text" name="imagen" class="item_required" size="50" maxlength="500" value=""/>
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>
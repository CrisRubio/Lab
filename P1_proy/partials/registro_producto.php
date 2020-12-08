<main>
	<h1>Registrar producto : </h1>
	<form method="?action=insertar_producto"  method="POST">
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
		<label for="precio">Precio</label>
		<br/>
		<input type="number" name="precio" class="item_required" size="20" maxlength="100" value=""
		 placeholder="30.45" />
		<br/>
		<br>
		<label for="imagen">Imagen</label>
		<br>
		<input type="text" name="imagen" size="20" maxlength="100">
		<div id="insert" class="insertForm">
			<img class="closeForm" src="./img/close.jpg" onclick=cerrar() alt="close" />
			<br>
			<form action="?action=upload" method="POST" enctype="multipart/form-data" id="formulario">
        		Selecciona una imagen:
				<br>
        		<input type="file" accept="image/*" name="tmp_file" id="tmp_file" class="fileImage" onchange=handleFiles(event)>
				<br/>
				<br>
				<canvas class="canvasImage" id="canvas"></canvas>
				<br/>
				<br>
        		<input type="submit" value="SUBIR" name="submit" onclick=upload()>
				<br/>
				<br>
			</form>
		</div>
		<button type="button" class="buttonImage" onclick=mostrar() id="buttonImages">Insertar Imagen</button>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>
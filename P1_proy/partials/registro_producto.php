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
		<label for="imagen">Imagen</label>
		<br/>
		<div id="insert" class="insertForm">
			<img class="closeForm" src="./img/close.jpg" onclick=cerrar() alt="close" />
			<br>
			<form action="?action=upload" method="post" enctype="multipart/form-data">
        		Selecciona una imagen:
				<br>
        		<input type="file" accept="image/*" name="tmp_file" id="upload" class="fileImage" onchange=handleFiles()>
				<br/>
				<br>
				<canvas class="canvasImage" id="canvas"></canvas>
				<br/>
				<br>
        		<input type="submit" value="SUBIR" name="submit"  onclick=cerrar()>
				<br/>
				<br>
			</form>
		</div>
		<button type="button" class="buttonImage" onclick=mostrar()>Insertar Imagen</button>
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>
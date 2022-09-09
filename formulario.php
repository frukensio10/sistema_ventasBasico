


  <?php
  include_once "enlaces/head.php";
  include_once "enlaces/nav_lateral.php";
  ?>

 
<body class="sb-nav-fixed">
	<div id="layoutSidenav_content">
		<div class="col-xs-12">
		<div class="container-fluid">
			<h1>Nuevo producto</h1>
			<form method="post" action="nuevo.php">
				<label for="codigo">Código de barras:</label>
				<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

				<label for="descripcion">Descripción:</label>
				<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

				<label for="precioVenta">Precio de venta:</label>
				<input type="text" class="form-control" name="precioVenta" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" required type="number" id="precioVenta" placeholder="Precio de venta" maxlength="8">

				<label for="precioCompra">Precio de compra:</label>
				<input type="text" class="form-control" name="precioCompra" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$"  required type="number"  id="precioCompra" placeholder="Precio de compra" maxlength="8">

				<label for="existencia">Cantidad:</label>
				<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
				<br><input class="btn btn-info" type="submit" value="Guardar">
				<br>

				<br>
			
			</form>
			

		</div>
		</div>
		<footer>
			<div class="card-header"><i class="fab fa-product-hunt"></i>Nuevo Producto</div>
			</footer>
	</div>
</body>

<?php
	include_once "enlaces/link.php";
?>
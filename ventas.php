<?php include_once "enlaces/head.php";
	  
	  include_once "enlaces/nav_lateral.php";
 ?>
<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<body class="sb-nav-fixed">
	
	<div id="layoutSidenav_content">
	<div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Ventas</div>
            <div>
		<br>
	<div class="container-fluid">
		
		
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Eliminar</th>
					<th>Imprimir</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
									
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<br>
	</div>
 </div>
</body>
<?php include_once "enlaces/link.php" ?>
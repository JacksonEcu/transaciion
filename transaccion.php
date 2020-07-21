<?php


	$conexion=mysqli_connect('localhost','root','','debi');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Transacciones</title>
</head>

<body>

<br>

<table class="table table-striped table-dark">
<thead>
		<tr>
			<td>Nro_cuenta</td>
			<td>Cedula</td>
			<td>Saldo</td>
        </tr>
</thead>

		<?php 
		$sql="SELECT * from tra";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['nro_cuenta'] ?></td>
			<td><?php echo $mostrar['cedula'] ?></td>
			<td><?php echo $mostrar['saldo'] ?></td>
		</tr>
	<?php 
	}
	 ?>
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=debi', 'root', '', 
        array(PDO::ATTR_PERSISTENT => true));
    echo "Transaccion Exitosa";
  } catch (Exception $e) {
    die("Transaccion Fallida: " . $e->getMessage());
  }

try {  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $db->beginTransaction();
    $db->exec("UPDATE  tra set saldo= saldo - 10 where nro_cuenta  = '11' ");
    echo $db->inTransaction();
    $db->exec("UPDATE  tra set saldo= saldo + 10 where nro_cuenta  = '12' ");
    $db->commit();
    
  } catch (Exception $e) {
    $db->rollBack();
    echo "Fallo: " . $e->getMessage();
  }

?>
</body>
</html>


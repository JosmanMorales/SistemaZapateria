<!DOCTYPE html>
<html>
<head>
	<title>Activar cuenta</title>
<?php
	include("conexion.php");
	$id=$datos;
	

		$modelo = new Conexion();
		$conexion=$modelo->obtener_conexion();
		$sql="update usuario set status=1 where id_usuario=:id";
		$estado=$conexion->prepare($sql);
		$estado->bindParam(':id',$id);
		if(!$estado){
			echo "_";
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>';
            echo "<script>Swal.fire({
                type: 'error',
                title: 'Atención',
                text: 'Su cuenta no pudo activarse',
                }).then(function () {							window.location.href='http://localhost/Proyecto_zapateria/ver/cliente';        
                });
            </script>";
		}else{
			$estado->execute();
			echo "_";
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>';
            echo "<script>Swal.fire({
                type: 'info',
                title: 'Atención',
                text: 'Se ha activado su cuenta',
                }).then(function () {							window.location.href='http://localhost/Proyecto_zapateria/ver/login';        
                });
            </script>";
		}
		
?>
</head>
<body>

</body>
</html>

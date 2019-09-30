<?php

if($_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Comercial"){

  echo '<script> 

    window.location = "inicio";
 
  </script>';

  return;

}
 
?>
<div class="row animated fadeInRight">
		<?php
		include "reportes/ventas-realizadas.php";
		?> 
</div>

<?php

	if($_SESSION["perfil"] == "Administrador"){
		echo 
		'<div class="row animated fadeInRight"> 
			<div class="col-lg-12">'; 
				 
				include "reportes/reportes-planes.php"; 
			echo'
			</div>';

	}else if ($_SESSION["perfil"] == "Agencias") {
		echo 
		'<div class="row animated fadeInRight"> 
			<div class="col-lg-12">';
				
				include "reportes/reporte-planes-agencias.php"; 
			echo'
			</div>';
	}else if ($_SESSION["perfil"] == "Coordinador") {
		echo 
		'<div class="row animated fadeInRight"> 
			<div class="col-lg-12">';
				
				include "reportes/reporte-planes-coordinador.php"; 
			echo'
			</div>';
	}

?>

 
	<div class="col-lg-12">
		<?php
		include "reportes/reporte-vendedores.php";
		?>
		
	</div>
</div>

<div class="row animated fadeInRight">
	<div class="col-lg-12">
		<?php
		include "reportes/reportes-clientes.php";
		?>
	</div>
</div>
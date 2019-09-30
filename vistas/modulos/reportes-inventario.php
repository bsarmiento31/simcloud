<?php

if($_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Comercial"){

  echo '<script> 

    window.location = "inicio";

  </script>';

  return;

} 

?>
<?php
 
            //Contar Inventarios

$perfil = "agregopadre";
$valor1 = $_SESSION["usuario"];

$contarInventario = ControladorVentas::ctrContarSimcards($perfil, $valor1);

if($_SESSION["perfil"] == "Administrador"){
	echo 
	'<div class="row animated fadeInRight">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Reporte de inventarios
				</h5>
			</div>
			<div class="ibox-content"> 
				<!--<div>
					<canvas id="barChart12" height="140"></canvas>
				</div>-->
                <div class="ibox-content">
                        <div id="morr-chart"></div>
                    </div>
			</div>
		</div>
	</div>
</div>';

}else if ($_SESSION["perfil"] == "Agencias") {
	echo 
	'
<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Reporte de inventarios</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="morr-chart"></div>
                    </div>
                </div>';
}
?>

<script type="text/javascript">
	 Morris.Bar({ 
        element: 'morr-chart',
        data: [

        <?php

        	foreach ($contarInventario as $value) {
        		echo "
            		{y: '".$value["estado"]."', a: '".$value["cantidad"]."'},";
        	}

        ?>
		 ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Series A'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#af174f'],
    });
</script>

         
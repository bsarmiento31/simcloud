<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>Vendedores</h5>
		<div class="ibox-tools">
			<button type="button" class="btn btn-w-m btn-default" data-toggle="modal" data-target="#verTablaVendedores">Ver Mas</button> 
		</div>
	</div>
	<div class="ibox-content">
		<div class="text-center">
			<div id="morris-bar-chart"></div>
		</div> 
	</div>  
	
</div>
<script type="text/javascript">
</script>



<div class="modal inmodal" id="verTablaVendedores" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
             	<h4 class="modal-title">Vendedores</h4>

             </div>
             <div class="modal-body">
              	<table class="table table-bordered table-striped dt-responsive vendedoresTablas" width="100%" >
              		<thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Valor</th>
                    </tr>
                    <tbody>

                    <?php

                    if ($_SESSION["perfil"] == "Administrador") {
                      
                            $valor = null;
                            $perfil = null;

                            $vendedores = ControladorVentas::ctrSumarVentasVendedor($perfil,$valor);
                          }else if ($_SESSION["perfil"] == "Agencias") {

                            $valor = $_SESSION["usuario"];
                            $perfil = "agregopadre";

                            $vendedores = ControladorVentas::ctrSumarVentasVendedor($perfil,$valor);

                          }else if ($_SESSION["perfil"] == "Coordinador") {
                            $valor = 1;
                            $perfil = "coordinador";

                            $vendedores = ControladorVentas::ctrSumarVentasVendedor($perfil,$valor);
                          } 


                      foreach ($vendedores as $key => $value) {

                      	$item = "id";
                        $valor = $value["vendedor"];
                          $perfil = null;
                          $valor1 = null;
                          $perfil1 = null;
 
                          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                         echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$usuarios["nombre"].'</td>
                            <td>'.number_format($value["valor"],2).'</td>
                        </tr>';

                    }

                     ?>
                    
                    </tbody>
                    </thead>
              	</table>
             </div>
            
         </div>
     </div>
</div>



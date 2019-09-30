<div class="ibox float-e-margins"> 
    <div class="ibox-title">
        <h5>Clientes que mas compraron</h5>
      <div class="ibox-tools">
			<button type="button" class="btn btn-w-m btn-default" data-toggle="modal" data-target="#verTablaClientes">Ver Mas</button> 
		</div>
    </div>
    <div class="ibox-content">
        <div>
            <div id="barchar" height="120"></div>
         </div>
    </div>
</div>
 
<div class="modal inmodal" id="verTablaClientes" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
             	<h4 class="modal-title">Clientes</h4>
             </div>
             <div class="modal-body">
              	<table class="table table-bordered table-striped dt-responsive clientesTablas" width="100%" >
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

                      			$vendedores = ControladorVentas::ctrSumarVentasClientes($perfil,$valor);
                      		}else if ($_SESSION["perfil"] == "Agencias") {

                      			$valor = $_SESSION["usuario"];
                      			$perfil = "agregopadre";

                      			$vendedores = ControladorVentas::ctrSumarVentasClientes($perfil,$valor);
                      		}else if ($_SESSION["perfil"] == "Coordinador") {
                      		    
                            $valor = 1;
                            $perfil = "coordinador";

                            $vendedores = ControladorVentas::ctrSumarVentasClientes($perfil,$valor);
                          }			

 

                      foreach ($vendedores as $key => $value) {
                         echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["cliente"].'</td>
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



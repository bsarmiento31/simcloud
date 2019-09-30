<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>Cantidad de destinos mas vendidos</h5>
		<div class="ibox-tools">
			<button type="button" class="btn btn-w-m btn-default" data-toggle="modal" data-target="#verTablaPlanesTodosAgencias">Ver todos</button>
		</div> 
	</div>
	<div class="ibox-content">
		<div id="morris-donut-chart" ></div> 
	</div>
</div> 



<div class="modal inmodal" id="verTablaPlanesTodosAgencias" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
             	<h4 class="modal-title">Total de planes vendidos</h4>

             </div>
             <div class="modal-body">
              	<table class="table table-bordered table-striped dt-responsive planesTablasTodos" width="100%" >
              		<thead>
                    <tr>
                        <th>#</th>
                        <th>Destino</th>
                        <th>Planes</th>
                        <th>Valor</th>
                    </tr>
                    <tbody>


                    <?php
                      
                    $valor = $_SESSION["usuario"];
                    $perfil = "agregopadre";
                    $perfil1 = null;
                    $valor1 = null;

                    $planes = ControladorVentas::ctrSumaPlanesTotales($perfil,$valor,$perfil1,$valor1);
                  
                      foreach ($planes as $key => $value) {

                 
                         echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["destino"].'</td>
                            <td>'.$value["tipoplan"].'</td>
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

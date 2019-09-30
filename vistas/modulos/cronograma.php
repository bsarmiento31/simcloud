<div class="row">

    <div class="col-lg-12 animated fadeInRight">
      <div class="ibox float-e-margins"> 
        <div class="ibox-title"> 
                <h5>Filtro de fecha de llegada</h5>
                <div class="ibox-tools">
                      <?php

                    if ($_SESSION["perfil"] == "Administrador") { 
                    ?>
                     <button class="btn btn-success btn-xs pull-right traerFecha" estadoDesactivado="desactivado" value="<?php echo date('Y-m-d'); ?>">Desactivar Simcards</button>
                    <?php
                     }
                    ?>
                  
                </div>
        </div>
        <div class="ibox-content">
          <button id="reportrangeLLegada" type="button" style="background: #fff; cursor: pointer; padding: 6px 10px; border: 2px solid #ccc; width:25%;border-radius: 5px;">
                            <i class="fa fa-calendar"></i>&nbsp; 
                                <span></span> <i class="fa fa-caret-down"></i>
            </button>
        <a href="cronograma"><button type="button" class="btn btn-warning cancelarFechaCronograma"><i class="fa fa-window-close"></i>&nbsp;Cancelar Fechas</button></a>
        
            
        </div>
      </div> 
    </div> 
 
 </div>

<div class="row">
        <div class="col-lg-12 animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cronograma de activación</h5>
            </div>
            <div class="ibox-content">
            <table class="table table-bordered table-striped dt-responsive tablaCronograma">
            <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th># de SimCard</th>
                <th>Tipo de plan</th>
                <th># Linea del exterior</th>
                <th>Destino</th>
                <th>Agregado Por</th>
                <th>Fecha de llegada</th>
                <th>Fecha de regreso</th>
                <th>Estado</th>
            </tr>
            </thead>

            <tbody>
                    <?php


                    if ($_SESSION["perfil"] == "Administrador") {


                    if(isset($_GET["fechaInicial"])){

                    $fechaInicial = $_GET["fechaInicial"];
                    $fechaFinal = $_GET["fechaFinal"];
                    $valor = null;
                    $perfil = null;
                    $valor1 = null;
                    $perfil1 = null;

                    }else{ 

                    $fechaInicial = null;
                    $fechaFinal = null;
                    $valor = null;
                    $perfil = null;
                    $valor1 = null;
                    $perfil1 = null;

                    }

                    $ventas = ControladorVentas::ctrRangoFechasVentasCronograma($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

                    }else if($_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Comercial"){

                    if(isset($_GET["fechaInicial"])){

                    $fechaInicial = $_GET["fechaInicial"];
                    $fechaFinal = $_GET["fechaFinal"];
                    $valor = $_SESSION["id"];
                    $perfil = "vendedor";
                    $valor1 = null;
                    $perfil1 = null;

                    }else{ 

                    $fechaInicial = null;
                    $fechaFinal = null;
                    $valor = $_SESSION["id"];
                    $perfil = "vendedor";
                    $valor1 = null;
                    $perfil1 = null;

                    }

                    $ventas = ControladorVentas::ctrRangoFechasVentasCronograma($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

                    }else if ($_SESSION["perfil"] == "Agencias") {
                        if(isset($_GET["fechaInicial"])){

                    $fechaInicial = $_GET["fechaInicial"];
                    $fechaFinal = $_GET["fechaFinal"];
                    $valor = null;
                    $perfil = null;
                    $valor1 = $_SESSION["usuario"];
                    $perfil1 = "agregopadre";

                    }else{ 

                    $fechaInicial = null;
                    $fechaFinal = null;
                    $valor = null;
                    $perfil = null;
                    $valor1 = $_SESSION["usuario"];
                    $perfil1 = "agregopadre";

                    }

                    $ventas = ControladorVentas::ctrRangoFechasVentasCronograma($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);
                    }else if ($_SESSION["perfil"] == "Coordinador") {
                        if(isset($_GET["fechaInicial"])){

                    $fechaInicial = $_GET["fechaInicial"];
                    $fechaFinal = $_GET["fechaFinal"];
                    $valor = null;
                    $perfil = null;
                    $valor1 = 1;
                    $perfil1 = "coordinador";

                    }else{ 

                    $fechaInicial = null;
                    $fechaFinal = null;
                    $valor = null;
                    $perfil = null;
                    $valor1 = 1;
                    $perfil1 = "coordinador";

                    }

                    $ventas = ControladorVentas::ctrRangoFechasVentasCronograma($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);
                    }

                     foreach ($ventas as $key => $value) {
                         echo '<tr>';



                         echo'

                            <td>'.($key+1).'</td>
                            <td>'.$value["cliente"].'</td>
                            <td>'.$value["simcard"].'</td>
                            <td>'.$value["tipoplan"].'</td>';
                             if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Coordinador") {
                                    if ($value["lineaexterior"] != "") {
                                echo ' <td><button class="btn btn-default btn-xs btnAgregarLinea" idSimcard2="'.$value["id"].'" data-toggle="modal" data-target="#CrearLinea" >'.$value["lineaexterior"].'</button></td>';
                                    }else{
                                echo ' <td><button class="btn btn-info btn-xs btnAgregarLinea" data-toggle="modal" data-target="#CrearLinea" idSimcard2="'.$value["id"].'" >Agregar Numero</button></td>';
                                        }
                             }else{
                                 if ($value["lineaexterior"] != "") {
                                echo ' <td><button disabled class="btn btn-default btn-xs btnAgregarLinea" idSimcard2="'.$value["id"].'" data-toggle="modal" data-target="#CrearLinea" >'.$value["lineaexterior"].'</button></td>';
                                    }else{
                                echo ' <td><button disabled class="btn btn-info btn-xs btnAgregarLinea" data-toggle="modal" data-target="#CrearLinea" idSimcard2="'.$value["id"].'" >No disponible</button></td>';
                                        }
                             }

                           
                            echo'
                            <td>'.$value["destino"].'</td>
                            <td>'.$value["agrego"].'</td>
                            <td>'.$value["fechallegada"].'</td>
                            <td>'.$value["fecharegreso"].'</td>
                            <td>';
                           if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Coordinador") {
                               if ($value["estado"] != "desactivado") {
                               echo '<button class="btn btn-success btn-xs btnActivarSimcard" estadoSimcard="desactivado" idSimcard="'.$value["id"].'" >Activado</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs btnActivarSimcard" estadoSimcard="activado" idSimcard="'.$value["id"].'" >Desactivado</button>';
                            }
                           }else{
                             if ($value["estado"] != "desactivado") {
                               echo '<button class="btn btn-success btn-xs btnActivarSimcard" estadoSimcard="desactivado" disabled idSimcard="'.$value["id"].'" >Activado</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs btnActivarSimcard" disabled estadoSimcard="activado" idSimcard="'.$value["id"].'" >Desactivado</button>';
                            }
                           }
                            

                           echo'
                            </td>
                        </tr>';

                    }

                    ?>
            </tbody>
            
       </table>
    
        </div>
    </div>
  
</div>
</div>


<div class="modal inmodal" id="CrearLinea" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <h4 class="modal-title">línea en el exterior</h4>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal">

                  <div class="form-group">
                        <label class="col-sm-2 control-label">Agregar la línea</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Línea..." name="nuevoLinea" id="nuevoLinea" class="form-control">
                        </div>
                    </div>

                     <input type="hidden" id="NuevaLineaId" name="NuevaLineaId">
                  

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Línea</button>
                </div>


                    <?php

                        $crearLinea = new ControladorVentas();
                        $crearLinea -> ctrCrearLineaExterior();

                    ?>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>
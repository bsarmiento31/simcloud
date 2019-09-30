<div class="col-lg-12 animated fadeInRight" style="margin-top: 15px;">
    <div class="row">
        <div class="ibox float-e-margins">
                <div class="ibox-title"> 
                    <h5>Acciones</h5> 
                    <div class="ibox-tools">  
                        <a class="collapse-link"> 
                            <i class="fa fa-chevron-up"></i>    
                        </a> 
                    </div>  
                </div>    
                <div class="ibox-content"> 
                     <div class="row">
                        
                         <div class="col-lg-8">
                        
                        <a href="crear-venta"><button type="button" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Nueva Venta</button></a>
                        <a href="ventas"><button type="button" class="btn btn-warning cancelarFecha"><i class="fa fa-window-close"></i>&nbsp;Cancelar Fechas</button></a>
                               <?php

                        if(isset($_GET["fechaInicial"])){

                            echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

                        }else{ 

                            echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

                            }         

                        ?>

                        <?php

                            if ($_SESSION["perfil"] == "Administrador") {
                                echo '<!--<button type="button" class="btn btn-success"><i class="fa fa-file-excel-o"></i>&nbsp;Descargar Excel</button>-->';
                            }

                        ?>
                        
                    </a>
                    <button id="reportrange" type="button" style="background: #fff; cursor: pointer; padding: 6px 10px; border: 2px solid #ccc; width:25%;border-radius: 5px;">
                            <i class="fa fa-calendar"></i>&nbsp; 
                                <span></span> <i class="fa fa-caret-down"></i>
                        </button>
                         </div>
                         <div class="col-lg-4">
                        
                         </div>
                     </div>
                    
                </div>

            </div>
    </div>
</div>

<div class="row">
        <div class="col-lg-12 animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ventas Realizadas</h5>
            </div>
            <div class="ibox-content">
            <table class="table table-bordered table-striped dt-responsive TablasVentasTodas">
            <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th> 
                <th>Perfil</th>
                <th>Cliente</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Destino</th>
                <th># de SimCard</th>
                <th>Tipo de plan</th>
                <th>Pasaporte</th>
                <th>Fecha de llegada</th>
                <th>Fecha de regreso</th>
                <th>fecha de venta</th>
                <th>imei</th>
                <th>Observación</th>
                <th>Valor</th> 
                <th>Acciones</th>
 
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

                    $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

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

                    $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

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

                    $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);
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

                    $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);
                    }



                    foreach ($ventas as $key => $value) {

                          $item = "id";
                          $valor = $value["vendedor"];
                          $perfil = null;
                          $valor1 = null;
                          $perfil1 = null;
 
                          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                         echo '<tr>';

                         echo'

                            <td>'.($key+1).'</td>
                            <td>'.$value["agrego"].'</td>';

                            if ($usuarios["perfil"] == "Comercial") {
                              echo '<td>Asesor ('.$usuarios["comercial"].')</td>';
                            }else{
                              echo '<td>'.$usuarios["perfil"].'</td>';
                            }
                            echo'
                            <td>'.$value["cliente"].'</td> 
                            <td>'.$value["celular"].'</td>
                            <td>'.$value["email"].'</td>';
                            if ($value["dias"] == "0") {
                                echo '<td>'.$value["destino"].'</td>';
                            }else{
                                echo '<td>'.$value["destino"].' - ('.$value["dias"].') Dias</td>';
                            }
                            echo'
                            
                            <td>'.$value["simcard"].'</td>
                            <td>'.$value["tipoplan"].'</td>
                            <td>'.$value["pasaporte"].'</td>                
                            <td>'.$value["fechallegada"].'</td>
                            <td>'.$value["fecharegreso"].'</td>
                            <td>'.$value["fechaventa"].'</td>
                            <td>'.$value["imei"].'</td>
                            <td>'.$value["observacion"].'</td>
                            <td>$'.number_format($value["valor"],2).'</td>
                            <td>
                            <div class="btn-group">';

                            if ($_SESSION["perfil"] == "Comercial" || $_SESSION["perfil"] == "Agencias" || $_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Coordinador") {
                                $hora1 = $value["horacierre"];
                            $hora2 = date('H:i');
                            $total_minutos_trasncurridos = array();
                            
                                $separar[1]=explode(':',$hora1); 
                                $separar[2]=explode(':',$hora2); 

                                $total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
                                $total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1]; 

                                $total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2]; 

                                if($total_minutos_trasncurridos >= 59){
                                    // echo $total_minutos_trasncurridos.'son';
                                    echo'
                                        <button class="btn btn-primary btnImprimirFactura" codigo="'.$value["codigo"].'" type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
                                        <button class="btn btn-success btnEditarVentas" disabled type="button" idVenta="'.$value["id"].'" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                        <button class="btn btn-danger btnEliminarVentas" type="button" idVentaEliminar="'.$value["id"].'" simcards="'.$value["simcard"].'"><i class="fa fa-times" aria-hidden="true"></i></button>';

                                }else{
                                    echo'
                                <button class="btn btn-primary btnImprimirFactura" codigo="'.$value["codigo"].'" type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
                                <button class="btn btn-success btnEditarVentas" type="button" idVenta="'.$value["id"].'" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btnEliminarVentas" type="button" idVentaEliminar="'.$value["id"].'" simcards="'.$value["simcard"].'"><i class="fa fa-times" aria-hidden="true"></i></button>';
                                } 
                            }else{
                                 echo'
                                <button class="btn btn-primary btnImprimirFactura" codigo="'.$value["codigo"].'" type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
                                <button class="btn btn-success btnEditarVentas" type="button" idVenta="'.$value["id"].'" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btnEliminarVentas" type="button" idVentaEliminar="'.$value["id"].'" simcards="'.$value["simcard"].'"><i class="fa fa-times" aria-hidden="true"></i></button>';
                            }

                            

                            echo'        
                            </div>
                        </td>
                        </tr>';

                    }
                    ?>


            </tbody>
            
       </table>

       <!-- <input type="text" id="FechaInicial" value="<?php //echo $_GET['fechaInicial']; ?>">
       <input type="text" id="FechaFinal" value="<?php //echo $_GET['fechaFinal']; ?>">
     -->
        </div>
    </div>


     <?php

      $borrarVentas = new ControladorVentas();
      $borrarVentas -> ctrBorrarVenta();

    ?> 
  
</div>
</div>


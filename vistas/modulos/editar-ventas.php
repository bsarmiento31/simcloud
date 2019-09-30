<?php
 
    $item = "id"; 
    $valor = $_GET["idVenta"];
    $item1 = null;
    $valor3 = null;
 
    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);



  
?>

<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox "> 
                <div class="ibox-title">
                    <h5>Editar Venta</h5>
                </div> 
                <div class="ibox-content">
                    <form method="post" class="form-horizontal">
                        <input type="hidden" class="form-control" value="<?php echo $ventas["id"]; ?>" name="idVenta">
                      
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre del cliente</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editarCliente" value="<?php echo $ventas["cliente"]; ?>" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Numero del celular</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editarCelular" value="<?php echo $ventas["celular"]; ?>" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editarCorreo" value="<?php echo $ventas["email"]; ?>" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"># De pasaporte</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editarPasaporte" value="<?php echo $ventas["pasaporte"]; ?>">
                                </div>
                        </div>
                        
                      

                        <input type="hidden" class="form-control" name="editarDestino" value="<?php echo $ventas["destino"]; ?>">

                        <input type="hidden" class="form-control" name="editarSimcard" value="<?php echo $ventas["simcard"]; ?>">

                        <input type="hidden" class="form-control" name="editarPlan" value="<?php echo $ventas["tipoplan"]; ?>">

        
                        
                        <input type="hidden" class="form-control" id="TraerSimcardUsuario" name="nuevoAgrego" value="<?php echo $_SESSION["id"] ?>"> 
                    
                       
                        <a id="nuevoCliente" class="nuevoCliente" usuario="<?php echo $_SESSION["id"] ?>"></a>


                      <div class="form-group" style="display: none;" id="comboDias">
                            <label class="col-sm-3 control-label">Dias</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="editarDias" value="<?php echo $ventas["dias"]; ?>"  id="nuevoDias">
                                </div>
                        </div>
                        <div class="form-group" id="data_3">
                            <label class="control-label col-sm-3">Fecha de llegada</label>
                            <div class="col-sm-9"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="date" class="form-control" value="<?php echo $ventas["fechallegada"]; ?>" name="editarFechaLlegada" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="data_3">
                            <label class="control-label col-sm-3">Fecha de regreso</label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" value="<?php echo $ventas["fecharegreso"]; ?>" name="editarFechaRegreso" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="data_1">
                            <label class="control-label col-sm-3">Fecha de venta</label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="<?php echo $ventas["fechaventa"]; ?>" name="editarFechaVenta" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Imei(Opcional)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editarImei" value="<?php echo $ventas["imei"]; ?>">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Observacion</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="editarObservacion" value="<?php echo $ventas["observacion"]; ?>"><?php echo $ventas["observacion"]; ?></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Valor del plan(USD)</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="valor" name="editarValor" value="<?php echo $ventas["valor"]; ?>" required readonly>
                                </div>
                        </div>

                        <input type="hidden" class="form-control" name="editarHoraIngreso" value="<?php echo $ventas["horaingreso"]; ?>">

                        <input type="hidden" class="form-control" name="editarHoraCierre" value="<?php echo $ventas["horacierre"]; ?>">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    

                    <?php

                        $editarVentas = new ControladorVentas();
                        $editarVentas -> ctrEditarVentas();

                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">

        <div class="ibox">
            <div class="ibox-title">
                <h5>Inventario</h5>
            </div>
            <div class="ibox-content">
               
            <table class="table table-bordered table-striped dt-responsive tablaUsuarios" >
            <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th># Simcard</th>
                <th>Destino</th>
            </tr>
            </thead>
            <tbody>

                <?php

                    if ($_SESSION["perfil"] == "Administrador") {

                    $item = null;
                    $valor = null; 
                    $select = null;
                    $valor1 = null;
                    $perfil1 = null;
       
                    $simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor, $select,$valor1,$perfil1);

                    }else if($_SESSION["perfil"] == "Agencias"){

                    $item = null; 
                    $valor = $_SESSION["id"];;
                    $select = "usuario";
                    $valor1 = $_SESSION["usuario"];
                    $select1 = "agrego";

       
                     $simscard = ControladorSimscard::ctrMostrarSimscardAgencias($item, $valor, $select,$valor1,$select1);

                    }else if ($_SESSION["perfil"] == "Comercial" || $_SESSION["perfil"] == "Freelance") {
                      $item = null;
                      $valor = null;
                      $select = null;
                      $valor1 = $_SESSION["id"];
                      $perfil1 = "usuario";

       
                     $simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor, $select,$valor1,$perfil1);
                    }


                    foreach ($simscard as $key => $value) {

                        $item = "id";
                        $valor = $value["usuario"];
                        $perfil = null;
                        $valor1 = null;
                        $perfil1 = null;

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

                         echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$usuarios["usuario2"].'</td>
                            <td>'.$value["simcard"].'</td>
                            <td>'.$value["destino"].'</td>
                        </tr>';

                    }
                    ?>


            </tbody>
            </table>
                
            </div>
        </div>
        
    </div>
</div>
</div>

<!-- <div id="resultados">
</div> -->
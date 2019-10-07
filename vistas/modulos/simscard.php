<?php

  if ($_SESSION["perfil"] == "Administrador") {
    echo     
    '
 
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

                    <p>
                        
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearSimCards"><i class="fa fa-check"></i>&nbsp;Crear SimsCards</button>-->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CrearSimCardsMultiples"><i class="fa fa-window-restore"></i>&nbsp;Crear SimsCards</button>
                        <!--<a href="vistas/modulos/descargar-reporte.php?reporteSimcard=reporteSimcard"><button type="button" class="btn btn-success pull-right"><i class="fa fa-file-excel-o"></i>&nbsp;Descargar Excel</button></a>-->
                    </p> 
                </div>
          </div>
    </div> 
</div>

';
  }else if ($_SESSION["perfil"] == "Coordinador") {
      
        echo    
    '

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

                    <p>
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearSimCards"><i class="fa fa-check"></i>&nbsp;Crear SimsCards</button>-->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CrearSimCardsMultiples"><i class="fa fa-window-restore"></i>&nbsp;Crear SimsCards</button>
                        <!--<a href="vistas/modulos/descargar-reporte.php?reporteSimcard=reporteSimcard"><button type="button" class="btn btn-success pull-right"><i class="fa fa-file-excel-o"></i>&nbsp;Descargar Excel</button></a>-->
                    </p> 
                </div>
            </div>
    </div> 
</div>

';
      
  }else if ($_SESSION["perfil"] == "Agencias") {
    echo 
    
    '<div class="col-lg-12 animated fadeInRight" style="margin-top: 15px;">
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

                    <p>
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearSimCards"><i class="fa fa-check"></i>&nbsp;Crear SimsCards</button>-->
                    </p> 
                </div>
            </div>
    </div> 
</div>';
  }

?> 


<div class="row">
        <div class="col-lg-12 animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>SimsCards</h5>
            </div>
            <div class="ibox-content">
                <form action="asignarsimcard" method="post">
               <?php
                  if ($_SESSION["perfil"] == "Administrador") {
                    echo '<button type="submit" name="boton1" class="btn btn-success">Asignar</button>'; 
                    echo '<button type="submit" name="boton2" class="btn btn-danger pull-right">Eliminar</button>'; 
                  }
                ?>
            <table class="table table-bordered table-striped dt-responsive TablasSimcards">

            <thead>
            <tr>
                <?php
                  if ($_SESSION["perfil"] == "Administrador") {
                    echo '<th><div class="checkbox checkbox-success"><input type="checkbox" name="select-all" id="select-all"><label></label></th>';
                  }
                ?>
                
                <th>#</th>
                <th style="display:none;">Creacion</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th># de SimCard</th>
                <th>Tipo de plan</th>
                <th>Destino</th>
                <th>Estado</th>
                <th>Acciones</th>
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

                    }else if($_SESSION["perfil"] == "Agencias" ||  $_SESSION["perfil"] == "Coordinador"){

                    $item = null; 
                    $valor = $_SESSION["id"];
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
                         echo '<tr>';


                          $item = "id";
                          $valor = $value["usuario"];
                          $perfil = null;
                          $valor1 = null;
                          $perfil1 = null;

                          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                            
                                if ($_SESSION["perfil"] == "Administrador") {
                                        echo '<td><div class="checkbox checkbox-success"><input type="checkbox" name="selector[]" class="checktabla" value="'.$value["id"].'"><label></label></div></td>';
                                }
                
                          echo '
                          
                           
                            <td>'.($key+1).'</td>
                            <td style="display:none;">'.$value["creacion"].'</td>
                            <td>'.$usuarios["usuario2"].'</td>';
        
                            if ($usuarios["perfil"] == "Comercial") {
                              echo '<td>'.$usuarios["perfil"].' ('.$usuarios["comercial"].')</td>';
                            }else{
                              echo '<td>'.$usuarios["perfil"].'</td>';
                            }

                            echo'
                            <td>'.$value["simcard"].'</td>
                            <td>'.$value["tipoplan"].'</td>
                            <td>'.$value["destino"].'</td>';
                             if($value["valor"] != 0){ 

                        echo '<td><button class="btn btn-success btn-xs btnActivar" type="button" idUsuario="'.$value["id"].'" estadoUsuario="0">Vendido</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivar" type="button" idUsuario="'.$value["id"].'" estadoUsuario="1">Habilitado</button></td>';

                      }
                            
                            
                            echo'
                            
                            <td>';

                            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Coordinador"  ) {
                              echo '
                            <div class="btn-group">

                                <button class="btn btn-success btnEditarSimcards" data-toggle="modal" data-target="#modalEditarSincard" type="button" idSincard="'.$value["id"].'" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btnEliminarSimcard" type="button" idSincard="'.$value["id"].'"><i class="fa fa-times" aria-hidden="true"></i></button>
                                 
                            </div>';
                            }else{
                               echo '
                            <div class="btn-group">

                                <button class="btn btn-success btnEditarSimcards" data-toggle="modal" data-target="#modalEditarSincard" type="button" disabled idSincard="'.$value["id"].'" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btnEliminarSimcard" disabled type="button" idSincard="'.$value["id"].'"><i class="fa fa-times" aria-hidden="true"></i></button>

                                 
                            </div>';
                            }

                            
                        echo '    
                        </td>
                        </tr>';

                    }
                    ?>


            </tbody>
            </table>
            </form>
    
        </div>
    </div>
    
      <?php

      if($_SESSION["perfil"] == "Administrador"){

    ?>
    <div class="row"> 
      <div class="col-md-6">
        
      
 <select  class="form-control m-b chosen-select" id="clientesValorInventario" data-placeholder="Escoge el usuario"  tabindex="2">
    <?php

        
    if ($_SESSION["perfil"] == "Administrador") {
    
                $item = null;
                $valor = null;
                $item1 = null;
                $valor3 = null;

                $clientes = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);

      if(isset($_GET["idcliente2"])){ 
 
        $perfilContarSimcard = "vendedor";
        $valorContarSimcard = $_GET["idcliente2"];
       
      }else{
        $perfilContarSimcard = null;
        $valorContarSimcard = null;
      }


        $contarInventario = ControladorVentas::ctrContarSimcards($perfilContarSimcard, $valorContarSimcard);
    

    }else if ($_SESSION["perfil"] == "Agencias") {

         $item = null;
        $valor = null;
        $item1 = "agregopadre";
        $valor3 = $_SESSION["usuario"];

        $clientes = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);

        if(isset($_GET["idcliente2"])){ 
 
        $perfilContarSimcard = "vendedor";
        $valorContarSimcard = $_GET["idcliente2"];
       
      }else{
        $perfilContarSimcard = null;
        $valorContarSimcard = null;
      }


        $contarInventario = ControladorVentas::ctrContarSimcards($perfilContarSimcard, $valorContarSimcard);

     }


        echo '<option value="">Escoje el usuario</option>';
            foreach ($clientes as $key => $value) {
                $item = "id";
                $valor = $value["vendedor"];
                $perfil = null;
                $valor1 = null;
                $perfil1 = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

         echo '<option value="'.$value["vendedor"].'">'.$usuarios["usuario2"].'</option>';
     }
    
    
       

    ?>
     
     </select> 
     </div>
     <div class="col-md-6">
       <a href="simscard"><button type="button" class="btn btn-warning"><i class="fa fa-window-close"></i>&nbsp;Cancelar</button></a>
     </div>
    </div>
    <div class="row">
      <div class="col-lg-12 animated fadeInRight" style="margin-top: 15px;">

      <div class="ibox float-e-margins"> 
                <div class="ibox-title">  
                    <h5>Inventario</h5>  
                    <div class="ibox-tools">  
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>    
                        </a>

                       
                    </div>
                </div>
                <div class="ibox-content">  
                    <!-- <div>
                        <canvas id="barChart12" height="100"></canvas>
                    </div> -->
                    <div id="morr-chart23"></div>
                </div>
            </div>
      </div>
    </div>



  
</div>
</div>

  <?php
  }
    ?>
    
    
     <?php

      $borrarSimcards = new ControladorSimscard();
      $borrarSimcards -> ctrBorrarSimcards();

    ?> 

<script type="text/javascript">
   Morris.Bar({
        element: 'morr-chart23',
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


 <div class="modal inmodal" id="CrearSimCards" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Crear La Simcards</h4>
                 <small>Ingrese los datos correspondientes del las SimCards</small>
             </div> 
             <div class="modal-body">
               <form method="post" class="form-horizontal"  enctype="multipart/form-data" class="formularioSimcard">


                <div class="form-group">
                        <label class="col-sm-2 control-label">Escoger el usuario</label>
                        <div class="col-sm-10">
                        <select class="form-control m-b chosen-select inputFormu" onchange="validar()" name="nuevoUsuario[]" id="capturarUsuario" data-placeholder ="Escoge el cliente" required tabindex="2">

                            <?php
                            if ($_SESSION["perfil"] == "Administrador") {

                                 $item = null;
                                 $valor = null;
                                 $perfil = null;
                                 $valor1 = null;
                                 $perfil1 = null;

                                  $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="">Escoje el cliente</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }
                            }else if($_SESSION["perfil"] == "Agencias"){

                                $item = null;
                                $valor = $_SESSION["id"];
                                $perfil = "id";
                                $valor1 = $_SESSION["usuario"];
                                $perfil1 = "comercial";

                                 $clientes =  ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="">Escoje el cliente</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }


                                    }else if ($_SESSION["perfil"] == "Coordinador") {
                                      $item = null;
                                      $valor = $_SESSION["id"];
                                      $perfil = "id";
                                      $valor1 = 1;
                                      $perfil1 = "coordinador";

       
                                      $clientes = ControladorUsuarios::ctrMostrarUsuariosCoordinador($item, $valor,$perfil,$valor1,$perfil1);
                                      echo '<option value="">Escoje el cliente</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }
                                      
                                    }
                                       
                
                                ?>

                        </select>
                    </div> 

                </div>
                    

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Escoger el destino</label>
                        <div class="col-sm-10">
                        <select class="form-control m-b cambiarSelect" name="nuevoDestino[]" id="capturarDestino" onchange="cambiar()" required>

                          <option value="">Escoge el destino</option>
                          <!-- <option value="Plan Por dia">Planes por días a EEUU, Mexico & Canada Uniglobal(TMOBILE)</option> -->
                          <option value="Estados Unidos">Estados Unidos Uni Global(T MOBILE)</option>
                          <option value="Mexico">Mexico Uni Global(T MOBILE)</option>
                          <option value="Republica Dominicana">Republica Dominicana Claro</option>
                          <option value="Centro y sur america">Centro y sur america Three UK</option>
                          <option value="Australia y nueva zelanda">Australia y nueva zelanda</option>
                          <option value="Union europea">Unión europea</option>
                          <option value="Canada">Canada</option>
                          <option value="Asia">Asia</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                        </select>
                    </div> 

                </div>

                <script>
                   function cambiar() {
                if (document.getElementById('capturarDestino').value === "Mexico") {
                document.getElementById('campo_otro').style.display = 'block';
                }else{
                   document.getElementById('campo_otro').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Estados Unidos") {
                  document.getElementById('campo_otro1').style.display = 'block';
                } else {      
                document.getElementById('campo_otro1').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Republica Dominicana") {
                  document.getElementById('campo_otro2').style.display = 'block';
                } else {      
                document.getElementById('campo_otro2').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Centro y sur america") {
                  document.getElementById('campo_otro3').style.display = 'block';
                } else {      
                document.getElementById('campo_otro3').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Australia y nueva zelanda") {
                  document.getElementById('campo_otro4').style.display = 'block';
                } else {      
                document.getElementById('campo_otro4').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Union europea") {
                  document.getElementById('campo_otro5').style.display = 'block';
                } else {      
                document.getElementById('campo_otro5').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Colombia") {
                  document.getElementById('campo_otro6').style.display = 'block';
                } else {      
                document.getElementById('campo_otro6').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Asia") {
                  document.getElementById('campo_otro7').style.display = 'block';
                } else {      
                document.getElementById('campo_otro7').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Puerto Rico") {
                  document.getElementById('campo_otro8').style.display = 'block';
                } else {      
                document.getElementById('campo_otro8').style.display = 'none';
                }

                if (document.getElementById('capturarDestino').value === "Canada") {
                  document.getElementById('campo_otro9').style.display = 'block';
                } else {      
                document.getElementById('campo_otro9').style.display = 'none';
                }

         
                return true;
                }

                </script>
 
                <div class="hr-line-dashed" ></div>
                    
                <div class="form-group" id="campo_otro" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $35USD - 1.5GB - 30 Días">Plan $35USD - 1.5GB - 30 Días</option>
                            <option value="Plan $45USD - 2.5GB - 30 Días">Plan $45USD - 2.5GB - 30 Días</option>
                            <option value="Plan $55USD - 5GB - 30 Días">Plan $55USD - 5GB - 30 Días</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x dia</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro8" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $40USD - 1GB - 30 Días">Plan $35USD - 1.5GB - 30 Días</option>
                            <option value="Plan $50USD - 4GB - 30 Días">Plan $50USD - 4GB - 30 Días</option>
                            <option value="Plan $600USD - 6GB - 30 Días">Plan $600USD - 6GB - 30 Días</option>
                            <option value="Plan $70USD - ilimitado - 30 Días">Plan $70USD - ilimitado - 30 Días</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro9" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $35USD - 1.5GB - 30 Días">Plan $35USD - 1.5GB - 30 Días</option>
                            <option value="Plan $45USD - 2.5GB - 30 Días">Plan $45USD - 2.5GB - 30 Días</option>
                            <option value="Plan $55USD - 5GB - 30 Días">Plan $55USD - 5GB - 30 Días</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x Día</option>
                        </select>
                    </div> 

                </div>


                 <div class="form-group" id="campo_otro7" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $45USD - 5GB - 30 Días">Plan $45USD - 5GB - 30 Días</option>
                            <option value="Plan $40USD - 1GB - 30 Días">Plan $40USD - 1GB - 30 Días</option>
                        </select>
                    </div> 

                </div>

                 <div class="form-group" id="campo_otro3" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <!-- <option value="Plan $45USD - 5GB - 30 Días">Plan $45USD - 5GB - 30 Días</option>
                            <option value="Plan $40USD - 1GB - 30 Días">Plan $40USD - 1GB - 30 Días</option> -->
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro6" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $15USD - 2GB - 30 Días">Plan $15USD - 2GB - 30 Días</option>
                            <option value="Plan $15USD - 3GB - 15 Días">Plan $15USD - 3GB - 15 Días</option>
                            <option value="Plan $8USD - 1GB - 7 Días">Plan $8USD - 1GB - 7 Días</option>
                            <option value="Plan $5USD - 500MB - 3 Días">Plan $5USD - 500MB - 3 Días</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro5" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $70USD - Ilimitados - 30 Días">Plan $70USD - Ilimitados - 30 Días</option>
                            <option value="Plan $60USD - 15GB - 30 Días">Plan $60USD - 15GB - 30 Días</option>
                            <option value="Plan $45USD - 5GB - 30 Días">Plan $45USD - 5GB - 30 Días</option>
                            <option value="Plan $40USD - 3GB - 30 Días">Plan $40USD - 3GB - 30 Días</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro4" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $60USD - 9GB - 30 Días">Plan $60USD - 9GB - 30 Días</option>
                            <option value="Plan $45USD - 5GB - 30 Días">Plan $45USD - 5GB - 30 Días</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro2" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $30USD - Ilimitado - 5 Días">Plan $30USD - Ilimitado - 5 Días</option>
                            <option value="Plan $35USD - Ilimitado - 10 Días">Plan $35USD - Ilimitado - 10 Días</option>
                            <option value="Plan $40USD - Ilimitado - 15 Días">Plan $40USD - Ilimitado - 15 Días</option>
                            <option value="Plan $45USD - 3GB - 30 Días">Plan $45USD - 3GB - 30 Días</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro1" style="display: none">
                        <label class="col-sm-2 control-label">Tipo de plan</label>
                        <div class="col-sm-10">
                        <select data-placeholder="Escoger el plan..." onchange="validar()" name="plan[]" id="capturarTipoPlan" class="chosen-select capturarOption MostrarPrecios" multiple="multiple" style="width:450px;" tabindex="4">
                            <option value="Plan $40USD - 1GB - 30 Días">Plan $40USD - 1GB - 30 Días</option>
                            <option value="Plan $50USD - 4GB - 30 Días">Plan $50USD - 4GB - 30 Días</option>
                            <option value="Plan $60USD - 10GB - 30 Días">Plan $60USD - 10GB - 30 Días</option>
                            <option value="Plan $70USD - Ilimitado - 30 Días">Plan $70USD - Ilimitado - 30 Días</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x Día</option>
                        </select>
                    </div> 

                </div>
                    
                  <?php
                  if ($_SESSION["perfil"] == "Administrador") {
                    echo 
                '<div class="form-group">
                <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                      <div class="checkbox checkbox-success">
                        <input type="checkbox" id="check25"  onchange="javascript:showCoordinador()" />
                        <label for="inlineCheckbox1">Agregar Cordinador</label>
                    </div>
                </div>
                <div class="col-sm-5">
                      
                </div>
              </div>';
               
               ?>
               <input type="hidden" placeholder="usuario" name="nuevoAgrego[]" id="nuevoAgrego" value="" class="form-control capturarCorrdinador" required>

                 <div class="form-group" style="display: none;" id="content25">
                        <label class="col-sm-2 control-label">Escoger el Coordinador</label>
                        <div class="col-sm-10">
                        <select class="form-control m-b" data-placeholder ="Escoge el Coordinador" id="capturarUsuarioCordinador">

                            <?php
                         
                                $item = null;
                                $valor = "Coordinador";
                                $perfil = "perfil";
                                $valor1 = "Coordinador";
                                $perfil1 = "perfil";

       
                                $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                echo '<option value="">Escoje el Coordinador</option>';
                                foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["usuario2"].'">'.$value["nombre"].'</option>';
                                }
                                      
                             
                                       
                
                                ?>

                        </select>
                    </div> 

                </div>

               <?php
                  }else{

                    ?>
                    <input type="hidden" placeholder="Operador" name="nuevoAgrego[]" id="nuevoAgrego" value="<?php echo $_SESSION["usuario"] ?>" class="form-control" required>
                    <?php
                  }
                ?>
                <script type="text/javascript">
                  function showCoordinador() {
                      element = document.getElementById("content25");
                      check = document.getElementById("check25");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                </script>  
                    
                    <div class="hr-line-dashed"></div>

                    <div class="form-group nuevoCampoSimcard">
                    <label class="col-sm-2 control-label">Numero de la simcard</label>

                    <div class="col-sm-10">
                              <input type="text" placeholder="# de la simcards"  name="nuevoSimcards[]" class="form-control simcardsValidar nuevaSimcardListar" id="simcardGuardar">                   
                                <br>
                    <button class="btn btn-success btn-xs agregarSimcard pull-right" id="habilitarButton" type="button" disabled>Agregar Simcard</button>
                  
                    </div>
                  </div>

                    <!-- <input type="hidden" id="listarSimcards" name="listarSimcards">  -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" id="habilitarSubmit">Activar</button>
                    <button type="submit" class="btn btn-primary" id="submitHabilitado" disabled>Crear SimCards</button>
                </div>


                    <?php

                        $crearSimcard = new ControladorSimscard();
                        $crearSimcard -> ctrCrearSimsCard();

                    ?>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>


<!-- Editar SinCards -->
 <div class="modal inmodal" id="modalEditarSincard" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Editar La Simcards</h4>
                 <small>Ingrese los datos correspondientes del las SimCards</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal"  enctype="multipart/form-data">

                <input type="hidden" name="editarid" id="editarid" class="form-control">

                  <div class="form-group" style="display: none;">
                        <label class="col-sm-2 control-label">Escoger el cliente</label>
                        <div class="col-sm-10">
                        <!--<select class="form-control m-b" name="editarUsuario" id="editarUsuario" data-placeholder="Escoge el cliente">-->
                            
                            <input type="hidden" placeholder="# de la simcards" name="editarUsuario" id="editarUsuario" class="form-control">

                            <?php
                             
                             //  if ($_SESSION["perfil"] == "Administrador") {

                            //      $item = null;
                            //      $valor = null;
                            //      $perfil = null;
                            //      $valor1 = null;
                            //      $perfil1 = null;

                            //       $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                            //         echo '<option value="">Escoje el cliente</option>';
                            //         foreach ($clientes as $key => $value) {
                            //           echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            //         }
                            // }else{

                            //     $item = null;
                            //     $valor = $_SESSION["id"];
                            //     $perfil = "id";
                            //     $valor1 = null;
                            //     $perfil1 = null;

                            //      $clientes =  ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                            //         echo '<option value="">Escoje el cliente</option>';
                            //         foreach ($clientes as $key => $value) {
                            //           echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            //         }


                            // }
                                    
                
                                ?>
                        <!--</select>--> 
                    </div> 

                </div>


                <div class="hr-line-dashed"></div>

                <div class="form-group">
                        <label class="col-sm-2 control-label">Escoger el destino</label>
                        <div class="col-sm-5">
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check21" class="UsaCheck"  value="Estados Unidos" onchange="javascript:showUsaEdit()" />
                                <label for="inlineCheckbox1">Estados Unidos Uni Global</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check22" class="MexicoCheck"  value="Mexico" onchange="javascript:showMexicoEdit()" />
                                <label for="inlineCheckbox1">Mexico</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check23" class="DominicaCheck" value="Republica Dominicana" onchange="javascript:showRepublicaDominicanaEdit()" />
                                <label for="inlineCheckbox1">Republica Dominicana</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check24" class="SurCheck" value="Centro y sur america" onchange="javascript:showCentroSurAmericaEdit()" />
                                <label for="inlineCheckbox1">Centro y sur america</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check45" class="AustraliaCheck" value="Australia y nueva zelanda" onchange="javascript:showAustraliaEdit()" />
                                <label for="inlineCheckbox1">Australia y nueva zelanda</label>
                        </div>
                    </div> 

                    <div class="col-sm-5">
                      <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check26" class="UnionCheck"  value="Union europea" onchange="javascript:showUnionEuropeaEdit()" />
                                <label for="inlineCheckbox1">Union europea</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check27" class="CanadaCheck"  value="Canada" onchange="javascript:showCanadaEdit()" />
                                <label for="inlineCheckbox1">Canada</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check28" class="AsiaCheck"  value="Asia" onchange="javascript:showAsiaEdit()" />
                                <label for="inlineCheckbox1">Asia</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check29" class="ColombiaCheck"  value="Colombia" onchange="javascript:showColombiaEdit()" />
                                <label for="inlineCheckbox1">Colombia</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="editarDestino[]" id="check30" class="PuertoRicoCheck"  value="Puerto Rico" onchange="javascript:showPuertoRicoEdit()" />
                                <label for="inlineCheckbox1">Puerto Rico</label>
                        </div>
                    </div>

                </div>



                <script>

                    function showUsaEdit() {
                      element = document.getElementById("content21");
                      check = document.getElementById("check21");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showMexicoEdit() {
                      element = document.getElementById("content22");
                      check = document.getElementById("check22");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showRepublicaDominicanaEdit() {
                      element = document.getElementById("content23");
                      check = document.getElementById("check23");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                       function showCentroSurAmericaEdit() {
                      element = document.getElementById("content24");
                      check = document.getElementById("check24");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showAustraliaEdit() {
                      element = document.getElementById("content45");
                      check = document.getElementById("check45");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showUnionEuropeaEdit() {
                      element = document.getElementById("content26");
                      check = document.getElementById("check26");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showCanadaEdit() {
                      element = document.getElementById("content27");
                      check = document.getElementById("check27");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showAsiaEdit() {
                      element = document.getElementById("content28");
                      check = document.getElementById("check28");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showColombiaEdit() {
                      element = document.getElementById("content29");
                      check = document.getElementById("check29");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }


                      function showPuertoRicoEdit() {
                      element = document.getElementById("content30");
                      check = document.getElementById("check30");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }
                

                </script>
                    
 
                 
 
                    <div class="hr-line-dashed"></div>


                   <p style="display: none;">Planes escogidos: <label id="mostrarPlanes"></label>.</p>


                <!--<input type="hidden" placeholder="planes" name="planesCargados" id="mostrarPlanesEnviar" class="form-control">-->

                <div class="form-group" id="content22" style="display: none">
                    <label class="col-sm-2 control-label">Planes de mexico</label>
                      <div class="col-sm-5">
                       <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all20">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>   
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla20" value="Plan $35USD - 1.5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $35USD - 1.5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla20" value="Plan $45USD - 2.5GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 2.5GB - 30 Días</label>
                    </div> 
                      </div>
                      <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="editarPlan[]" class="select-alla20" value="Plan $55USD - 5GB - 30 Días">
                          <label for="inlineCheckbox3">Plan $55USD - 5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="editarPlan[]" class="select-alla20" value="Plan $5USD x Dia">
                          <label for="inlineCheckbox3">Plan $5USD x dia</label>
                    </div>
                      </div> 
                   


                </div>

                <div class="form-group" id="content30" style="display: none">

                    <label class="col-sm-2 control-label">Planes de Puerto Rico</label>
                    <div class="col-sm-5">
                        <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all21">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla21" value="Plan $40USD - 1GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $35USD - 1.5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla21" value="Plan $50USD - 4GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $50USD - 4GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="editarPlan[]" class="select-alla21" value="Plan $600USD - 6GB - 30 Días">
                          <label for="inlineCheckbox3">Plan $600USD - 6GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="editarPlan[]" class="select-alla21" value="Plan $70USD - ilimitado - 30 Días">
                          <label for="inlineCheckbox3">Plan $70USD - ilimitado - 30 Días</label>
                    </div>
                    </div>
  
                </div>


                <div class="form-group" id="content27" style="display: none">
                        
                    <label class="col-sm-2 control-label">Tipos de planes de Canada</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all22">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla22" value="Plan $35USD - 1.5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $35USD - 1.5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla22" value="Plan $45USD - 2.5GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 2.5GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="editarPlan[]" class="select-alla22" value="Plan $55USD - 5GB - 30 Días">
                          <label for="inlineCheckbox3">Plan $55USD - 5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="editarPlan[]" class="select-alla22" value="Plan $5USD x Dia">
                          <label for="inlineCheckbox3">Plan $5USD x Dia</label>
                    </div>
                    </div>

                </div>


                 <div class="form-group" id="content28" style="display: none">
 
                    <label class="col-sm-2 control-label">Tipos de planes de Asia</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all23">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $45USD - 5GB - 30 Días</label>
                    </div> -->
                     <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="1 Dia">
                        <label for="inlineCheckbox1">1 Día</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="2 Dias">
                        <label for="inlineCheckbox1">2 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="3 Dias">
                        <label for="inlineCheckbox1">3 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="4 Dias">
                        <label for="inlineCheckbox1">4 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="5 Dias">
                        <label for="inlineCheckbox1">5 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="6 Dias">
                        <label for="inlineCheckbox1">6 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="7 Dias">
                        <label for="inlineCheckbox1">7 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="8 Dias">
                        <label for="inlineCheckbox1">8 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="9 Dias">
                        <label for="inlineCheckbox1">9 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="10 Dias">
                        <label for="inlineCheckbox1">10 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="11 Dias">
                        <label for="inlineCheckbox1">11 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="12 Dias">
                        <label for="inlineCheckbox1">12 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="13 Dias">
                        <label for="inlineCheckbox1">13 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="14 Dias">
                        <label for="inlineCheckbox1">14 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="15 Dias">
                        <label for="inlineCheckbox1">15 Dias</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="Plan $40USD - 1GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $40USD - 1GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="16 Dias">
                        <label for="inlineCheckbox1">16 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="17 Dias">
                        <label for="inlineCheckbox1">17 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="18 Dias">
                        <label for="inlineCheckbox1">18 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="19 Dias">
                        <label for="inlineCheckbox1">19 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="20 Dias">
                        <label for="inlineCheckbox1">20 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="21 Dias">
                        <label for="inlineCheckbox1">21 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="22 Dias">
                        <label for="inlineCheckbox1">22 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="23 Dias">
                        <label for="inlineCheckbox1">23 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="24 Dias">
                        <label for="inlineCheckbox1">24 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="25 Dias">
                        <label for="inlineCheckbox1">25 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="26 Dias">
                        <label for="inlineCheckbox1">26 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="27 Dias">
                        <label for="inlineCheckbox1">27 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="28 Dias">
                        <label for="inlineCheckbox1">28 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="29 Dias">
                        <label for="inlineCheckbox1">29 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla23" value="30 Dias">
                        <label for="inlineCheckbox1">30 Dias</label>
                    </div>
                    </div>
                   
                    
                </div>

                 <div class="form-group" id="content24" style="display: none">

                    <label class="col-sm-2 control-label">Tipos de planes de Centro y Sur America</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all24">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $45USD - 5GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="1 Dia">
                        <label for="inlineCheckbox1">1 Día</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="2 Dias">
                        <label for="inlineCheckbox1">2 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="3 Dias">
                        <label for="inlineCheckbox1">3 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="4 Dias">
                        <label for="inlineCheckbox1">4 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="5 Dias">
                        <label for="inlineCheckbox1">5 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="6 Dias">
                        <label for="inlineCheckbox1">6 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="7 Dias">
                        <label for="inlineCheckbox1">7 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="8 Dias">
                        <label for="inlineCheckbox1">8 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="9 Dias">
                        <label for="inlineCheckbox1">9 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="10 Dias">
                        <label for="inlineCheckbox1">10 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="11 Dias">
                        <label for="inlineCheckbox1">11 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="12 Dias">
                        <label for="inlineCheckbox1">12 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="13 Dias">
                        <label for="inlineCheckbox1">13 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="14 Dias">
                        <label for="inlineCheckbox1">14 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="15 Dias">
                        <label for="inlineCheckbox1">15 Dias</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="Plan $40USD - 1GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $40USD - 1GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="16 Dias">
                        <label for="inlineCheckbox1">16 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="17 Dias">
                        <label for="inlineCheckbox1">17 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="18 Dias">
                        <label for="inlineCheckbox1">18 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="19 Dias">
                        <label for="inlineCheckbox1">19 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="20 Dias">
                        <label for="inlineCheckbox1">20 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="21 Dias">
                        <label for="inlineCheckbox1">21 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="22 Dias">
                        <label for="inlineCheckbox1">22 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="23 Dias">
                        <label for="inlineCheckbox1">23 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="24 Dias">
                        <label for="inlineCheckbox1">24 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="25 Dias">
                        <label for="inlineCheckbox1">25 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="26 Dias">
                        <label for="inlineCheckbox1">26 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="27 Dias">
                        <label for="inlineCheckbox1">27 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="28 Dias">
                        <label for="inlineCheckbox1">28 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="29 Dias">
                        <label for="inlineCheckbox1">29 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla24" value="30 Dias">
                        <label for="inlineCheckbox1">30 Dias</label>
                    </div>
                    </div>
                   
                   

                </div>

                <div class="form-group" id="content29" style="display: none">

                    <label class="col-sm-2 control-label">Tipo de planes Colombia</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all25">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox  checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla25" value="Plan $15USD - 2GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $15USD - 2GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla25" value="Plan $15USD - 3GB - 15 Días">
                        <label for="inlineCheckbox2">Plan $15USD - 3GB - 15 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox  checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla25" value="Plan $8USD - 1GB - 7 Días">
                        <label for="inlineCheckbox1">Plan $8USD - 1GB - 7 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla25" value="Plan $5USD - 500MB - 3 Días">
                        <label for="inlineCheckbox2">Plan $5USD - 500MB - 3 Días</label>
                    </div>
                    </div>
                    
                    


                </div>

                <div class="form-group" id="content26" style="display: none">

                    <label class="col-sm-2 control-label">Planes de la Uníon Europea</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all26">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla26" value="Plan $70USD - Ilimitados - 30 Días">
                        <label for="inlineCheckbox1">Plan $70USD - Ilimitados - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla26" value="Plan $60USD - 15GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $60USD - 15GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla26" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $45USD - 5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla26" value="Plan $40USD - 3GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $40USD - 3GB - 30 Días</label>
                    </div>
                    </div>
                    
                    

                </div>

                <div class="form-group" id="content45" style="display: none">

                    <label class="col-sm-2 control-label">Planes de Australia y Nueva Zelanda</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all27">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                      <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="Plan $60USD - 9GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $60USD - 9GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="1 Dia">
                        <label for="inlineCheckbox1">1 Día</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="2 Dias">
                        <label for="inlineCheckbox1">2 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="3 Dias">
                        <label for="inlineCheckbox1">3 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="4 Dias">
                        <label for="inlineCheckbox1">4 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="5 Dias">
                        <label for="inlineCheckbox1">5 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="6 Dias">
                        <label for="inlineCheckbox1">6 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="7 Dias">
                        <label for="inlineCheckbox1">7 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="8 Dias">
                        <label for="inlineCheckbox1">8 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="9 Dias">
                        <label for="inlineCheckbox1">9 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="10 Dias">
                        <label for="inlineCheckbox1">10 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="11 Dias">
                        <label for="inlineCheckbox1">11 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="12 Dias">
                        <label for="inlineCheckbox1">12 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="13 Dias">
                        <label for="inlineCheckbox1">13 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="14 Dias">
                        <label for="inlineCheckbox1">14 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="15 Dias">
                        <label for="inlineCheckbox1">15 Dias</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 5GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="16 Dias">
                        <label for="inlineCheckbox1">16 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="17 Dias">
                        <label for="inlineCheckbox1">17 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="18 Dias">
                        <label for="inlineCheckbox1">18 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="19 Dias">
                        <label for="inlineCheckbox1">19 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="20 Dias">
                        <label for="inlineCheckbox1">20 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="21 Dias">
                        <label for="inlineCheckbox1">21 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="22 Dias">
                        <label for="inlineCheckbox1">22 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="23 Dias">
                        <label for="inlineCheckbox1">23 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="24 Dias">
                        <label for="inlineCheckbox1">24 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="25 Dias">
                        <label for="inlineCheckbox1">25 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="26 Dias">
                        <label for="inlineCheckbox1">26 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="27 Dias">
                        <label for="inlineCheckbox1">27 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="28 Dias">
                        <label for="inlineCheckbox1">28 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="29 Dias">
                        <label for="inlineCheckbox1">29 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla27" value="30 Dias">
                        <label for="inlineCheckbox1">30 Dias</label>
                    </div>
                    </div>
                    
                    
                </div>


                <div class="form-group" id="content23" style="display: none">

                    <label class="col-sm-2 control-label">Planes de Republica Dominicana</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all28">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla28" value="Plan $30USD - Ilimitado - 5 Días">
                        <label for="inlineCheckbox1">Plan $30USD - Ilimitado - 5 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla28" value="Plan $35USD - Ilimitado - 10 Días">
                        <label for="inlineCheckbox2">Plan $35USD - Ilimitado - 10 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla28" value="Plan $40USD - Ilimitado - 15 Días">
                        <label for="inlineCheckbox1">Plan $40USD - Ilimitado - 15 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla28" value="Plan $45USD - 3GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 3GB - 30 Días</label>
                    </div>
                    </div>
                    
                </div>


                <div class="form-group"  id="content21" style="display: none">
     
                    <label class="col-sm-2 control-label">Planes de Estados Unidos</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all29">
                        <label for="inlineCheckbox1">Seleccionar Todo</label> 
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla29" value="Plan $40USD - 1GB - 30 Días">
                        <label>Plan $40USD - 1GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla29" value="Plan $50USD - 4GB - 30 Días">
                        <label>Plan $50USD - 4GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla29" value="Plan $60USD - 10GB - 30 Días">
                        <label>Plan $60USD - 10GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla29" value="Plan $70USD - Ilimitado - 30 Días">
                        <label>Plan $70USD - Ilimitado - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="editarPlan[]" class="select-alla29" value="Plan $5USD x Dia">
                        <label>Plan $5USD x Dia</label>
                    </div>
                    </div>
                   
                    

                </div>


                   <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Simcards</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="# de la simcards" name="editarSimcards" id="editarSimcards" class="form-control" required>
                        </div>
                    </div>
                  

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar SimCards</button>
                </div>


                    <?php

                        $editarSimcards = new ControladorSimscard();
                        $editarSimcards -> ctrEditarSimsCard();

                    ?>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>

 <div class="modal inmodal" id="CrearSimCardsMultiples" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Crear Multiples Simcard</h4>
                 <small>Ingrese los datos correspondientes del las SimCards</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal"  enctype="multipart/form-data" class="formularioSimcard">


                <div class="form-group">
                        <label class="col-sm-2 control-label">Escoger el usuario</label>
                        <div class="col-sm-10">
                        <select class="form-control m-b chosen-select inputFormu2" onchange="validar2()" name="nuevoUsuario2[]" id="capturarUsuario2" data-placeholder ="Escoge el cliente"  tabindex="2">

                            <?php
                            if ($_SESSION["perfil"] == "Administrador") {

                                $item = null;
                                $valor = null;
                                $perfil = null;
                                $valor1 = null;
                                $perfil1 = null;

                                $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="">Escoje el cliente</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }
                            }else if($_SESSION["perfil"] == "Agencias"){

                                $item = null;
                                $valor = $_SESSION["id"];
                                $perfil = "id";
                                $valor1 = $_SESSION["usuario"];
                                $perfil1 = "comercial";

                                 $clientes =  ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="">Escoje el cliente</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }


                                    }else if ($_SESSION["perfil"] == "Coordinador") {
                                      $item = null;
                                      $valor = $_SESSION["id"];
                                      $perfil = "id";
                                      $valor1 = 1;
                                      $perfil1 = "coordinador";

       
                                      $clientes = ControladorUsuarios::ctrMostrarUsuariosCoordinador($item, $valor,$perfil,$valor1,$perfil1);
                                      echo '<option value="">Escoje el cliente</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }
                                      
                                    }
                                       
                
                                ?>

                        </select>
                    </div> 

                </div>
                    

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Escoger el destino</label>
                        <div class="col-sm-5">
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check"  value="Estados Unidos" onchange="javascript:showUsa()" />
                                <label for="inlineCheckbox1">Estados Unidos Uni Global</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check1"  value="Mexico" onchange="javascript:showMexico()" />
                              <label for="inlineCheckbox1">Mexico</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check2" value="Republica Dominicana" onchange="javascript:showRepublicaDominicana()" />
                                <label for="inlineCheckbox1">Republica Dominicana</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check3" value="Centro y sur america" onchange="javascript:showCentroSurAmerica()" />
                                <label for="inlineCheckbox1">Centro y sur america</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check4" value="Australia y nueva zelanda" onchange="javascript:showAustralia()" />
                                <label for="inlineCheckbox1">Australia y nueva zelanda</label>
                        </div>
                    </div> 

                    <div class="col-sm-5">
                      <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check5" value="Union europea" onchange="javascript:showUnionEuropea()" />
                                <label for="inlineCheckbox1">Union europea</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check6" value="Canada" onchange="javascript:showCanada()" />
                                <label for="inlineCheckbox1">Canada</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check7" value="Asia" onchange="javascript:showAsia()" />
                                <label for="inlineCheckbox1">Asia</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check8" value="Colombia" onchange="javascript:showColombia()" />
                                <label for="inlineCheckbox1">Colombia</label>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="nuevoDestino2[]" id="check9" value="Puerto Rico" onchange="javascript:showPuertoRico()" />
                                <label for="inlineCheckbox1">Puerto Rico</label>
                        </div>
                    </div>

                </div>

                <script type="text/javascript">
                  function showUsa() {
                      element = document.getElementById("content");
                      check = document.getElementById("check");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showMexico() {
                      element = document.getElementById("content1");
                      check = document.getElementById("check1");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showRepublicaDominicana() {
                      element = document.getElementById("content2");
                      check = document.getElementById("check2");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                       function showCentroSurAmerica() {
                      element = document.getElementById("content3");
                      check = document.getElementById("check3");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showAustralia() {
                      element = document.getElementById("content4");
                      check = document.getElementById("check4");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showUnionEuropea() {
                      element = document.getElementById("content5");
                      check = document.getElementById("check5");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showCanada() {
                      element = document.getElementById("content6");
                      check = document.getElementById("check6");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showAsia() {
                      element = document.getElementById("content7");
                      check = document.getElementById("check7");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                      function showColombia() {
                      element = document.getElementById("content8");
                      check = document.getElementById("check8");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }


                      function showPuertoRico() {
                      element = document.getElementById("content9");
                      check = document.getElementById("check9");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }
                </script>

 
                <div class="hr-line-dashed"></div>
                <div class="form-group" id="content1" style="display: none">
                    <label class="col-sm-2 control-label">Planes de mexico</label>
                      <div class="col-sm-5">
                       <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all1">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>   
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla" value="Plan $35USD - 1.5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $35USD - 1.5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla" value="Plan $45USD - 2.5GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 2.5GB - 30 Días</label>
                    </div> 
                      </div>
                      <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="plan2[]" class="select-alla" value="Plan $55USD - 5GB - 30 Días">
                          <label for="inlineCheckbox3">Plan $55USD - 5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="plan2[]" class="select-alla" value="Plan $5USD x Dia">
                          <label for="inlineCheckbox3">Plan $5USD x dia</label>
                    </div>
                      </div> 
                   


                </div>

                <div class="form-group" id="content9" style="display: none">

                    <label class="col-sm-2 control-label">Planes de Puerto Rico</label>
                    <div class="col-sm-5">
                        <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all2">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla2" value="Plan $40USD - 1GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $35USD - 1.5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla2" value="Plan $50USD - 4GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $50USD - 4GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="plan2[]" class="select-alla2" value="Plan $600USD - 6GB - 30 Días">
                          <label for="inlineCheckbox3">Plan $600USD - 6GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="plan2[]" class="select-alla2" value="Plan $70USD - ilimitado - 30 Días">
                          <label for="inlineCheckbox3">Plan $70USD - ilimitado - 30 Días</label>
                    </div>
                    </div>
  
                </div>


                <div class="form-group" id="content6" style="display: none">
                        
                    <label class="col-sm-2 control-label">Tipos de planes de Canada</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all3">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla3" value="Plan $35USD - 1.5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $35USD - 1.5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla3" value="Plan $45USD - 2.5GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 2.5GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="plan2[]" class="select-alla3" value="Plan $55USD - 5GB - 30 Días">
                          <label for="inlineCheckbox3">Plan $55USD - 5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                          <input type="checkbox" name="plan2[]" class="select-alla3" value="Plan $5USD x Dia">
                          <label for="inlineCheckbox3">Plan $5USD x Dia</label>
                    </div>
                    </div>

                </div>


                 <div class="form-group" id="content7" style="display: none">
 
                    <label class="col-sm-2 control-label">Tipos de planes de Asia</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all4">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $45USD - 5GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="1 Dia">
                        <label for="inlineCheckbox1">1 Día</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="2 Dias">
                        <label for="inlineCheckbox1">2 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="3 Dias">
                        <label for="inlineCheckbox1">3 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="4 Dias">
                        <label for="inlineCheckbox1">4 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="5 Dias">
                        <label for="inlineCheckbox1">5 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="6 Dias">
                        <label for="inlineCheckbox1">6 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="7 Dias">
                        <label for="inlineCheckbox1">7 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="8 Dias">
                        <label for="inlineCheckbox1">8 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="9 Dias">
                        <label for="inlineCheckbox1">9 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="10 Dias">
                        <label for="inlineCheckbox1">10 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="11 Dias">
                        <label for="inlineCheckbox1">11 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="12 Dias">
                        <label for="inlineCheckbox1">12 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="13 Dias">
                        <label for="inlineCheckbox1">13 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="14 Dias">
                        <label for="inlineCheckbox1">14 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="15 Dias">
                        <label for="inlineCheckbox1">15 Dias</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="Plan $40USD - 1GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $40USD - 1GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="16 Dias">
                        <label for="inlineCheckbox1">16 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="17 Dias">
                        <label for="inlineCheckbox1">17 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="18 Dias">
                        <label for="inlineCheckbox1">18 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="19 Dias">
                        <label for="inlineCheckbox1">19 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="20 Dias">
                        <label for="inlineCheckbox1">20 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="21 Dias">
                        <label for="inlineCheckbox1">21 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="22 Dias">
                        <label for="inlineCheckbox1">22 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="23 Dias">
                        <label for="inlineCheckbox1">23 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="24 Dias">
                        <label for="inlineCheckbox1">24 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="25 Dias">
                        <label for="inlineCheckbox1">25 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="26 Dias">
                        <label for="inlineCheckbox1">26 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="27 Dias">
                        <label for="inlineCheckbox1">27 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="28 Dias">
                        <label for="inlineCheckbox1">28 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="29 Dias">
                        <label for="inlineCheckbox1">29 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla4" value="30 Dias">
                        <label for="inlineCheckbox1">30 Dias</label>
                    </div>
                    </div>
                   
                    
                </div>

                 <div class="form-group" id="content3" style="display: none">

                    <label class="col-sm-2 control-label">Tipos de planes de Centro y Sur America</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all5">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                   <!--  <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $45USD - 5GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="1 Dia">
                        <label for="inlineCheckbox1">1 Día</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="2 Dias">
                        <label for="inlineCheckbox1">2 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="3 Dias">
                        <label for="inlineCheckbox1">3 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="4 Dias">
                        <label for="inlineCheckbox1">4 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="5 Dias">
                        <label for="inlineCheckbox1">5 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="6 Dias">
                        <label for="inlineCheckbox1">6 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="7 Dias">
                        <label for="inlineCheckbox1">7 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="8 Dias">
                        <label for="inlineCheckbox1">8 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="9 Dias">
                        <label for="inlineCheckbox1">9 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="10 Dias">
                        <label for="inlineCheckbox1">10 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="11 Dias">
                        <label for="inlineCheckbox1">11 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="12 Dias">
                        <label for="inlineCheckbox1">12 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="13 Dias">
                        <label for="inlineCheckbox1">13 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="14 Dias">
                        <label for="inlineCheckbox1">14 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="15 Dias">
                        <label for="inlineCheckbox1">15 Dias</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="Plan $40USD - 1GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $40USD - 1GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="16 Dias">
                        <label for="inlineCheckbox1">16 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="17 Dias">
                        <label for="inlineCheckbox1">17 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="18 Dias">
                        <label for="inlineCheckbox1">18 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="19 Dias">
                        <label for="inlineCheckbox1">19 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="20 Dias">
                        <label for="inlineCheckbox1">20 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="21 Dias">
                        <label for="inlineCheckbox1">21 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="22 Dias">
                        <label for="inlineCheckbox1">22 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="23 Dias">
                        <label for="inlineCheckbox1">23 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="24 Dias">
                        <label for="inlineCheckbox1">24 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="25 Dias">
                        <label for="inlineCheckbox1">25 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="26 Dias">
                        <label for="inlineCheckbox1">26 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="27 Dias">
                        <label for="inlineCheckbox1">27 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="28 Dias">
                        <label for="inlineCheckbox1">28 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="29 Dias">
                        <label for="inlineCheckbox1">29 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla5" value="30 Dias">
                        <label for="inlineCheckbox1">30 Dias</label>
                    </div>

                    </div>
                   
                   

                </div>

                <div class="form-group" id="content8" style="display: none">

                    <label class="col-sm-2 control-label">Tipo de planes Colombia</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all6">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox  checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla6" value="Plan $15USD - 2GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $15USD - 2GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla6" value="Plan $15USD - 3GB - 15 Días">
                        <label for="inlineCheckbox2">Plan $15USD - 3GB - 15 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox  checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla6" value="Plan $8USD - 1GB - 7 Días">
                        <label for="inlineCheckbox1">Plan $8USD - 1GB - 7 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla6" value="Plan $5USD - 500MB - 3 Días">
                        <label for="inlineCheckbox2">Plan $5USD - 500MB - 3 Días</label>
                    </div>
                    </div>
                    
                    


                </div>

                <div class="form-group" id="content5" style="display: none">

                    <label class="col-sm-2 control-label">Planes de la Uníon Europea</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all7">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla7" value="Plan $70USD - Ilimitados - 30 Días">
                        <label for="inlineCheckbox1">Plan $70USD - Ilimitados - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla7" value="Plan $60USD - 15GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $60USD - 15GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla7" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $45USD - 5GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla7" value="Plan $40USD - 3GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $40USD - 3GB - 30 Días</label>
                    </div>
                    </div>
                    
                    

                </div>

                <div class="form-group" id="content4" style="display: none">

                    <label class="col-sm-2 control-label">Planes de la Australia y Nueva Zelanda</label>
                    <div class="col-sm-5">
                        <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all8">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                   <!--  <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="Plan $60USD - 9GB - 30 Días">
                        <label for="inlineCheckbox1">Plan $60USD - 9GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="1 Dia">
                        <label for="inlineCheckbox1">1 Día</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="2 Dias">
                        <label for="inlineCheckbox1">2 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="3 Dias">
                        <label for="inlineCheckbox1">3 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="4 Dias">
                        <label for="inlineCheckbox1">4 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="5 Dias">
                        <label for="inlineCheckbox1">5 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="6 Dias">
                        <label for="inlineCheckbox1">6 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="7 Dias">
                        <label for="inlineCheckbox1">7 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="8 Dias">
                        <label for="inlineCheckbox1">8 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="9 Dias">
                        <label for="inlineCheckbox1">9 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="10 Dias">
                        <label for="inlineCheckbox1">10 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="11 Dias">
                        <label for="inlineCheckbox1">11 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="12 Dias">
                        <label for="inlineCheckbox1">12 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="13 Dias">
                        <label for="inlineCheckbox1">13 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="14 Dias">
                        <label for="inlineCheckbox1">14 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="15 Dias">
                        <label for="inlineCheckbox1">15 Dias</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <!-- <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="Plan $45USD - 5GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 5GB - 30 Días</label>
                    </div> -->
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="16 Dias">
                        <label for="inlineCheckbox1">16 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="17 Dias">
                        <label for="inlineCheckbox1">17 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="18 Dias">
                        <label for="inlineCheckbox1">18 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="19 Dias">
                        <label for="inlineCheckbox1">19 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="20 Dias">
                        <label for="inlineCheckbox1">20 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="21 Dias">
                        <label for="inlineCheckbox1">21 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="22 Dias">
                        <label for="inlineCheckbox1">22 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="23 Dias">
                        <label for="inlineCheckbox1">23 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="24 Dias">
                        <label for="inlineCheckbox1">24 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="25 Dias">
                        <label for="inlineCheckbox1">25 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="26 Dias">
                        <label for="inlineCheckbox1">26 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="27 Dias">
                        <label for="inlineCheckbox1">27 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="28 Dias">
                        <label for="inlineCheckbox1">28 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="29 Dias">
                        <label for="inlineCheckbox1">29 Dias</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla8" value="30 Dias">
                        <label for="inlineCheckbox1">30 Dias</label>
                    </div>
                    </div>
                    
                    
                </div>


                <div class="form-group" id="content2" style="display: none">

                    <label class="col-sm-2 control-label">Planes de Republica Dominicana</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all9">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla9" value="Plan $30USD - Ilimitado - 5 Días">
                        <label for="inlineCheckbox1">Plan $30USD - Ilimitado - 5 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla9" value="Plan $35USD - Ilimitado - 10 Días">
                        <label for="inlineCheckbox2">Plan $35USD - Ilimitado - 10 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla9" value="Plan $40USD - Ilimitado - 15 Días">
                        <label for="inlineCheckbox1">Plan $40USD - Ilimitado - 15 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla9" value="Plan $45USD - 3GB - 30 Días">
                        <label for="inlineCheckbox2">Plan $45USD - 3GB - 30 Días</label>
                    </div>
                    </div>
                    
                </div>


                <div class="form-group"  id="content" style="display: none">
     
                    <label class="col-sm-2 control-label">Planes de Estados Unidos</label>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" id="select-all10">
                        <label for="inlineCheckbox1">Seleccionar Todo</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla10" value="Plan $40USD - 1GB - 30 Días">
                        <label>Plan $40USD - 1GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla10" value="Plan $50USD - 4GB - 30 Días">
                        <label>Plan $50USD - 4GB - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla10" value="Plan $60USD - 10GB - 30 Días">
                        <label>Plan $60USD - 10GB - 30 Días</label>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla10" value="Plan $70USD - Ilimitado - 30 Días">
                        <label>Plan $70USD - Ilimitado - 30 Días</label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="checkbox" name="plan2[]" class="select-alla10" value="Plan $5USD x Dia">
                        <label>Plan $5USD x Dia</label>
                    </div>
                    </div>
                   
                    

                </div>
                
                <?php
                  if ($_SESSION["perfil"] == "Administrador") { 
                    echo 
                '<div class="form-group">
                <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                      <div class="checkbox checkbox-success">
                        <input type="checkbox" id="check35"  onchange="javascript:showCoordinadorMulti()" />
                        <label for="inlineCheckbox1">Agregar Cordinador</label>
                    </div>
                </div>
                <div class="col-sm-5">
                      
                </div>
              </div>';
               
               ?>
               <input type="hidden" placeholder="usuario" name="nuevoAgrego2[]" id="nuevoAgrego2" value="" class="form-control capturarCorrdinador35" required>

                 <div class="form-group" style="display: none;" id="content35">
                        <label class="col-sm-2 control-label">Escoger el Coordinador</label> 
                        <div class="col-sm-10">
                        <select class="form-control m-b" name="addcordinadorinv" data-placeholder ="Escoge el Coordinador" id="capturarUsuarioCordinador35">

                            <?php
                         
                                $item = null;
                                $valor = "Coordinador";
                                $perfil = "perfil";
                                $valor1 = "Coordinador";
                                $perfil1 = "perfil";

       
                                $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                echo '<option value="">Escoje el Coordinador</option>';
                                foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["usuario2"].'">'.$value["nombre"].'</option>';
                                }
                                      
                             
                                       
                
                                ?>

                        </select>
                    </div> 

                </div>

               <?php
                  }else{

                    ?>
                    <input type="hidden" placeholder="Operador" name="nuevoAgrego2[]" id="nuevoAgrego2" value="<?php echo $_SESSION["usuario"] ?>" class="form-control" required>
                    <?php
                  }
                ?>
                <script type="text/javascript">
                  function showCoordinadorMulti() {
                      element = document.getElementById("content35");
                      check = document.getElementById("check35");
                      if (check.checked) {
                          element.style.display='block';
                      }
                      else {
                          element.style.display='none';
                        }
                      }

                </script>
                  

                    <div class="hr-line-dashed"></div>

                    <div class="form-group nuevoCampoSimcard2">
                    <label class="col-sm-2 control-label">Numero de la simcard</label>

                    <div class="col-sm-10">
                              <input type="text" placeholder="# de la simcards"  name="nuevoSimcards2[]" class="form-control simcardsValidar nuevaSimcardListar" id="simcardGuardar">   
                              <br>              
                              <button class="btn btn-success btn-xs agregarSimcardMultiple pull-right" id="habilitarButton2" type="button" disabled>Agregar Simcard</button>
                              <br>     
                    </div>
                  </div>


                    <!-- <input type="hidden" id="listarSimcards" name="listarSimcards">  -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" id="habilitarSubmitMultisimcard">Activar</button>
                    <button type="submit" class="btn btn-primary" id="submitHabilitadoMultisimcard" disabled>Crear SimCards</button>
                </div>


                    <?php

                        $crearSimcard = new ControladorSimscard();
                        $crearSimcard -> ctrCrearMultiSimsCard();

                    ?>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>


   
<?php

if($_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Comercial"){

  echo '<script> 

    window.location = "inicio";

  </script>';

  return;

}



?>


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Usuarios</h2>
                    <ol class="breadcrumb">
                        <li>    
                            <a href="inicio">Home</a>
                        </li>
                        <li class="active"> 
                            <strong>Usuarios</strong>
                        </li> 
                    </ol>
                </div>
                <div class="col-lg-2">
 
        </div>
    </div>
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

                    <h3 class="font-bold">Ingresar los usuarios</h3>
                    <p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario"><i class="fa fa-check"></i>&nbsp;Crear Usuario</button>
                    </p> 
                </div>
            </div>
    </div>
</div>

<div class="row">
        <div class="col-lg-12 animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Usuarios</h5>
            </div>
            <div class="ibox-content">
            <table class="table table-bordered table-striped dt-responsive tablaUsuarios" >
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Nit</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo Login</th>
                <th>Acciones</th>
            </tr> 
            </thead>
            <tbody>
           
            <?php

             if ($_SESSION["perfil"] == "Administrador") {

                  $item = null;
                  $valor = null;
                  $perfil = null;
                  $valor1 = null;
                  $perfil1 = null;
       
                  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);


                    }else if($_SESSION["perfil"] == "Agencias"){

                    $item = null;
                    $valor = $_SESSION["id"];
                    $perfil = "id";
                    $valor1 = $_SESSION["usuario"];
                    $perfil1 = "comercial";

       
                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

                    }else if ($_SESSION["perfil"] == "Coordinador") {

                      $item = null;
                      $valor = $_SESSION["id"];
                      $perfil = "id";
                      $valor1 = 1;
                      $perfil1 = "coordinador";

       
                       $usuarios = ControladorUsuarios::ctrMostrarUsuariosCoordinador($item, $valor,$perfil,$valor1,$perfil1);
                    }

            foreach ($usuarios as $key => $value){
              
             echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario2"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{ 

                    echo '<td><img src="vistas/img/profile_small.jpg" class="img-thumbnail" width="40px"></td>';

                  }
                  echo '<td>'.$value["nit"].'</td>';
                  

                  if ($value["perfil"] == "Comercial") {
                    echo '<td>Asesor ('.$value["comercial"].')</td>';
                  }else{
                     echo '<td>'.$value["perfil"].'</td>';
                  }
                  

                  if($value["estado"] != 0){ 

                    echo '<td><button class="btn btn-success btn-xs btnActivarUsuario" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivarUsuario" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                        <div class="btn-group">

                                <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" type="button" data-toggle="modal" data-target="#editarUsuario" disable><i class="fa fa-edit" aria-hidden="true"></i></button>';

                                if ($value["id"]== $_SESSION["id"]) {
                                   echo '
                                    <button class="btn btn-danger disabled" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario2"].'" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>';
                                 }
                                 else
                                 {
                                  echo '
                                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario2"].'" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>';
                                 }
                      echo '                            
                          </div>
                        </td>
                 

                </tr>';
             }


            ?>
            </tbody>
            </table>
    
        </div>
    </div>
    <?php

      $borrarUsuario = new ControladorUsuarios();
      $borrarUsuario -> ctrBorrarUsuario();

    ?> 
</div>
</div>



 <div class="modal inmodal" id="CrearUsuario" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Ingresar el Usuario</h4>
                 <small>Ingrese los datos correspondientes del usuario</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal"  enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Nombre"  name="nuevoNombre" class="form-control" required>
                           
                        </div>
                    </div> 
                    
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                        <div class="input-group m-b">
                        <span class="input-group-addon">@</span> 

                            <input type="text" placeholder="Username" id="usuarioValidar" name="nuevoUsuario" class="form-control" required>

                        </div>
                    </div>
                  
                    </div>

                    <div class="hr-line-dashed"></div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="****" name="nuevoPassword" class="form-control" required>
                        </div>
                    </div>

                     <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nit</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="NIT" name="nuevoNit" class="form-control">
                        </div>
                    </div>
                    
                   
 
                    <div class="hr-line-dashed"></div>

                      <?php

                      if ($_SESSION["perfil"] == "Administrador") {

                        echo '

                        <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="nuevoPerfil" id="comboPerfil" onchange="cambiar()" required>
                                <option value="Administrador">Administrador</option>
                                <option value="Agencias">Agencias</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Comercial">Asesor</option>
                                <!--<option value="Coordinador">Coordinador</option>-->
                            </select>
                         </div>
                     </div>
                     <input type="hidden" placeholder="idpadre" id="capturarIdPadre" name="nuevoIdPadre" value="" class="form-control">
                     <input type="hidden" name="nuevoCoordinador" value="0" class="form-control">
                        ';

                      }else if ($_SESSION["perfil"] == "Agencias") {
                        echo '

                        <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="nuevoPerfil" id="comboPerfil" onchange="cambiar()" required>
                                <option value="">Escoge el perfil</option>
                                <option value="Comercial">Asesor</option>
                            </select>
                         </div>
                     </div>
                      <input type="hidden" placeholder="idpadre" name="nuevoIdPadre" class="form-control" value="'.$_SESSION["id"].'" >
                      <input type="hidden" name="nuevoCoordinador" value="1" class="form-control">
                        ';
                      }else if($_SESSION["perfil"] == "Coordinador"){
                          
                        echo '

                        <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="nuevoPerfil" id="comboPerfil1" onchange="cambiar1()" required>
                                <option value="Agencias">Agencias</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Comercial">Asesor</option>
                                <!--<option value="Coordinador">Coordinador</option>-->
                            </select>
                         </div>
                     </div>
                     <input type="hidden" placeholder="idpadre" id="capturarIdPadre8" name="nuevoIdPadre" value="" class="form-control">
                     <input type="hidden" name="nuevoCoordinador" value="1" class="form-control">
                        ';
                      }


                      ?>
                     

                     <script>

                      function cambiar() {
                          if (document.getElementById('comboPerfil').value === "Comercial") {
                                document.getElementById('campo_otroPerfil').style.display = 'block';
                               }else{
                              
                                document.getElementById('campo_otroPerfil').style.display = 'none';

                                }
                                return true;
                            }
                            
                            function cambiar1() {
                          if (document.getElementById('comboPerfil1').value === "Comercial") {
                                document.getElementById('campo_otroPerfil2').style.display = 'block';
                               }else{
                              
                                document.getElementById('campo_otroPerfil2').style.display = 'none';

                                }
                                return true;
                            }

                      </script>


                      <div class="form-group" id="campo_otroPerfil" style="display: none;">
                         <label class="col-sm-2 control-label">Agencias</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" id="capturarIdAgencia" name="nuevoComercial">

                              <?php

                                if ($_SESSION["perfil"] == "Administrador") {

                                 $item = null;
                                 $valor = "Agencias";
                                 $perfil = "perfil";
                                 $valor1 = 5;
                                 $perfil1 = "comercial";

                                  $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="">Escoje el usuario</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["usuario2"].'">'.$value["nombre"].'</option>';
                                    }
                            }else if ($_SESSION["perfil"] == "Agencias") {
                              echo '<option value="'.$_SESSION["usuario"].'">'.$_SESSION["nombre"].'</option>';
                            }


                              ?>
                            </select>
                         </div>
                     </div>
                     
                      <div class="form-group" id="campo_otroPerfil2" style="display: none;">
                         <label class="col-sm-2 control-label">Agencias</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b capturarIdAgenciaCoor" id="capturarIdAgencia1" name="nuevoComercial">

                              <?php

                                if ($_SESSION["perfil"] == "Coordinador") {

                                 $item = null;
                                 $valor = "Agencias";
                                 $perfil = "perfil";
                                 $valor1 = 5;
                                 $perfil1 = "comercial";

                                  $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="">Escoje el usuario</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["usuario2"].'">'.$value["nombre"].'</option>';
                                    }
                            }else if ($_SESSION["perfil"] == "Agencias") {
                              echo '<option value="'.$_SESSION["usuario"].'">'.$_SESSION["nombre"].'</option>';
                            }


                              ?>
                            </select>
                         </div>
                     </div>
                   

                     <div class="hr-line-dashed"></div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Subir Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control nuevaFoto" name="nuevaFoto">
                            <p>Peso máximo de la foto 2MB</p>
                            <img src="vistas/img/profile_small.jpg" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>

                    <!-- <input type="hidden" placeholder="mostrar"  name="nuevoMostrar" value="1" class="form-control">
 -->
                    
                    <?php

                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario -> ctrCrearUsuario();

                    ?>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </div>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>


<div class="modal inmodal" id="editarUsuario" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Editar el Usuario</h4>
                 <small>Ingrese los datos correspondientes del usuario</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal"  enctype="multipart/form-data">

                <input type="hidden" name="editarIdUsuario" id="editarIdUsuario">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" id="editarNombre" placeholder="Nombre" name="editarNombre" class="form-control">
                        </div>
                    </div>
                    
                    <div class="hr-line-dashed"></div>

            

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                        <div class="input-group m-b">
                        <span class="input-group-addon">@</span> 
                            <input type="hidden" placeholder="Usuario" id="editarUsuario2" name="editarUsuario" class="form-control" readonly>

                        </div>

                    </div>
                  
                    </div>


                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password"  placeholder="****" name="editarPassword" class="form-control" >
                            <input type="hidden" id="passwordActual" name="passwordActual">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nit</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="NIT" name="editarNit" id="editarNit" class="form-control">
                        </div>
                    </div>
 
                    <div class="hr-line-dashed"></div>
                    
                     <!-- <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="editarPerfil">
                                <option value="" id="editarPerfil"></option>
                                <option value="Administrador">Administrador</option>
                                <option value="Agencias">Agencias</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                         </div>
                     </div> -->
                      <?php

                      if ($_SESSION["perfil"] == "Administrador") {

                        echo '

                        <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="editarPerfil" id="comboPerfil2" onchange="cambiar2()" required>
                                <option value="" id="editarPerfil"></option>
                                <option value="Administrador">Administrador</option>
                                <option value="Agencias">Agencias</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Comercial">Asesor</option>
                            </select>
                         </div>
                     </div>
                     <input type="hidden" placeholder="idpadre" id="capturarIdPadre2" name="editarIdPadre" value="" class="form-control idpadretraer">
                        ';

                      }else if ($_SESSION["perfil"] == "Agencias") {
                        echo '

                        <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="editarPerfil" id="comboPerfil2" onchange="cambiar2()" required>
                                <option value="" id="editarPerfil"></option>
                                <option value="Comercial">Asesor</option>
                            </select>
                         </div>
                     </div>
                        ';
                      }else if($_SESSION["perfil"] == "Coordinador"){
                          
                        echo '

                        <div class="form-group">
                         <label class="col-sm-2 control-label">Perfil</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b" name="editarPerfil" id="comboPerfil2" onchange="cambiar2()" required>
                                <option value="Agencias">Agencias</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Comercial">Asesor</option>
                                <!--<option value="Coordinador">Coordinador</option>-->
                            </select>
                         </div>
                     </div>
                     <input type="hidden" placeholder="idpadre" id="capturarIdPadre5" name="editarIdPadre" value="" class="form-control">
                     <input type="hidden" name="nuevoCoordinador" value="1" class="form-control">
                        ';
                      }


                      ?>

                      <script>

                      function cambiar2() {
                          if (document.getElementById('comboPerfil2').value === "Comercial") {
                                document.getElementById('campo_otroPerfil3').style.display = 'block';
                               }else{
                              
                                document.getElementById('campo_otroPerfil3').style.display = 'none';

                                }
                                return true;
                            }

                      </script>

                      <div class="hr-line-dashed"></div>

                       <div class="form-group" id="campo_otroPerfil3" style="display: none;">
                         <label class="col-sm-2 control-label">Agencias</label>
                         <div class="col-sm-10">
                            <select class="form-control m-b traerUsuariopadreCoordinador" name="editarComercial" id="capturarIdAgencia2">

                              <?php

                                if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Coordinador" ) {

                                 $item = null;
                                 $valor = "Agencias";
                                 $perfil = "perfil";
                                 $valor1 = 5;
                                 $perfil1 = "comercial";

                                  $clientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
                                    echo '<option value="" id="editarComercial2"></option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["usuario2"].'">'.$value["nombre"].'</option>';
                                    }
                            }else if ($_SESSION["perfil"] == "Agencias") {
                              echo '<option value="'.$_SESSION["usuario"].'">'.$_SESSION["nombre"].'</option>';
                            }


                              ?>
                            </select>
                         </div>
                     </div>

                     <div class="hr-line-dashed"></div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Subir Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control nuevaFoto" name="editarFoto">
                            <p>Peso máximo de la foto 2MB</p>
                            <img src="vistas/img/profile_small.jpg" class="img-thumbnail previsualizar" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>
                    </div>

                    <!-- <input type="hidden" placeholder="mostrar"  name="editarMostrar" id="editarMostrar" value="1" class="form-control"> -->

                    <?php

                   $editarUsuario = new ControladorUsuarios();
                   $editarUsuario -> ctrEditarUsuario();

                    ?>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar Usuario</button>
                    </div>

                  
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>






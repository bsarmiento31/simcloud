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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearClientes"><i class="fa fa-check"></i>&nbsp;Crear Clientes</button>
                    </p> 
                </div>
            </div>
    </div>
</div>


<div class="row">
        <div class="col-lg-12 animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>SimsCards</h5>
            </div>
            <div class="ibox-content">
            <table class="table table-bordered table-striped dt-responsive tablaUsuarios" >
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Agrego</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

                <?php 

                    if ($_SESSION["perfil"] == "Administrador") {

                      $item = null;
                      $valor = null;
                      $perfil = null;

                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor,$perfil);

                    }else{

                    $item = null;
                    $valor = $_SESSION["usuario"];
                    $perfil = "agrego";

       
                    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor,$perfil);

                    }
                    

                    foreach ($clientes as $key => $value) {
                         echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["celular"].'</td>
                            <td>'.$value["email"].'</td>
                            <td>'.$value["agrego"].'</td>
                            <td>
                            <div class="btn-group">

                                <button class="btn btn-success btnEditarCliente" data-toggle="modal" data-target="#EditarClientes" type="button" idCliente="'.$value["id"].'" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btnEliminarCliente" type="button" idCliente="'.$value["id"].'"><i class="fa fa-times" aria-hidden="true"></i></button>
                                
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

      $borrarClientes = new ControladorClientes();
      $borrarClientes -> ctrBorrarCliente();

    ?> 
  
</div>
</div>


<div class="modal inmodal" id="CrearClientes" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Agregar el cliente</h4>
                 <small>Ingrese los datos correspondientes del Cliente</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal">

                  <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del cliente</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Nombre del cliente"  name="nuevoCliente" class="form-control" required>
                        </div>
                    </div>
        
                  <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Numero de telefono/celular"  name="nuevoTelefono" class="form-control" required>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Correo electronico" name="nuevoEmail" class="form-control" required>
                        </div>
                    </div>
 
                    <div class="hr-line-dashed"></div>
                    
                    <input type="hidden" placeholder="Operador" name="nuevoUsuario" class="form-control" value="<?php echo $_SESSION["usuario"] ?>">
                  

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Cliente</button>
                </div>


                    <?php

                        $crearCliente = new ControladorClientes();
                        $crearCliente -> ctrCrearClientes();

                    ?>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>



<div class="modal inmodal" id="EditarClientes" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Editar el cliente</h4>
                 <small>Ingrese los datos correspondientes del Cliente</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal"  enctype="multipart/form-data">

                <input type="hidden"  name="idCliente" id="idCliente" class="form-control simcardsValidar" required>

                 <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del cliente</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Nombre del cliente"  name="editarCliente" id="editarCliente" class="form-control" required>
                        </div>
                    </div>
                    
 
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Numero de telefono/celular"  name="editarTelefono" id="editarTelefono" class="form-control" required>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Correo electronico" name="editarEmail" id="editarEmail" class="form-control" required>
                        </div>
                    </div>
 
                    <div class="hr-line-dashed"></div>
                    
                    <input type="hidden" placeholder="Operador" name="editarUsuario" id="editarUsuario" class="form-control" value="<?php echo $_SESSION["usuario"] ?>">
                  

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar Cliente</button>
                </div>


                    <?php

                        $editarCliente = new ControladorClientes();
                        $editarCliente -> ctrEditarClientes();

                    ?>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>
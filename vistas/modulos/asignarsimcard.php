<?php
error_reporting(0);
if(isset($_POST['boton2'])) { 
 
	$eliminarRegistrosSeleccionados = new ControladorSimscard();
  	$eliminarRegistrosSeleccionados -> ctrEliminarRegistrosSeleccionados();
}else{ 
	
 	
?> 
<?php

if ($_SESSION["perfil"] == "Administrador") {
	?>

	<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row"> 
		<div class="col-lg-12">
			<div class="ibox-title">
				<h5>Asignar Simcard</h5>
			</div>
			<div class="ibox-content">
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-9">
						
						<select class="form-control m-b chosen-select" id="usuarioAsignado" data-placeholder="Escoge el usuario">
							<!--Se cambio esto -->
							<option value="">Escoger usuario</option>
							<?php
								$item1 = null;
								$valor12 = null;
								$perfil1 = null;
								$valor11 = null;
								$perfil11 = null;
								$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor12,$perfil1,$valor11,$perfil11);
											foreach ($usuarios as $key => $value2) {
												echo '<option value="'.$value2["id"].'">'.$value2["nombre"].'</option>';
											}
							?>
						</select>
					</div>
				</div>
				
				<br>
				<br>
				
				 <div class="form-group">
                        <label class="col-sm-3 control-label">Escoger el Coordinador</label>
                        <div class="col-sm-9">
                        <select class="form-control m-b" data-placeholder ="Escoge el Coordinador" id="capturarUsuarioCordinador2">

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
                <br>
                <br>
                <br>
			</div>
		</div>
	</div>
</div>
<form method="post" class="form-horizontal">
	<?php
						$item =  "id";
						$valor = $_POST["selector"];
						$N = count($valor);
						$select = null;
						$valor1 = null;
						$perfil1 = null;
						
						
						for($i=0; $i < $N; $i++){
							$simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor[$i], $select,$valor1,$perfil1);
	?>
	<input type="hidden" class="form-control" name="editarSimcard[]" value="<?php echo $simscard["simcard"] ?>">
	
	
	<input type="hidden" class="form-control" name="editarId[]" value="<?php echo $simscard["id"] ?>">
	
	<input type="hidden" class="form-control usuarioSeleccionado" name="editarSeleccionadoUsuario[]" value="">

	<input type="hidden" class="form-control capturarCorrdinador2" name="editarSeleccionadoAgrego[]" value="">
	<?php
	}
	?>
	<button type="submit" class="btn btn-success">Envíar</button>
	<?php
	$asignarSimcardss = new ControladorSimscard();
	$asignarSimcardss -> ctrAsignarSimcards();
	?>


</form>


<?php
}else if ($_SESSION["perfil"] == "Coordinador") {

?>
<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row"> 
		<div class="col-lg-12">
			<div class="ibox-title">
				<h5>Asignar Simcard</h5>
			</div>
			<div class="ibox-content">
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-9">
						
						<select class="form-control m-b" id="usuarioAsignado">
							<!--Se cambio esto -->
							<?php
								$item = null;
                                      $valor = $_SESSION["id"];
                                      $perfil = "id";
                                      $valor1 = 1;
                                      $perfil1 = "coordinador";

       
                                      $clientes = ControladorUsuarios::ctrMostrarUsuariosCoordinador($item, $valor,$perfil,$valor1,$perfil1);
                                      echo '<option value="">Escoje el usuario</option>';
                                    foreach ($clientes as $key => $value) {
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }
							?>
						</select>
					</div>
				</div>
			
                <br>
			</div>
		</div>
	</div>
</div>
<form method="post" class="form-horizontal">
	<?php
						$item =  "id";
						$valor = $_POST["selector"];
						$N = count($valor);
						$select = null;
						$valor1 = null;
						$perfil1 = null;
						
						
						for($i=0; $i < $N; $i++){
							$simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor[$i], $select,$valor1,$perfil1);
	?>
	<input type="hidden" class="form-control" name="editarSimcard[]" value="<?php echo $simscard["simcard"] ?>">
	
	
	<input type="hidden" class="form-control" name="editarId[]" value="<?php echo $simscard["id"] ?>">
	
	<input type="hidden" class="form-control usuarioSeleccionado" name="editarSeleccionadoUsuario[]" value="">

	<input type="hidden" class="form-control" name="editarSeleccionadoAgrego[]" value="<?php echo $_SESSION["usuario"] ?>">
	<?php
	}
	?>
	<button type="submit" class="btn btn-success">Envíar</button>
	<?php
	$asignarSimcardss = new ControladorSimscard();
	$asignarSimcardss -> ctrAsignarSimcards();
	?>


</form>
<?php
}

?>





<?php
}  
?>
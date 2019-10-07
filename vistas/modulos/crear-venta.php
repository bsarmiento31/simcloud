<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row"> 
        <div class="col-lg-2">
           
    </div>
    <div class="col-lg-8">
         <div class="ibox ">     
                <div class="ibox-title">   
                    <h5>Agregar Venta</h5>      
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" autocomplete="off">
                        <input type="hidden" placeholder="Operador" name="nuevoVendedor" class="form-control" value="<?php echo $_SESSION["id"] ?>">
                        <?php

                        $item = null; 
                        $valor = null; 
                        $item1 = null;
                        $valor3 = null;
 
                        $ventas = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);

                        if(!$ventas){

                      echo '<input type="hidden" placeholder="codigo" name="nuevoCodigo" class="form-control" value="1001">';
                  

                    }else{

                      foreach ($ventas as $key => $value) {
                        
                        
                      
                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="hidden" placeholder="codigo" name="nuevoCodigo" class="form-control" value="'.$codigo.'">';
                  

                    }



                        ?>
               
                        <?php

                            if ($_SESSION["perfil"] == "Agencias" || $_SESSION["perfil"] == "Coordinador") {
                                echo '

                                    <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" value="'.$_SESSION["usuario"].'" name="nuevoAgregoPadre">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" value="1" name="nuevoCoordinador">
                                            </div>
                                    </div>

                                ';
                            }else if ($_SESSION["perfil"] == "Comercial") {
                                echo '

                                    <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" value="'.$_SESSION["comercial"].'" name="nuevoAgregoPadre">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" value="1" name="nuevoCoordinador">
                                            </div>
                                    </div>

                                ';
                            }else if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Freelance") {

                                echo '

                                    <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" value="NA" name="nuevoAgregoPadre">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" value="0" name="nuevoCoordinador">
                                            </div>
                                    </div>

                                ';
                            }

                        ?>

                        
                     
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre del cliente</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nuevoCliente" required>
                                </div>
                        </div>
                        <a id="nuevoCliente" class="nuevoCliente" usuario="<?php echo $_SESSION["id"] ?>"></a>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Numero de celular</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nuevoCelular" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="nuevoCorreo" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"># De pasaporte</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nuevoPasaporte">
                                </div>
                        </div>
                        
                        


                        <?php

                            if ($_SESSION["perfil"] == "Administrador" ) {
                                echo 
                                ' 

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Escoger el numero de simcard</label>
                            <div class="col-sm-9" >
                                <input list="browsers" name="nuevoSimcards" class="form-control mirarSimscards mirarVendida traerDestinos" id="nuevoSimcards">

                               
                            </div> 
                        </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Destino</label>
                                <div class="col-sm-9">

                                    <select class="form-control m-b" name="nuevoDestino" id="destinosCargados" onchange="cambiarPlanNuevo()">
                                        <!--<option value="">Escoge el destino</option>
                                         
                                        <option value="Estados Unidos">Estados Unidos Uni Global(T MOBILE)</option>
                                        <option value="Mexico">Mexico Uni Global(T MOBILE)</option>
                                        <option value="Republica Dominicana">Republica Dominicana Claro</option>
                                        <option value="Centro y sur america">Centro y sur america Three UK</option>
                                        <option value="Australia y nueva zelanda">Australia y nueva zelanda</option>
                                        <option value="Union europea">Uni¨®n europea</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Asia">Asia</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Puerto Rico">Puerto Rico</option>-->
                                    </select>
                                </div>
                        </div>

                           
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label">Escoger el tipo de plan</label>
                            <div class="col-sm-9">
                                <select class="form-control m-b planesCargados" name="nuevoplan" id="planeCargados" required onchange="cambiarDias()">

                                </select>
                            </div>
                        </div>-->';

                        ?>
                        <input type="hidden" class="form-control traerSimcard" id="nuevoSimcardsDestino" name="nuevoAgrego" value="<?php echo $_SESSION["id"] ?>"> 
                        <script type="text/javascript">
                            function cambiarPlanNuevo() {
                if (document.getElementById('destinosCargados').value === "Mexico") {
                document.getElementById('campo_otro').style.display = 'block';
                }else{
                   document.getElementById('campo_otro').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Estados Unidos") {
                  document.getElementById('campo_otro1').style.display = 'block';
                } else {      
                document.getElementById('campo_otro1').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Republica Dominicana") {
                  document.getElementById('campo_otro2').style.display = 'block';
                } else {      
                document.getElementById('campo_otro2').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Centro y sur america") {
                  document.getElementById('campo_otro3').style.display = 'block';
                } else {      
                document.getElementById('campo_otro3').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Australia y nueva zelanda") {
                  document.getElementById('campo_otro4').style.display = 'block';
                } else {      
                document.getElementById('campo_otro4').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Union europea") {
                  document.getElementById('campo_otro5').style.display = 'block';
                } else {      
                document.getElementById('campo_otro5').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Colombia") {
                  document.getElementById('campo_otro6').style.display = 'block';
                } else {      
                document.getElementById('campo_otro6').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Asia") {
                  document.getElementById('campo_otro7').style.display = 'block';
                } else {      
                document.getElementById('campo_otro7').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Puerto Rico") {
                  document.getElementById('campo_otro8').style.display = 'block';
                } else {      
                document.getElementById('campo_otro8').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Canada") {
                  document.getElementById('campo_otro9').style.display = 'block';
                } else {      
                document.getElementById('campo_otro9').style.display = 'none';
                }

         
                return true;
                }
                        </script>


                        <div class="form-group" id="campo_otro" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan1"  class="form-control m-b MostrarPrecios" id="planeCargadosMexico" onchange="cambiarDiasMexico()">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 D&iacuteas</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x dia</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro8" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan2"  class="form-control m-b MostrarPrecios">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 D&iacuteas</option>
                            <option value="Plan $600USD - 6GB - 30 Dias">Plan $600USD - 6GB - 30 D&iacuteas</option>
                            <option value="Plan $70USD - ilimitado - 30 Dias">Plan $70USD - ilimitado - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro9" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan3"  class="form-control m-b MostrarPrecios" id="planeCargadosCanada" onchange="cambiarDiasCanada()">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 D&iacuteas</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x D&iacutea</option>
                        </select>
                    </div> 

                </div>


                 <div class="form-group" id="campo_otro7" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan4" class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>

                 <div class="form-group" id="campo_otro3" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan5"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro6" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan6"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $15USD - 2GB - 30 Dias">Plan $15USD - 2GB - 30 D&iacuteas</option>
                            <option value="Plan $15USD - 3GB - 15 Dias">Plan $15USD - 3GB - 15 D&iacuteas</option>
                            <option value="Plan $8USD - 1GB - 7 Dias">Plan $8USD - 1GB - 7 D&iacuteas</option>
                            <option value="Plan $5USD - 500MB - 3 Dias">Plan $5USD - 500MB - 3 D&iacuteas</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro5" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan7"  class="form-control m-b MostrarPrecios">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $70USD - Ilimitados - 30 Dias">Plan $70USD - Ilimitados - 30 D&iacuteas</option>
                            <option value="Plan $60USD - 15GB - 30 Dias">Plan $60USD - 15GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 3GB - 30 Dias">Plan $40USD - 3GB - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro4" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan8"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $60USD - 9GB - 30 Dias">Plan $60USD - 9GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro2" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan9"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $30USD - Ilimitado - 5 Dias">Plan $30USD - Ilimitado - 5 D&iacuteas</option>
                            <option value="Plan $35USD - Ilimitado - 10 Dias">Plan $35USD - Ilimitado - 10 D&iacuteas</option>
                            <option value="Plan $40USD - Ilimitado - 15 Dias">Plan $40USD - Ilimitado - 15 D&iacuteas</option>
                            <option value="Plan $45USD - 3GB - 30 Dias">Plan $45USD - 3GB - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro1" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan10"  class="form-control m-b MostrarPrecios vaciarValores" id="planeCargadosUsa" onchange="cambiarDiasUsa()">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 D&iacuteas</option>
                            <option value="Plan $60USD - 10GB - 30 Dias">Plan $60USD - 10GB - 30 D&iacuteas</option>
                            <option value="Plan $70USD - Ilimitado - 30 Dias">Plan $70USD - Ilimitado - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x D&iacutea</option>
                        </select>
                    </div> 

                </div>
                <?php
                            }else if ($_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Agencias") {
                                echo 
                        ' <div class="form-group">
                            <label class="col-sm-3 control-label">Escoger el numero de simcard</label>
                            <div class="col-sm-9">
                               
                                <input list="browsers" name="nuevoSimcards" class="form-control mirarSimscards mirarVendida traerDestinos" id="nuevoSimcards">
                            </div> 
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Destino</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="nuevoDestino" id="destinosCargados" onchange="cambiarPlanNuevo()">
                                       
                                    </select>
                                </div>
                        </div>

                          
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label">Escoger el tipo de plan</label>
                            <div class="col-sm-9">
                                <select class="form-control m-b planeCargados" name="nuevoplan" id="planeCargados2" required onchange="cambiarDias2()">

                                </select>
                            </div>
                        </div>-->';
                        ?>
                        <input type="hidden" class="form-control traerSimcard" name="nuevoAgrego" value="<?php echo $_SESSION["id"] ?>"> 
                        <script type="text/javascript">
                            function cambiarPlanNuevo() {
                if (document.getElementById('destinosCargados').value === "Mexico") {
                document.getElementById('campo_otro').style.display = 'block';
                }else{
                   document.getElementById('campo_otro').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Estados Unidos") {
                  document.getElementById('campo_otro1').style.display = 'block';
                } else {      
                document.getElementById('campo_otro1').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Republica Dominicana") {
                  document.getElementById('campo_otro2').style.display = 'block';
                } else {      
                document.getElementById('campo_otro2').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Centro y sur america") {
                  document.getElementById('campo_otro3').style.display = 'block';
                } else {      
                document.getElementById('campo_otro3').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Australia y nueva zelanda") {
                  document.getElementById('campo_otro4').style.display = 'block';
                } else {      
                document.getElementById('campo_otro4').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Union europea") {
                  document.getElementById('campo_otro5').style.display = 'block';
                } else {      
                document.getElementById('campo_otro5').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Colombia") {
                  document.getElementById('campo_otro6').style.display = 'block';
                } else {      
                document.getElementById('campo_otro6').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Asia") {
                  document.getElementById('campo_otro7').style.display = 'block';
                } else {      
                document.getElementById('campo_otro7').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Puerto Rico") {
                  document.getElementById('campo_otro8').style.display = 'block';
                } else {      
                document.getElementById('campo_otro8').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Canada") {
                  document.getElementById('campo_otro9').style.display = 'block';
                } else {      
                document.getElementById('campo_otro9').style.display = 'none';
                }

         
                return true;
                }
                        </script>


                        <div class="form-group" id="campo_otro" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan1"  class="form-control m-b MostrarPrecios" id="planeCargadosMexico" onchange="cambiarDiasMexico()">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 D&iacuteas</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x dia</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro8" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan2"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 D&iacuteas</option>
                            <option value="Plan $600USD - 6GB - 30 Dias">Plan $600USD - 6GB - 30 D&iacuteas</option>
                            <option value="Plan $70USD - ilimitado - 30 Dias">Plan $70USD - ilimitado - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro9" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan3"  class="form-control m-b MostrarPrecios" id="planeCargadosCanada" onchange="cambiarDiasCanada()">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 D&iacuteas</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x D&iacutea</option>
                        </select>
                    </div> 

                </div>


                 <div class="form-group" id="campo_otro7" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan4"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>

                 <div class="form-group" id="campo_otro3" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan5"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro6" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan6"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $15USD - 2GB - 30 Dias">Plan $15USD - 2GB - 30 D&iacuteas</option>
                            <option value="Plan $15USD - 3GB - 15 Dias">Plan $15USD - 3GB - 15 D&iacuteas</option>
                            <option value="Plan $8USD - 1GB - 7 Dias">Plan $8USD - 1GB - 7 D&iacuteas</option>
                            <option value="Plan $5USD - 500MB - 3 Dias">Plan $5USD - 500MB - 3 D&iacuteas</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro5" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan7"  class="form-control m-b MostrarPrecios">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $70USD - Ilimitados - 30 Dias">Plan $70USD - Ilimitados - 30 D&iacuteas</option>
                            <option value="Plan $60USD - 15GB - 30 Dias">Plan $60USD - 15GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 3GB - 30 Dias">Plan $40USD - 3GB - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro4" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan8"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $60USD - 9GB - 30 Dias">Plan $60USD - 9GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro2" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan9"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $30USD - Ilimitado - 5 Dias">Plan $30USD - Ilimitado - 5 D&iacuteas</option>
                            <option value="Plan $35USD - Ilimitado - 10 Dias">Plan $35USD - Ilimitado - 10 D&iacuteas</option>
                            <option value="Plan $40USD - Ilimitado - 15 Dias">Plan $40USD - Ilimitado - 15 D&iacuteas</option>
                            <option value="Plan $45USD - 3GB - 30 Dias">Plan $45USD - 3GB - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro1" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan10"  class="form-control m-b MostrarPrecios" id="planeCargadosUsa" onchange="cambiarDiasUsa()">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 D&iacuteas</option>
                            <option value="Plan $60USD - 10GB - 30 Dias">Plan $60USD - 10GB - 30 D&iacuteas</option>
                            <option value="Plan $70USD - Ilimitado - 30 Dias">Plan $70USD - Ilimitado - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x D&iacutea</option>
                        </select>
                    </div> 

                </div>
                        <?php
                            }else if ($_SESSION["perfil"] == "Comercial") {
                                 echo 
                        ' 
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Escoger el numero de simcard</label>
                            <div class="col-sm-9">

                                <input list="browsers" name="nuevoSimcards" class="form-control mirarSimscards mirarVendida traerDestinos" id="nuevoSimcards">
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Destino</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="nuevoDestino" id="destinosCargados" onchange="cambiarPlanNuevo()">
                                        
                                    </select>
                                </div>
                        </div>';
                        ?>
                        <input type="hidden" class="form-control traerSimcard" name="nuevoAgrego" value="<?php echo $_SESSION["idpadre"] ?>"> 
                             <script type="text/javascript">
                            function cambiarPlanNuevo() {
                if (document.getElementById('destinosCargados').value === "Mexico") {
                document.getElementById('campo_otro').style.display = 'block';
                }else{
                   document.getElementById('campo_otro').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Estados Unidos") {
                  document.getElementById('campo_otro1').style.display = 'block';
                } else {      
                document.getElementById('campo_otro1').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Republica Dominicana") {
                  document.getElementById('campo_otro2').style.display = 'block';
                } else {      
                document.getElementById('campo_otro2').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Centro y sur america") {
                  document.getElementById('campo_otro3').style.display = 'block';
                } else {      
                document.getElementById('campo_otro3').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Australia y nueva zelanda") {
                  document.getElementById('campo_otro4').style.display = 'block';
                } else {      
                document.getElementById('campo_otro4').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Union europea") {
                  document.getElementById('campo_otro5').style.display = 'block';
                } else {      
                document.getElementById('campo_otro5').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Colombia") {
                  document.getElementById('campo_otro6').style.display = 'block';
                } else {      
                document.getElementById('campo_otro6').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Asia") {
                  document.getElementById('campo_otro7').style.display = 'block';
                } else {      
                document.getElementById('campo_otro7').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Puerto Rico") {
                  document.getElementById('campo_otro8').style.display = 'block';
                } else {      
                document.getElementById('campo_otro8').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Canada") {
                  document.getElementById('campo_otro9').style.display = 'block';
                } else {      
                document.getElementById('campo_otro9').style.display = 'none';
                }

         
                return true;
                }
                        </script>


                   
                        <div class="form-group" id="campo_otro" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan1"  class="form-control m-b MostrarPrecios" id="planeCargadosMexico" onchange="cambiarDiasMexico()">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 D&iacuteas</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x dia</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro8" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan2"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 D&iacuteas</option>
                            <option value="Plan $600USD - 6GB - 30 Dias">Plan $600USD - 6GB - 30 D&iacuteas</option>
                            <option value="Plan $70USD - ilimitado - 30 Dias">Plan $70USD - ilimitado - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro9" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan3"  class="form-control m-b MostrarPrecios" id="planeCargadosCanada" onchange="cambiarDiasCanada()">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 D&iacuteas</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x D&iacutea</option>
                        </select>
                    </div> 

                </div>


                 <div class="form-group" id="campo_otro7" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan4"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>

                 <div class="form-group" id="campo_otro3" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan5"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro6" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan6"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $15USD - 2GB - 30 Dias">Plan $15USD - 2GB - 30 D&iacuteas</option>
                            <option value="Plan $15USD - 3GB - 15 Dias">Plan $15USD - 3GB - 15 D&iacuteas</option>
                            <option value="Plan $8USD - 1GB - 7 Dias">Plan $8USD - 1GB - 7 D&iacuteas</option>
                            <option value="Plan $5USD - 500MB - 3 Dias">Plan $5USD - 500MB - 3 D&iacuteas</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro5" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan7"  class="form-control m-b MostrarPrecios">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $70USD - Ilimitados - 30 Dias">Plan $70USD - Ilimitados - 30 D&iacuteas</option>
                            <option value="Plan $60USD - 15GB - 30 Dias">Plan $60USD - 15GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option>
                            <option value="Plan $40USD - 3GB - 30 Dias">Plan $40USD - 3GB - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro4" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan8"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <!-- <option value="Plan $60USD - 9GB - 30 Dias">Plan $60USD - 9GB - 30 D&iacuteas</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 D&iacuteas</option> -->
                            <option value="1 Dia">1 Dia</option>
                            <option value="2 Dias">2 Dias</option>
                            <option value="3 Dias">3 Dias</option>
                            <option value="4 Dias">4 Dias</option>
                            <option value="5 Dias">5 Dias</option>
                            <option value="6 Dias">6 Dias</option>
                            <option value="7 Dias">7 Dias</option>
                            <option value="8 Dias">8 Dias</option>
                            <option value="9 Dias">9 Dias</option>
                            <option value="10 Dias">10 Dias</option>
                            <option value="11 Dias">11 Dias</option>
                            <option value="12 Dias">12 Dias</option>
                            <option value="13 Dias">13 Dias</option>
                            <option value="14 Dias">14 Dias</option>
                            <option value="15 Dias">15 Dias</option>
                            <option value="16 Dias">16 Dias</option>
                            <option value="17 Dias">17 Dias</option>
                            <option value="18 Dias">18 Dias</option>
                            <option value="19 Dias">19 Dias</option>
                            <option value="20 Dias">20 Dias</option>
                            <option value="21 Dias">21 Dias</option>
                            <option value="22 Dias">22 Dias</option>
                            <option value="23 Dias">23 Dias</option>
                            <option value="24 Dias">24 Dias</option>
                            <option value="25 Dias">25 Dias</option>
                            <option value="26 Dias">26 Dias</option>
                            <option value="27 Dias">27 Dias</option>
                            <option value="28 Dias">28 Dias</option>
                            <option value="29 Dias">29 Dias</option>
                            <option value="30 Dias">30 Dias</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro2" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan9"  class="form-control m-b MostrarPrecios">
                             <option value="">Seleccione el plan</option>
                            <option value="Plan $30USD - Ilimitado - 5 Dias">Plan $30USD - Ilimitado - 5 D&iacuteas</option>
                            <option value="Plan $35USD - Ilimitado - 10 Dias">Plan $35USD - Ilimitado - 10 D&iacuteas</option>
                            <option value="Plan $40USD - Ilimitado - 15 Dias">Plan $40USD - Ilimitado - 15 D&iacuteas</option>
                            <option value="Plan $45USD - 3GB - 30 Dias">Plan $45USD - 3GB - 30 D&iacuteas</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro1" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan10"  class="form-control m-b MostrarPrecios" id="planeCargadosUsa" onchange="cambiarDiasUsa()">
                            <option value="">Seleccione el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 D&iacuteas</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 D&iacuteas</option>
                            <option value="Plan $60USD - 10GB - 30 Dias">Plan $60USD - 10GB - 30 D&iacuteas</option>
                            <option value="Plan $70USD - Ilimitado - 30 Dias">Plan $70USD - Ilimitado - 30 D&iacuteas</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x D&iacutea</option>
                        </select>
                    </div> 

                </div>
                        <?php
                            }else if ($_SESSION["perfil"] == "Coordinador") {
                                ?>
                                 <div class="form-group">
                            <label class="col-sm-3 control-label">Escoger el numero de simcard</label>
                            <div class="col-sm-9">
                                
                                <input list="browsers" name="nuevoSimcards" class="form-control mirarSimscards mirarVendida traerDestinos" id="nuevoSimcards2">

                            </div> 
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Destino</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="nuevoDestino" id="destinosCargados" onchange="cambiarPlanNuevo()">
                                        
                                    </select>
                                </div>
                        </div>
                        
                        <input type="hidden" class="form-control traerSimcard2" id="nuevoSimcardsDestino2" name="nuevoAgrego" value="<?php echo $_SESSION["usuario"] ?>"> 
                        <script type="text/javascript">
                            function cambiarPlanNuevo() {
                if (document.getElementById('destinosCargados').value === "Mexico") {
                document.getElementById('campo_otro').style.display = 'block';
                }else{
                   document.getElementById('campo_otro').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Estados Unidos") {
                  document.getElementById('campo_otro1').style.display = 'block';
                } else {      
                document.getElementById('campo_otro1').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Republica Dominicana") {
                  document.getElementById('campo_otro2').style.display = 'block';
                } else {      
                document.getElementById('campo_otro2').style.display = 'none';
                } 

                if (document.getElementById('destinosCargados').value === "Centro y sur america") {
                  document.getElementById('campo_otro3').style.display = 'block';
                } else {      
                document.getElementById('campo_otro3').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Australia y nueva zelanda") {
                  document.getElementById('campo_otro4').style.display = 'block';
                } else {      
                document.getElementById('campo_otro4').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Union europea") {
                  document.getElementById('campo_otro5').style.display = 'block';
                } else {      
                document.getElementById('campo_otro5').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Colombia") {
                  document.getElementById('campo_otro6').style.display = 'block';
                } else {      
                document.getElementById('campo_otro6').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Asia") {
                  document.getElementById('campo_otro7').style.display = 'block';
                } else {      
                document.getElementById('campo_otro7').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Puerto Rico") {
                  document.getElementById('campo_otro8').style.display = 'block';
                } else {      
                document.getElementById('campo_otro8').style.display = 'none';
                }

                if (document.getElementById('destinosCargados').value === "Canada") {
                  document.getElementById('campo_otro9').style.display = 'block';
                } else {      
                document.getElementById('campo_otro9').style.display = 'none';
                }

         
                return true;
                }
                        </script>
                        
                        <!--<input type="text" name="nuevoplan" class="form-control">-->


                        <div class="form-group" id="campo_otro" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select name="nuevoplan1"  class="form-control m-b MostrarPrecios" id="planeCargadosMexico" onchange="cambiarDiasMexico()">
                            <option value="">Escoger el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 Dias</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 Dias</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 Dias</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x dia</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro8" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select name="nuevoplan2" class="form-control m-b MostrarPrecios">
                             <option value="">Escoger el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $35USD - 1.5GB - 30 Dias</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 Dias</option>
                            <option value="Plan $600USD - 6GB - 30 Dias">Plan $600USD - 6GB - 30 Dias</option>
                            <option value="Plan $70USD - ilimitado - 30 Dias">Plan $70USD - ilimitado - 30 Dias</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro9" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select name="nuevoplan3"  class="form-control m-b MostrarPrecios" id="planeCargadosCanada" onchange="cambiarDiasCanada()">
                             <option value="">Escoger el plan</option>
                            <option value="Plan $35USD - 1.5GB - 30 Dias">Plan $35USD - 1.5GB - 30 Dias</option>
                            <option value="Plan $45USD - 2.5GB - 30 Dias">Plan $45USD - 2.5GB - 30 Dias</option>
                            <option value="Plan $55USD - 5GB - 30 Dias">Plan $55USD - 5GB - 30 Dias</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x Día</option>
                        </select>
                    </div> 

                </div>


                 <div class="form-group" id="campo_otro7" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan4" class="form-control m-b MostrarPrecios">
                             <option value="">Escoger el plan</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 Dias</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 Dias</option>
                        </select>
                    </div> 

                </div>

                 <div class="form-group" id="campo_otro3" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <!-- <select  name="nuevoplan5" class="form-control m-b MostrarPrecios">
                             <option value="">Escoger el plan</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 Dias</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 Dias</option>
                        </select> -->
                    </div> 

                </div>

                <div class="form-group" id="campo_otro6" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan6"  class="form-control m-b MostrarPrecios">
                             <option value="">Escoger el plan</option>
                            <option value="Plan $15USD - 2GB - 30 Dias">Plan $15USD - 2GB - 30 Dias</option>
                            <option value="Plan $15USD - 3GB - 15 Dias">Plan $15USD - 3GB - 15 Dias</option>
                            <option value="Plan $8USD - 1GB - 7 Dias">Plan $8USD - 1GB - 7 Dias</option>
                            <option value="Plan $5USD - 500MB - 3 Dias">Plan $5USD - 500MB - 3 Dias</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro5" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan7"  class="form-control m-b MostrarPrecios">
                            <option value="">Escoger el plan</option>
                            <option value="Plan $70USD - Ilimitados - 30 Dias">Plan $70USD - Ilimitados - 30 Dias</option>
                            <option value="Plan $60USD - 15GB - 30 Dias">Plan $60USD - 15GB - 30 Dias</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 Dias</option>
                            <option value="Plan $40USD - 3GB - 30 Dias">Plan $40USD - 3GB - 30 Dias</option>
                        </select>
                    </div> 

                </div>

                <div class="form-group" id="campo_otro4" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan8" class="form-control m-b MostrarPrecios">
                            <option value="">Escoger el plan</option>
                            <option value="Plan $60USD - 9GB - 30 Dias">Plan $60USD - 9GB - 30 Dias</option>
                            <option value="Plan $45USD - 5GB - 30 Dias">Plan $45USD - 5GB - 30 Dias</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro2" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan9" class="form-control m-b MostrarPrecios">
                            <option value="">Escoger el plan</option>
                            <option value="Plan $30USD - Ilimitado - 5 Dias">Plan $30USD - Ilimitado - 5 Dias</option>
                            <option value="Plan $35USD - Ilimitado - 10 Dias">Plan $35USD - Ilimitado - 10 Dias</option>
                            <option value="Plan $40USD - Ilimitado - 15 Dias">Plan $40USD - Ilimitado - 15 Dias</option>
                            <option value="Plan $45USD - 3GB - 30 Dias">Plan $45USD - 3GB - 30 Dias</option>
                        </select>
                    </div> 

                </div>


                <div class="form-group" id="campo_otro1" style="display: none">
                        <label class="col-sm-3 control-label">Tipo de plan</label>
                        <div class="col-sm-9">
                        <select  name="nuevoplan10"  class="form-control m-b MostrarPrecios" id="planeCargadosUsa" onchange="cambiarDiasUsa()">
                            <option value="">Escoger el plan</option>
                            <option value="Plan $40USD - 1GB - 30 Dias">Plan $40USD - 1GB - 30 Dias</option>
                            <option value="Plan $50USD - 4GB - 30 Dias">Plan $50USD - 4GB - 30 Dias</option>
                            <option value="Plan $60USD - 10GB - 30 Dias">Plan $60USD - 10GB - 30 Dias</option>
                            <option value="Plan $70USD - Ilimitado - 30 Dias">Plan $70USD - Ilimitado - 30 Dias</option>
                            <option value="Plan $5USD x Dia">Plan $5USD x Dia</option>
                        </select>
                    </div> 

                </div>
                                
                         <?php     
                            }
                        ?>
                        
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#nuevoSimcardsDestinoComercial').val();
                                    recargarNumeroSimcardsComercial();
                                  
                                $('#nuevoSimcardsDestinoComercial').change(function(){
                                    recargarNumeroSimcardsComercial();
                                });
                            })
                        </script> 



                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#nuevoSimcardsDestinoComercialSolo').val();
                                    recargarNumeroSimcardsComercialSolo();
                                  
                                $('#nuevoSimcardsDestinoComercialSolo').change(function(){
                                    recargarNumeroSimcardsComercialSolo();
                                });
                            })
                        </script> 

                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#nuevoCliente').attr("usuario");
                                    recargarDestinoSimcard();
                                  
                                $('#nuevoCliente').change(function(){
                                    recargarDestinoSimcard();
                                });
                            })
                        </script> 


                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#nuevoSimcardsDestino').val();
                                    recargarNumeroSimcards();
                                  
                                $('#nuevoSimcardsDestino').change(function(){
                                    recargarNumeroSimcards();
                                });
                            })
                        </script> 
                        
                        
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#nuevoSimcardsDestino2').val();
                                    recargarNumeroSimcardsCoordinador();
                                  
                                $('#nuevoSimcardsDestino2').change(function(){
                                    recargarNumeroSimcardsCoordinador();
                                });
                            })
                        </script>
                        
                        
                        
                        <script>
                            function cambiarDiasMexico() {
                                if (document.getElementById('planeCargadosMexico').value === "Plan $5USD x Dia") {
                                    document.getElementById('comboDias').style.display = 'block';
                                }else{
                                    document.getElementById('comboDias').style.display = 'none';
                                }
                            return true;
                            }
                             function cambiarDiasCanada() {
                                if (document.getElementById('planeCargadosCanada').value === "Plan $5USD x Dia") {
                                    document.getElementById('comboDias').style.display = 'block';
                                }else{
                                    document.getElementById('comboDias').style.display = 'none';
                                }
                            return true;
                            }
                             function cambiarDiasUsa() {
                                if (document.getElementById('planeCargadosUsa').value === "Plan $5USD x Dia") {
                                    document.getElementById('comboDias').style.display = 'block';
                                }else{
                                    document.getElementById('comboDias').style.display = 'none';
                                }
                            return true;
                            }
                        </script>
                        
                        <script>
                            function cambiarDias2() {
                                if (document.getElementById('planeCargados2').value === "Plan $5USD x Dia") {
                                    document.getElementById('comboDias').style.display = 'block';
                                }else{
                                    document.getElementById('comboDias').style.display = 'none';
                                }
                            return true;
                            }
                        </script>

                        <script type="text/javascript">
                            
                              $(document).ready(function(){
                                $('#nuevoSimcards').val();
                                  recargarPlan();
                            
                                $('#nuevoSimcards').change(function(){
                                  recargarPlan();
                                });
                              })
                      </script>
                      
                       <script type="text/javascript">
                            
                              $(document).ready(function(){
                                $('#nuevoSimcardsNuevo').val();
                                  recargarPlanUsuariosAgencia();
                            
                                $('#nuevoSimcardsNuevo').change(function(){
                                  recargarPlanUsuariosAgencia();
                                });
                              })
                              
                              </script>
                              
                              <script type="text/javascript">
                            
                              $(document).ready(function(){
                                $('#nuevoSimcards2').val();
                                  recargarPlan2();
                            
                                $('#nuevoSimcards2').change(function(){
                                  recargarPlan2();
                                });
                              })
                      </script>

                      <div class="form-group" style="display: none;" id="comboDias">
                            <label class="col-sm-3 control-label">Dias</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="nuevoDias" id="nuevoDias">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha de llegada</label>
                            <div class="col-sm-9"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="nuevoFechaLlegada" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha de regreso</label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="nuevoFechaRegreso" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha de venta</label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" name="nuevoFechaVenta" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Imei(Opcional)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nuevoImei">
                                </div>
                        </div>

                        


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Observacion</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="nuevoObservacion"></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Valor del plan(USD)</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="valor" name="nuevoValor" readonly required>
                                </div>
                        </div>

                        <?php
                            date_default_timezone_set('America/Bogota');
                        ?>

                        <input type="hidden" class="form-control" name="nuevoCierreHora" value="<?php echo date('G:i') ?>">

                        <input type="hidden" class="form-control" name="nuevoAgrego" value="<?php echo $_SESSION["usuario"] ?>"> 
                        <button type="submit" class="btn btn-success">Guardar</button>
                        
                         <input type="hidden" class="form-control" name="nuevoAgregovalorNuevo" value="1">

                         <input type="hidden" class="form-control" name="nuevoEstado" value="desactivado">
                    

                    <?php

                        $crearVentas = new ControladorVentas();
                        $crearVentas -> ctrCrearVentas();

                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
    
   <!-- <div class="col-lg-6">
        <?php
            
           // if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Agencias" || $_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Comercial") {
                
          
        
        ?>
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
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>

                <?php
                
                //  if ($_SESSION["perfil"] == "Administrador") {

//                     $item = null;
//                     $valor = null; 
//                     $select = null;
//                     $valor1 = null;
//                     $perfil1 = null;
       
//                     $simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor, $select,$valor1,$perfil1);

//                     }else if($_SESSION["perfil"] == "Agencias"){

//                     $item = null; 
//                     $valor = $_SESSION["id"];;
//                     $select = "usuario";
//                     $valor1 = $_SESSION["usuario"];
//                     $select1 = "agrego";

       
//                      $simscard = ControladorSimscard::ctrMostrarSimscardAgencias($item, $valor, $select,$valor1,$select1);

//                     }else if ($_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Coordinador") {
//                       $item = null;
//                       $valor = null;
//                       $select = null;
//                       $valor1 = $_SESSION["id"];
//                       $perfil1 = "usuario";

       
//                      $simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor, $select,$valor1,$perfil1);
//                     }else if ($_SESSION["perfil"] == "Comercial") {

//                       $item = null;
//                       $valor = null;
//                       $select = null;
//                       $valor1 = $_SESSION["idpadre"];
//                       $perfil1 = "usuario";

       
//                      $simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor, $select,$valor1,$perfil1);
//                     }


//                     foreach ($simscard as $key => $value) {

//                         $item = "id";
//                         $valor = $value["usuario"];
//                         $perfil = null;
//                         $valor1 = null;
//                         $perfil1 = null;

//                         $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

//                          echo '<tr>
//                             <td>'.($key+1).'</td>
//                             <td>'.$usuarios["usuario2"].'</td>
//                             <td>'.$value["simcard"].'</td>
//                             <td>'.$value["destino"].'</td>';
//                              if ($value["valor"] != 0) {
//                                        echo '<td><span class="label label-primary">Vendida</span></td>'; 
//                                    } else{
//                                         echo '<td><span class="label label-danger">Habilitada</span></td>';
//                                 }
//                             echo'
//                         </tr>';

//                     }

                   
                    ?>


            </tbody>
            </table>
                
            </div>
        </div>
    </div>-->
</div>
</div>

<?php
  //}
?>
<!-- <div id="resultados">
</div> -->
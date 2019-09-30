<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse"> 
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="vistas/img/profile_small.jpg" />
                             </span>
                         <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION["nombre"]; ?></strong>
                             </span> <span class="text-muted text-xs block">
                                 
                                  <?php  
                                    if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Agencias" || $_SESSION["perfil"] == "Freelance" || $_SESSION["perfil"] == "Coordinador") {
                                        echo $_SESSION["perfil"];
                                    }else if ($_SESSION["perfil"] == "Comercial") {
                                        echo 'Asesor';
                                    }
                                ?>
                                 
                                 
                                 <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="salir">Salir</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        App
                    </div>
                </li>
        
                <li>
                    <a href="inicio"><i class="fa fa-dashboard"></i> <span class="nav-label">Escritorio</span></a>
                </li>

              
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Ventas</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="crear-venta">Nueva Venta</a></li>
                        <li><a href="ventas">Ver Ventas</a></li>
                    </ul>
                </li>

                <li>
                    <a href="cronograma"><i class="fa fa-th-large"></i> <span class="nav-label">Cronograma</span></a>
                </li>

                 <?php

                        if($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Agencias" || $_SESSION["perfil"] =="Coordinador"){

                    echo 
                        '<li>
                            <a href="#"><i class="fa fa-area-chart"></i> <span class="nav-label">Reportes</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="reportes-ventas">Ventas</a></li>
                                <!--<li><a href="reportes-inventario">Inventarios</a></li>-->
                            </ul>
                        </li>';
 
                        }

                    ?>

                    <?php

                        if($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Agencias" || $_SESSION["perfil"] =="Coordinador"){

                            echo 
                                '<li>
                                    <a href="usuarios"><i class="fa fa-user-o"></i> <span class="nav-label">Usuarios</span></a>
                                </li>';
 
                        }

                    ?>


            

               <!--  <li>
                    <a href="clientes"><i class="fa fa-slideshare"></i> <span class="nav-label">Clientes</span></a>
                </li> -->
                
                <?php

                        if($_SESSION["perfil"] =="Administrador" || $_SESSION["perfil"] =="Agencias" || $_SESSION["perfil"] =="Coordinador"){

                            echo 
                                ' <li>
                                        <a href="simscard"><i class="fa fa-id-card"></i> <span class="nav-label">Inventario</span></a>
                                  </li>';
 
                        }

                    ?>
                
            </ul>

        </div>
     </nav>
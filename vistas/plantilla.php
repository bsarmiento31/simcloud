<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>SimCloud</title>

    <link href="vistas/css/bootstrap.min.css" rel="stylesheet">
    <link href="vistas/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Data Table -->
    <!-- <link href="vistas/css/plugins/dataTables/datatables.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="vistas/css/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/css/plugins/datatables.net-bs/css/responsive.bootstrap.min.css">
    <!-- Boostraps checkbox -->
    <link href="vistas/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="vistas/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Animacion -->
    <link href="vistas/css/animate.css" rel="stylesheet">
    <!-- Estilo de la pagina -->
    <link href="vistas/css/style.css" rel="stylesheet">
    <!-- Select -->
    <link href="vistas/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <!-- Calendario -->
    <link href="vistas/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- Date Range-->
<!--     <link href="vistas/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
 -->  
    <script src="vistas/js/jquery-3.1.1.min.js"></script>
    <script src="vistas/js/bootstrap.min.js"></script>
    <!-- scrol del submenu del menu-->
    <script src="vistas/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="vistas/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!--DataTable-->
    <script src="vistas/js/plugins/dataTables/datatables.min.js"></script>
    <script src="vistas/css/plugins/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <!-- Esto fue lo que tique -->
<!--     <script src="vistas/css/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/css/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
    <script src="vistas/css/plugins/datatables.net-bs/js/responsive.bootstrap.min.js"></script> -->
    <!-- Custom and plugin javascript -->
    <script src="vistas/js/inspinia.js"></script>
    <script src="vistas/js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="vistas/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Toast -->
    <script src="vistas/js/plugins/toastr/toastr.min.js"></script>
   <!-- Sparkline -->
    <script src="vistas/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sweet alert -->
    <script src="vistas/js/plugins/sweetalert2/sweetalert2.all.js"></script>
     <!-- Select2 -->
    <script src="vistas/js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Data picker -->
    <script src="vistas/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Morris Chart -->
    <link href="vistas/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- ChartJS-->
    <!-- <script src="vistas/js/plugins/chartJs/Chart.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

      <!-- Morris -->
    <script src="vistas/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="vistas/js/plugins/morris/morris.js"></script>
    <!-- Calendario -->
   <!--  <script src="vistas/js/plugins/calendario/daterangepicker.min.js"></script>
    <script src="vistas/js/plugins/calendario/moment.min.js"></script>
    <link href="vistas/js/plugins/calendario/daterangepicker.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>


    <?php

    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){ 

?>
<div id="wrapper">

    <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="perfilOculto">

            
        <?php

            include "modulos/menu.php";

        ?>

        <div id="page-wrapper" class="gray-bg">

            <?php

                include "modulos/cabezote.php";

            ?>
        
        <div class="wrapper wrapper-content">
        
        
            
             <?php

                include "modulos/footer.php";

                if(isset($_GET["ruta"])){

                if($_GET["ruta"] == "inicio" ||
                   $_GET["ruta"] == "usuarios" ||
                   $_GET["ruta"] == "simscard" ||
                   $_GET["ruta"] == "perfil" ||
                   $_GET["ruta"] == "vistacontactos" ||
                   $_GET["ruta"] == "clientes" ||
                   $_GET["ruta"] == "cronograma" ||
                   $_GET["ruta"] == "ventas" ||
                   $_GET["ruta"] == "crear-venta" ||
                   $_GET["ruta"] == "editar-ventas" ||
                   $_GET["ruta"] == "reportes-ventas" ||
                   $_GET["ruta"] == "reportes-inventario" ||
                   $_GET["ruta"] == "asignarsimcard" ||
                   $_GET["ruta"] == "salir"){

                    include "modulos/".$_GET["ruta"].".php";

                }
                else
                {

                    include "modulos/404.php";

                }

                }
                else
                {
                    include "modulos/inicio.php";
                }

                

            ?>

            </div>

        </div>
        
    </div>


<?php
    }
    else
    {
       include "modulos/login.php"; 
    }

    ?>

     <!-- Script -->
   <!-- Mainly scripts -->


    <script src="vistas/js/primaria/plantilla.js"></script>
    <script src="vistas/js/primaria/usuarios.js"></script>
    <script src="vistas/js/primaria/clientes.js"></script>
    <script src="vistas/js/primaria/cronograma.js"></script>
    <script src="vistas/js/primaria/sincards.js"></script>
    <script src="vistas/js/primaria/ventas.js"></script>
    <script src="vistas/js/primaria/graficas.js"></script>

</body>
</html>

<?php

require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";

require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

require_once "../../controladores/simscard.controlador.php";
require_once "../../modelos/simscard.modelo.php";

$reporte = new ControladorVentas();
$reporte -> ctrDescargarReporte();  

$reporteSimcard = new ControladorSimscard();
$reporteSimcard -> ctrDescargarReporteSimcard(); 
<?php

// $item = null;
// $valor = null;
// $perfil = null;
// $valor1 = null;
// $perfil1 = null;

if($_SESSION["perfil"] == "Administrador"){

  $item = null;
  $valor = null;
  $perfil = null;
  $item1 = null;
  $valor3 = null;
  $valor1 = null;
  $perfil1 = null;

  $ventasHoy = ControladorVentas::ctrSumaTotalVentasHoy($item,$valor);
  $ventasMes = ControladorVentas::ctrSumaTotalVentasMes($item,$valor);
  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);
  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);
  $totalUsuarios = count($usuarios);
  $totalVentas = count($ventas);

}else if($_SESSION["perfil"] == "Agencias") {

  $item = "agregopadre";
  $valor = $_SESSION["usuario"];
  $itemcontar = null;
  $valorcontar = null;
  $item1 = "agregopadre";;
  $valor3 = $_SESSION["usuario"];

  $ventasHoy = ControladorVentas::ctrSumaTotalVentasHoy($item,$valor);
  $ventasMes = ControladorVentas::ctrSumaTotalVentasMes($item,$valor);
  $ventas = ControladorVentas::ctrMostrarVentas($itemcontar, $valorcontar,$item1,$valor3);
  $totalVentas = count($ventas);


}else if ($_SESSION["perfil"] == "Comercial" || $_SESSION["perfil"] == "Freelance") {

    $item = "vendedor";
    $valor = $_SESSION["id"];
    $itemcontar = null;
    $valorcontar = null;
    $item1 = "vendedor";
    $valor3 = $_SESSION["id"];

  $ventasHoy = ControladorVentas::ctrSumaTotalVentasHoy($item,$valor);
  $ventasMes = ControladorVentas::ctrSumaTotalVentasMes($item,$valor);
  $ventas = ControladorVentas::ctrMostrarVentas($itemcontar, $valorcontar,$item1,$valor3);
  $totalVentas = count($ventas);
}else if ($_SESSION["perfil"] == "Coordinador") {

    $item = "coordinador";
    $valor = 1;
    $itemcontar = null;
    $valorcontar = null;
    $item1 = "coordinador";
    $valor3 = 1;
    

  $ventasHoy = ControladorVentas::ctrSumaTotalVentasHoy($item,$valor);
  $ventasMes = ControladorVentas::ctrSumaTotalVentasMes($item,$valor);
  $ventas = ControladorVentas::ctrMostrarVentas($itemcontar, $valorcontar,$item1,$valor3);
  $totalVentas = count($ventas);
}  



?>

<?php

if($_SESSION["perfil"] == "Administrador"){

    echo '<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <span class="label label-primary pull-right">Hoy</span>
            <h5>Ventas Realizadas</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">$'; echo number_format($ventasHoy["total"],2); echo' </h1>
            <small>Ventas de hoy</small>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <span class="label label-info pull-right">Mes</span>
            <h5>Ventas Realizadas</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">$'; echo number_format($ventasMes["total"],2); echo '</h1> 
            <small>Ventas del mes</small>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <a href="ventas"><span class="label label-info pull-right">Ver todos</span></a>
            <h5>Ventas</h5>
        </div>
        <div class="ibox-content">
             <h1 class="no-margins">'; echo $totalVentas; echo '</h1>
            <small>Numero de ventas</small>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <a href="usuarios"><span class="label label-danger pull-right">Ver todos</span></a>
            <h5>Usuarios</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">'; echo $totalUsuarios; echo '</h1>
            <small>Cantidad de usuarios</small>
        </div>
        
    </div>
</div>';
}else{
     echo '<div class="col-lg-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <span class="label label-primary pull-right">Hoy</span>
            <h5>Ventas Realizadas</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">$'; echo number_format($ventasHoy["total"],2); echo' </h1>
            <small>Ventas de hoy</small>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <span class="label label-info pull-right">Mes</span>
            <h5>Ventas Realizadas</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">$'; echo number_format($ventasMes["total"],2); echo '</h1> 
            <small>Ventas del mes</small>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <a href="ventas"><span class="label label-info pull-right">Ver todos</span></a>
            <h5>Ventas</h5>
        </div>
        <div class="ibox-content">
             <h1 class="no-margins">'; echo $totalVentas; echo '</h1>
            <small>Numero de ventas</small>
        </div>
    </div>
</div>';
}

?>

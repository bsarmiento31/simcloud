<?php
error_reporting(0);

if ($_SESSION["perfil"] == "Administrador") {
 
     if(isset($_GET["fechaInicial"])){
        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];  
        $perfil = null;
        $valor = null; 
        $perfil1 = null;
        $valor1 = null;
    }else if(isset($_GET["idcliente"])){ 

        $fechaInicial = null;
        $fechaFinal = null;  
        $perfil = "id";
        $valor = $_GET["idcliente"];
        $perfil1 = null;
        $valor1 = null;


    }else{
        $fechaInicial = null;
        $fechaFinal = null;
        $perfil = null;
        $valor = null;
        $perfil1 = null;
        $valor1 = null;
    }

        $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);
        $arrayFechas = array();
        $arrayVentas = array();
        $sumaPagosMes = array();

        foreach ($respuesta as $key => $value) { 

            $fecha = $value["fechaventa"];
            array_push($arrayFechas, $fecha);

            $arrayVentas = array($fecha => $value["valor"]);

            foreach ($arrayVentas as $key => $value) {

                $sumaPagosMes[$key] += $value;
            }

            }
            $noRepetirFechas = array_unique($arrayFechas);
            //Vendedores que mas vendieron
            $item = null;
            $perfil = null;
            $valor = null;
            $valor1 = null;
            $perfil1 = null;
            $item1 = null;
            $valor3 = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor,$perfil,$valor1,$perfil1);
            $ventas = ControladorVentas::ctrMostrarVentas($item,$valor,$item1,$valor3);

            $arrayVendedores = array();
            $arraylistaVendedores = array();
                foreach ($ventas as $key => $valueVentas) {
                    foreach ($usuarios as $key => $valueUsuarios) {

                            if($valueUsuarios["id"] == $valueVentas["vendedor"]){
                            #Capturamos los vendedores en un array
                            array_push($arrayVendedores, $valueUsuarios["nombre"]);
                            #Capturamos las nombres y los valores netos en un mismo array
                            $arraylistaVendedores = array($valueUsuarios["nombre"] => $valueVentas["valor"]);
                            #Sumamos los netos de cada vendedor
                            foreach ($arraylistaVendedores as $key => $value) {
                            $sumaTotalVendedores[$key] += $value;
                    }
                }
        }
}
            #Evitamos repetir nombre
            $noRepetirNombres = array_unique($arrayVendedores);

            //Clientes que mas compraron
            $item1 = null;
            $perfil1 = null;
            $perfil = null;
            $item4 = null;
            $valor3 = null;

            // $usuarios1 = ControladorClientes::ctrMostrarClientes($item1,$valor1,$perfil);
            $ventas1 = ControladorVentas::ctrMostrarVentas($item1,$valor1,$item4,$valor3);

            $arrayVendedores1 = array();
            $arraylistaVendedores1 = array();
                foreach ($ventas1 as $key => $valueVentas) {
                
                            array_push($arrayVendedores1, $valueVentas["cliente"]);
                            #Capturamos las nombres y los valores netos en un mismo array
                            $arraylistaVendedores1 = array($valueVentas["cliente"] => $valueVentas["valor"]);
                            #Sumamos los netos de cada vendedor
                            foreach ($arraylistaVendedores1 as $key => $value) {
                            $sumaTotalVendedores1[$key] += $value;
                    }
                
        
}
            #Evitamos repetir nombre
            $noRepetirNombres1 = array_unique($arrayVendedores1);

}else if ($_SESSION["perfil"] == "Agencias") {

    if(isset($_GET["fechaInicial"])){
        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];  
        $perfil = null;
        $valor = null; 
        $perfil1 = "agregopadre";
        $valor1 = $_SESSION["usuario"];
    }else if(isset($_GET["idcliente"])){ 

        $fechaInicial = null;
        $fechaFinal = null;  
        $perfil = "id";
        $valor = $_GET["idcliente"];
        $perfil1 = null;
        $valor1 = null;


    }else{
        $fechaInicial = null;
        $fechaFinal = null;
        $perfil = null;
        $valor = null;
        $perfil1 = "agregopadre";
        $valor1 = $_SESSION["usuario"];
    }

    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);
    $arrayFechas = array();
        $arrayVentas = array();
        $sumaPagosMes = array();

        foreach ($respuesta as $key => $value) { 

            $fecha = $value["fechaventa"];
            array_push($arrayFechas, $fecha);

            $arrayVentas = array($fecha => $value["valor"]);

            foreach ($arrayVentas as $key => $value) {

                $sumaPagosMes[$key] += $value;
            }

            }
            $noRepetirFechas = array_unique($arrayFechas);
            //Usuarios que mas vendieron
            $item = null;
            $perfil25 = null;
            $perfil = "id";
            $valor = $_SESSION["id"];
            $valor1 = $_SESSION["usuario"];
            $perfil1 = "comercial";
            $item1 = "agregopadre";
            $valor3 = $_SESSION["usuario"];

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor,$perfil,$valor1,$perfil1);
            $ventas = ControladorVentas::ctrMostrarVentas($item,$perfil25,$item1,$valor3);

            $arrayVendedores = array();
            $arraylistaVendedores = array();
                foreach ($ventas as $key => $valueVentas) {
                    foreach ($usuarios as $key => $valueUsuarios) {

                            if($valueUsuarios["id"] == $valueVentas["vendedor"]){
                            #Capturamos los vendedores en un array
                            array_push($arrayVendedores, $valueUsuarios["nombre"]);
                            #Capturamos las nombres y los valores netos en un mismo array
                            $arraylistaVendedores = array($valueUsuarios["nombre"] => $valueVentas["valor"]);
                            #Sumamos los netos de cada vendedor
                            foreach ($arraylistaVendedores as $key => $value) {
                            $sumaTotalVendedores[$key] += $value;
                    }
                }
        }
}
            #Evitamos repetir nombre
            $noRepetirNombres = array_unique($arrayVendedores);

            //Clientes que mas compraron
            $item = null;
            $perfil15 = null;
            $perfil = null; 
            $item16 = "agregopadre";
            $valor30 = $_SESSION["usuario"];

            // $usuarios1 = ControladorClientes::ctrMostrarClientes($item1,$valor1,$perfil);
            $ventas1 = ControladorVentas::ctrMostrarVentas($item,$perfil15,$item16,$valor30);

            $arrayVendedores1 = array();
            $arraylistaVendedores1 = array();
                foreach ($ventas1 as $key => $valueVentas) {
                
                            array_push($arrayVendedores1, $valueVentas["cliente"]);
                            #Capturamos las nombres y los valores netos en un mismo array
                            $arraylistaVendedores1 = array($valueVentas["cliente"] => $valueVentas["valor"]);
                            #Sumamos los netos de cada vendedor
                            foreach ($arraylistaVendedores1 as $key => $value) {
                            $sumaTotalVendedores1[$key] += $value;
                    }
                
        
}
            #Evitamos repetir nombre
            $noRepetirNombres1 = array_unique($arrayVendedores1);

            ///CANTIDAD DE PLANES

            $perfil = "agregopadre";
            $valor1 = $_SESSION["usuario"];

            $contarTipoPlan = ControladorVentas::ctrContarDestino($perfil, $valor1);

 


}else if ($_SESSION["perfil"] == "Coordinador") {

    if(isset($_GET["fechaInicial"])){
        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];  
        $perfil = null;
        $valor = null; 
        $perfil1 = "coordinador";
        $valor1 = 1;
    }else if(isset($_GET["idcliente"])){ 

        $fechaInicial = null;
        $fechaFinal = null;  
        $perfil = "id";
        $valor = $_GET["idcliente"];
        $perfil1 = null;
        $valor1 = null;


    }else{
        $fechaInicial = null;
        $fechaFinal = null;
        $perfil = null;
        $valor = null;
        $perfil1 = "coordinador";
        $valor1 = 1;
    }

    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

    $arrayFechas = array();
        $arrayVentas = array();
        $sumaPagosMes = array();

        foreach ($respuesta as $key => $value) { 

            $fecha = $value["fechaventa"];
            array_push($arrayFechas, $fecha);

            $arrayVentas = array($fecha => $value["valor"]);

            foreach ($arrayVentas as $key => $value) {

                $sumaPagosMes[$key] += $value;
            }

            }
            $noRepetirFechas = array_unique($arrayFechas);
            //Usuarios que mas vendieron
            $item = null;
            $perfil25 = null;
            $perfil = "id";
            $valor = $_SESSION["id"];
            $valor1 = 1;
            $perfil1 = "coordinador";
            $item1 = "coordinador";
            $valor3 = 1;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor,$perfil,$valor1,$perfil1);
            $ventas = ControladorVentas::ctrMostrarVentas($item,$perfil25,$item1,$valor3);

            $arrayVendedores = array();
            $arraylistaVendedores = array();
                foreach ($ventas as $key => $valueVentas) {
                    foreach ($usuarios as $key => $valueUsuarios) {

                            if($valueUsuarios["id"] == $valueVentas["vendedor"]){
                            #Capturamos los vendedores en un array
                            array_push($arrayVendedores, $valueUsuarios["nombre"]);
                            #Capturamos las nombres y los valores netos en un mismo array
                            $arraylistaVendedores = array($valueUsuarios["nombre"] => $valueVentas["valor"]);
                            #Sumamos los netos de cada vendedor
                            foreach ($arraylistaVendedores as $key => $value) {
                            $sumaTotalVendedores[$key] += $value;
                    }
                }
        }
}
            #Evitamos repetir nombre
            $noRepetirNombres = array_unique($arrayVendedores);

            //Clientes que mas compraron
            $item = null;
            $perfil15 = null;
            $perfil = null; 
            $item16 = "coordinador";
            $valor30 = 1;

            // $usuarios1 = ControladorClientes::ctrMostrarClientes($item1,$valor1,$perfil);
            $ventas1 = ControladorVentas::ctrMostrarVentas($item,$perfil15,$item16,$valor30);

            $arrayVendedores1 = array();
            $arraylistaVendedores1 = array();
                foreach ($ventas1 as $key => $valueVentas) {
                
                            array_push($arrayVendedores1, $valueVentas["cliente"]);
                            #Capturamos las nombres y los valores netos en un mismo array
                            $arraylistaVendedores1 = array($valueVentas["cliente"] => $valueVentas["valor"]);
                            #Sumamos los netos de cada vendedor
                            foreach ($arraylistaVendedores1 as $key => $value) {
                            $sumaTotalVendedores1[$key] += $value;
                    }
                
        
}
            #Evitamos repetir nombre
            $noRepetirNombres1 = array_unique($arrayVendedores1);

            ///CANTIDAD DE PLANES

            $perfil = "coordinador";
            $valor1 = 1;

            $contarTipoPlan = ControladorVentas::ctrContarDestino($perfil, $valor1);
}
    
?>
<div class="row">
    <div class="col-lg-10">
        <button id="reportrange1" type="button" style="background: #fff; cursor: pointer; padding: 6px 10px; border: 2px solid #ccc; width:20%;border-radius: 5px;">
                <i class="fa fa-calendar"></i>&nbsp;
                <span>
                        
                </span> <i class="fa fa-caret-down"></i>
    </button>
</div>
<div class="col-lg-2">
    <select style="width: 10%;"  class="form-control m-b chosen-select" id="clientesValor" data-placeholder="Escoge el usuario"  tabindex="2">
    <?php
    if ($_SESSION["perfil"] == "Administrador") {

        $item = null;
        $valor = null;
        $item1 = null;
        $valor3 = null;

        $clientes = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);

    }else if ($_SESSION["perfil"] == "Agencias") {
        $item = null;
        $valor = null;
        $item1 = "agregopadre";
        $valor3 = $_SESSION["usuario"];

        $clientes = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);
    }
    
        echo '<option value="">Escoje el usuario</option>';
            foreach ($clientes as $key => $value) {
                $item = "id";
                $valor = $value["vendedor"];
                $perfil = null;
                $valor1 = null;
                $perfil1 = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

         echo '<option value="'.$value["id"].'">'.$usuarios["usuario2"].'</option>';
     }

    ?>
     
     </select> 
    </div>
    
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ventas Realizadas </h5>
                <div class="ibox-tools">          
                    <a href="reportes-ventas"><button type="button" class="btn btn-warning cancelarFecha2"><i class="fa fa-window-close"></i>&nbsp;Cancelar</button></a>
                </div> 
            </div>
            <div class="ibox-content">
                <div id="morris-one-line-chart"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(function() {

Morris.Line({
element: 'morris-one-line-chart',

data: [
<?php
if($noRepetirFechas != null){
foreach($noRepetirFechas as $key){
echo "{ year: '".$key."', ventas: ".$sumaPagosMes[$key]." },";
}
echo "{ year: '".$key."', ventas: ".$sumaPagosMes[$key]." },";
}else{
echo "{ year: '0', ventas: 0 },";
}
?>
],
xkey: 'year',
ykeys: ['ventas'],
resize: true,
lineWidth:4,
labels: ['ventas'],
lineColors: ['#af174f'],
lineWidth : 2,
pointSize:5
});

Morris.Bar({
element: 'morris-bar-chart',
data: [
<?php

foreach($noRepetirNombres as $value){
echo "{y: '".$value."', a: '".$sumaTotalVendedores[$value]."'},";

}
?>
],
xkey: 'y',
ykeys: ['a'],
labels: ['Ventas'],
hideHover: 'auto',
resize: true,
preUnits: '$',
barColors: ['#af174f'],
});


Morris.Bar({
element: 'barchar',
data: [
<?php

foreach($noRepetirNombres1 as $value){
echo "{y: '".$value."', a: '".$sumaTotalVendedores1[$value]."'},";

}
?>
],
xkey: 'y',
ykeys: ['a'],
labels: ['Ventas'],
hideHover: 'auto',
resize: true,
preUnits: '$',
barColors: ['#af174f'],
});

Morris.Donut({
        element: 'morris-donut-chart',
        data: [
        <?php
        // $lenght = count($contarTipoPlan);
        foreach($contarTipoPlan as $value){
            echo "{label: '".$value["destino"]."', value: '".$value["cantidad"]."' },";
        }
        ?> 
        ],
        resize: true,
        colors: ['#af174f', '#c13c6d','#d35d88'],
    });

   


});








</script>
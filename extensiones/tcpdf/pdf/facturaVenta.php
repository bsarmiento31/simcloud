<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

error_reporting(0);



class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;
$item1 = null;
$valor3 = null;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta,$item1,$valor3);

$fechaVenta = $respuestaVenta["fechaventa"];
$fechaLlegada = $respuestaVenta["fechallegada"];
$fechaRegreso = $respuestaVenta["fecharegreso"];
$imei = $respuestaVenta["imei"];
$codigo = $respuestaVenta["codigo"];
$simcard = $respuestaVenta["simcard"];
$valor = $respuestaVenta["valor"];
$tipoplan = $respuestaVenta["tipoplan"];


//TRAEMOS EL CELULAR DEL CLIENTE

$itemClienteCelular = "id";
$valorClienteCelular = $respuestaVenta["cliente"];
$perfil = null;

$respuestaClienteCelular = ControladorClientes::ctrMostrarClientes($itemClienteCelular, $valorClienteCelular,$perfil);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["vendedor"];
$perfilVendedor = null;
$valor1 = null;
$perfil1 = null;

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor,$perfilVendedor,$valor1,$perfil1);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemClienteNombre = "id";
$valorClienteNombre = $respuestaVenta["cliente"];
$perfilCliente = null;
$valor2 = null;
$perfil2 = null;

$respuestaClienteNombre = ControladorUsuarios::ctrMostrarUsuarios($itemClienteNombre, $valorClienteNombre,$perfilCliente,$valor2,$perfil2);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: 71.759.963-9

					<br>
					Dirección: Calle 85 #59b-12

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 301 390 0015
					
					<br>
					ventas@motecnology.com

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>CODIGO N.<br>$valorVenta </td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $respuestaVenta[cliente]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha Venta: $fechaVenta

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $respuestaVendedor[nombre]</td>

		</tr>

		<tr>
		
		<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">Fecha de llegada</td>
		<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">Fecha de regreso</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">IMEI</td>
		<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center">Celular</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


$bloque4 = <<<EOF


<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">$fechaLlegada</td>
		<td style="border: 1px solid #666; background-color:white; width:140px; text-align:center">$fechaRegreso</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">$imei</td>
		<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center">$respuestaVenta[celular]</td>

		</tr>

			<tr>
		
		<td style="width:540px"><img src="images/back.jpg"></td>

	</tr>

	</table>




	
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');



// ---------------------------------------------------------


// ---------------------------------------------------------

$bloque5 = <<<EOF



	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:240px; text-align:center">Tipo de plan</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center"># de simcard</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">Valor</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

// ---------------------------------------------------------

$bloque6 = <<<EOF



	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:240px; text-align:center">$tipoplan</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">$simcard</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">$valor</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');


$pdf-> setPrintHeader (falso);
// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 
ob_end_clean();

$pdf->Output('factura.pdf');

}

}

$facturaVenta = new imprimirFactura();
$facturaVenta -> codigo = $_GET["codigo"];
$facturaVenta -> traerImpresionFactura();

?>
<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
include('../app/config.php');
include('../layaout/sesion.php');
require_once('../lib/TCPDF-main/examples/tcpdf_include.php');

$id_venta_get = $_GET['id'];
$nro_venta  = $_GET['nro_venta'];



//suelto consultas SQL
$sql_venta = "SELECT *, cliente.nombre_cliente AS cliente 
FROM tb_ventas AS ventas INNER JOIN tb_clientes AS cliente ON ventas.id_cliente = cliente.id_cliente
WHERE id_venta = '$id_venta_get'";



$query_venta = $pdo->prepare($sql_venta);
$query_venta->execute();
$venta_datos = $query_venta->fetchAll(PDO::FETCH_ASSOC);

foreach($venta_datos as $venta){
	$nro_vent = $venta['nro_venta'];
	$folio = $venta['folio'];
	$cliente = $venta['cliente'];
	$fecha = $venta['fyh_creacion'];
	$total = $venta['total_pagado'];
	$cambio = $venta['cambio'];
}



   

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
		//$nro_venta_header = $nro_vent;
        // Logo DE LA EMPRESA
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 15);
        // Title
        $this->Cell(0, 15, sprintf('FACTURA'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(80,290), PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nombre de la empresa**');
$pdf->SetTitle(sprintf('Factura %s %s','número de venta',$nro_venta));
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('e');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 10);

// add a page
$pdf->AddPage();




$activo = 'activo';
$sql_carrito = "SELECT *, producto.nombre AS nombre_producto, producto.precio_venta AS precio, producto.stock AS stock, producto.id_producto AS id_producto, producto.stock_minimo AS inventario_minimo, 
carrito.status_event_carrito AS estado
FROM tb_carrito AS carrito 
INNER JOIN tb_almacen AS producto 
ON carrito.id_producto = producto.id_producto WHERE nro_venta = '$nro_venta' AND status_event_carrito = '$activo'

ORDER BY id_carrito ASC ";
$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->execute();
$carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
// set some text to print

$html = <<<EOD
NOMBRE DE LA EMPRESA**

Dirección ***

Cajero: $nombre_sesion
Razón social: $cliente
Folio: $folio
Fecha: $fecha
Resumen de la venta:

EOD;
$pdf->Write(0, $html);
foreach($carrito_datos as $producto){ 
	
	$productos = $producto['nombre_producto'];

	$precio = $producto['precio_venta'];
	$cantidad = $producto['cantidad'];
	$subtotal = $cantidad * $precio;
$detalles = <<<EOD

**$productos $$precio c/u$cantidad = $subtotal
EOD;

// print a block of text using Write()
$pdf->Write(0, $detalles, $productos,  0, 'Caa', true, 0, false, false, 0);
}
$html_dos = <<<EOD

CAMBIO: $ $cambio
TOTAL PAGADO: $ $total

EOD;
$pdf->Write(0, $html_dos );
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(sprintf('factura_cliente_%s_fecha_%s',$cliente,$fechaHora, 'I'));


//============================================================+
// END OF FILE
//============================================================+

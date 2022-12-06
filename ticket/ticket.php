 <?php   
    require_once realpath(dirname(__FILE__) . '/../Dependencias/fpdf.php');

    $pdf = new FPDF($orientation='P',$unit='mm', array(45,350));
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
    $textypos = 5;
    $pdf->setY(2);
    $pdf->setX(2);
    $pdf->Cell(5,$textypos,"Carnitas Viva Mexico");
    $pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
    $textypos+=6;
    $pdf->setX(2);
    $pdf->Cell(5,$textypos,'__________________________________________');
    $textypos+=6;
    $pdf->setX(2);
    $pdf->Cell(5,$textypos,'CANT(Kg).            ARTICULO                   TOTAL');

    require realpath(dirname(__FILE__) . '/../interfazDB/ventas/read.php');
    require realpath(dirname(__FILE__) . '/../interfazDB/productos/read.php');
    require realpath(dirname(__FILE__) . '/../interfazDB/productos_venta/read.php');
    $venta = mysqli_fetch_array(readUltimoRegistro());
    $productos_venta = readProductos_venta($venta['folioDeVenta']);
    $total = $venta['totalDeVenta'];
    $off = $textypos+6;
    
    while($productoVenta = mysqli_fetch_array($productos_venta)){
    $producto = mysqli_fetch_array( readID($productoVenta['productoID']) );
    $pdf->setX(2);
    $pdf->Cell(5,$off,$productoVenta["cantidadProducto"]);
    $pdf->setX(16);
    $pdf->Cell(35,$off,  strtoupper(substr($producto["nombre"], 0,12)) );
    $pdf->setX(32);
    $pdf->Cell(11,$off,  "$ ".number_format($productoVenta["cantidadProducto"]*$producto["precioDeVenta"],2,".",",") ,0,0,"R");

    $off+=6;
    }
    $textypos=$off+6;

    $pdf->setX(2);
    $pdf->Cell(5,$textypos,"TOTAL: " );
    $pdf->setX(38);
    $pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

    $pdf->setX(2);
    $pdf->Cell(5,$textypos+6,'GRACIAS POR TU COMPRA ');

    $pdf->output();


?>
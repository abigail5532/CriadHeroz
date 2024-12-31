<?php

require('fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

      $this->Image('logo.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 30); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Criadheroz'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

     
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->Cell(100, 10, utf8_decode("Reporte de Productos Registrados"), 0, 1, 'C', 0);
      $this->SetFont('Arial', 'B', 8);
      $this->Ln(7);
      $this->Cell(15,10, '#',1,0,'C',0);
      $this->Cell(15,10, 'Codigo',1,0,'C',0);
      $this->Cell(70,10, 'Producto',1,0,'C',0);
      $this->Cell(15,10, 'Stock',1,0,'C',0);
      $this->Cell(15,10, 'Precio',1,1,'C',0);
      
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

require 'conexion.php';
$consulta = "SELECT * FROM producto";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AddPage(); 
$pdf->AliasNbPages(); 
$pdf->SetFont('Arial','B',8); 
while($row = $resultado ->fetch_assoc()){
    $pdf->Cell(15,10, $row['codproducto'],1,0,'C',0);
    $pdf->Cell(15,10, $row['codigo'],1,0,'C',0);
    $pdf->Cell(70,10, $row['descripcion'],1,0,'C',0);
    $pdf->Cell(15,10, $row['existencia'],1,0,'C',0);
    $pdf->Cell(15,10, $row['precio'],1,1,'C',0);
}




$pdf->Output('ProductosReporte.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
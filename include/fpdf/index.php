<?php
// Get pdf lib
require_once('fpdf17/fpdf.php');

$pdf= new FPDF(); // create object of FPDF class

$pdf->AddPage();

$pdf->SetDisplayMode('real','default');

$pdf->SetFont('Arial','',18);

$pdf->SetXY(0,0);

$pdf->SetY(7);

$pdf->SetTextColor(0,0,0);

$pdf->Cell(0,5, 'Hello world', 0,1,'L');

// First we will change the XY position to the bottom left hand corner of the page to display our page number in.
$pdf->SetXY(160, 272);
// Now we display our page number using the Cell function.
$pdf->Cell(30, 4, 'Page ' . $pdf->PageNo(), 0, 1);


$pdf->Output();
?>
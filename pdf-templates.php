<?php 
  function addHeader($pdf, $small, $large, $title, $subTitle) {
    $pdf->addPage();
    $pdf->setFont('Arial', '', $small);
    $pdf->SetMargins(15, 15);
    
    $pdf->Image('assets/images/montalban-logo.png', 10, 10, -400);

    $pdf->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Province of Rizal', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Municipality of Rodriguez', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $large);
    $pdf->Cell(0, 5, 'Colegio de Montalban', 0, 1, 'C');

    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(0, 5, 'Kasiglahan Village, San Jose Rodriguez, Rizal', 0, 1, 'C');
    $pdf->Image('assets/images/cdm-logo.png', 167, 10, -350);
    $pdf->Cell(0, 10, '___________________________________________________________________________________________', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $large);
    if ($title !== null) $pdf->Cell(0, 7, $title, 0, 1, 'C');
    if ($subTitle !== null) $pdf->Cell(0, 7, $subTitle, 0, 1, 'C');

    return $pdf;
  }
?>
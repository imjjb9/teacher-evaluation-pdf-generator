<?php
  require('fpdf.php');

  #font sizes
  $small = 10;
  $medium = 12;
  $large = 14;

  $pdf = new FPDF();
  $pdf->addPage();
  $pdf->setFont('Arial', '', $small);
  $pdf->SetMargins(15, 15);

  $academicYear = 'First Semester, Academic Year 2023-2024';
  $name = 'Brao, Rizza Mae C.';

  $instructionGrade = (String) 4.62;
  $classroomManagementGrade = (String) 4.61;
  $assessmentGrade = (String)  4.61;
  $adultLearningPracticesGrade = (String) 4.64;

  $preparedBy = 'Rheza Maureen Joy Y. Gabinete, MBA, LPT';
  $notedBy = 'Joy U Mercado, Ph. D., LPT';
  $overallRating = (String) 4.62;
  $adjectiveRating = 'Performance Needs Improvement';
  
  #centerted text
  $pdf->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
  $pdf->Cell(0, 5, 'Province of Rizal', 0, 1, 'C');
  $pdf->Cell(0, 5, 'Municipality of Rodriguez', 0, 1, 'C');

  $pdf->setFont('Arial', 'B', $large);
  $pdf->Cell(0, 5, 'Colegio de Montalban', 0, 1, 'C');

  $pdf->setFont('Arial', '', 10);
  $pdf->Cell(0, 5, 'Kasiglahan Village, San Jose Rodriguez, Rizal', 0, 1, 'C');
  $pdf->Cell(0, 10, '___________________________________________________________________________________________', 0, 1, 'C');

  var_export($pdf);
?>
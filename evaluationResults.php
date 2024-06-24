<?php
  require('fpdf.php');

  function generateOverallEvaluationResult(
    $academicYear,
    $name,
    $instructionGrade,
    $classroomManagementGrade,
    $assessmentGrade,
    $adultLearningPracticesGrade,
    $overallRating,
    $adjectiveRating,
    $preparedBy,
    $notedBy,
  ) {
    #font sizes
    $small = 8;
    $medium = 11;
    $large = 14;

    $pdf = new FPDF();
    $pdf->addPage();
    $pdf->setFont('Arial', '', $small);
    $pdf->SetMargins(15, 15);
    
    $pdf->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Province of Rizal', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Municipality of Rodriguez', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $large);
    $pdf->Cell(0, 5, 'Colegio de Montalban', 0, 1, 'C');

    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(0, 5, 'Kasiglahan Village, San Jose Rodriguez, Rizal', 0, 1, 'C');
    $pdf->Cell(0, 10, '___________________________________________________________________________________________', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $large);
    $pdf->Cell(0, 7, 'Results of the students Evaluation of Teachers Performance', 0, 1, 'C');
    $pdf->Cell(0, 7, $academicYear, 0, 1, 'C');

    #padding
    $pdf->cell(20, 20);

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(15, 7, 'Name:', 0, 0, 'R');
    $pdf->setFont('Arial', 'U', $medium);
    $pdf->cell(40, 7, $name, 0, 0, 'L');
    $pdf->cell(20, 7, '', 0, 0, 'L');
    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(47, 7, 'Numerical Overall Rating: ', 0, 0, 'C');
    $pdf->cell(10, 7, $overallRating, 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(74, 7, 'Full-time Faculty', 0, 0, 'L');
    $pdf->cell(33, 7, 'Adjective Rating: ', 0, 0, 'L');
    $pdf->cell(40, 7, $adjectiveRating, 0, 1, 'L');

    #padding
    $pdf->cell(10, 10);

    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(40, 7, 'A. Instruction', 0, 0, 'L');
    $pdf->cell(80, 7, $instructionGrade, 0, 1, 'C');
    $pdf->cell(40, 7, 'B. Classroom Management', 0, 0, 'L');
    $pdf->cell(80, 7, $classroomManagementGrade, 0, 1, 'C');
    $pdf->cell(40, 7, 'C. Assessment', 0, 0, 'L');
    $pdf->cell(80, 7, $assessmentGrade, 0, 1, 'C');
    $pdf->cell(40, 7, 'D. Adult Learning Practices', 0, 0, 'L');
    $pdf->cell(80, 7, $adultLearningPracticesGrade, 0, 1, 'C');

    #padding
    $pdf->cell(25, 25);

    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(10); #margin
    $pdf->cell(38, 15, 'Prepared by:', 0, 1, 'L');
    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(10); #margin
    $pdf->cell(100, 7, $preparedBy, 0, 1, 'L');
    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(10); #margin
    $pdf->cell(44, 7, 'Office in Charge', 0, 1, 'L');
    $pdf->cell(10); #margin
    $pdf->cell(100, 7, 'Office of the Vice President of Academic Affair', 0, 1, 'L');

    #padding
    $pdf->cell(10, 10);

    $pdf->cell(10, 15, '', 0, 0, 'L');
    $pdf->cell(32, 15, 'Noted by:', 0, 1, 'L');
    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(10); #margin
    $pdf->cell(69, 7, $notedBy, 0, 1, 'L');
    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(10); #margin
    $pdf->cell(74, 7, 'Colegio de Montalban President', 0, 1, 'L');

    #padding
    $pdf->cell(10, 10);

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(95, 7, 'Legend:', 0, 0, 'R');
    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(70, 7, '1.00-1.80 - Poor Performance', 0, 2, 'L');
    $pdf->cell(70, 7, '1.81-2.61 - Performance Needs Improvement', 0, 2, 'L');
    $pdf->cell(70, 7, '2.62-3.42 - Satisfatory Performance', 0, 2, 'L');
    $pdf->cell(70, 7, '3.43-4.23 - Very Satisfactory Performance', 0, 2, 'L');
    $pdf->cell(70, 7, '4.24-5.00 - Excellent Performance', 0, 2, 'L');

    $pdf->Output('F', 'evaluationResults/' . $name . ' - Evaluation Result.pdf');
  }
?>
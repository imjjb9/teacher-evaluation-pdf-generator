<?php
  require('pdf.php');

  function generateOverallEvaluationResult(
    $name,
    $position,
    $instructionGrade,
    $classroomManagementGrade,
    $assessmentGrade,
    $adultLearningPracticesGrade,
    $overallRating,
    $adjectiveRating,
    $preparedBy,
    $notedBy,
    $strengthsAndWeaknesses,
    $strengths,
    $toImproves,
    $comments
  ) {

    $legends = Array(
        "1.00-1.80 - Poor Performance",
        "1.81-2.61 - Performance Needs Improvement",
        "2.62-3.42 - Satisfactory Performance",
        "3.43-4.23 - Very Satisfactory Performance",
        "4.24-5.00 - Excellent Performance",
    );

    $medium = 11;

    $pdf = new PDF();
    $pdf->addPage();

    #first page

    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Ln(15);
    $pdf->Cell(14, 10, "Name: ", 0, 0, '');
    $pdf->SetFont('Arial', 'U', '11');
    $pdf->Cell(0, 10, $name, 0, 0, '');
    $pdf->Ln(6);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(0, 10, $position, 0, 0, '');
    $pdf->Ln(16);
    $pdf->Cell(20, 5, "Komento: ", 0, 0, '');
    $pdf->SetFont('Arial', '', '11');
    $pdf->MultiCell(0, 5, $comments, 0, "L");
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'BI', '11');
    $pdf->Cell(20, 5, "KALAKASAN: ", 0, 0, '');
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', '11');
    foreach($strengths as $strength){
        $pdf->Cell(0, 5, $strength, 0, 0, "L");
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'BI', '11');
    $pdf->Cell(20, 5, "SAKLAW NA DAPAT BAGUHIN: ", 0, 0, '');
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', '11');
    foreach($toImproves as $toImprove){
        $pdf->Cell(0, 5, $toImprove, 0, 0, "L");
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->Cell(20, 5, "Prepared By: ", 0, 0, '');
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(20, 5, "Rheza Maureen Joy Y. Gabinete, MBA, LPT", 0, 0, '');
    $pdf->Ln(6);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(20, 5, "Officer in Charge", 0, 0, '');
    $pdf->Ln(6);
    $pdf->Cell(10);
    $pdf->Cell(20, 5, "Office of the Vice President of Academic Affairs", 0, 0, '');
    $pdf->Ln(15);
    $pdf->Cell(10);
    $pdf->Cell(20, 5, "Noted By:", 0, 0, '');
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(20, 5, "Joy U Mercado, Ph. D., LPT", 0, 0, '');
    $pdf->Ln(6);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(20, 5, "Colegio de Montalban President", 0, 0, '');
    $pdf->Ln(15);
    $pdf->Cell(93);
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(15, 6, "Legend: ", 0, 0, '');
    $pdf->SetFont('Arial', '', '11');

    for ($x=0; $x < sizeof($legends); $x++) {
      if ($x == 0) {
        $pdf->Cell(1);
      } else {
        $pdf->Cell(109); 
      }
      $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
    }

    #second page
    #padding
    $pdf->cell(15, 15, '', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(14, 7, 'Name:', 0, 0, 'L');
    $pdf->setFont('Arial', 'U', $medium);
    $pdf->cell(43, 7, $name, 0, 0, 'L');
    $pdf->cell(20, 7, '', 0, 0, 'L');
    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(47, 7, 'Numerical Overall Rating: ', 0, 0, 'C');
    $pdf->cell(10, 7, $overallRating, 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(75, 7, 'Full-time Faculty', 0, 0, 'L');
    $pdf->cell(33, 7, 'Adjective Rating: ', 0, 0, 'L');
    $pdf->cell(40, 7, $adjectiveRating, 0, 1, 'L');

    #padding
    $pdf->cell(10, 10, '', 0, 1, 'C');

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
    $pdf->cell(10, 10, '', 0, 1, 'C');

    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(10, 15, '', 0, 0, 'L'); #margin
    $pdf->cell(38, 15, 'Prepared by:', 0, 1, 'L');
    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(10, 15, '', 0, 0, 'L'); #margin
    $pdf->cell(100, 7, $preparedBy, 0, 1, 'L');
    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(10, 15, '', 0, 0, 'L'); #margin
    $pdf->cell(44, 7, 'Office in Charge', 0, 1, 'L');
    $pdf->cell(10, 15, '', 0, 0, 'L'); #margin
    $pdf->cell(100, 7, 'Office of the Vice President of Academic Affair', 0, 1, 'L');

    #padding
    $pdf->cell(10, 10, '', 0, 1, 'C');

    $pdf->cell(10, 15, '', 0, 0, 'L');
    $pdf->cell(32, 15, 'Noted by:', 0, 1, 'L');
    $pdf->setFont('Arial', 'B', $medium);
    $pdf->cell(10, 15, '', 0, 0, 'L'); #margin
    $pdf->cell(69, 7, $notedBy, 0, 1, 'L');
    $pdf->setFont('Arial', '', $medium);
    $pdf->cell(10, 15, '', 0, 0, 'L'); #margin
    $pdf->cell(74, 7, 'Colegio de Montalban President', 0, 1, 'L');

    #padding
    $pdf->cell(10, 10, '', 0, 1, 'C');

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->Cell(93);
    $pdf->Cell(15, 6, "Legend: ", 0, 0, '');
    $pdf->SetFont('Arial', '', $medium);

    for ($x=0; $x < sizeof($legends); $x++) {
      if ($x == 0) {
        $pdf->Cell(1);
      } else {
        $pdf->Cell(109);
      }
      $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
    }
  
    #third page
    $pdf->AddPage();
    // $pdf->ln(10);
    $pdf->SetWidths(array(90, 90));
    $pdf->SetLineHeight(5);
    

    $pdf->setFont('Arial', 'B', $medium);
    $pdf->Row(Array('Strength', 'Weakness'));
    $pdf->setFont('Arial', '', $medium);
    foreach($strengthsAndWeaknesses as $item){
      $pdf->Row(Array(
          $item['strength'],
          $item['weakness']
      ));
  }

    $pdf->Output('F', 'evaluationResults/' . $name . ' - Overall Evaluation Result.pdf');
  }
?>
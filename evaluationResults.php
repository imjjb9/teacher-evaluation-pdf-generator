<?php
  require('fpdf.php');
  require('pdf-templates.php');

  class PDF extends FPDF {
    function Header() {
      $this->setFont('Arial', '', 8);
      $this->SetMargins(15, 15);
      
      $this->Image('assets/images/montalban-logo.png', 10, 10, -400);
  
      $this->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
      $this->Cell(0, 5, 'Province of Rizal', 0, 1, 'C');
      $this->Cell(0, 5, 'Municipality of Rodriguez', 0, 1, 'C');
  
      $this->setFont('Arial', 'B', 14);
      $this->Cell(0, 5, 'Colegio de Montalban', 0, 1, 'C');
  
      $this->setFont('Arial', '', 10);
      $this->Cell(0, 5, 'Kasiglahan Village, San Jose Rodriguez, Rizal', 0, 1, 'C');
      $this->Image('assets/images/cdm-logo.png', 167, 10, -350);
      $this->Cell(0, 10, '___________________________________________________________________________________________', 0, 1, 'C');
  }
}

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
    $strengthAndWeakness,
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
    $pdf->SetFont('Arial', 'B', '14');
    $pdf->Ln(6);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, "Results of the Students Evaluation of Teacher's Performance", 0, 0, 'C');
    $pdf->Ln(6);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, "First Semester, Academic Year 2023-2024", 0, 0, 'C');
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
    for($x=0; $x < sizeof($legends); $x++){
        if($x == 0){
            $pdf->Cell(1);
        }else{
            $pdf->Cell(109); 
        }
        $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
    }

    #padding
    $pdf->cell(20, 20, '', 0, 1, 'C');

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
    $pdf->cell(25, 25, '', 0, 1, 'C');

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
    $pdf->cell(95, 7, 'Legend:', 0, 0, 'R');
    $pdf->setFont('Arial', '', $medium);
    for($x=0; $x < sizeof($legends); $x++){
      if($x == 0){
          $pdf->Cell(1);
      }else{
          $pdf->Cell(109); 
      }
      $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
  }
  
    #padding
    $pdf->cell(10, 10, '', 0, 1, 'C');

    $pdf->SetFont('Arial', '', $medium);
    
    $cellWidth = 60;
    $cellHeight = 7;
    
    foreach ($strengthAndWeakness as $commentSet) {
        for ($i = 0; $i < count($commentSet); $i++) {
            $pdf->MultiCell($cellWidth, $cellHeight, $commentSet[$i], 1); // Adjust width and height as needed
            $pdf->SetX($pdf->GetX() + $cellWidth);
        }
        $pdf->Ln();
        $pdf->SetX(10);
    }

    $pdf->Output('F', 'evaluationResults/' . $name . ' - Overall Evaluation Result.pdf');
  }
?>
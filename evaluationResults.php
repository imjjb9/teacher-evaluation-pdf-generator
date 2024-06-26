<?php
require('pdf.php');

function generateOverallEvaluationResult(
  $name,
  $instructionGrade,
  $classroomManagementGrade,
  $assessmentGrade,
  $adultLearningPracticesGrade,
  $overallRating,
  $adjectiveRating
) {

  $legends = array(
    "1.00 - 1.80 - Poor Performance",
    "1.81 - 2.61 - Performance Needs Improvement",
    "2.62 - 3.42 - Satisfactory Performance",
    "3.43 - 4.23 - Very Satisfactory Performance",
    "4.24 - 5.00 - Excellent Performance",
  );

  $medium = 10;

  $pdf = new PDF();
  $pdf->addPage();

  #first page
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(0, 5, 'Summary Report', 0, 1, 'C');
  $pdf->Ln(5);
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(40, 10, "Faculty Name: ", 0,  0, '');
  $pdf->SetFont('Arial', 'U', '11');
  $pdf->Cell(0, 10, $name, 0, 1, '');

  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(40, 10, "Total Evaluations: ", 0, 0, '');
  $pdf->SetFont('Arial', 'U', '11');
  $pdf->Cell(0, 10, '100', 0, 1, '');
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(40, 10, "Numerical Rating: ", 0, 0, '');
  $pdf->SetFont('Arial', 'U', '11');
  $pdf->Cell(0, 10, $overallRating, 0, 1, '');
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(40, 10, "Adjectival Rating: ", 0, 0, '');
  $pdf->SetFont('Arial', 'U', '11');
  $pdf->Cell(0, 10, $adjectiveRating, 0, 1, '');
  $pdf->Ln(5);

  $pdf->SetWidths(array(90, 20));
  $pdf->SetLineHeight(5);
  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('Criteria', 'Average'));
  $pdf->setFont('Arial', '', $medium);
  $pdf->Row(array('Subject Mastery & Instructional Delivery', '5.0'));
  $pdf->Row(array('Classroom Management & Organization', '5.0'));
  $pdf->Row(array('Feedback, Assessment, and Availability', '5.0'));
  $pdf->Row(array('Professionalism & Etiquette', '5.0'));
  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('Overall Average', '5.0'));

  $pdf->Ln(5);
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(15, 6, "Legend: ", 0, 1, '');
  $pdf->SetFont('Arial', '', '11');

  for ($x = 0; $x < sizeof($legends); $x++) {
    $pdf->MultiCell(0, 6, $legends[$x], 0, 'L');
  }

  $pdf->Ln(40);
  $pdf->Cell(100, 5, "Prepared By: ", 0, 0, '');
  $pdf->Cell(0, 5, "Noted By:", 0, 0, '');
  $pdf->Ln(20);
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(100, 5, "Rheza Maureen Joy Y. Gabinete, MBA, LPT", 0, 0, '');
  $pdf->Cell(0, 5, "Joy U Mercado, Ph. D., LPT", 0, 0, '');
  $pdf->Ln(6);
  $pdf->SetFont('Arial', '', '11');
  $pdf->Cell(100, 5, "Officer in Charge", 0, 0, '');
  $pdf->Cell(20, 5, "Colegio de Montalban President", 0, 0, '');
  $pdf->Ln(6);
  $pdf->Cell(20, 5, "Office of the Vice President of Academic Affairs", 0, 0, '');

  #second page
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(0, 5, 'Detailed Report', 0, 1, 'C');
  $pdf->Ln(5);
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(40, 10, "Faculty Name: ", 0,  0, '');
  $pdf->SetFont('Arial', 'U', '11');
  $pdf->Cell(0, 10, $name, 0, 1, '');

  $pdf->SetWidths(array(180));
  $pdf->SetLineHeight(5);
  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('I. Subject Mastery & Instructional Delivery'));
  $pdf->SetWidths(array(165, 15));
  $pdf->setFont('Arial', '', $medium);
  $pdf->Row(array('a. The instructor demonstrates mastery of the subject matter and answers questions satisfactorily, accurately, and clearly.', '5.0'));
  $pdf->Row(array('b. The instructor speaks clearly and explains the lessons confidently by expounding on the presentations. He/She does not merely read the slide presentation.', '5.0'));
  $pdf->Row(array("c. Your instructor uses teaching methods and strategies that focus on what you're expected to learn and do, instead of just giving lectures in the usual way.", '5.0'));
  $pdf->Row(array('d. The instructor provides instructions that are clear and easy to understand.', '5.0'));
  $pdf->Row(array('e. The instructor creates learning tasks that are relevant to the course.', '5.0'));
  $pdf->Row(array('f. The instructor communicates well in the language of instructions.', '5.0'));
  $pdf->Row(array('g. The instructor uses creative ways of making the discussion interesting and lively.', '5.0'));

  $pdf->SetWidths(array(180));
  $pdf->SetLineHeight(5);
  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('II. Classroom Management & Organization'));
  $pdf->SetWidths(array(165, 15));
  $pdf->setFont('Arial', '', $medium);
  $pdf->Row(array('a. The instructor maintains order and discipline in the classroom and ensure full compliance with the college code of conduct.', '5.0'));
  $pdf->Row(array('b. The instructor follows the schedule and syllabus consistently so students can prepare ahead of time.', '5.0'));
  $pdf->Row(array("c. The instructor encourages active participation of the students.", '5.0'));

  $pdf->SetWidths(array(180));
  $pdf->SetLineHeight(5);
  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('III. Feedback, Assessment, and Availability'));
  $pdf->SetWidths(array(165, 15));
  $pdf->setFont('Arial', '', $medium);
  $pdf->Row(array('a. The instructor is available for consultation during scheduled classes.', '5.0'));
  $pdf->Row(array('b. The instructor explains the grading system and how assessment tasks are graded.', '5.0'));
  $pdf->Row(array("c. The instructor allots enough time for students to accomplish assessment tasks and assignments.", '5.0'));
  $pdf->Row(array('d. The instructor creates assignments and tasks that encourage the use of e-learning and other resources.', '5.0'));
  $pdf->Row(array('e. The instructor provides timely, objective, and constructive feedback on all assignments by highlighting strengths, correcting inconsistencies, and providing suggestions for improvement.', '5.0'));
  $pdf->Row(array("f. The instructor checks and returns submitted assessments tasks on a timely basis.", '5.0'));

  $pdf->SetWidths(array(180));
  $pdf->SetLineHeight(5);
  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('IV. Professionalism & Etiquette'));
  $pdf->SetWidths(array(165, 15));
  $pdf->setFont('Arial', '', $medium);
  $pdf->Row(array('a. The instructor dresses professionally during class.', '5.0'));
  $pdf->Row(array('b. The instructor uses decent or appropriate language.', '5.0'));
  $pdf->Row(array("c. The instructor attends promptly and regularly to the scheduled class.", '5.0'));
  $pdf->Row(array('d. The instructor treats students with respect and maintains a good professional relationship with students.', '5.0'));
  $pdf->Row(array('e. The instructor speaks well of the College (CDM)./The instructor speaks positively about the college.', '5.0'));

  $pdf->Ln(1);
  $pdf->SetFont('Arial', 'B', '11');
  $pdf->Cell(15, 6, "Legend: ", 0, 1, '');
  $pdf->SetFont('Arial', '', '11');

  for ($x = 0; $x < sizeof($legends); $x++) {
    $pdf->Cell(20, 3.5, $legends[$x], 0, 1, '');
  }

  #third page
  $pdf->AddPage();
  // $pdf->ln(10);
  $pdf->SetWidths(array(90, 90));
  $pdf->SetLineHeight(5);


  $pdf->setFont('Arial', 'B', $medium);
  $pdf->Row(array('Strength', 'Weakness'));
  $pdf->setFont('Arial', '', $medium);
  foreach ($strengthsAndWeaknesses as $item) {
    $pdf->Row(array(
      $item['strength'],
      $item['weakness']
    ));
  }

  //$pdf->Output('F', 'evaluationResults/' . $name . ' - Overall Evaluation Result.pdf');
  $pdf->Output('D', $name . '.pdf');
}

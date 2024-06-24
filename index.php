<?php
  require('./evaluationResults.php');
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

  generateOverallEvaluationResult(
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
  );
?>
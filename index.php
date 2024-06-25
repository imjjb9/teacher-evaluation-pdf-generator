<?php
  require('./evaluationResults.php');

  $semester = 'First Semester';
  $year = '2023-2024';

  $name = 'Brao, Rizza Mae C.';

  $instructionGrade = (String) 4.62;
  $classroomManagementGrade = (String) 4.61;
  $assessmentGrade = (String)  4.61;
  $adultLearningPracticesGrade = (String) 4.64;
  
  $overallRating = (String) 4.62;
  $adjectiveRating = 'Performance Needs Improvement';

  $preparedBy = 'Rheza Maureen Joy Y. Gabinete, MBA, LPT';
  $notedBy = 'Joy U Mercado, Ph. D., LPT';

  $strengthAndWeakness = [
    ['Brao, Rizza Mae C.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
    ['Brao, Rizza Mae C.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
    ['Brao, Rizza Mae C.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
    ['Brao, Rizza Mae C.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
    ['Brao, Rizza Mae C.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']
  ];

  $position = "Full-Time Faculty";
  $comments = "Ok namn siya magturo, magaling magturo c maam";
  $strengths = Array("Good at explaining the entire lesson", "Be on time on our class, elaborate more. Teach more.");
  $toImproves = Array("Strict teacher", "Giving more alternative formulas");

  generateOverallEvaluationResult(
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
  );
?>
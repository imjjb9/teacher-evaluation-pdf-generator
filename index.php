<?php
  require('./evaluationResults.php');
  $name = 'Brao, Rizza Mae C.';

  $instructionGrade = (String) 4.62;
  $classroomManagementGrade = (String) 4.61;
  $assessmentGrade = (String)  4.61;
  $adultLearningPracticesGrade = (String) 4.64;
  
  $overallRating = (String) 4.62;
  $adjectiveRating = 'Performance Needs Improvement';

  $strengthAndWeakness = Array(
    array(
        "strength"=>"isaehgoieeeeeeeeeioggggjfgggggggegioeiigoeddddddddddddddfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhd",
        "weakness"=>"kjdssssssssfggggggggggggggggggsssssssssssssssssssssssssssssssssssssssssssssfdhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhsb"
    ),
    array(
        "strength"=>"isaehgoieeeeeeeeeioegioggfgggggggggggggggeiigoeddddddddddddddfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhd",
        "weakness"=>"kjdsssssssssssssssssssgfgggggggggggssssssssssssssssssssssssssssssssssfdhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhsb"
    ),
);

  generateOverallEvaluationResult(
    $name,
    $position,
    $instructionGrade,
    $classroomManagementGrade,
    $assessmentGrade,
    $adultLearningPracticesGrade,
    $overallRating,
    $adjectiveRating,
  );
?>
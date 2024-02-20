<?php
$marks = [
    'mgmg' => [
        'physics' => 30,
        'maths' => 40,
        'chem' => 60,
    ],
    'agag' => [
        'physics' => 49,
        'maths' => 40,
        'chem' => 90,
    ],
    'zawzaw' => [
        'physics' => 80,
        'maths' => 30,
        'chem' => 50,
    ]
];

$subjectMarks = array_column($marks, 'physics');
$highestPhysicsMark = max($subjectMarks);
echo "Highest marks in physics: $highestPhysicsMark <br>";

$physicsMarks = array_column($marks, 'physics');
$physicsAverage = array_sum($physicsMarks) / count($physicsMarks);
echo "Average marks for physics: $physicsAverage <br>";

$failedStudents = [];
foreach ($marks as $student => $subjects) {
    foreach ($subjects as $subject => $mark) {
        if ($mark < 40) {
            $failedStudents[] = $student;
            break;
        }
    }
}
if (empty($failedStudents)) {
    echo "No students have failed in any subject. <br>";
} else {
    echo "Students who have failed in any subject: " . implode(', ', $failedStudents) . "<br>";
}

function sum($a, $b)
{
    return array_sum($b) - array_sum($a);
}

$sortedStudents = $marks;
uasort($sortedStudents, "sum");
echo "Students sorted by total marks (descending order):<br>";
foreach ($sortedStudents as $student => $subjects) {
    $totalMarks = array_sum(array_values($subjects));
    echo "$student: $totalMarks\n";
}

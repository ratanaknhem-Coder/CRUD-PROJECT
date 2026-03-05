<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $students = [
        "student1" => ["name" => "sok sovan", "courses" => ["Math" => "A", "Science" => "B+"]],
        "student2" => ["name" => "song seyha", "courses" => ["Math" => "B", "Science" => "A"]]
    ];
    foreach ($students as $studentID => $studentDetails){
        echo "Student ID: $studentID \n";
        echo "Name:" . $studentDetails["name"] . "\n";
        echo "Courses and Grades:\n";
        foreach ($studentDetails["courses"] as $course => $grade){
            echo "- $course: $grade\n:";
        }
       echo "---------------------------------\n";
    }
    ?>
</body>
</html>
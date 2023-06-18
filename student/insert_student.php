<?php

    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_dept = $_POST['student_dept'];
    $student_year = $_POST['student_year'];

    $conn = new mysqli('localhost', 'root', '', 'venue_booking_test');

    if($conn->connect_error){
        echo "Connection Failed : ".$conn->connect_error;
    }
    else {
        $stmt = $conn->prepare("INSERT INTO student(student_id, student_name, student_year, student_dept) values (?,?,?,?)");
        $stmt->bind_param("isis", $student_id, $student_name, $student_year, $student_dept);
        $execval = $stmt->execute();
        echo $execval;
        echo " Insertion Successful...";
        $stmt->close();
        $conn->close();
    }

    echo "<br><br><a href='list_of_student.php'><button>View Updated List</button></a>";

?>
<?php

$student_id = $_POST['student_id_input'];
$conn = new mysqli('localhost', 'root', '', 'venue_booking_test');

$sql = "CALL DELETE_STUDENT(?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Student removed..";
} else {
    echo "No student found with the provided ID.";
}

$stmt->close();
$conn->close();


echo "<br><br><a href='../student/list_of_student.php'><button>List of Student</button></a>";


?>

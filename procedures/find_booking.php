<?php

$book_id = $_POST['book_id_input'];
$conn = new mysqli('localhost', 'root', '', 'venue_booking_test');

$sql = "CALL FIND_BOOKING(?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $book_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['book_id'] . "  ";
        echo $row['book_date'] . "  ";
        echo $row['book_start'] . "  ";
        echo $row['book_end'] . "  ";
        echo $row['room_id'] . "  ";
        echo $row['staff_id'] . "  ";
        echo $row['student_id'] . "<br>";
    }
} else {
    echo "No booking found with the provided ID.";
}

$stmt->close();
$conn->close();


echo "<br><br><a href='../booking/list_of_booking.php'><button>List of Booking</button></a>";

?>
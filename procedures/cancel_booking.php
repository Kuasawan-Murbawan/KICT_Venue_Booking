<?php

$book_id = $_POST['book_id_input'];
$conn = new mysqli('localhost', 'root', '', 'venue_booking_test');

$sql = "CALL CANCEL_BOOKING(?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $book_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Booking canceled successfully.";
} else {
    echo "No booking found with the provided ID.";
}

$stmt->close();
$conn->close();


echo "<br><br><a href='../booking/list_of_booking.php'><button>List of Booking</button></a>";


?>

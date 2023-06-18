<?php

$room_id = $_POST['room_id_input'];
$date = $_POST['date_input'];

$conn = new mysqli('localhost', 'root', '', 'venue_booking_test');

$sql = "SELECT CHECK_ROOM_AVAILABILITY(?, ?, ?) AS availability";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $room_id, $date, $additionalArgument);  // Replace $additionalArgument with the actual value you want to pass as the third argument
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $availability = $row['availability'];
    echo "Room ID: " . $room_id . "<br>";
    echo "Date: " . $date . "<br>";
    echo "Room availability: " . $availability;
} else {
    echo "No result found.";
}

$stmt->close();
$conn->close();

echo "<br><br><a href='../booking/add_booking.html'><button>Add Booking</button></a>";
echo "<br><br><a href='../booking/list_of_booking.php'><button>List of Booking</button></a>";


?>



<?php
    include '../db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="../homepage/navbar_style.css" type="text/css" media="screen"/>
    <body>
    <div class="navbar">
      <a href="../homepage/homepage.html"
        ><img src="../homepage/home_icon.png" width="18" height="18"
      /></a>
      <a href="../booking/list_of_booking.php">List of Bookings</a>
      <a href="../staff/list_of_staff.php">List of Staff</a>
      <a href="../student/list_of_student.php">List of Students</a>
      <a href="../room/list_of_room.php">List of Rooms</a>
    </div>
</head>
    <br>
    <h1>Booking List</h1>
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Booking Date</th>
            <th>Booking Start</th>
            <th>Booking End</th>
            <th>Room ID</th>
            <th>Staff ID</th>
            <th>Student ID</th>
        </tr>

    <?php

    $sql = "SELECT * FROM booking;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['book_id'] . "</td>";
            echo "<td>" . $row['book_date'] . "</td>";
            echo "<td>" . $row['book_start'] . "</td>";
            echo "<td>" . $row['book_end'] . "</td>";
            echo "<td>" . $row['room_id'] . "</td>";
            echo "<td>" . $row['staff_id'] . "</td>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "</tr>";
        }
    }
    else {
        echo "No results found.";
    }
    ?>
    </table>

<div class="button_container">
    <a href="add_booking.html"><button>Add Booking</button></a>
    <a href="../procedures/find_booking.html"><button>Find Booking</button></a>
    <a href="../procedures/cancel_booking.html"><button>Cancel Booking</button></a>
</div>


</body>
</html>
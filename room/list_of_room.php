

<?php
    include '../db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room List</title>
    <link  rel="stylesheet"  href="../homepage/navbar_style.css"  type="text/css"   media="screen"/>
</head>
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

    <br>
    
    <h1>Room List</h1>
    <table>
        <tr>
            <th>Room ID</th>
            <th>Room Name</th>
            <th>Room Block</th>
            <th>Room Capacity</th>
            <th>Room Floor</th>
        </tr>

    <?php

    $sql = "SELECT * FROM room;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['room_id'] . "</td>";
            echo "<td>" . $row['room_name'] . "</td>";
            echo "<td>" . $row['room_block'] . "</td>";
            echo "<td>" . $row['room_cap'] . "</td>";
            echo "<td>" . $row['room_floor'] . "</td>";
            echo "</tr>";
        }
    }
    else {
        echo "No results found.";
    }
    ?>
    </table>
    <br><br>
    <div class="button_container">
    <a href='../procedures/cancel_booking.html'><button>Cancel Booking</button></a>
    <a href='../functions/check_room_availability.html'><button>Check Room Availability</button></a>
    </div>


</body>
</html>
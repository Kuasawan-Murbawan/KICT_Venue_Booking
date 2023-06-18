

<?php
    $conn = new mysqli('localhost', 'root', '', 'venue_booking_test');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff List</title>
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

    <h1>Staff List</h1>

    <table>
        <tr>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Staff Department</th>
            <th>Staff Salary</th>
        </tr>

    <?php

    $sql = "SELECT * FROM staff;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['staff_id'] . "</td>";
            echo "<td>" . $row['staff_name'] . "</td>";
            echo "<td>" . $row['staff_dept'] . "</td>";
            echo "<td>" . $row['staff_salary'] . "</td>";
            echo "</tr>";

        }
    }
    else {
        echo "<tr><td colspan='4'>No results found.</td></tr>";
    }
    ?>
</table>

    <br>
    <div class="button_container">
    <a href="insert_staff.html"><button>Add Staff</button></a>
    <a href="../functions/no_of_book_staff.html"><button>Number of Booking Made</button></a>
</div>

</body>
</html>
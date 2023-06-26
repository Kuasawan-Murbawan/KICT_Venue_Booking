<?php
    include '../db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="../homepage/navbar_style.css" type="text/css" media="screen" />
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

    <h1>Student List</h1>

    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Year</th>
            <th>Student Department</th>
        </tr>

        <?php
        $sql = "SELECT * FROM student;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['student_year'] . "</td>";
                echo "<td>" . $row['student_dept'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No results found.</td></tr>";
        }
        ?>
    </table>

    <br>
    <div class="button_container">
    <a href="insert_student.html"><button>Add Student</button></a>
    <a href="../procedures/delete_student.html"><button>Delete Student</button></a>
    </div>
</body>
</html>

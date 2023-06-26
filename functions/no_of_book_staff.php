<?php
function getNumberOfBookingsByStaff($staff_id) {
    include '../db_connection.php';
    if ($conn->connect_error) {
        echo "Connection Failed: " . $conn->connect_error;
        return false;
    } else {
        $stmt = $conn->prepare("SELECT NO_OF_BOOK_STAFF_FUNCTION(?) AS total_bookings");
        $stmt->bind_param("i", $staff_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_bookings = $row['total_bookings'];
            $stmt->close();
            $conn->close();
            return $total_bookings;
        } else {
            $stmt->close();
            $conn->close();
            return 0;
        }
    }
}

// Usage example
$staff_id = $_POST['staff_id_input'];
$total_bookings = getNumberOfBookingsByStaff($staff_id);

include '../db_connection.php';

if ($total_bookings !== false) {
    echo "<div style='text-align: center;'><h2>Total Bookings for Staff ID " . $staff_id . ": " . $total_bookings . "</h2></div>";

    $sql = "SELECT BOOKING.*, STAFF.staff_name 
            FROM BOOKING
            INNER JOIN STAFF ON BOOKING.staff_id = STAFF.staff_id
            WHERE BOOKING.staff_id = " . $staff_id . ";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th style='border: 1px solid #ddd; padding: 8px;'>book_id</th><th style='border: 1px solid #ddd; padding: 8px;'>book_date</th><th style='border: 1px solid #ddd; padding: 8px;'>book_start</th><th style='border: 1px solid #ddd; padding: 8px;'>book_end</th><th style='border: 1px solid #ddd; padding: 8px;'>room_id</th><th style='border: 1px solid #ddd; padding: 8px;'>staff_name</th><th style='border: 1px solid #ddd; padding: 8px;'>student_id</th></tr>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['book_id'] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['book_date'] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['book_start'] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['book_end'] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['room_id'] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['staff_name'] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['student_id'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
        echo "<div style='text-align: center;'>No results found.</div>";
    }
} else {
    echo "<div style='text-align: center;'>Failed to retrieve the number of bookings.</div>";
}
echo "<br><br><div style='text-align: center;'><a href='../homepage/homepage.html'><button>Homepage</button></a></div>";
?>

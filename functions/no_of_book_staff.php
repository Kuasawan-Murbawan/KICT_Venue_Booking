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
        echo "Total Bookings for Staff ID " . $staff_id . ": " . $total_bookings . "<br>";

        $sql = "SELECT * FROM BOOKING WHERE staff_id = " . $staff_id . ";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            echo "book_id  book_date  book_start  book_end  room_id  staff_id  student_id<br>";
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['book_id'] . "  ";
                echo $row['book_date'] . "  ";
                echo $row['book_start'] . "  ";
                echo $row['book_end'] . "  ";
                echo $row['room_id'] . "  ";
                echo $row['staff_id'] . "  ";
                echo $row['student_id'] . "<br>";
            }
        }
        else {
            echo "No results found.";
        }

    } else {
        echo "Failed to retrieve the number of bookings.";
    }
    echo "<br><br><a href='../homepage/homepage.html'><button>Homepage</button></a>";
?>

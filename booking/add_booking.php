<?php
    $room_id = $_POST['room_id_input'];
    $start_date = $_POST['start_date_input'];
    $end_date = $_POST['end_date_input'];
    $staff_id = $_POST['staff_id_input'];
    $student_id = $_POST['student_id_input'];
    $current_date = date("Y-m-d");

    include '../db_connection.php';
 
    if($conn->connect_error) {
        echo "Connection Failed: " . $conn->connect_error;
    } else {
        $stmt = $conn->prepare("INSERT INTO booking (book_date, book_start, book_end, room_id, staff_id, student_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssii", $current_date, $start_date, $end_date, $room_id, $staff_id, $student_id);
        $execval = $stmt->execute();

        if ($execval === false) {
            echo "Insertion Failed: " . $stmt->error;
        } else {
            echo "Insertion Successful...";
        }

        $stmt->close();
        $conn->close();
    }

    echo "<br><br><a href='list_of_booking.php'><button>View Updated List</button></a>";
    echo "<br><br><a href='../homepage/homepage.html'><button>Homepage</button></a>";
    
?>

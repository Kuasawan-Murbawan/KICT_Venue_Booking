<?php

    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['Staff_Name'];
    $staff_dept = $_POST['staff_dept'];
    $staff_salary = $_POST['staff_salary'];

    $conn = new mysqli('localhost', 'root', '', 'venue_booking_test');

    if($conn->connect_error){
        echo "Connection Failed : ".$conn->connect_error;
    }
    else {
        $stmt = $conn->prepare("INSERT INTO staff(staff_id, staff_name, staff_dept, staff_salary) values (?,?,?,?)");
        $stmt->bind_param("issi", $staff_id, $staff_name, $staff_dept, $staff_salary);
        $execval = $stmt->execute();
        echo $execval;
        echo " Insertion Successful...";
        $stmt->close();
        $conn->close();
    }

    echo "<br><br><a href='list_of_staff.php'><button>View Updated List</button></a>";

?>
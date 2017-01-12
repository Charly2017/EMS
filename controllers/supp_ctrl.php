<?php
    header('Content-Type: application/json');
    $employee_id = $_GET["employee_id"];

    $conn= mysqli_connect("localhost","root","","ems");

    $sql = "DELETE FROM employees WHERE id = ".$employee_id;
    if(mysqli_query($conn, $sql)){
        echo json_encode("The employee has been deleted successfully");
    } else {
        echo json_encode("The employee has not deleted");
    }

<?php
    header('Content-Type: application/json');
    $conn= mysqli_connect("localhost","root","","ems");

    $sql = 'SELECT * FROM employees';
    $result = mysqli_query($conn, $sql);
    if($result){
        $data = Array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        echo json_encode($data);
    } else {
        echo json_encode("no_data_found");
    }
            

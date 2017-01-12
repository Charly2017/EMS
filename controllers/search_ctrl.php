<?php
    header('Content-Type: application/json');
    $data = $_GET["data"];

    $conn= mysqli_connect("localhost","root","","ems");

    $sql = "SELECT * FROM employees WHERE firstname like '%".$data."%' OR lastname like '%".$data."%' OR email like '%".$data."%' OR dateofbirth like '%".$data."%' OR jobtitle like '%".$data."%' OR salary like '%".$data."%'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $data = Array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        echo json_encode($data);
    } else {
        echo json_encode("The employee does not exist");
    }
            

<?php
    header('Content-Type: application/json');
    $name = $_GET["name"];
    $id = $_GET["id"];
    
    $conn= mysqli_connect("localhost","root","","ems");
    if($name === "" && $id === ""){
        $sql = "SELECT * FROM employees";
    } else{
        $sql = "SELECT * FROM employees WHERE firstname like '%".$name."%' OR lastname like '%".$name."%' AND id = ".$id;
    }
    
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
            

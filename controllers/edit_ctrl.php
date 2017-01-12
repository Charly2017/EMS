<?php
    header('Content-Type: application/json');    
    $edit =$_GET["edit"];    

    $conn= mysqli_connect("localhost","root","","ems");

    $message = "";
    $age = 0;
    if($edit != 0){
        if($edit == 1){
            $id = $_POST["id"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $dateofbirth = $_POST["dateofbirth"];
            $email = $_POST["email"];
            $jobtitle = $_POST["jobtitle"];
            $salary = $_POST["salary"];
            $sql = "UPDATE employees SET id='".$id."', firstname='".$firstname."', lastname='".$lastname."', dateofbirth='".$dateofbirth."', email='".$email."', jobtitle='".$jobtitle."', salary='".$salary."' WHERE id = ".$id;
            if(mysqli_query($conn, $sql)){
                $message = "The employee has been updated successfully";
            } else {
                $message = "The employee has not been updated";
            }
        } else{
            $id = $_GET["id"];
        }
    } else{
        $id = $_GET["id"];
    }
    $sql = "SELECT * FROM employees WHERE id = ".$id;
    $result = mysqli_query($conn, $sql);
    if($result){
        $res = mysqli_fetch_assoc($result);
        if($edit == 2){
            $dateofbirth = $res["dateofbirth"];
            $now = date("Y-m-d");
            $diff = abs(strtotime($now) - strtotime($dateofbirth));
            $age = floor($diff / (365*60*60*24)) + 1;
        }
        echo json_encode(array("response" => $res, "message" => $message, "age" => $age));
    } else {
        echo json_encode(array("response" => mysqli_error($conn), "message" => $message, "age" => $age));
    }

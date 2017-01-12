<?php
    header('Content-Type: application/json');

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dateofbirth = $_POST["dateofbirth"];
    $email = $_POST["email"];
    $salary = $_POST["salary"];
    $jobtitle = $_POST["jobtitle"];

    $conn= mysqli_connect("localhost","root","","ems");

    $sql = "INSERT INTO employees (id, firstname, lastname, dateofbirth, email, jobtitle, salary) VALUES (NULL, '".$firstname."', '".$lastname."','".$dateofbirth."','".$email."','".$jobtitle."',$salary)";

    if(mysqli_query($conn, $sql)){
        $data = array(
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "dateofbirth"=>$dateofbirth,
            "email"=> $email,
            "salary"=> $salary,
            "jobtitle" => $jobtitle
        );
        echo json_encode($data);
    } else {
        echo json_encode(mysqli_error($conn));
    }
            

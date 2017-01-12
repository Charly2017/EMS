<?php
    header('Content-Disposition: attachment; filename="salaryReport.csv";Content-Type: application/octet-stream');
    $salaryMax = $_GET["salaryMax"];

    $conn= mysqli_connect("localhost","root","","ems");

    $sql = "SELECT * FROM employees WHERE salary <= ".$salaryMax;
    $result = mysqli_query($conn, $sql);
    if($result){
        $f = fopen("salary_report.csv", "w");
        while($row = mysqli_fetch_assoc($result)){
            fputcsv($f, $row);
        }
        fclose($f);
        echo json_encode("The salary report has been exported successfully");
    } else {
        echo json_encode(mysqli_error($conn));
    }

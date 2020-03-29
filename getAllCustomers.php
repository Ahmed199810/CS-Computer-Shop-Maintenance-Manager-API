<?php

    require_once './DBCOnnect.php';
    $sql = "SELECT * FROM customers ORDER BY id DESC";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["customers"] = array();
            while ($row = mysqli_fetch_array($result)){
                $customers = array();
                $customers["id"] = $row["id"];
                $customers["name"] = $row["name"];
                $customers["phone"] = $row["phone"];
                $customers["sec_phone"] = $row["sec_phone"];
                $customers["address"] = $row["address"];

                
                array_push($response["customers"], $customers);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No users found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }
<?php

    require_once './DBCOnnect.php';
    $sql = "SELECT * FROM customers_needs ORDER BY date_time ASC";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["needs"] = array();
            while ($row = mysqli_fetch_array($result)){
                if($row["state"] == 1){ // DONE
                    
                } else { // not done
                    $needs = array();
                    $needs["id"] = $row["id"];
                    $needs["customer_name"] = $row["customer_name"];
                    $needs["phone_num"] = $row["phone_num"];
                    $needs["needs"] = $row["needs"];
                    $needs["date_time"] = $row["date_time"];
                    
                    array_push($response["needs"], $needs);    
                }
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No Needs found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }
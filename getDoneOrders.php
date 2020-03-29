<?php

    require_once './DBCOnnect.php';
    $sql = "SELECT * FROM outer_fix_orders ORDER BY due_date_time DESC";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["orders"] = array();
            while ($row = mysqli_fetch_array($result)){
                if($row["state"] == 1){ // DONE
                    $orders = array();
                    $orders["id"] = $row["id"];
                    $orders["customer_name"] = $row["customer_name"];
                    $orders["phone_num"] = $row["phone_num"];
                    $orders["needs"] = $row["needs"];
                    $orders["loc"] = $row["loc"];
                    $orders["date_time"] = $row["date_time"];
                    $orders["due_date_time"] = $row["due_date_time"];
                
                    array_push($response["orders"], $orders);    
                }
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No Orders found"; 
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }
<?php

    require_once './DBCOnnect.php';
    $sql = "SELECT * FROM queue_query";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["queries"] = array();
            while ($row = mysqli_fetch_array($result)){
                $queries = array();
                $queries["id"] = $row["id"];
                $queries["query"] = $row["query"];
                array_push($response["queries"], $queries);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No queries found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }
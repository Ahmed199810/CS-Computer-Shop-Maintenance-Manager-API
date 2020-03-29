<?php

// check for required fields
if (isset($_POST['query'])) {
        
    $query = $_POST['query'];
    
    
    require_once './DBCOnnect.php';

    // connecting to db
    
    $sql = "DELETE FROM queue_query";
    
        
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "reset successfully.";
        //$response["query"] = $sql;
        echo json_encode($response);
    } else{
        //echo " ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        $response["success"] = 0;
        $response["message"] =  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        echo json_encode($response);
    }
    
    } else {
        // required field is missing
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";

        // echoing JSON response
        echo json_encode($response);
    
    }
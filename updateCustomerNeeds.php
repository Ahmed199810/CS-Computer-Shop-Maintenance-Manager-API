<?php
    
// check for required fields
if ( $_POST['customer_name'] && $_POST['needs'] && $_POST['phone_num']) {
        
    $id = $_POST['id'];
    $name = $_POST['customer_name'];
    $phone_num = $_POST['phone_num'];
    $needs = $_POST['needs'];
    
    require_once './DBCOnnect.php';

    // connecting to db
    
    $sql = "UPDATE customers_needs "
            . "SET customer_name = " . "'$name',"
            . " phone_num = ". "'$phone_num',"  
            . "needs = ". "'$needs'"
            . "WHERE id = '$id'";
        
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "Records updated successfully.";
        $response["query"] = $sql;
        echo json_encode($response);
    } else{
        //echo " ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        $response["success"] = 0;
        $response["message"] =  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        echo json_encode($response);
    }
    // check if row inserted or not
    $response["success"] = 1;
    echo json_encode($response);

    
    
    } else {
        // required field is missing
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";

        // echoing JSON response
        echo json_encode($response);
    
    }
<?php

    
    
// check for required fields
if ($_POST['customer_name'] && $_POST['needs'] && $_POST['loc']
        && $_POST['date_time'] && $_POST['due_date_time']) {
        
    
    $name = $_POST['customer_name'];
    $phone_num = $_POST['phone_num'];
    $needs = $_POST['needs'];
    $loc = $_POST['loc'];
    $date_time = $_POST['date_time'];
    $due_date_time = $_POST['due_date_time'];
    
    
    require_once './DBCOnnect.php';

    // connecting to db
    
    $sql = "INSERT INTO outer_fix_orders (customer_name, phone_num, needs, loc, date_time, due_date_time) " . "VALUES ("
            . "'$name'," 
            . "'$phone_num'," 
            . "'$needs'," 
            . "'$loc',"
            . "'$date_time'," 
            . "'$due_date_time'"
            . ");";
    
        
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "Records inserted successfully.";
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
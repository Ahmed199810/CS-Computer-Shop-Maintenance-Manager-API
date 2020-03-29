<?php
// check for required fields
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['sec_phone']) && isset($_POST['address'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sec_phone = $_POST['sec_phone'];
    $address = $_POST['address'];
    
    
    require_once './DBCOnnect.php';

    // connecting to db
    
    $sql = "INSERT INTO customers (name, phone, sec_phone, address) " . "VALUES ("
            . "'$name'" ."," 
            . "'$phone'" . "," 
            . "'$sec_phone'" . "," 
            . "'$address'"
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
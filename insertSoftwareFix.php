<?php

    
    
// check for required fields
if (isset($_POST['device_num'])&& isset($_POST['customer_name']) && isset($_POST['date_time'])
        && isset($_POST['device_name']) && isset($_POST['state'])) {

    $device_num = $_POST['device_num'];
    $customer_name = $_POST['customer_name'];
    $phone_number = $_POST['phone_num'];;
    $prob = $_POST['prob'];
    $win7 = $_POST['win7'];
    $win8 = $_POST['win8'];
    $win10 = $_POST['win10'];
    $check_all = $_POST['check_all'];
    $software = $_POST['software'];
    $battery = $_POST['battery'];
    $charger = $_POST['charger'];
    $bag = $_POST['bag'];
    $cd = $_POST['cd'];
    $other = $_POST['other'];
    $date_time = $_POST['date_time'];
    $device_name = $_POST['device_name'];
    $state = $_POST['state'];
    $device_receiver = $_POST['device_receiver'];
    $device_submitter = $_POST['device_submitter'];
    $date_change_dep = $_POST['date_change_dep'];
    
    require_once './DBCOnnect.php';

    // connecting to db
    
    $sql = "INSERT INTO software_fix (device_num, customer_name, phone_num, prob, win7, win8, win10, check_all, software, battery, charger, bag, cd, other, date_time, device_name, state, device_submitter, date_change_dep, device_receiver) " . "VALUES ("
            . "". $device_num .","
            . "'$customer_name',"
            . "'$phone_number',"
            . "'$prob',"
            . "". $win7 .","
            . "". $win8 .","
            . "". $win10 .","
            . "". $check_all .","
            . "". $software .","
            . "". $battery .","
            . "". $charger .","
            . "". $bag .","
            . "". $cd .","
            . "'$other',"
            . "' $date_time ',"
            . "'$device_name',"
            . "". $state .","
            . "'$device_submitter',"
            . "'$date_change_dep',"
            . "'$device_receiver'" . ");";
     
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

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
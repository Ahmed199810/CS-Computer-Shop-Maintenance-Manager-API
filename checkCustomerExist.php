<?php

    require_once './DBCOnnect.php';
    $word = "%" . $_POST['word'] . "%";
    $param = $_POST['param'];
    $sql = "SELECT * FROM customers WHERE name like" . "'$word' || phone like" . "'$word' ORDER BY id DESC";

    if ($result = mysqli_query($conn, $sql)){
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
        } else {
            $response["success"] = 0;
            $response["message"] = "No customer found";  
            echo json_encode($response);
        }
        
    }  else {
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";
        // echoing JSON response
        echo json_encode($response);
    }
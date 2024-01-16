<?php 
session_start();
require('connectDB.php');

$tool_id = $_POST['tool_id'];
$user_id = $_POST['user_id'];
$remarks = $_POST['remarks'];
$asset_code = $_POST['asset_code'];

// if (empty($dev_name)) {
//     echo '<p class="alert alert-danger">Please, Set the device name!!</p>';
// }
// elseif (empty($dev_dep)) {
//     echo '<p class="alert alert-danger">Please, Set the device department!!</p>';
// }
// else{
    // $token = random_bytes(8);
    // $dev_token = bin2hex($token);

    $sql = "INSERT INTO tool_logs (tool_id, user_log_id, remarks, asset_code) VALUES(?, ?, ?, ?)";
    $result = mysqli_stmt_init($conn);
    if ( !mysqli_stmt_prepare($result, $sql)){
        echo '<p class="alert alert-danger">SQL Error</p>';
    }
    else{
        mysqli_stmt_bind_param($result, "iiss", $tool_id, $user_id, $remarks, $asset_code);
        mysqli_stmt_execute($result);
        echo 1;
    }
mysqli_stmt_close($result); 
mysqli_close($conn);
// }


//*********************************************************************************
?>
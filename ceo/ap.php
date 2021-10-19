<?php
    include_once '../db.php';
    include '../forset.php';
    $ap_query = "UPDATE leavetab SET l_status = 'Approve' WHERE l_id = '".$_GET['id']."';";
    $ap_run = mysqli_query($conn, $ap_query);
    $row = mysqli_fetch_array($ap_run);
    header("location:leaveapprovman.php");
?>
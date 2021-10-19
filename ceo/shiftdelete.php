<?php
    include '../db.php';
    $s2_query = "DELETE FROM shifttab WHERE s_id = '".$_GET['id']."';";
    $q2_run = mysqli_query($conn, $s2_query);
    header('location:ashift.php');
?>
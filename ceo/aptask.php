<?php
    include_once '../db.php';
    include '../forset.php';
    $s_query = "SELECT * FROM TaskMana WHERE t_id = '".$_GET['id']."';";
    $q_run = mysqli_query($conn, $s_query);
    $row = mysqli_fetch_array($q_run);
    $taskid = $row['t_id'];
    $taskname = $row['t_name'];
    $taskdesc = $row['t_desc'];
    $taskassignbyid = $row['t_assign'];
    $taskassignbyname = $row['t_assignname'];
    $taskassigntoid = $row['t_empid'];
    $taskassigntoname = $row['t_emp'];
    $taskassigndate = $row['t_date'];
    $taskassigntime = $row['t_time'];
    $taskcomdate = date('Y/m/d', time());
    $taskcomtime = date('H:i:s', time());
    
    $a_query = "INSERT INTO historytab ( `h_taskname`, `h_taskdesc`, `h_taskid`, `h_assigndate`, `h_assigntime`, `h_comdate`, `h_comtime`, `h_assignbyid`, `h_assignbyname`, `h_assigntoid`, `h_assigntoname`, `h_status`) VALUES ('".$taskname."','".$taskdesc."','".$taskid."','".$taskassigndate."','".$taskassigntime."','".$taskcomdate."','".$taskcomtime."','".$taskassignbyid."','".$taskassignbyname."','".$taskassigntoid."','".$taskassigntoname."','Completed');";
    $a_run = mysqli_query($conn, $a_query);
    
    $s1_query = "DELETE FROM TaskMana WHERE t_id = '".$_GET['id']."';";
    $q1_run = mysqli_query($conn, $s1_query);

    $s2_query = "DELETE FROM prog_report WHERE p_taskid = '".$_GET['id']."';";
    $q2_run = mysqli_query($conn, $s2_query);

    header("location:historytask.php");
?>
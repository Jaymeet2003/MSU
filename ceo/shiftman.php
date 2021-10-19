<?php
    include_once '../db.php';
    include '../forset.php';
    if(isset($_POST['apply'])){
        $toname = $_POST['empselect'];
        $frodate = $_POST['shiftfromdate'];
        $todate = $_POST['shifttodate'];
        $frotime = $_POST['shiftfromtime'];
        $totime = $_POST['shifttotime'];
        $assignby = $_SESSION['dash_Id'];
        $assignbyname = $_SESSION['dash_Name'];
        $sel_query = "SELECT Id FROM userss WHERE Name = '".$toname."';";
        $sel_run = mysqli_query($conn, $sel_query);
        $sel_row = mysqli_fetch_array($sel_run);
        $empid = $sel_row['Id'];
        $a_query = "INSERT INTO shifttab (`s_fromdate`, `s_todate`, `s_fromtime`, `s_totime`, `s_assignid`, `s_assignname`, `s_byid`, `s_byname`) VALUES ('".$frodate."','".$todate."','".$frotime."','".$totime."','".$empid."','".$toname."','".$assignby."','".$assignbyname."');";
        $a_run = mysqli_query($conn, $a_query);
        header("location:ashift.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Shift</title>
        <link rel="stylesheet" href="../css/da.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body style="background-color: #EEEEEE;">
        <div class="fpilore">
            <center>
                <img src="../image/logo1.png" alt="noimage" class="dlogo">
            </center>
            <center>
                <li class="fbut" title="Modules" style="background-color: #3366CC;">
                    <img src="../image/p1.png" alt="nobutton" class="fbutim" >
                </li>
            </center>
            <center>
                <a href="C_dashboard.php">
                    <li class="fbut" title="User Profile">
                        <img src="../image/p2.svg" alt="nobutton" class="fbutim">
                    </li>
                </a>
            </center>
            <center>
                <a href="taskmanager.php">
                    <li class="fbut" title="Task Manager">
                        <img src="../image/p4.svg" alt="nobutton" class="fbutim">
                    </li>
                </a>
            </center> 
            <center>
                <a href="../logout.php">
                    <li class="fbut" title="Logout">
                        <img src="../image/p3.svg" alt="nobutton" class="fbutim">
                    </li>
                </a>
            </center>  
        </div>
        <div class="module">
            <a href="addman.php"><li class="modany">Add</li></a>
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Shift</li>
            <a href="leaveapprovman.php"><li class="modany">Leave approval</li></a>
            <a href="allman.php"><li class="modany">Managers</li></a>
            <a href="manattendance.php"><li class="modany">Manager Attendance</li></a>
        </div>
        <div class="module1">
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Assign</li>
            <a href="ashift.php"><li class="modany1">Assigned Shift</li></a>
        </div>
        <center>
            <div class="adde">
                <form action="shiftman.php" method="POST">
                    <legend>Shift Scheduling</legend>
                    
                    <label class="lab_po">Select Manager</label>
                    <select name="empselect" class="add_emp_f">
                    <?php
                            $s_query = "SELECT * FROM userss WHERE Add_By = '".$_SESSION['dash_Id']."';";
                            $q_run = mysqli_query($conn, $s_query);
                            while($row = mysqli_fetch_array($q_run)){
                                echo  '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
                            } 
                        ?>
                    </select><br>
                    
                    <label class="lab_po">From Date :</label>
                    <input type="date" name="shiftfromdate" class="add_emp_f"><br>

                    <label class="lab_po">To Date :</label>
                    <input type="date" name="shifttodate" class="add_emp_f"><br>
                    
                    <label class="lab_po">From Time :</label>
                    <input type="time" name="shiftfromtime" class="add_emp_f"><br>

                    <label class="lab_po">To Time :</label>
                    <input type="time" name="shifttotime" class="add_emp_f"><br>
                    
                    <input type="submit" class="btn1" name="apply" value="Shift">
                </form>
            </div>
        </center>
    </body>
</html>
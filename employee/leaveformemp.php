<?php
    include_once '../db.php';
    include '../forset.php';
    if(isset($_POST['apply'])){
        $leavereason = $_POST['leave_resaon'];
        $leavestart = $_POST['fro_date'];
        $leaveend = $_POST['to_date'];
        $applyid = $_SESSION['dash_Id'];
        $applyname = $_SESSION['dash_Name'];
        $leavestatus = "Pending";
        $fi_query = "SELECT Add_By FROM userss WHERE Name = '".$applyname."';";
        $fi_run = mysqli_query($conn, $fi_query);
        $fi_row = mysqli_fetch_array($fi_run);
        $fi_id = $fi_row['Add_By'];
        $fn_query = "SELECT * FROM userss WHERE Id = '".$fi_id."';";
        $fn_run = mysqli_query($conn, $fn_query);
        $fn_row = mysqli_fetch_array($fn_run);
        $fn_id = $fn_row['Name'];
        $a_query = "INSERT INTO leavetab (`l_desc`, `l_startdate`, `l_todate`, `l_applyid`, `l_applyname`, `l_approveid`, `l_approvename`, `l_status`) VALUES ('".$leavereason."','".$leavestart."','".$leaveend."','".$applyid."','".$applyname."','".$fi_id."','".$fn_id."','".$leavestatus."');";
        $a_run = mysqli_query($conn, $a_query);
        header("location:leaveview.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LeaveForm</title>
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
                <a href="E_dashboard.php">
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
            <a href="shiftemp.php"><li class="modany">Shift</li></a>
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Leave Form</li>
            <a href="leaveview.php"><li class="modany">My Leave</li></a>
            <a href="myattend.php"><li class="modany">Attendance</li></a>
        </div>
        <div class="module1">
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Leave Form</li>
        </div>
        <center>
            <div class="adde">
                <form action="leaveformemp.php" method="POST">
                    <legend>Leave Form</legend>

                    <lable class="lab_po">Resion :</lable>
                    <textarea name="leave_resaon" class="add_emp_f" cols="10" rows="3"></textarea>

                    <label class="lab_po">Frome Date</label>
                    <input type="date" name="fro_date" class="add_emp_f">

                    <label class="lab_po">To Date</label>
                    <input type="date" name="to_date" class="add_emp_f"><br>

                    <input type="submit" class="btn1" value="Apply" name="apply">
                </form>
            </div>
        </center>
    </body>
</html>
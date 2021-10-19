<?php
    include_once '../db.php';
    include '../forset.php';
    $s_query = "SELECT * FROM leavetab WHERE l_id = '".$_GET['id']."';";
    $q_run = mysqli_query($conn, $s_query);
    $row = mysqli_fetch_array($q_run);
    $name = $row['l_applyname'];
    $leavedesc = $row['l_desc'];
    $leavestart = $row['l_startdate'];
    $levaeto = $row['l_todate'];
    $id = $row['l_id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LeaveApprovale</title>
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
            <a href="shiftman.php"><li class="modany">Shift</li></a>
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Leave</li>
            <a href="allman.php"><li class="modany">Managers</li></a>
            <a href="manattendance.php"><li class="modany">Manager Attendance</li></a>
        </div>
        <div class="module1">
            <a href="leaveapprovman.php"><li class="modany1" style="font-size : 30px;"><span>&#10094;</span></li></a>
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Leave Approvale</li>
        </div>
        <div class="ghar">
            <center>
                <table class="csgo">
                    <tr class="jinda">
                        <td class="csgohd">Name</td>
                        <td class="csgohd1"><?php echo $name ?></td>
                    </tr>
                    <tr class="jinda">
                        <td class="csgohd">Reason</td>
                        <td class="csgohd1"><?php echo $leavedesc ?></td>
                    </tr>
                    <tr class="jinda">
                        <td class="csgohd">From</td>
                        <td class="csgohd1"><?php echo $leavestart ?></td>
                    </tr>
                    <tr class="jinda">
                        <td class="csgohd">To</td>
                        <td class="csgohd1"><?php echo $levaeto ?></td>
                    </tr>
                </table><br>
                <a href="ap.php?id=<?php echo $id ?>" class="jaha1">Approve</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="noap.php?id=<?php echo $id ?>" class="jaha1">Reject</a>
            </center>
        </div> 
    </body>
</html>
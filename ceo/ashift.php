<?php
    include_once '../db.php';
    include '../forset.php';
    $abcd = $_SESSION['dash_Id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>A_Shift</title>
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
            <a href="shiftman.php"><li class="modany1">Assign</li></a>
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Assigned Shift</li>
        </div>
        <div class="ghar">
            <center>
                <table class="csgo">
                    <tr class="jinda">
                        <td class="csgohd">Sr. No.</td>
                        <td class="csgohd">Manager</td>
                        <td class="csgohd">From Date</td>
                        <td class="csgohd">To Date</td>
                        <td class="csgohd">From Time</td>
                        <td class="csgohd">To Time</td>
                        <td class="csgohd">Delete Shift</td>
                    </tr>
                    <?php
                        $s_query = "SELECT * FROM shifttab WHERE s_byid = '".$abcd."';";
                        $q_run = mysqli_query($conn, $s_query);
                        $i=1;
                        while($row = mysqli_fetch_array($q_run)){
                            echo  
                                '<tr class="jinda">
                                    <td class="csgohd1">'.$i.'</td>
                                    <td class="csgohd1">'.$row['s_assignname'].'</td>
                                    <td class="csgohd1">'.$row['s_fromdate'].'</td>
                                    <td class="csgohd1">'.$row['s_todate'].'</td>
                                    <td class="csgohd1">'.$row['s_fromtime'].'</td>
                                    <td class="csgohd1">'.$row['s_totime'].'</td>
                                    <td class="csgohd1"><a href="shiftdelete.php?id='.$row['s_id'].'" class="jaha">Delete</a></td>
                                </tr>';
                            $i=$i+1;
                        } 
                    ?>
                </table>
            </center>
        </div>
    </body>
</html>
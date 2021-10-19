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
        <title>All Manager</title>
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
            <a href="leaveapprovman.php"><li class="modany">Leave approval</li></a>
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Managers</li>
            <a href="manattendance.php"><li class="modany">Manager Attendance</li></a>
        </div>
        <div class="module1">
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">All Managers</li>
        </div>
        <div class="ghar">
            <center>
                <table class="csgo">
                    <tr class="jinda">
                        <td class="csgohd">Sr. No.</td>
                        <td class="csgohd">Name</td>
                        <td class="csgohd">Id</td>
                        <td class="csgohd">Sub_Post</td>
                        <td class="csgohd">Detail</td>
                        <td class="csgohd">Delete</td>
                    </tr>
                    <?php
                        $s_query = "SELECT * FROM userss WHERE Add_By = '".$abcd."';";
                        $q_run = mysqli_query($conn, $s_query);
                        $i=1;
                        while($row = mysqli_fetch_array($q_run)){
                            echo  
                                '<tr class="jinda">
                                    <td class="csgohd1">'.$i.'</td>
                                    <td class="csgohd1">'.$row['Name'].'</td>
                                    <td class="csgohd1">'.$row['Id'].'</td>
                                    <td class="csgohd1">'.$row['Sub-Post'].'</td>
                                    <td class="csgohd1"><a href="allmanview.php?id='.$row['Id'].'" class="jaha">View</a></td>
                                    <td class="csgohd1"><a href="deleteman.php?id='.$row['Id'].'" class="jaha">Delete</a></td>
                                </tr>';
                            $i=$i+1;
                        } 
                    ?>
                </table>
            </center>
        </div>
    </body>
</html>
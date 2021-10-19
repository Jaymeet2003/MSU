<?php
    include_once '../db.php';
    include '../forset.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TaskDetail</title>
        <link rel="stylesheet" href="../css/da.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body style="background-color: #EEEEEE;">
        <div class="fpilore">
            <center>
                <img src="../image/logo1.png" alt="noimage" class="dlogo">
            </center>
            <center>
                <a href="addman.php">
                    <li class="fbut" title="Modules">
                        <img src="../image/p1.png" alt="nobutton" class="fbutim" >
                    </li>
                </a>
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
                    <li class="fbut" title="Task Manager" style="background-color: #3366CC;">
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
            <a href="taskmanager.php"><li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Task</li></a>
            <a href="taskman.php"><li class="modany">Assign</li></a>
            <a href="historytask.php"><li class="modany">History</li></a>
        </div>
        <div class="module1">
            <a href="taskmanager.php"><li class="modany1" style="font-size : 30px;"><span>&#10094;</span></li></a>
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Progress Report</li>
        </div>
        <div class="ghar">
            <center>
                <table class="csgo">
                    <tr class="jinda">
                        <td class="csgohd">Sr. No.</td>
                        <td class="csgohd">Date</td>
                        <td class="csgohd">Time</td>
                        <td class="csgohd">Progress Report</td>
                    </tr>
                    <?php
                        $s_query = "SELECT * FROM prog_report WHERE p_taskid = '".$_GET['id']."';";
                        $q_run = mysqli_query($conn, $s_query);
                        $i=1;
                        while($row = mysqli_fetch_array($q_run)){
                            echo  
                            '<tr class="jinda">
                                <td class="csgohd1">'.$i.'</td>
                                <td class="csgohd1">'.$row['p_date'].'</td>
                                <td class="csgohd1">'.$row['p_time'].'</td>
                                <td class="csgohd1">'.$row['p_report'].'</td>
                            </tr>';
                            $i=$i+1;
                        } 
                    ?>
                </table><br>
                <a href="aptask.php?id=<?php echo $_GET['id'] ?>" class="jaha1">Complete Task</a>
            </center>
        </div>  
    </body>
</html>
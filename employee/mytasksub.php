<?php
    include_once '../db.php';
    include '../forset.php';
    $s_query = "SELECT * FROM TaskMana WHERE t_id = '".$_GET['id']."';";
    $q_run = mysqli_query($conn, $s_query);
    $row = mysqli_fetch_array($q_run);
    if(isset($_POST['task_to_employee'])){
        $progressreport = $_POST['task_to_employee'];
        $taskid = $_GET['id'];
        $progressdate = date('Y/m/d', time());
        $progresstime = date('H:i:s', time());
        $p_query = "INSERT INTO prog_report ( `p_report`, `p_taskid`, `p_date`, `p_time`) VALUES ('".$progressreport."','".$taskid."','".$progressdate."','".$progresstime."');";
        $p_run = mysqli_query($conn, $p_query);
        header("location:subdreport.php?id=".$row['t_id']);
    }
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
                <a href="shiftemp.php">
                    <li class="fbut" title="Modules">
                        <img src="../image/p1.png" alt="nobutton" class="fbutim" >
                    </li>
                </a>
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
            <a href="historytask.php"><li class="modany">History</li></a>
        </div>
        <div class="module1">
            <a href="taskmanager.php"><li class="modany1" style="font-size : 30px;"><span>&#10094;</span></li></a>
            <a href="viewtask.php?id=<?php echo $row['t_id'] ?>"><li class="modany1">Task Details</li></a>
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Submit Report</li>
            <a href="subdreport.php?id=<?php echo $row['t_id'] ?>"><li class="modany1">Submited Report</li></a>
        </div>
            <center>
                <div class="adde">
                    <form action="mytasksub.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <legend>Progress Report :</legend>

                        <lable class="lab_po">Report :</lable>
                        <textarea name="task_to_employee" class="add_emp_f" cols="15" rows="3"></textarea>

                        <input type="submit" class="btn1" value="Submit">
                    </form>
                </div>
            </center>
    </body>
</html>
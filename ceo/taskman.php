<?php
    include_once '../db.php';
    include '../forset.php';
    if(isset($_POST['tname'])){
        $taskname = $_POST['tname'];
        $taskdesc = $_POST['task_to_employee'];
        $assignby = $_SESSION['dash_Id'];
        $assignbyname = $_SESSION['dash_Name'];
        $taskdate = date('Y/m/d', time());
        $tasktime = date('H:i:s', time());
        $empassign = $_POST['empselect'];
        $sel_query = "SELECT Id FROM userss WHERE Name = '".$empassign."';";
        $sel_run = mysqli_query($conn, $sel_query);
        $sel_row = mysqli_fetch_array($sel_run);
        $empid = $sel_row['Id'];
        $a_query = "INSERT INTO TaskMana (`t_name`, `t_desc`, `t_date`, `t_time`, `t_assign`, `t_assignname`, `t_emp`, `t_empid`, `t_status`) VALUES ('".$taskname."','".$taskdesc."','".$taskdate."','".$tasktime."','".$assignby."','".$assignbyname."','".$empassign."','".$empid."','Pending');";
        $a_run = mysqli_query($conn, $a_query);
        header("location:taskmanager.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Task</title>
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
            <a href="taskmanager.php"><li class="modany">Task</li></a>
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Assign</li>
            <a href="historytask.php"><li class="modany">History</li></a>
        </div>
        <div class="module1">
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Task Assign to Manager</li>
        </div>
        <center>
            <div class="adde">
                <form action="taskman.php" method="POST">
                    <legend>Task Assign</legend>

                    
                    <label class="lab_po">Task Name :</label>
                    <input type="text" name="tname" class="add_emp_f" required autocomplete="off"><br>

                    <lable class="lab_po">Task Description:</lable>
                    <textarea name="task_to_employee" class="add_emp_f" cols="10" rows="3" required></textarea>
                    <input type="hidden" name="dashid" value="<?php $_SESSION['dash_Id'] ?>">
                    <lable class="lab_po">Select Manager :</lable>
                    <select name="empselect" class="add_emp_f">
                        <?php
                            $s_query = "SELECT * FROM userss WHERE Add_By = '".$_SESSION['dash_Id']."';";
                            $q_run = mysqli_query($conn, $s_query);
                            while($row = mysqli_fetch_array($q_run)){
                                echo  '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
                            } 
                        ?>
                    </select><br>


                    <input type="submit" class="btn1" value="Assign">
                </form>
            </div>
        </center>
    </body>
</html>
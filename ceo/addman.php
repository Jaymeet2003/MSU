<?php
    include '../db.php';
    include '../dash.php';
    $error="";
    if(isset($_POST['empname'])){
        $UserName = $_POST['empname'];
        $UserEmail = $_POST['empemailid'];
        $UserPassword = $_POST['emppassword'];
        $UserBirthDate = $_POST['empbirthdate'];
        $UserSex = $_POST['empsexselect'];
        $UserAddress = $_POST['empaddress'];
        $UserContact = $_POST['empcontact'];
        $UserPost = $_POST['emppostselect'];
        $UserSubPost = $_POST['empsubpostselect'];
        $token = bin2hex(random_bytes(50));
        $verified = true;
        $addby = $_SESSION['dash_Id'];
        if(is_numeric($UserContact)){
            $a_query = "INSERT INTO userss (`Name`, `Email`, `Password`, `Post`, `BirthDate`, `Sex`, `Address`, `Contact`, `Sub-Post`, `Add_By`, `token`, `verified`) VALUES ('".$UserName."','".$UserEmail."','".$UserPassword."','".$UserPost."','".$UserBirthDate."','".$UserSex."','".$UserAddress."','".$UserContact."','".$UserSubPost."','".$addby."','".$token."','".$verified."');";
            $a_run = mysqli_query($conn, $a_query);
            header('location:allman.php');
        }
        else{
            $error = "Enter Valide Contact Number";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add Manager</title>
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
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Add</li>
            <a href="shiftman.php"><li class="modany">Shift</li></a>
            <a href="leaveapprovman.php"><li class="modany">Leave approval</li></a>
            <a href="allman.php"><li class="modany">Managers</li></a>
            <a href="manattendance.php"><li class="modany">Manager Attendance</li></a>
        </div>
        <div class="module1">
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">Add Manager</li>
        </div>
        <center>
            <div class="adde">
                <form action="addman.php" method="POST" enctype="multipart/form-data">
                    <legend>Add Manager</legend>

                    <p style="color: red; font-size: 18px;;"><?php echo $error; ?></p>

                    <label class="lab_po">Manager Name :</label>
                    <input type="text" name="empname" class="add_emp_f" required autocomplete="off"><br>

                    <label class="lab_po">Manager email-id :</label>
                    <input type="email" name="empemailid" class="add_emp_f" required autocomplete="off"><br>

                    <lable class="lab_po">Password :</lable>
                    <input type="password" name="emppassword" class="add_emp_f" required autocomplete="off"><br>

                    <lable class="lab_po">Date of birth :</lable>
                    <input type="date" name="empbirthdate" class="add_emp_f" required autocomplete="off"><br>

                    <lable class="lab_po">Sex :</lable>
                    <select name="empsexselect"  class="add_emp_f">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br>

                    <lable class="lab_po">Manager Address :</lable>
                    <input type="text" name="empaddress" class="add_emp_f" required autocomplete="off"><br>

                    <lable class="lab_po">Manager contact-number :</lable>
                    <select name="cont" style="width: 10%; border: none; border-bottom: 1px solid blue; padding: 5px; margin-bottom:">
                        <option selected></option>
                    </select>
                    <input type="text" name="empcontact" minlength="10" maxlength="10" required style="width: 80%; border: none; border-bottom: 1px solid blue; padding: 5px; margin-bottom: 20px;" autocomplete="off"><br>

                    <lable class="lab_po">Select post :</lable>
                    <select name="emppostselect"  class="add_emp_f">
                            <option value="Manager">Manager</option>
                    </select><br>

                    <lable class="lab_po">Select Sub-post :</lable>
                    <select name="empsubpostselect" class="add_emp_f">
                        <option value="Graphics department">Graphics Department</option>
                    </select><br>

                    <input type="submit" class="btn1" value="Add">
                </form>
            </div>
        </center>
    </body>
</html>
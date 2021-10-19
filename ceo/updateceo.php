<?php
    include_once '../db.php';
    include '../forset.php';
    $error = "";
    if(isset($_POST['submit'])){
        if(strlen($_POST['empname']) != 0){
            $UserName = $_POST['empname'];
            $a_query = "UPDATE userss SET Name = '".$UserName."' WHERE Id = '".$_SESSION['dash_Id']."';";
            $a_run = mysqli_query($conn, $a_query);
            
            $ab1_query = "SELECT t_assign FROM TaskMana WHERE t_assign = '".$_SESSION['dash_Id']."';";
            $ab1_run = mysqli_query($conn, $ab1_query);
            $sell1_row = mysqli_fetch_array($ab1_run);
            if($sell1_row['t_assign'] == $_SESSION['dash_Id']){
                $sell1_query = "UPDATE TaskMana SET t_assignname = '".$UserName."' WHERE t_assign = '".$_SESSION['dash_Id']."';";
                $sell1_run = mysqli_query($conn, $sell1_query);
            }
            
            $ab2_query = "SELECT s_byid FROM shifttab WHERE s_byid = '".$_SESSION['dash_Id']."';";
            $ab2_run = mysqli_query($conn, $ab2_query);
            $sell2_row = mysqli_fetch_array($ab2_run);
            if($sell2_row['s_byid'] == $_SESSION['dash_Id']){
                $sell2_query = "UPDATE shifttab SET s_byname = '".$UserName."' WHERE s_byid = '".$_SESSION['dash_Id']."';";
                $sell2_run = mysqli_query($conn, $sell2_query);
            }

            $ab3_query = "SELECT l_approveid FROM leavetab WHERE l_approveid = '".$_SESSION['dash_Id']."';";
            $ab3_run = mysqli_query($conn, $ab3_query);
            $sell3_row = mysqli_fetch_array($ab3_run);
            if($sell3_row['l_approveid'] == $_SESSION['dash_Id']){
                $sell3_query = "UPDATE leavetab SET l_approvename = '".$UserName."' WHERE l_approveid = '".$_SESSION['dash_Id']."';";
                $sell3_run = mysqli_query($conn, $sell3_query);
            }
            $_SESSION['dash_Name'] = $UserName;
            header("location:C_dashboard.php");
        }
        if(strlen($_POST['empemailid']) != 0){
            $UserEmail = $_POST['empemailid'];
            $a1_query = "UPDATE userss SET Email = '".$UserEmail."' WHERE Id = '".$_SESSION['dash_Id']."';";
            $a1_run = mysqli_query($conn, $a1_query);
            $_SESSION['dash_Email'] = $UserEmail;
            header("location:C_dashboard.php");
        }
        if(strlen($_POST['empbirthdate']) != 0){
            $UserBirthDate = $_POST['empbirthdate'];
            $a2_query = "UPDATE userss SET BirthDate = '".$UserBirthDate."' WHERE Id = '".$_SESSION['dash_Id']."';";
            $a2_run = mysqli_query($conn, $a2_query);
            $_SESSION['dash_BirthDate'] = $UserBirthDate;
            header("location:C_dashboard.php");
        }
        if(strlen($_POST['empsexselect']) != 0){
            $UserSex = $_POST['empsexselect'];
            $a3_query = "UPDATE userss SET Sex = '".$UserSex."' WHERE Id = '".$_SESSION['dash_Id']."';";
            $a3_run = mysqli_query($conn, $a3_query);
            $_SESSION['dash_Sex'] = $UserSex;
            header("location:C_dashboard.php");
        }
        if(strlen($_POST['empaddress']) != 0){
            $UserAddress = $_POST['empaddress'];
            $a4_query = "UPDATE userss SET Address = '".$UserAddress."' WHERE Id = '".$_SESSION['dash_Id']."';";
            $a4_run = mysqli_query($conn, $a4_query);
            $_SESSION['dash_Address'] = $UserAddress;
            header("location:C_dashboard.php");
        }
        if(strlen($_POST['empcontact']) != 0){
            $UserContact = $_POST['empcontact'];
            if(is_numeric($UserContact)){
                $a5_query = "UPDATE userss SET Contact = '".$UserContact."' WHERE Id = '".$_SESSION['dash_Id']."';";
                $a5_run = mysqli_query($conn, $a5_query);
                $_SESSION['dash_Contact'] = $UserContact;
                header("location:C_dashboard.php");
            }
            else{
                $error = "Enter Valide Contact Number";
                header("location:updateceo.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Update Profile</title>
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
                    <li class="fbut" title="User Profile" style="background-color: #3366CC;">
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
        <center>
            <div class="adde">
                <form action="updateceo.php" method="POST">
                    <legend>Update Profile</legend>

                    <p style="color: red; font-size: 18px;;"><?php echo $error ?></p>

                    <label class="lab_po">Name :</label>
                    <input type="text" name="empname" placeholder="<?php echo $_SESSION['dash_Name'] ?>" class="add_emp_f" autocomplete="off"><br>

                    <label class="lab_po">Email-id :</label>
                    <input type="email" name="empemailid" placeholder="<?php echo $_SESSION['dash_Email'] ?>" class="add_emp_f" autocomplete="off"><br>

                    <lable class="lab_po">Date of birth :</lable>
                    <input type="date" name="empbirthdate" placeholder="<?php echo $_SESSION['dash_BirthDate'] ?>" class="add_emp_f" autocomplete="off"><br>

                    <lable class="lab_po">Sex :</lable>
                    <select name="empsexselect"  class="add_emp_f">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br>

                    <lable class="lab_po">Address :</lable>
                    <input type="text" name="empaddress" placeholder="<?php echo $_SESSION['dash_Address'] ?>" class="add_emp_f" autocomplete="off"><br>

                    <lable class="lab_po">Contact-number :</lable>
                    <select name="cont" style="width: 10%; border: none; border-bottom: 1px solid blue; padding: 5px; margin-bottom:">
                        <option selected></option>
                    </select>
                    <input type="text" name="empcontact" minlength="10" maxlength="10" placeholder="<?php echo $_SESSION['dash_Contact'] ?>" style="width: 80%; border: none; border-bottom: 1px solid blue; padding: 5px; margin-bottom: 20px;" autocomplete="off"><br>

                    <input type="submit" class="btn1" name="submit" value="Update">
                </form>
            </div>
        </center>
    </body>
</html>
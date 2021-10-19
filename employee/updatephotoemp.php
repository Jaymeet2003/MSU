<?php
    include_once '../db.php';
    include '../forset.php';
    if(isset($_POST['submit'])){
        if(isset($_FILES['image']['name'])){
            $target = "../image/New/".basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            $a7_query = "UPDATE userss SET image = '".$image."' WHERE Id = '".$_SESSION['dash_Id']."';";
            $a7_run = mysqli_query($conn, $a7_query);
            $_SESSION['dash_image'] = $image;
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                echo '<script>alert("Your Profile Image Successfully Uploaded")</script>';
                header("location:E_dashboard.php");
            }
            else{
                echo '<script>alert("Hear, Some error to Upload Your Profile Image. You will uploade Profile Image after")</script>';
                header("location:updatephotoemp.php");
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
        <title>Update Profile Picture</title>
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
                        <img src="../image/p1.png" alt="nobutton" class="fbutim">
                    </li>
                </a>
            </center>
            <center>
                <a href="E_dashboard.php">
                    <li class="fbut" style="background-color: #3366CC;" title="User Profile">
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
                <form action="updatephotoemp.php" method="POST" enctype="multipart/form-data">
                    <legend>Update Profile Picture</legend>

                    <lable class="lab_po">Select Profile-Photo :</lable>
                    <input type="file" name="image" class="add_emp_f"><br>

                    <input type="submit" class="btn1" name="submit" value="Update">
                </form>
            </div>
        </center>
    </body>
</html>
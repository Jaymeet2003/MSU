<?php
    include_once '../db.php';
    include '../forset.php';
    include '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CEO Dashboard</title>
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
                        <img src="../image/p1.png" alt="nobutton" class="fbutim">
                    </li>
                </a>
            </center>
            <center>
                <li class="fbut" style="background-color: #3366CC;" title="User Profile">
                    <img src="../image/p2.svg" alt="nobutton" class="fbutim">
                </li>
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
        <div class="yado">
            <div class="jaga">
            <center>
                    <?php
                        use Endroid\QrCode\QrCode;
                        $u = $_SESSION['dash_Email'];
                        $sql = "SELECT * FROM userss WHERE Email = '".$u."';";
                        $sql_run = mysqli_query($conn,$sql);
                        while($sql_row = mysqli_fetch_array($sql_run)){
                            $qr_id = $sql_row['Id'];
                            $qr_name = $sql_row['Name'];
                            $qr_email = $sql_row['Email'];
                            $qr_post = $sql_row['Post'];
                            $qr_address = $sql_row['Address'];
                            $qr_contact = $sql_row['Contact'];
                            $qr_subpost = $sql_row['Sub-Post'];
                            $qr_birthdate = $sql_row['BirthDate'];
                            $qr_sex = $sql_row['Sex'];
                        }
                        $qrcode = new QrCode("id=".$qr_id." username=".$qr_name." email=".$qr_email." post=".$qr_post." address=".$qr_address." contact=".$qr_contact." subpost=".$qr_subpost." birthdate=".$qr_birthdate." sex=".$qr_sex);
                        $qrcode->writeFile(__DIR__.'/qrcodes/'.$qr_id.'.png');
                    ?>
                    <img src="qrcodes/<?php echo $qr_id; ?>.png" alt='noimage' class='rang'>
                </center><br>
                <center>
                    <p class="jite"><?php echo $_SESSION['dash_Name'] ?></p>
                </center>
                <center>
                    <p class="chola">Id : <span><?php echo $_SESSION['dash_Id'] ?></span></p>
                </center>
            </div>
            <div class="masti">
                <center>
                    <table class="tdtail">
                        <tr class="tdtailrow">
                            <td class="tdetail1">Id</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_Id'] ?></td>
                        </tr>
                        <tr class="tdtailrow" style="background-color: #EEEEEE;">
                            <td class="tdetail1">Name</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_Name'] ?></td>
                        </tr>
                        <tr class="tdtailrow">
                            <td class="tdetail1">Email-Id</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_Email'] ?></td>
                        </tr>
                        <tr class="tdtailrow" style="background-color: #EEEEEE;">
                            <td class="tdetail1">Date Of Birth</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_BirthDate'] ?></td>
                        </tr>
                        <tr class="tdtailrow">
                            <td class="tdetail1">Sex</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_Sex'] ?></td>
                        </tr>
                        <tr class="tdtailrow" style="background-color: #EEEEEE;">
                            <td class="tdetail1">Address</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_Address'] ?></td>
                        </tr>
                        <tr class="tdtailrow">
                            <td class="tdetail1">Contact-Number</td>
                            <td class="tdetail1">:</td>
                            <td class="tdetail2"><?php echo $_SESSION['dash_Contact'] ?></td>
                        </tr>
                    </table>
                    <br>
                    <a href="updateceo.php" style=" margin-right : 110px; font-size : 20px; padding : 5px; background-color : #3423CA; border : none; color: white; font-weight : bolder;">Update</a>
                </center>
            </div>
        </div>
    </body>
</html>
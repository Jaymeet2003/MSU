<?php
   include '../forset.php';
   $abcd = $_SESSION['dash_Id'];
    $error="";

    function build_calendar($month,$year,$abcd){

            define('DB_HOST','localhost');
            define('DB_USER','root');
            define('DB_PASS','');
            define('DB_NAME','mytest');
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

    if ($conn->connect_error) {
        die("Database error:" . $conn->connect_error);
    }
                            $id = $abcd;
                            $sql = "SELECT dates FROM attendance WHERE id =?";
                            $read = $conn->prepare($sql);
                            $read->bind_param("i",$id);
                            $read->execute();
                            $result = $read->get_result();
                            if($result->num_rows === 0){
                                $error = "No data found";
                            }else{
                                while($row = $result->fetch_assoc()) {
                                    $present[] = date($row['dates']);
                                }
                                $read->close();
        
            //array of names days
            $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
            // first day of month
            $firstDayOfMonth =  mktime(0,0,0,$month,1,$year);
            // getting no of days in month
            $numberDays = date('t',$firstDayOfMonth);
            // information about first day of month
            $dateComponents = getdate($firstDayOfMonth);
            // getting name of this month
            $monthName = $dateComponents['month'];
            //getting value 0-6 of the first day of month
            $dayOfWeek = $dateComponents['wday'];
            //getting current date
            $dateToday = date('d-m-Y');


            //creating html table

            $calendar = "<table class='tab'>";
            $calendar .= "<center><h2>$monthName $year</h2>";
            
            $calendar .= "<tr class='ca'>";

            //creating calendar headers
            foreach($daysOfWeek as $day){
                $calendar .= "<th class='ca'>$day</th>";
            }

            $calendar .= "<tr class='ca'></tr>";

            //getting only 7 columns on our table
            if ($dayOfWeek > 0) {
                for ($k=0; $k < $dayOfWeek; $k++) { 
                    $calendar .= "<td class='ca'></td>";
                }
            }

            //initiating day counter
            $currentDay = 1;
            //getting month number
            $month = str_pad($month,2,"0",STR_PAD_LEFT);

            while ($currentDay <= $numberDays) {

                //if last column (saturday) reached, start a new row
                if ($dayOfWeek == 7) {
                    $dayOfWeek = 0;
                    $calendar .= "</tr><tr class='ca'>";
                }
                $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
                $date = "$currentDayRel-$month-$year";

                $dayname = strtolower(date('l',strtotime($date)));
                $eventNum = 0;
                if ($dateToday == $date) {
                    $calendar .= "<td style='background-color:#3366CC; color:#fff;' class='ca'rel='$date'><h4>$currentDay</h4>";
                }else{
                    foreach($present as $pres){
                        if ($date === $pres) {
                            $calendar .= "<td style='background-color:#00ff00; color:#fff;' class='ca'rel='$date'><h4>$currentDay</h4>";
                            $currentDay++;
                            $dayOfWeek++;
                        }
                    }
                    
                    if($date > $dateToday){
                        $calendar .= "<td class='ca'rel='$date'><h4>$currentDay</h4>";
                    }else{
                        $calendar .= "<td style='background-color:#ff0000; color:#fff;' class='ca'rel='$date'><h4>$currentDay</h4>";
                    }
                }
                $calendar .= "</td>";

                //incrementing counters
                $currentDay++;
                $dayOfWeek++;
            }

            //completing row of last week in month
            if ($dayOfWeek != 7) {
                $remainingDays = 7-$dayOfWeek;
                for ($i=0; $i < $remainingDays; $i++) { 
                    $calendar .= "<td class='ca'></td>";
                }
            }

            $calendar .= "</tr>";
            $calendar .= "</table>";

            
            echo $calendar;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Shift</title>
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
                <a href="E_dashboard.php">
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
            <a href="shiftemp.php"><li class="modany">Shift</li></a>
            <a href="leaveformemp.php"><li class="modany">Leave Form</li></a>
            <a href="leaveview.php"><li class="modany">My Leave</li></a>
            <li class="modany" style="background-color: #EEEEEE; color: #3423CA;">Attendance</li>
        </div>
        <div class="module1">
            <li class="modany1" style="font-weight : bolder; color : blue; border-bottom : 1px solid blue">My Attendance</li>
        </div>
        <center>
            <div class="atten4">
                <ul type="none">
                    <li>&nbsp;Current Date</li>
                </ul>
                <ol type="lowerroman"><?php echo $error; ?></ol>
                <?php 
                        $dateComponents = getdate();
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                        echo build_calendar($month,$year,$abcd);
                ?>
            </div>
        </center>
    </body>
</html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php
session_start();
if (!isset($_SESSION['user'])) {
    // header("Location: login.php");
}
elseif(time()-$_SESSION['login_time']>6000) {
    session_unset();
    session_destroy();
    // header("Location: login.php");
}
require_once("tools/head.php");
$timed = "";
$match = 0;
$error = "";
$check = true;
$IDerror = "";
$Reasonerror= "";
$Dateerror = "";
$timeerror ="";
// $_POST['ID'] = "";
$f2 = substr($_POST['ID'], 0,2);
$l1 =substr($_POST['ID'],-1);
$mI = substr($_POST['ID'],2, -1);
$newd ='';
// $num = parse$mod(mI);
$digit = "";
$ext ="";
$number ="";
$pid ="";
$dateid = "";
$reasonid = "";
$shift ="";
$time = "";
$retainPID = "";
$retainDate = "";
$retainRea = "";
function getOrdinal($number){
    // get first digit
    $digit = abs($number) % 10;
    $ext = 'th';
   $ext = ((abs($number) %100 < 21 && abs($number) %100 > 4) ? 'th' : (($digit < 4) ? ($digit < 3) ? ($digit < 2) ? ($digit < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
    return "<sup>$ext</sup>";
   }
if(count($_POST)>0)
    {
        if (empty($_POST['ID'])){
            $IDerror = "Please input Paitent ID provided";
        }
        if (empty($_POST['datepick'])){
            $Dateerror = "Please input date";
        }
        if(empty($_POST['reason'])){
            $Reasonerror = "Please input the type of test";
        }
        if(empty($_POST['time'])){
            $timeerror = "Please select a time";
        }
        $retainDate = $_POST['datepick'];
        $retainPID = $_POST['ID'];
        $retainRea = $_POST['reason'];

        if(empty($_POST['ID'])||empty($_POST['datepick'])||empty($_POST['reason'])||empty($_POST['time']))
        {
            $error="All the input fields are mandatory!";
        }
        else 
        {
            if(!preg_match("/^[a-zA-Z, ]*$/",$_POST['ID'])) {
                // $nameError="Only letters and spaces are allowed!";
                $check=false;
        } if(!(preg_match("/^[a-zA-Z]+$/", $f2))||!(preg_match( "/^[a-zA-Z]+$/",$l1))||((preg_match("/^[0-9]+$/", $mI))==null)){
            $IDerror = "invalid id";
            $check =false;
        }
        if((preg_match("/^[a-zA-Z]+$/", $f2))&&(preg_match( "/^[a-zA-Z]+$/",$l1))&&((preg_match("/^[0-9]+$/", $mI)) != null)){
            
            $sum = 0;
            $value = $mI;
            // $error = $value;
            while($value){
                $sum += $value%10;
                $value = floor($value/10);
            }
            // $error = $sum;
            $mod = $sum%26;
            
    // number_to_alpha($mod);
            $l1 = strtoupper($l1);
            $alpha = "";
            


            if($mod==0){$alpha  = "Z";}
            if($mod==1){$alpha  = "A";}
            if($mod==2){$alpha  = "B";}
            if($mod==3){$alpha  = "C";}
            if($mod==4){$alpha  = "D";}
            if($mod==5){$alpha  = "E";}
            if($mod==6){$alpha  = "F";}
            if($mod==7){$alpha  = "G";}
            if($mod==8){$alpha  = "H";}
            if($mod==9){$alpha  = "I";}
            if($mod==10){$alpha  = "J";}
            if($mod==11){$alpha  = "K";}
            if($mod==12){$alpha  = "L";}
            if($mod==13){$alpha  = "M";}
            if($mod==14){$alpha  = "N";}
            if($mod==15){$alpha  = "O";}
            if($mod==16){$alpha  = "P";}
            if($mod==17){$alpha  = "Q";}
            if($mod==18){$alpha  = "R";}
            if($mod==19){$alpha  = "S";}
            if($mod==20){$alpha  = "T";}
            if($mod==21){$alpha  = "U";}
            if($mod==22){$alpha  = "V";}
            if($mod==23){$alpha  = "W";}
            if($mod==24){$alpha  = "X";}
            if($mod==25){$alpha  = "Y";}




            if($alpha==$l1){
                $match = 1;
                // $error = "Match is 1";

            }
            else{
                $match = 0;
            }
            if ($match == 1){
            $error="<p style= 'color: green; background-color: black; width: 30%;'>Your form has been successfully submitted! Click here to go back to <a href='index.php'> homepage!</a></p>";
            $filename="appointments.txt";
            $fp=fopen($filename, "a");
            flock($fp, LOCK_EX);
            // fwrite($fp, "Paitent ID: ".strtoupper($_POST['ID'])."\n");
            $pid = strtoupper($_POST['ID']);
            $newd=strtotime($_POST['datepick']);
            $dayn = date("l", $newd).", ";
            $day = date("j", $newd);
            $monthv = date("m", $newd);
            $monthn = date("F", mktime(0, 0, $monthv, 10));
            // fwrite($fp, "Date: ".$dayn.", ".$day.getOrdinal($day)." ".$monthn." ".date("Y", $newd)."\n");
            $dateid =$dayn.$day.getOrdinal($day)." ".$monthn." ".date("Y", $newd);
            // fwrite($fp, "Date: ".$dayn.', '.$day.'th '.$monthn.' '.date("Y", $newd)"."\n");
            // $dayn."".$day."th".$monthn."".$date("Y",$newd).
            // fwrite($fp, "Reason: ".$_POST['reason']."\n");
            $reasonid = $_POST['reason'];
            $shift = $_POST['time'];
            foreach($shift as $key=>$values){
                $time = $time.$values." ";
            }
            $timed = date('d-m-y h:i:s');
            $datacsv = array("$pid,$dateid,$time,$reasonid,$timed");
            
            foreach ($datacsv as $line)
                {
                    fputcsv($fp, explode(',',$line));
                }
            flock($fp, LOCK_UN);
            fclose($fp);
            }
            else{
                $error = "paitent id wrong";
            }
        
        
        }

        
    }
}
?>
<body>
    <?php
    require_once("tools/navbar.php")
    ?>
    <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="bookingpage.php" class="nav-item nav-link active">Booking Page</a>
            </div>
            <div class="navbar-nav ml-auto">
                <!-- <a href="registrationpage.php" class="nav-item nav-link">Register</a> -->
                <a href="administration.php" class="nav-item nav-link"> Admin Login</a>
            </div>
        </div>
    </div>
</nav>
    <div id="container-1">
    <main>
    <form method="post" action="bookingpage.php">
        <H1 style = "color: blue">Booking form</H1>
        <?php echo "<p style = 'color: red; background-color: black; width: 20%;'>$error</p>"; ?>
        <p>Paitent ID: <input type="text" id="firstn" name = "ID" value = "<?php echo $retainPID?>" placeholder="For example: HD1A" style = "text-transform: uppercase" required onfocusout="handleId()"><span id="error" style = 'color: red; background-color: black; width: 30%;'><?php echo "<p style = 'color: red; background-color: black; width: 30%;'>$IDerror</p>"?></span></p>
        <p>Date: <input type="date" name="datepick" value = "<?php echo $retainDate?>" min = "<?= date('Y-m-d') ?>" required><span><?php echo "<p style = 'color: red; background-color: black; width: 30%;'>$Dateerror</p>"?></span> </p>
        <p>Time: Select your available time from the checkbox</p>
        <p id="Alert"><?php echo "<p style = 'color: red; background-color: black; width: 30%;'>$timeerror</p>"?></p>
        <ul id = "pill">
            <li class="blue">
                <input type="checkbox" id="first" name="time[]" class="hidden" value ="Morning" <?php if (in_array("Morning", $_POST['time'])) echo "checked='checked'"; ?>>
                <label for="first">9am-12pm</label>
            </li>
            <li class="yellow">
                <input type="checkbox" id="second" name="time[]" class="hidden" value = "Afternoon" <?php if (in_array("Afternoon", $_POST['time'])) echo "checked='checked'"; ?>>
                <label for="second">12pm-3pm</label>
            </li>
            <li class="blue">
                <input type="checkbox" id="third" name="time[]" class="hidden" value ="Late Afternoon" <?php if (in_array("Late Afternoon", $_POST['time'])) echo "checked='checked'"; ?>>
                <label for="third">3pm-6pm</label>
            </li>
        </ul>
        <p>Reason: <select name="reason" id="reason" required>
            <option <?php if (isset($_POST['reason']) && $_POST['reason']=="") echo "selected";?> value=""> Please select a option </option>
            <option <?php if (isset($_POST['reason']) && $_POST['reason']=="Childhood Vaccination Shots") echo "selected";?> value="Childhood Vaccination Shots">Childhood Vaccination Shots</option>
            <option <?php if (isset($_POST['reason']) && $_POST['reason']=="Influenza Shot") echo "selected";?> value="Influenza Shot">Influenza Shot</option>
            <option <?php if (isset($_POST['reason']) && $_POST['reason']=="Covid Booster Shot") echo "selected";?> value="Covid Booster Shot">Covid Booster Shot</option>
            <option <?php if (isset($_POST['reason']) && $_POST['reason']=="Blood Test") echo "selected";?> value="Blood Test">Blood Test</option>
          </select><span><?php echo "<p style = 'color: red; background-color: black; width: 20%;'>$Reasonerror</p>"?></span>
        </p>
        <h3 id = "Advice_h">Select a reason for booking first</h3>
        <p id="advice">
        </p>
        <p>
            <input type="submit" name="submit" >
            <input type="reset" name="reset">
            <p><button formnovalidate>Submit without validation</button></p>
        </p>
        </form>
    </main>
    </div>
    <hr>
        <?php
        require_once("tools/footer.php")
        ?>
</body>
</html>
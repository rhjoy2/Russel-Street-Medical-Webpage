<?php
session_start();
// if (isset($_SESSION['user']['username'])) {header("Location: admin.php");}
$error="";
$unsucc = "";
$timex = "";
$nuser = "";
$npass = "";
$error = "";
$noval = "No value";
$checku = 1;
$retainLogin = "";
$retainPass = "";
$retainCPass = "";
$Newerror = "";
if (count($_POST)>0)
{
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("Location: administration.php");
        exit(); 
    }
    
  if(isset($_POST['username'])){
    $retainLogin = $_POST['username'];
    $retainPass = $_POST['password'];
    $data=fopen("users.txt", "r");
    $data_arr1 = [];
    while(($datax =fgetcsv($data,","))!== FALSE){
        $data_arr1[] = $datax;
    }
    foreach($data_arr1 as $line)
    {
        // $parts=explode(",",$line);
        // $parts = fgetcsv($data);
        if($_POST['username']==$line[0]&&$_POST['password']==$line[1])
        {
            $_SESSION['user']['username']=$_POST['username'];
            $_SESSION['login_time']=time();
            header("Location: administration.php");
            exit;
        }
    }
    fclose($data);
    $timex = "Time of attempt: ".date('d-m-y h:i:s');
    $error="Your password or username is incorrect or invalid!";
    $filename = "accessattempts.txt";
    $fp = fopen($filename, "a");
    flock($fp, LOCK_EX);
    $unsucc = "Username used ".$_POST['username'];
    $datatxt = array("$unsucc, $timex");
    foreach($datatxt as $rec){
      fputcsv($fp, explode(',', $rec));
    }
    flock($fp, LOCK_UN);
    fclose($fp);}



    {
        if(isset($_POST['ausername'])){
            $retainCPass = $_POST['cpassword'];
            $retainPass = $_POST['apassword'];
            $retainLogin = $_POST['ausername'];
        }
        if((!empty($_POST['ausername']))&&(!empty($_POST['apassword'])) &&(!empty($_POST['cpassword']))){
      if(isset($_POST['ausername'])){
       
      $nuser = $_POST['ausername'];
      $npass = $_POST['apassword'];
      $admin = array("$nuser,$npass,");
      $filename1="users.txt";
      $data1 = file("users.txt");
      $fp1=fopen($filename1, "a");
      $fg = fopen($filename1,"r");
      $data_arr2 = [];
      while(($datay = fgetcsv($fg,","))!==FALSE){
        $data_arr2[] = $datay;
      }
      
      flock($fp1, LOCK_EX);
      foreach ($data_arr2 as $line1)
          {
            //   $parts=explode(",",$line1);
              if($_POST['ausername']==$line1[0])
              {
                  $error = $_POST['ausername']." already exists";
                  $checku = $checku + 1;
              }
          }
      if ($checku == 1){ 
        if($_POST['apassword'] == $_POST['cpassword']){   
          foreach($admin as $users){
              fputcsv($fp1, explode(',',$users));
            }
            $error = "<p style= 'color: green; background-color: black; width: 30%;'>Admin: ".$_POST['ausername']." is added</p>";
            }
            else{
                $error = "Passwords didnt match";
            }
            
            }
          
      flock($fp1, LOCK_UN);
      fclose($fp1);
          }}
          else{
            $Newerror = "All fields are mandatory to create an admin";
          }
  }



}
$filename2 = "appointments.txt";
$fp2 =fopen($filename2, "r");
$data2 = fgetcsv($fp2,",");
$data_arr = [];
while(($data2 =fgetcsv($fp2,","))!== FALSE){
    $data_arr[] = $data2;
}
fclose($fp2);
require_once("tools/head.php");
?>


<body onload="init()">

    <?php
    require_once("tools/navbar.php")
    ?>
    <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="bookingpage.php" class="nav-item nav-link">Booking Page</a>
            </div>
            <div class="navbar-nav ml-auto">
                <!-- <a href="registrationpage.php" class="nav-item nav-link">Register</a> -->
                <a href="administration.php" class="nav-item nav-link active"> Admin Login</a>
            </div>
        </div>
    </div>
</nav>
  <main>
    <?php
    if (!isset($_SESSION['user']['username'])){
    ?>
    <form method="post" action="administration.php" style = "height: 55vh; font-size: large">
      <h1 style =  "color: yellow"> ADMIN LOGIN </h1>
      <p>Username: <input id="username" name="username" value="<?php echo $retainLogin?>" type="text" required></p>
      <p>Password: <input id="password" name="password" value="<?php echo $retainPass?>" type="password" required></p>
      <p>Remember Me: <input id="rem" type="checkbox" onchange="remember()"><span id="error"></span></p>
      <p><input name="submit" type="submit" value="Login"> </p>
      
                <!-- <p><a href="register.php">Register a new user</a></p> -->
      </form>

    <?php echo "<p style = 'color: red; background-color: black; width: 20%;'>$error</p>";}
    elseif (isset($_SESSION['user']['username'])) {?>
    <h2> Welcome
        <?php
        echo $_SESSION['user']['username'];
        ?>
    </h2>
    <p>
        <?php
        echo "<p style = 'color: red; background-color: black; width: 20%;'>$error</p>";
        echo "<p style = 'color: red; background-color: black; width: 20%;'>$Newerror</p>";
        ?>
    </p>
    <!-- <a href="logout.php">Logout</a> -->
    <form method = "post" style = "height: 10px; width: 10px; padding: 0; margin: 0;">
    <input type = "submit" value = "Logout" name = "logout">
    </form>
    <section>
    <form method="post" action="administration.php" style = "margin-top: 4%">
    <h1>Add an admin</h1>
      <p>Username: <input id="username" name="ausername" value="<?php echo $retainLogin?>" type="text" required></p>
      <p>Password: <input id="password" name="apassword" value="<?php echo $retainPass?>" type="password" required></p>
      <p>Confirm Password: <input id ="password" name = "cpassword" value ="<?php echo $retainCPass?>" type = "password" required></p>
      <p>Remember Me: <input id="rem1" type="checkbox" onchange="remember()"><span id="error"></span></p>
      <p><input name="submit" type="submit" value="Register"> </p>
                <!-- <p><a href="register.php">Register a new user</a></p> -->
      </form>
      <section id = "appoint" >
    <h1>Appointments</h1>
    <table border = "1" style = "margin = 2%; color: lightgrey; background: rgba(0, 0, 0, 0.5); 
    color: #f1f1f1;" >
        <thead>
            <th>Paitent ID</th><th>Date</th><th>Time</th><th>Reason</th>
        </thead>
        <tbody>
            <?php
            foreach($data_arr as  $rec){
            ?>
            <tr>
                <td>
                    <?=$rec[0]?>
                </td>
                <td>
                    <?=$rec[1].",".$rec[2]?>
                </td>
                <td>
                    <?=$rec[3]?>
                </td>
                <td>
                    <?=$rec[4]?>
                </td>
            </tr>
            
            <?php
            }
            ?>
        </tbody>

    </table>
  </section>

    <?php
    }
    ?>
  </main>
<?php

require_once("tools/footer.php")
?>
</body>
</html>
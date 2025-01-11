<?php
 session_start();
 include("connect.php");

 $userprofile= $_SESSION['email'];
 $email_error=null;
$success=null;
if($userprofile==$_SESSION['email']){
 $sql="select * from registration where ( email='$userprofile');";
 $res=mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($res);
if($_SERVER['REQUEST_METHOD'] =="POST"){
 $firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password =  $_POST['password'];
$number = $_POST['number'];
$country = $_POST['country'];
$age = $_POST['age'];

$sql1="select * from registration where ( email='$email');";

$res1=mysqli_query($conn,$sql1);
 
  
if (mysqli_num_rows($res1) > 0) {
  
  $row1 = mysqli_fetch_assoc($res1);
 if($email==$userprofile){
    $stmt = $conn->prepare("UPDATE registration SET firstname='$firstname' ,lastname='$lastname',age='$age',country='$country', number='$number', password='$password',email='$email' where email='$userprofile'");
    $stmt->execute();
      header("refresh: 1");
  $success="ACCOUNT UPDATED SUCCESSFULLY";

    $stmt->close();
    $conn->close();
  }
 else
  {
    $email_error = " EMAIL  ALREADY EXISTS";
  }
}
else{

$stmt = $conn->prepare("UPDATE registration SET firstname='$firstname' ,lastname='$lastname',age='$age',country='$country', number='$number', password='$password',email='$email' where email='$userprofile'");
    $stmt->execute();
    header('location:HTML.php');
    $stmt->close();
    $conn->close();
}
}

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

    <!-- ===== ===== Custom Css ===== ===== -->
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="responsive.css">

    <!-- ===== ===== Remix Font Icons Cdn ===== ===== -->
    <link rel="stylesheet" href="fonts/remixicon.css">
</head>

<body>
    <!-- ===== ===== Body Main-Background ===== ===== -->
    <span class="main_bg"></span>


    <!-- ===== ===== Main-Container ===== ===== -->
    <div class="container">

        <!-- ===== ===== Header/Navbar ===== ===== -->
        <header>
            <div class="brandLogo">
                <figure></figure>
                <button type="button" onclick="window.location.href = 'HTML.php';" >LOGOUT</button>
                <div class="topnav" id="myTopnav">
  <a href="ACCOUNT.php" >HOME</a>
  <a href="new.php">GAMES</a>
    <i class="fa fa-bars"></i>
  </a>
</div>
            </div>
        </header>


        <!-- ===== ===== User Main-Profile ===== ===== -->
        <section class="userProfile card">
            <div class="profile">
                <figure><img src="360_F_502267101_xcND2i83T8efA2U1wFl1CqCcyKgU89eR.jpg" alt="profile" width="500px" height="250px" ></figure>
            </div>
        </section>


       <!-- ===== ===== Work & Skills Section ===== ===== -->
       <section class="work_skills card">

<!-- ===== ===== Work Contaienr ===== ===== -->
<div class="work">
    
    <h1 class="heading">Contact Us</h1>
    <div class="primary">
        <h1>Mountij/ALALI</h1>
        <a href="contactus.php"> <span>CONTACT</span><br></a>
        <p>mountijamine2@gmail.com <br>shepardenterprises0@gmail.com</p>
    </div>


    <div class="secondary">
        <h1>Casablanca<br> </h1>
       <a href=""> <span>LOCATION</span><br></a>
        <p>Maarif<br>  237 Bd Mohamed zerktouni</p>
    </div>
</div>

<!-- ===== ===== Skills Contaienr ===== ===== -->
<div class="skills">
    <h1 class="heading">TRAFFIC</h1>
    <ul>
        <li style="--i:0">Facebook</li>
        <li style="--i:1">YOUTUBE</li>
        <li style="--i:2">INSTAGRAM</li>
        
    </ul>
</div>
</section>


        <!-- ===== ===== User Details Sections ===== ===== -->
        <section class="userDetails card">
            <div class="userName">
                <h1 class="name"><?php echo $row['firstname'];?><br><?php echo $row['lastname'];?>
                </h1>
                <div class="map">
                    <i class="ri-map-pin-fill ri"></i>
                    <span> <?php  echo $row['country'];?></span>
                </div>
                <p>---------------</p>
            </div>

            <div class="rank">
                <h1 class="heading">Age</h1>
                <span><?php echo $row['age'];?></span>
                
            </div>
            <div class="error email-error">
        <p id ="info-message">
        <?php echo $email_error; ?>
        <?php echo $success; ?>
   </p>
</div>
            <br>

            <div class="btns">
                <ul>
                     <li class="sendMsg">
                        <a href="ACCOUNT.php">Welcome</a>
                    </li>

                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="sendMsg">
                        <i class="ri-chat-4-fill ri"></i>
                        <a href="profile.php">Info</a>
                    
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="settings.php">Settings</a>
                     
                    </li>
                   
                  
                </ul>
            </div>
        </section>


        <!-- ===== ===== Timeline & About Sections ===== ===== -->
        <section class="timeline_about card">
            <div class="tabs">
                <ul>
                   <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        <span >WELCOME</span>
                    </li>
                    
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        <span >INFO</span>
                    </li>
                     <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>

                    <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>SETTINGS</span>
                    </li>
                </ul>
            </div>

           
            <section>
        <div class="register-box">
     <form  method="POST">
    <h2>CHANGE INFO</h2>
  <br>
    
    <div class="input-box">
        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
        <input type="First NAME" required name="firstname" autocomplete="off">
        <label>First Name</label>
    </div>
    <br>
    <div class="input-box">
        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
        <input type="Last NAME" required autocomplete="off" name="lastname">
        <label>Last Name</label>
    </div>
    <br>

    <div class="input-box">
    <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
    <input type="email" required autocomplete="off" name="email">
    <label>Email</label> 
</div>
<br>

        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="Password"  required  name="password">
            <label>Password</label>
        </div>
        <br>
        
        <div class="input-box">
            <span class="icon"><ion-icon name="call"></ion-icon></span>
            <input type=" phone number"  required autocomplete="off" name="number">
            <label> Phone </label>
        </div>
        <br>
        <div class="input-box">
            <span class="icon"><ion-icon name="flag"></ion-icon></span>
            <input type="country"  required autocomplete="off" name="country">
            <label> Country</label>
        </div>
        <br>
        <div class="input-box">
            <span class="icon"><ion-icon name="accessibility"></ion-icon></span>
            <input type="age"  required  autocomplete="off" name="age">
            <label> Age</label>
        </div>
        <br>
        <button  type="submit"  name="submit"  value="<?php echo $email; ?>"> <a href="HTML.php"></a> CONFIRM</button>
        
        <br>

    
</div>
        
        </form>
        </div>
        </section>
                
        </section>
    </div>
<script> setTimeout(function(){
    document.getElementById('info-message').style.display = 'none';
   
  }, 7000);</script>
    <script>
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    
      </script>
      </script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     
</body>

</html>
   























      
</body>

</html>
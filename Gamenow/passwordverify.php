<?php

   $verify_error = null;
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){
       $email=$_POST['email'];
      $number = $_POST['number'];
    $country = $_POST['country'];
    $sql="select * from registration where ( email='$email');";
   $sql1="select * from registration where ( number='$number' && email='$email');";
    $sql2="select * from registration where ( country='$country' && email='$email' );";
   
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
$res2=mysqli_query($conn,$sql2);

if (mysqli_num_rows($res) > 0 && mysqli_num_rows($res1) > 0 && mysqli_num_rows($res2) > 0  ) {
  
  $row = mysqli_fetch_assoc($res);
  $row1 = mysqli_fetch_assoc($res1);
  $row2 = mysqli_fetch_assoc($res2);

  if(     $email == isset($row['email'] )   &&  $number == isset($row1['number'] ) && $country == isset($row2['country'] ))    
  {
    $_SESSION['email'] =$email;
    set_time_limit(1);
    header('location:password reset.php');
    
  }
  }
else{
    $verify_error = "WRONG INFORMATION";
}

 }

?>














<!DOCTYPE html>
<html lang="en">
<head>
<script language ="javascript" type="text/javascript">
    window.history.forward();
    
  </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="passwordverify.css">
    
    <title>PASSWORD RESET</title>
</head>
<body>
    <section>
    <div class="login-box">
 <form  method="POST">
    <br>
<h2>FORGOT <br> PASSWORD ?</h2>


<h4>Please Enter The Correct Answers Below</h4>


<div class="input-box">
    <span class="icon"><ion-icon name="mail"></ion-icon></span>
    <input type="email" required  autocomplete="off"  name="email">
    <label for="email"> EMAIL</label>
</div>

<div class="input-box">
    <span class="icon"><ion-icon name="call"></ion-icon></span>
    <input type="text" required  autocomplete="off"  name="number">
    <label for="text"> PHONE NUMBER </label>

</div>
<div class="input-box">
    <span class="icon"><ion-icon name="flag"></ion-icon></span>
    <input type="text" required  autocomplete="off"  name="country">
    <label for="text"> COUNTRY</label>

</div>
<br>
<div class="remember-forgot">
    
    <a href="forotpassword.php">Wrong Lastname ?</a>
</div>
<br>

<button type="submit" value="<?php echo $lastname; ?>" >Continue</button>
<br><br>
<div class="error verify-error">
        <p id ="info-message">
        <?php echo $verify_error; ?>
   </p>
</div>
<br>
    

 </form>
    </div>
</section>
<script>
  setTimeout(function(){
    document.getElementById('info-message').style.display = 'none';
   
  }, 5000);
  
  $(".info-message").fadeOut("slow");
</script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};

  </script>
  

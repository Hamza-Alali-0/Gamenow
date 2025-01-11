<?php
     $succes=null;
   $verify_error = null;
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){
       $email=$_POST['email'];
       $password=$_POST['password'];
    $sql="select * from registration where ( email='$email');";

$res=mysqli_query($conn,$sql);

$name=$_SESSION['email'];
if (mysqli_num_rows($res) > 0  ) {
  
  $row = mysqli_fetch_assoc($res);
  

  if(  $email == isset($row['email'])  && $email == $name )    
  {
    set_time_limit(1);

   
    $stmt = $conn->prepare("UPDATE registration SET password='$password' where email='$email'");
    $stmt->execute();
    header('location:END.php');
    $stmt->close();
    $conn->close();
    
   
  }
  else{ $verify_error = "WRONG INFORMATION";}
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
    <link rel="stylesheet" href="PASSWORDRESET.css">
    
    <title>FORGOT PASSWORD</title>
</head>
<body>
    <section>
    <div class="login-box">
 <form  method="POST">
    <br>
<h2>PASSWORD<br> RESET</h2>
<br>



<div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email"  required  autocomplete="off" name="email">
            <label> CONFIRM EMAIL</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="Password"  required  name="password">
            <label> NEW PASSWORD</label>
        </div>

<br>
<br>
<button type="submit" value="<?php echo $email; ?>" >Confirm</button>


<br>
<br>

<div class="error verify-error">
        <p id ="info-message">
        <?php echo $verify_error; ?>
        <?php echo $succes; ?>
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
  

<?php
  
   $username_error = null;
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){
    $email=$_POST['email'];
$password=$_POST['password'];
if(!empty($email) && !empty($password) && !is_numeric($email) ){

$query = "select*from registration where email = '$email' limit 1";
$result= mysqli_query($conn,$query);
if($result){
if($result && mysqli_num_rows($result) >0 ){
    $user_data= mysqli_fetch_assoc($result);
    if($user_data['password'] == $password)
    {   
        $_SESSION['email'] =$email;
    header('location:Account.php');
        die;
    }
}


}


$username_error = "  WRONG EMAIL OR PASSWORD";

}
else {
    $username_error = "   WRONG EMAIL OR PASSWORD";
 
}
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
<script language ="javascript" type="text/javascript">
    window.history.forward();
    
  </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>LOGIN</title>
</head>
<body>
    <section>
    <div class="login-box">
 <form  method="POST">
    <br>
<h2>LOGIN</h2>


<div class="input-box">
    <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
    <input type="email" required  autocomplete="off"  name="email">
    <label for="email">EMAIL</label>
</div>

<div class="input-box">
    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
    <input type="PASSWORD" required autocomplete="off" name="password">
    <label>PASSWORD</label>
</div>
<br>
<div class="remember-forgot">
    <label ><input type="checkbox">Rememember ME</label>
    <a href="forotpassword.php">Forgot Password ?</a>
</div>
<br>
<button type="submit" >Login</button>

<div class="register-link">
    <p>Don't have an account ? <a href="REGISTER.php">SIGNIN</a></p>
</div>
<br>
<br>
      
    <div class="error username-error" >
<p id ="info-message">  
<?php  echo $username_error; ?>
   </p>
    
</div> 
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
  


</body>
</html>
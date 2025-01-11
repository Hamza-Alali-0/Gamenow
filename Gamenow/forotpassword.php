<?php
   $lastname_error = null;
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){
    $lastname = $_POST['lastname'];
    $sql="select * from registration where ( lastname='$lastname');";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($lastname == isset($row['lastname']))
  {
    set_time_limit(1);
    header('location:passwordverify.php');
    
  }
  
}else{
    $lastname_error = "LASTNAME DOESN'T EXIST";
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
    <link rel="stylesheet" href="forotpassword.css">
    
    <title>FORGOT PASSWORD</title>
</head>
<body>
    <section>
    <div class="login-box">
 <form  method="POST">
    <br>
<h2>FORGOT <br> PASSWORD ?</h2>
<br>



<div class="input-box">
    <span class="icon"><ion-icon name="person"></ion-icon></span>
    <input type="text" required  autocomplete="off"  name="lastname">
    <label for="text"> ENTER LASTNAME</label>
</div>

<br>
<button type="submit" value="<?php echo $lastname; ?>" >Continue</button>

<div class="register-link">
    <br>
    <p>Don't have an Account ? <a href="REGISTER.php">SIGNIN</a></p>
</div>
<br>
<br>

       <div class="error EMAIL-error" >
        <p id ="info-message">
        <?php echo  $lastname_error; ?>
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
  

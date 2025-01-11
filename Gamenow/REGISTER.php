<?php
$email_error = null;
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){

 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password =  $_POST['password'];
$number = $_POST['number'];
$country = $_POST['country'];
$age = $_POST['age'];
$conn = new mysqli("localhost","root","","database1");
if($conn->connect_error){
    die('connection Failed : '.$conn->connect_error);
}else{
    
$sql="select * from registration where ( email='$email');";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($email==isset($row['email']))
  {
    $email_error = " EMAIL  ALREADY EXISTS";
  }
}else{

  
    $stmt = $conn->prepare("insert into REGISTRATION(firstname,lastname,email,password,number,country,age) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssisi",$firstname, $lastname, $email, $password, $number, $country, $age);
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
    <link rel="stylesheet" href="REGISTER.css">
    
    <title> SIGNUP</title>
    
   

</head>
<body>
    <section>
        <div class="register-box">
     <form  method="POST">
    <h2>SIGNUP</h2>
    
    
    <div class="input-box">
        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
        <input type="First NAME" required name="firstname" autocomplete="off">
        <label>First Name</label>
    </div>
    <div class="input-box">
        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
        <input type="Last NAME" required autocomplete="off" name="lastname">
        <label>Last Name</label>
    </div>

    <div class="input-box">
    <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
    <input type="email" required autocomplete="off" name="email">
    <label>Email</label> 
</div>

        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="Password"  required  name="password">
            <label>Password</label>
        </div>
        
        <div class="input-box">
            <span class="icon"><ion-icon name="call"></ion-icon></span>
            <input type=" phone number"  required autocomplete="off" name="number">
            <label> Phone number</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="flag"></ion-icon></span>
            <input type="country"  required autocomplete="off" name="country">
            <label> Country</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="accessibility"></ion-icon></span>
            <input type="age"  required  autocomplete="off" name="age">
            <label> Age</label>
        </div>
        
        <button  type="submit"  name="submit"  value="<?php echo $email; ?>"> <a href="HTML.php"></a> SIGNIN</button>
        <div class="register-link">
            <p>Already SIGNED IN ?  <a href="HTML.php">LOGIN</a></p>
        </div>
        <br>

       <div class="error email-error">
        <p id ="info-message">
        <?php echo $email_error; ?>
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

</body>
</html>
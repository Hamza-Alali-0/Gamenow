
<?php
$email_error = null;
$FORM_error =NULL;
$username_error=null;
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){

 
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$conn = new mysqli("localhost","root","","database1");
if($conn->connect_error){
    die('connection Failed : '.$conn->connect_error);
}else{
  if(!empty($firstname) && !empty($email) && !is_numeric($email)  &&!empty($subject) && !empty($message)){

    $query = "select*from registration where email = '$email' ";
    $result= mysqli_query($conn,$query);
    
    if( mysqli_num_rows($result) >0 ){
        $user_data= mysqli_fetch_assoc($result);
        if(  $email == $user_data['email']  &&  $email == $_SESSION['email'] && $firstname == $user_data['firstname'] )
        {   
         $stmt = $conn->prepare("insert into contact(firstname,email,subject,message) values(?,?,?,?)");
    $stmt->bind_param("ssss",$firstname, $email, $subject, $message);
    $stmt->execute();
    $email_error = " MESSAGE SENT SUCCESSFULLY WE'LL GET BACK TO YOU AS SOON AS POSSIBLE !";
    $stmt->close();
    $conn->close();
            
        }
    
  
  else{
    
    
    $username_error = "  WRONG EMAIL OR USERNAME";
    }
    }
    else{
      $username_error = "  WRONG EMAIL OR USERNAME";
    }
  }
    else {
        $FORM_error = "   CONTACT FORM CANNOT BE EMPTY ";
     
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
    <link rel="stylesheet" href="contactus.css">
    <link rel="stylesheet" href="responsive.css">
  
    <title>CONTACT</title>
</head>
<body>

    <!-- ===== ===== Header ===== ===== -->
    <header>
        <div class="brandLogo">
            <figure></figure>
            <button type="button" onclick="window.location.href = 'ACCOUNT.php';" >HOME</button>
            
        </div>
        
    </header>

<h3>CONTACT US</h3>

<div class="container">
  <form method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="..">

    <label for="email">Email</label>
    <input type="text" id="lname" name="email" placeholder="..">

    <label for="Subject">Subject</label>
    <select id="subject" name="subject">
      <option value="friendly">Friendly</option>
      <option value="complaint">Complaint</option>
      <option value="recommend">Recommendation</option>
      <option value="business">Business</option>
    </select>

    <label for="message">Message</label>
    <textarea id="subject" name="message" placeholder="" style="height:200px"></textarea>
<br><br><br>
    <input type="submit" value="SEND">
  </form>
  <br><br><br><br><br>
  <div class="error email-error">
        <p id ="info-message">
        <?php echo $email_error; ?>
        <?php echo $username_error; ?>
        <?php echo $FORM_error; ?>
   </p>
</div>
</div>
</body>
<script> setTimeout(function(){
    document.getElementById('info-message').style.display = 'none';
   
  }, 7000);</script>
</html>
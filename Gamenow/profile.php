<?php
 session_start();
 include("connect.php");

 $userprofile= $_SESSION['email'];

if($userprofile==$_SESSION['email']){
 $sql="select * from registration where ( email='$userprofile');";
 $res=mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($res);
 

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
    <link rel="stylesheet" href="profile.css">
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
                <div class="rating">
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate underrate"></i>
                </div>
            </div>
            <br>

            <div class="btns">
                <ul>
                   
<li class="sendMsg">
                        <i class="ri-chat-4-fill ri"></i>
                        <a href="ACCOUNT.php">Welcome</a>
                    
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="profile.php">Info</a>
                     
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>

                    <li class="sendMsg">
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
                     <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>INFO</span>
                    </li>
                    </li>
                     <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>
                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        
                    </li>

                    <li class="timeline">
                        <i class="ri-eye-fill ri"></i>
                        <span >SETTINGS</span>
                    </li>
                </ul>
            </div>
            <div class="basic_info">
                <h1 class="heading">USER Information</h1>
                <br>
                <ul>
                    <li class="phone">
                        <h1 class="label">Firstname:</h1>
                        <span class="info"><?php echo $row['firstname'];?></span>
                    </li>

                    <li class="address">
                        <h1 class="label">Lastname:</h1>
                        <span class="info"><?php echo $row['lastname'];?></span>
                    </li>

                    <li class="email">
                        <h1 class="label">E-mail:</h1>
                        <span class="info"><?php echo $row['email'];?></span>
                    </li>

                    <li class="site">
                        <h1 class="label">Password:</h1>
                        <span class="info"><?php echo $row['password'];?></span>
                    </li>
                </ul>
            </div>
<br>
            <div class="basic_info">
                <h1 class="heading">Basic Information</h1>
                <ul>
                    <li class="birthday">
                        <h1 class="label">Phone:</h1>
                        <span class="info"><?php echo $row['number'];?></span>
                    </li>
                    <li class="sex">
                        <h1 class="label">Country:</h1>
                        <span class="info"><?php echo $row['country'];?></span>
                        <li class="sex">
                        <h1 class="label">Age:</h1>
                        <span class="info"><?php echo $row['age'];?></span>
                    </li>
                </ul>
            </div>

            

                
        </section>
    </div>

    <script>
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    
      </script>
  
     
</body>


</html>
   























      
</body>

</html>
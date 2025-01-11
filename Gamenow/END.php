<?php
  
 session_start();
 include("connect.php");
 if($_SERVER['REQUEST_METHOD'] =="POST"){
    header('location:HTML.php');
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
    <link rel="stylesheet" href="END.css">
    
    <title>SUCCESSFUL</title>
</head>
<body>
    <section>
    <div class="login-box">
 <form  method="POST">
    <br><br><br>
<h2>RESET<br> SUCCESSFUL</h2>
<br>



      

<br>
<br>
<button type="submit" >Confirm</button>


<br>
<br>


<br>

 </form>
    </div>
</section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};

  </script>
  

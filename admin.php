<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style1.css" />
  </head>
<div class="container">
    <div class="box form-box">
        <form method="POST" action="">
           <div class="field input">
              <input type="submit" name="lister" value="lister" >
           </div>
       </form>
    </div>
</div>

<?php
include("BD.php");
 if($_SESSION['user']="admin" AND $_SESSION['password']="admin"){

  if(isset($_POST['lister'])){
    header('location:lister.php');
  }
 }
 else {
    header('location:authen.php');
 } ?>

</html>

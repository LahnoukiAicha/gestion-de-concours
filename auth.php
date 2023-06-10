<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
    <link rel="stylesheet" href="style1.css" />
</head>
<body>
	<h1>Connexion</h1>
    <div class="container">
        <div class="box form-box">
        <form action="" method="post" >
        <div class="field input">
		    <label >Nom d'utilisateur :</label>
		    <input type="text" name="user">
        </div>
        <div class="field input">
		    <label >Mot de passe :</label>
		    <input type="password" name="password" >
        </div>
        <div class="field input">
             <input type="submit"  class="btn" value="Se connecter" name="connecter">
        </div>
		<div class="links">
		      Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a>
        </div>
	    </form>
        </div>
    </div>
    <?php
    $s=array();
    $v=array();
    if(isset($_POST['connecter'])){
        include('BD.php');
    $user= $_POST['user'];
    $password = $_POST['password'];
    $sql1="SELECT nom FROM etudiant3 WHERE login='".$user."' AND pwd='".$password."'";
    $sql2="SELECT nom FROM etudiant4 WHERE login='".$user."' AND pwd='".$password."'";
    foreach($dbh->query($sql1) as $a){
       array_push($s,$a[0]);
    }
    foreach($dbh->query($sql2) as $b){
        array_push($v,$b[0]);
    }

    if($user == "admin" && $password =="admin"){
        header('location:admin.php');
    }
    else if (!empty($s) OR !empty($v)){
        $_SESSION['user']=$user;
        $_SESSION['password']=$password;
        header('location:recap.php');
    }
    else {
        echo "Erreur d'authentification";
    }
} 
?>
</body>
</html>

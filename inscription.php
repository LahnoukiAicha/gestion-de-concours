<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'Class/vendor/autoload.php';

// Insèrtion des données dans la table SQL
if(isset($_POST["inscrire"])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $diplome = $_POST['diplome'];
    $niveau = $_POST['niveau'];
    $etablissement = $_POST['etablissement'];
    $log = $_POST['login'];
    $mdp = $_POST['pwd'];

    // Enregistre la photo dans le dossier "uploads" et récupère le chemin
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }
    ini_set('upload_max_filesize', '10M'); // Set maximum file size to 10MB
    ini_set('post_max_size', '10M'); // Set maximum post data size to 10MB
    $photo_file = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $photo_path = 'uploads/'.$photo_name;
    $cv_file = $_FILES['cv']['tmp_name'];
    $cv_name = $_FILES['cv']['name'];
    $cv_path = 'uploads/'.$cv_name;

    include("BD.php");
    // Move the uploaded photo file to the 'uploads' directory
    if (move_uploaded_file($photo_file, $photo_path)) {
        echo "Photo file uploaded and moved successfully.";
    } else {
        echo "Failed to move photo file.";
    }

    // Move the uploaded CV file to the 'uploads' directory
    if (move_uploaded_file($cv_file, $cv_path)) {
        echo "CV file uploaded and moved successfully.<br>";
    } else {
        echo "Failed to move CV file.";
    }

    // Vérifie le niveau pour exécuter la requête SQL appropriée
    if($niveau=="3eme année"){
        $sql = "INSERT INTO etudiant3 VALUES ('$nom', '$prenom', '$email', '$date', '$diplome', '$niveau', '$etablissement', '$photo_path', '$cv_path', '$log', '$mdp')";
        $stm=$dbh->prepare($sql);
        $stm->execute();
    } else if($niveau=="4eme année"){
        $sql = "INSERT INTO etudiant4 VALUES ('$nom', '$prenom', '$email', '$date', '$diplome', '$niveau', '$etablissement', '$photo_path', '$cv_path', '$log', '$mdp')";
        $stm=$dbh->prepare($sql);
        $stm->execute();
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'aichalahnouki@gmail.com';
        $mail->Password = 'jawda123';  // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Sender and recipient details
        $mail->setFrom('aichalahnouki@gmail.com', 'Aicha');  // Replace with your email and name
        $mail->addAddress($email, $prenom);  // Email and name of the recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation d\'inscription';
        $mail->Body = 'Bonjour '.$prenom.',<br><br>Votre inscription au concours a été enregistrée avec succès.<br><br>Merci !';

        // Send the email
        $mail->send();
        echo 'Email sent successfully.';
    }
    catch (Exception $e) {
        echo 'Email could not be sent. Error: '.$mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription au concours</title>
    <link rel="stylesheet" href="style1.css" />
</head>
<body>
    <h1>Inscription au concours</h1>
    <div class="container">
        <div class="box form-box">
            <form action="inscription.php" method="post"  enctype="multipart/form-data" >
                <div class="field input">
                    <label >Nom :</label>
                    <input type="text" name="nom"><br>
                </div>
                <div class="field input">
                    <label >Prénom :</label>
                    <input type="text" name="prenom" ><br>
                </div>

                <div class="field input">
                    <label >Email :</label>
                    <input type="email" name="email"><br>
                </div>

                <div class="field input">
                    <label >Date de naissance :</label>
                    <input type="date" name="date"><br>
                </div>

                <div class="field input">
                    <label >Diplôme :</label>
                    <select name="diplome" >
                        <option value="Bac+2">Bac+2</option>
                        <option value="Bac+3">Bac+3</option>
                    </select><br><br>
                </div>

                <div class="field input">
                    <label >Niveau :</label>
                    <select name="niveau" >
                        <option value="3eme année">3eme année</option>
                        <option value="4eme année">4eme année</option>
                    </select><br>
                </div>

                <div class="field input">
                    <label >Etablissement d'origine :</label>
                    <input type="text" name="etablissement" ><br>
                </div>

                <div class="field input">
                    <label >Photo d'identité :</label>
                    <input type="file" name="photo" accept="image/*" ><br>
                </div>

                <div class="field input">
                    <label >CV :</label>
                    <input type="file" name="cv"  accept=".pdf"><br>
                </div>

                <div class="field input">
                    <label >Login :</label>
                    <input type="text" name="login" ><br>
                </div>

                <div class="field input">
                    <label >Mot de passe :</label>
                    <input type="password" name="pwd" ><br>
                </div>

                <div class="field input">
                    <input type="submit" value="Inscrire" name="inscrire" class="btn">
                </div>

                <div class="links">
                    Vous avez déjà un compte ? <a href="auth.php">S'authentifier</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

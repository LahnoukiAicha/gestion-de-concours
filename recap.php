<?php session_start() ?>
<html>
   <head>
    <h2> Affichage de candidature </h2>
    <style>
      table {
         border-collapse: collapse;
         width: 100%;
      }
      th, td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }
      th {
         background-color: #f2f2f2;
      }
      .btn{
        border-radius: 20px;
        text-decoration: none;
        padding: 10px;
        color: white;
        background-color:rgb(170, 77, 93);
        text-transform: uppercase;
        font-family:'Times New Roman', Times, serif;
      }
   </style>
</head><br>
   <form method="POST" action="">
      <input type="submit" value="Afficher ma candidature" name="afficher" class="btn">
</form>
<?php 
if(isset($_POST["afficher"])){
   include('BD.php');
   $sql1="SELECT *  FROM etudiant3 WHERE pwd='".$_SESSION['password']."' AND login='".$_SESSION['user']."'";
   $sql2="SELECT * FROM etudiant4 WHERE pwd='".$_SESSION['password']."' AND login='".$_SESSION['user']."'";
echo" <table border=2>";
echo "<th> Nom </th>
<th> Prenom </th>
<th> Email</th>
<th> Date-naissance </th>
<th> Diplome </th>
<th> Niveau </th>
<th> Etablissement </th>
<th> Photo </th>
<th> CV </th>
<th> Login </th>
<th> Mot de passe </th>";
echo "<br>";
foreach($dbh->query($sql1) as $row){
    echo"<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    <td>".$row[5]."</td>
    <td>".$row[6]."</td>
    <td>".$row[7]."</td>
    <td>".$row[8]."</td>
    <td>".$row[9]."</td>
    <td>".$row[10]."</td></tr>";
  

}
echo "</table>";
echo "<br>";
echo" <table border=2>";
echo "<th> Nom </th>
<th> Prenom </th>
<th> Email</th>
<th> Date-naissance </th>
<th> Diplome </th>
<th> Niveau </th>
<th> Etablissement </th>
<th> Photo </th>
<th> CV </th>
<th> Login </th>
<th> Mot de passe </th>";
foreach($dbh->query($sql2) as $row){
    echo"<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    <td>".$row[5]."</td>
    <td>".$row[6]."</td>
    <td>".$row[7]."</td>
    <td>".$row[8]."</td>
    <td>".$row[9]."</td>
    <td>".$row[10]."</td></tr>";
  

}
echo "</table>";
}

?>

<form method='POST' action='generate_pdf.php'>
<input type='submit' value='Generer le recu en format PDF' name='pdf' class="btn">
</form>
</html>
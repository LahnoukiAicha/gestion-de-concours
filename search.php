<?php

include('BD.php');
$query = $_POST['query'];
$query = $dbh->quote("%$query%");
$sql = "SELECT * FROM etudiant3 WHERE nom LIKE $query UNION ALL SELECT * FROM etudiant4 WHERE nom LIKE $query";
$results = $dbh->query($sql);

echo '<table>';
foreach ($results as $row) {
    echo '<tr>';
    echo '<td>' . $row['nom'] . '</td>';
    echo '<td>' . $row['prenom'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>

<html>
<head>
    <h2> Liste des inscription : 3EME ANNEE </h2>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Lorsque l'utilisateur tape dans le champ de recherche
            $('#search').on('keyup', function() {
                var query = $(this).val();
                // Vérifier si une recherche est en cours
                if (query !== '') {
                    // Cacher les tables
                    $('#table3').hide();
                    $('#table4').hide();
                    // Afficher le message de chargement
                    $('#result').html('<div class="loading"><img src="loading.gif"></div>');
                    
                    
                    // Envoyer une requête AJAX au serveur avec la valeur du champ de recherche
                    $.ajax({
                        url: 'search.php',
                        type: 'POST',
                        data: {query: query},
                        beforeSend: function() {
                            // Afficher le message de chargement
                            $('.loading').show();
                        },
                        success: function(data) {
                            // Mettre à jour le résultat avec les données renvoyées par le serveur
                            $('#result').html(data);
                        },
                        complete: function() {
                            // Cacher le message de chargement
                            $('.loading').hide();
                        }
                    });
                } else {
                    // Afficher les tables si aucune recherche n'est en cours
                    $('#table3').show();
                    $('#table4').show();
                    $('#result').html('');
                }
            });
        });
    </script>
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
        h2 {
            text-align: center;
            font-family: 'cursive';
            font-size: 40px;
            padding-bottom: 30px;
            padding-top: 30px;
            color: rgba(76, 68, 182, 0.808);
            text-shadow: 3px 3px 4px black;
        }
        .search {
            margin-bottom: 20px;
            border-radius: 20px;
            text-align: center;
            justify-content: center;
        }
        .loading {
            text-align: center;
        }
    </style>
</head>
<body>
    <input type="text" id="search" name="search" class="search">
    <div id="result"></div>
    <?php
    include("BD.php");
    $sql="SELECT * FROM etudiant3";
    echo" <table border=2 id='table3'>";
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
    foreach($dbh->query($sql) as $row){
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

    ?>

    <head>
        <h2> Liste des inscriptions : 4EME ANNEE </h2>
    </head>
    <?php
    include("BD.php");
    $sql="SELECT * FROM etudiant4";
    echo" <table border=2 id='table4'>";
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
    foreach($dbh->query($sql) as $row){
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
    ?>
</body>
</html>

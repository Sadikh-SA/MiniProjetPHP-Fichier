<body>
    <?php include("header1.php");
?>
<section class="container">
<h1 style="text-align:center; color: darkgreen;">Liste des Utilisateurs</h1>
<?php
//tableau
echo  '<table class="table table-dark table-striped">
            <thead>
                  <tr>       
                      <th> Login </th>
                      <th> Mot de Passe </th>
                      <th> Profil </th>
                      <th> Prénom </th>
                      <th> Téléphone </th>
                      <th> Adresse </th>
                      <th> Statut</th>
                  </tr>
              </thead>
              <tbody>';

              $id_file= fopen("../Fichiers/utilisateur.txt","r");
                $j=0;
               // $chaine ="Bloquer";
                while($ligne=fgets($id_file)){
                    $produit = explode(",",$ligne);
                    echo "<tr>";
                    for ($i=0; $i <count($produit) ; $i++) { 
                        if ($produit[6]=="Bloquer\n" || $produit[6]=="Bloquer") {
                            if ($i==(count($produit)-1)) {
                                echo "<td><form action='admin.php' method='POST'><button type='submit' class='btn btn-danger' name='statut' style='width:80%; text-align:center;'>".$produit[6]."</button></form></td>";
                            } else {
                                echo "<td class='bg-gradient-secondary';>" .$produit[$i]. "</td>";
                            }
                        }
                        else {
                            if ($i==(count($produit)-1)) {
                                echo "<td><form action='admin.php' method='POST'><button type='submit' class='btn btn-success' name='statut' style='width:80%; text-align:center;'>".$produit[6]."</button></form></td>";
                            } else {
                                echo "<td class='.bg-gradient-secondary'>" .$produit[$i]. "</td>";
                            }
                        }
                    }
                    echo "</tr>";
                }
                fclose($id_file);

                $file= fopen("../Fichiers/utilisateur.txt","a+");
                if (isset($_POST['statut'])) {
                    while($ligne=fgets($file)){
                        $tab = explode(",",$ligne);
                        echo "<tr>";
                        for ($i=0; $i <count($tab) ; $i++) { 
                            if ($tab[6]=="Bloquer") {
                                
                            }
                            else {
                                
                            }
                        }
                        echo "</tr>";
                    }
                }
                echo "</table>";
?>
</section>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>
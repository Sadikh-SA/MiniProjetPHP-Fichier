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
                    $id_file = fopen("../Fichiers/utilisateur1.txt","r");
                    $file= fopen("../Fichiers/utilisateur2.txt","a+");
                    if (isset($_POST['statut'])) {
                            while($ligne=fgets($id_file)){
                                $produit = explode(",",$ligne);
                                    
                                fwrite($file,$produit[0].",".$produit[1].",".$produit[2].",".$produit[3].",".$produit[4].",".$produit[5].",Actif\n");
                            }
                    }
                    else {
                                fwrite(fgets($id_file));
                            }
                    fclose($file);
                    fclose($id_file);

                    $id_file= fopen("../Fichiers/utilisateur2.txt","r");
                    while($ligne=fgets($id_file)){
                        $produit = explode(",",$ligne);
                        echo "<tr>";
                        for ($i=0; $i <count($produit) ; $i++) { 
                            if ($produit[6]=="Bloquer\n" || $produit[6]=="Bloquer") {
                                if ($i==(count($produit)-1)) {
                                    echo "<td><form action='modif.php' method='POST'><button type='submit' class='btn btn-danger' name='statut' style='width:80%; text-align:center;'>".$produit[6]."</button></form></td>";
                                } else {
                                    echo "<td class='bg-gradient-secondary';>" .$produit[$i]. "</td>";
                                }
                            }
                            else {
                                if ($i==(count($produit)-1)) {
                                    echo "<td><form action='modif.php' method='POST'><button type='submit' class='btn btn-success' name='statuts' style='width:80%; text-align:center;'>".$produit[6]."</button></form></td>";
                                } else {
                                    echo "<td class='.bg-gradient-secondary'>" .$produit[$i]. "</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }   
                    fclose($id_file);

                echo "</table>";
?>
</section>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>
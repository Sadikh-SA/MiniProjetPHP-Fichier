<body>
    <?php include("header1.php");
?>
<section class="container">
<h1 style="text-align:center; box-shadow: 12px 3px 12px 3px; border-radius: 12px 12px; color: darkgreen; width:25%; border:1px solid green; margin: 0 auto; margin-bottom: 20px;">Liste des Utilisateurs</h1>
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

              if (isset($_POST['statut'])) {
                $id_file= fopen("../Fichiers/utilisateur.txt","r");
                $login=$_GET['login'];
                while($ligne=fgets($id_file)){
                    $tab = explode(",",$ligne);
                    echo "<tr>";
                    if ($tab[0]==$login) {
                        for ($i=0; $i <count($tab) ; $i++) { 
                            if ($tab[6]=="Bloquer\n" || $tab[6]=="Bloquer") {
                                if ($i==(count($tab)-1)) {
                                    echo "<td><a href='modif.php?login=".$tab[0]."'><button type='submit' class='btn btn-danger' name='statut' style='width:80%; text-align:center;'>Actif</button></a></td>";
                                } else {
                                    echo "<td class='bg-gradient-secondary';>" .$tab[$i]. "</td>";
                                }
                            }
                            else {
                                if ($i==(count($produit)-1)) {
                                    $tab[6]=="Bloquer";
                                    echo "<td><a href='modif.php?login=".$tab[0]."'><button type='submit' class='btn btn-success' name='statut' style='width:80%; text-align:center;'>Bloquer</button></a></td>";
                                } else {
                                    echo "<td class='.bg-gradient-secondary'>" .$tab[$i]. "</td>";
                                }
                            }
                        }
                    }
                    
                }
              } else {
                $id_file= fopen("../Fichiers/utilisateur.txt","r");
                $j=0;
               // $chaine ="Bloquer";
                while($ligne=fgets($id_file)){
                    $produit = explode(",",$ligne);
                    echo "<tr>";
                    for ($i=0; $i <count($produit) ; $i++) { 
                        if ($produit[6]=="Bloquer\n" || $produit[6]=="Bloquer") {
                            if ($i==(count($produit)-1)) {
                                echo "<td><a href='modif.php?login=".$produit[0]."'><button type='submit' class='btn btn-danger' name='statut' style='width:80%; text-align:center;'>".$produit[6]."</button></a></td>";
                            } else {
                                echo "<td class='bg-gradient-secondary';>" .$produit[$i]. "</td>";
                            }
                        }
                        else {
                            if ($i==(count($produit)-1)) {
                                echo "<td><a href='modif.php?login=".$produit[0]."'><button type='submit' class='btn btn-success' name='statut' style='width:80%; text-align:center;'>".$produit[6]."</button></a></td>";
                            } else {
                                echo "<td class='.bg-gradient-secondary'>" .$produit[$i]. "</td>";
                            }
                        }
                    }
                    echo "</tr>";
                }
                fclose($id_file);
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

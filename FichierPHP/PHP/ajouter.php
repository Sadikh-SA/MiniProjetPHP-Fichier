
<body>
<?php include("header.php");
?>

<div class="container">
  <h2>Ajout Produit </h2>
  <form  method="post" action=<?= $_SERVER["PHP_SELF"]?>>
  <p>
      <label for="nom">Nom  :</label>
      <input type="text" name="nom" id="nom"class="form-control" value="<?php if(isset($_POST['nom']))echo $_POST['nom']?>" placeholder="Entrer Nom " required> 
   </p>
   <p>
      <label for="prix">Prix :</label>
      <input type="number" name="prix" id="prix"class="form-control" value="<?php if(isset($_POST['prix']))echo $_POST['prix']?>" placeholder="Entrer Prix" required> 
   </p>
   <p>
      <label for="quantite">Quantité :</label>
      <input type="number" name="quantite" id="quantite"class="form-control" value="<?php if(isset($_POST['quantite']))echo $_POST['quantite']?>" placeholder="Entrer Quantité" required> 
   </p>

    <button type="submit" class="btn btn-success btn-lg" id="ajout" name="ajout">Valider</button>
  </form>
</div>

<br><br><br><br>


<?php

   //tableau
  echo  '<table class="table table-dark table-striped">
            <thead>
            
              <thead>
                    <tr>       
                        <<th> Nom du produit </th>
                        <th> Prix Fcfa </th>
                        <th> Quantité Fcfa</th>
                        <th> Montant Fcfa</th>
                    </tr>
                </thead>
                <tbody>';
  
                //liste
  /*$liste=array(
    array('Samsung Galaxy J6+',165 ,10,''),
    array('Samsung Galaxy A50',264,9,''),
    array('Samsung Galaxy J6',153,15,''),
    array('Huawei Y5 (2018)',103,8,''),
    array('Huawei Y6 (2018)',110,14,''),
    array('Huawei Y5',134,14,''),
    array('Huawei P20 Lite',185,11,''),
    array('Samsung Galaxy J7 (2017)',204,8,''),
    array('Samsung Galaxy A70',408,15,''),);*/
    $ifile= fopen("../Fichiers/tableau.txt","r");
    if (isset($_POST["ajout"])) {
      $nameprod=$_POST["nom"];
      $prixprod=$_POST["prix"];
      $quantprod=$_POST["quantite"];
      $existe = false;
      while($lignes=fgets($ifile)){
        $produits = explode(",",$lignes);
        if(strtolower($nameprod)==strtolower($produits[0])){
            $existe = true;
        }
      }
      fclose($ifile);
      $id_file= fopen("../Fichiers/tableau.txt","a+");
      if ($existe==false) {
        echo '<p style="color:green; text-align:center;"><strong>Produit ajouté voir en bas du tableau</strong></b></p>';
          fwrite($id_file,$nameprod.",".$prixprod.",".$quantprod."\n");
        fclose($id_file);
          $id_file= fopen("../Fichiers/tableau.txt","r");
        while($ligne=fgets($id_file)){
          $produit = explode(",",$ligne);
          echo "<tr>";
    
          for ($j=0; $j<4; $j++) { 
            $produit[3]=$produit[1]*$produit[2];
            if ($produit[2]<10) {
              echo "<td class='bg-danger';>" .$produit[$j];
            }
            else {
              echo "<td class='.bg-gradient-secondary'>" .$produit[$j]. "</td>";
            }
            echo "</td>";
          }
          echo "</tr>";
        }
        fclose($id_file);
        echo "</table>";
      }
      else {
        echo "<p style='color:red; text-align:center;'><strong>Ce Produit $nameprod existe déja dans la base.</strong></b></p>";
      }

    }
?>
<footer>
<?php include("footer.php");
?>
</body>
</html>

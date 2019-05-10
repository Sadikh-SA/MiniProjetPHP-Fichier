<?php include("header.php");
?>
<section class="container">
<div class="main">
<h2>Modifier Produit </h2>
    <div class="contrecherche">  
    <form id="recherche-form" class="recherche-form" method="POST" action=<?= $_SERVER["PHP_SELF"] ?>>       
      <div class="form-group">
          
        <div class="produit">
        <label for="produit">Produit  :</label>
      <input type="text" name="produit" id="produit"class="form-control" value="<?php if(isset($_POST['produit']))echo $_POST['produit']?>" placeholder="Nom du Produit à modifier ">
            
        </div>
        <div class="max">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix"class="form-control" value="<?php if(isset($_POST['prix']))echo $_POST['prix']?>" placeholder="Nouveau Prix ">
            
        </div>
        <div class="form-quantite">
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite"class="form-control" value="<?php if(isset($_POST['quantite']))echo $_POST['quantite']?>" placeholder="Nouveau Quantité " min=0>
         
        </div>
        
        <div class="form-submit"> 
        <br><br>
        <button type="submit" class="btn btn-info btn-lg" id="submit" name="submit">Modifier</button>
           
        </div>
      </div>
    </form>
    </div>
  </div>
<?php

echo '<table class="table table-dark table-striped">
<thead>

  <thead>
        <tr>       
        <th> Nom du produit </th>
        <th> Prix Fcfa </th>
        <th> Quantité Fcfa</th>
        <th> Montant Fcfa</th>
        </tr>
    </thead>
    <tbody>';

// Création du tableau
  
  if(isset($_POST["submit"])){
    $id_file = fopen("../Fichiers/tableau.txt","r+");
    $nom=$_POST["produit"];
    $prix=$_POST["prix"];
    $qtite=$_POST["quantite"];
//$test=false;
        while ($ligne=fgets($id_file)) {
              $tab=explode(",",$ligne);
              if (strtolower($nom)==strtolower($tab[0])) {
                  $modifier=$tab[0].",".$prix.",".$qtite."\n";
              }
              else {
                $modifier=$ligne;
              }
              $newligne=$newligne.$modifier;
        }
        fclose($id_file);
        $file=fopen("../Fichiers/tableau.txt","w+");
        fwrite($file,$newligne);
        fclose($file);
  }
      $id_file=fopen("../Fichiers/tableau.txt","r");
        while ($ligne=fgets($id_file)) {
            $tab=explode(",",$ligne);
            echo "<tr>";
            for ($i=0; $i <count($tab) ; $i++) { 
              # code...
              $tab[3]=$tab[1]*$tab[2];
              if ($tab[2]<10) {
                echo "<td class='bg-danger';>" .$tab[$i]. "</td>";
              }
              else {
                echo "<td class='.bg-gradient-secondary'>" .$tab[$i]. "</td>";; 
              }
              
            }
            echo "</tr>"; 
        }
        fclose($id_file);
    echo "</tbody></table>"; 
  ?>
</section>
<?php include("footer.php");
?>

<?php include("header.php");

?>
<section class="container">
<div class="main">
<h2 style="text-align:center; box-shadow: 12px 3px 12px 3px; border-radius: 12px 12px; color: darkgreen; width:25%; border:1px solid green; margin: 0 auto; margin-bottom: 20px;">Supprimer Produit </h2>
    <div class="contrecherche">
        
    <form id="recherche-form" class="recherche-form" method="POST" action=<?= $_SERVER["PHP_SELF"] ?>>
        
      <div class="form-group" >
          
        <div class="produit">
            <label for="produit">Supprimer Produit :</label>
            <input type="text" name="produit" id="produit"class="form-control" value="<?php if(isset($_POST['produit']))echo $_POST['produit']?>" placeholder="Nom du Produit à modifier ">
        </div>
        <br><br>
        <div class="form-submit">
        <button type="submit" class="btn btn-danger btn-lg" id="submit" name="supprimer">Supprimer</button>
            
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
  
  $nom=$_POST["produit"];
  $nm=$_POST["supprimer"];
  //$notexiste = false;
  if(isset($nm)){
      $file= fopen("../Fichiers/tableau.txt","a+");
      $fichier= fopen("../Fichiers/supp.txt","w+");
      $test=true;
      while($ligne=fgets($file)){
        $produit = explode(",",$ligne);
           if (strtolower($produit[0])==strtolower($nom)) {
                  unset($ligne);
                  $test=false;
           } else {
              fwrite($fichier,$ligne);
           }
      }
      fclose($file);
      fclose($fichier);
      if ($test==true) {
        echo"<h2 style='text-align:center; color: red;'>Ce produit $nom n'existe pas dans la base.</h2>";
        $file= fopen("../Fichiers/tableau.txt","r");
        while($ligne=fgets($file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            for ($i=0; $i <count($produit) ; $i++) { 
              # code...
            
              $produit[3]=$produit[1]*$produit[2];
              if ($produit[2]<10) {
                echo "<td class='bg-danger';>" .$produit[$i]. "</td>";
              }
              else {
                echo "<td class='.bg-gradient-secondary'>" .$produit[$i]. "</td>";; 
              }
              
            }
            echo "</tr>"; 
        }
        fclose($file);
      } else {
        unlink("../Fichiers/tableau.txt");
        copy("../Fichiers/supp.txt","../Fichiers/tableau.txt");
        unlink("../Fichiers/supp.txt");
        $fichier= fopen("../Fichiers/tableau.txt","r");
        while($ligne=fgets($fichier)){
          $produit = explode(",",$ligne);
          echo "<tr>";
          for ($i=0; $i <count($produit) ; $i++) { 
            # code...
          
            $produit[3]=$produit[1]*$produit[2];
            if ($produit[2]<10) {
              echo "<td class='bg-danger';>" .$produit[$i]. "</td>";
            }
            else {
              echo "<td class='.bg-gradient-secondary'>" .$produit[$i]. "</td>";; 
            }
            
          }
          echo "</tr>";
        }
        fclose($fichier);
      }
      
  }
  else {
    $file= fopen("../Fichiers/tableau.txt","r");
    while($ligne=fgets($file)){
        $produit = explode(",",$ligne);
        echo "<tr>";
        for ($i=0; $i <count($produit) ; $i++) { 
          # code...
        
          $produit[3]=$produit[1]*$produit[2];
          if ($produit[2]<10) {
            echo "<td class='bg-danger';>" .$produit[$i]. "</td>";
          }
          else {
            echo "<td class='.bg-gradient-secondary'>" .$produit[$i]. "</td>";; 
          }
          
        }
        echo "</tr>"; 
    }
    fclose($file);
  }
                      
                    
echo"</tbody></table>";

  ?> 
  </section>
  <footer>
<?php include("footer.php");
?>

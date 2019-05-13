
<body>
<?php include("header.php");
?>
<section class="container">
<h1 style="text-align:center; box-shadow: 12px 3px 12px 3px; border-radius: 12px 12px; color: darkgreen; width:25%; border:1px solid green; margin: 0 auto; margin-bottom: 20px;">Liste de Produits</h1>
<?php
//tableau
echo  '<table class="table table-dark table-striped">
            <thead>
                  <tr>       
                      <th> Nom du produit </th>
                      <th> Prix Fcfa </th>
                      <th> Quantité Fcfa</th>
                      <th> Montant Fcfa</th>
                  </tr>
              </thead>
              <tbody>';

              //liste
  $id_file= fopen("../Fichiers/tableau.txt","r");
  $j=0;
  while($ligne=fgets($id_file)){
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

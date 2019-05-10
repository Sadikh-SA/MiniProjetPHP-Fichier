
<body>
<?php include("header.php");
?>
<section class="container">
<h1 style="text-align:center; color: darkgreen;">Liste de Produits</h1>
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

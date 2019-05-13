
   <?php include("header.php");
?>
<section class="container">
<h2 style="text-align:center; box-shadow: 12px 3px 12px 3px; border-radius: 12px 12px; color: darkgreen; width:25%; border:1px solid green; margin: 0 auto; margin-bottom: 20px;">Modifier Produit </h2>
<div class="contrecherche">  
    <form id="recherche-form" class="recherche-form" method="POST" action=<?= $_SERVER["PHP_SELF"] ?>>
        
      <div class="form-group">
          
        <div class="produit">
            <label for="produit">Produit</label>
            <input type="text" id="produit" name="nom" value="<?php if(isset($_POST['nom']))echo $_POST['nom']?>" placeholder="Produit" />
        </div>
        
        <div class="min">
            <label for="pmin">Prix Min</label>
            <input type="number" name="pmin" id="pmin" value="<?php if(isset($_POST['pmin']))echo $_POST['pmin']?>" class="pmin" placeholder="Prix minimal" />
        </div>
        
        <div class="max">
            <label for="pmax">Prix Max</label>
            <input type="number" name="pmax"id="pmax" value="<?php if(isset($_POST['pmax']))echo $_POST['pmax']?>" class="pmax" placeholder="Prix maximal" />
        </div>
        
        <div class="form-quantite">
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" value="<?php if(isset($_POST['quantite']))echo $_POST['quantite']?>" class="nput-text qty text" min=0>
        </div>
        
        <div class="form-submit">
            <input type="submit" id="submit" name="recherche" class="submit" value="RECHERCHE" />
        </div>
      </div>
    </form>

<?php
    //tableau
echo  '<table class="table table-dark table-striped">
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
  array('Samsung Galaxy A70',408,15,'')
);*/

  $id_file= fopen("../Fichiers/tableau.txt","r");
    if (isset($_POST['recherche'])) {
        if(!empty($_POST['nom']) && empty($_POST['quantite']) && empty($_POST['pmax']) && empty($_POST['pmin'])){
            //$j=0;
            while($ligne=fgets($id_file)){
                $produit = explode(",",$ligne);
                echo "<tr>";
            for($j=0; $j<4; $j++){     
              if(strtolower($_POST['nom']) == strtolower($produit[0])) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
              else {
                $i++;
              }
            }
          
          echo "</tr>";
          }
        }
        elseif (empty($_POST['nom']) && !empty($_POST['quantite']) && empty($_POST['pmax']) && empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['quantite'] <= $produit[2]) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }
        elseif (empty($_POST['nom']) && empty($_POST['quantite']) && !empty($_POST['pmax']) && empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['pmax'] <= $produit[1]) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }
        elseif (empty($_POST['nom']) && empty($_POST['quantite']) && empty($_POST['pmax']) && !empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['pmin'] <= $produit[1]) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }
        elseif (empty($_POST['nom']) && empty($_POST['quantite']) && !empty($_POST['pmax']) && !empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['pmin'] <= $produit[1] && $produit[1]<=$_POST['pmax']) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }
        elseif (empty($_POST['nom']) && !empty($_POST['quantite']) && !empty($_POST['pmax']) && empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['pmax'] <= $produit[1] && $produit[2]>=$_POST['quantite']) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }
        elseif (empty($_POST['nom']) && !empty($_POST['quantite']) && empty($_POST['pmax']) && !empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['pmin'] <= $produit[1] && $produit[2]>=$_POST['quantite']) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }

        elseif (empty($_POST['nom']) && !empty($_POST['quantite']) && !empty($_POST['pmax']) && !empty($_POST['pmin'])){
          while($ligne=fgets($id_file)){
            $produit = explode(",",$ligne);
            echo "<tr>";
            
            for($j=0; $j<4; $j++){     
              if($_POST['pmin'] <= $produit[1] && $produit[1]<=$_POST['pmax'] && $produit[2]>=$_POST['quantite']) {
                $produit[3]= $produit[1]*$produit[2];                
                  
                if($produit[2]<10){                    
                    
                    echo "<td class='bg-danger';>" .$produit[$j]."</td>";
            
                  }
            
                  else{
                  
                    echo "<td>" .$produit[$j]."</td>"; 
            
                }
              }
          }
          echo "</tr>";
        }
        }
        
  } 

fclose($id_file);
    
    echo "</table>";
?>
</section>
    </div>
  <?php
    include 'footer.php';
  ?>

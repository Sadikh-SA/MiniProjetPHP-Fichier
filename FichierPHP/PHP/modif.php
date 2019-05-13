<?php
        $login=$_GET['login'];
        //$newligne='';
        $file= fopen("../Fichiers/utilisateur.txt","r");
        while($ligne=fgets($file)){
            $tab = explode(",",$ligne);
            if ($login==$tab[0]) {
                if ($tab[6]=="Bloquer" || $tab[6]=="Bloquer\n") {
                    $tab[6]="Actif";
                    $modif=$tab[0].",".$tab[1].",".$tab[2].",".$tab[3].",".$tab[4].",".$tab[5].",".$tab[6]."\n";
                } else {
                    $tab[6]="Bloquer";
                    $modif=$tab[0].",".$tab[1].",".$tab[2].",".$tab[3].",".$tab[4].",".$tab[5].",".$tab[6]."\n";
                }
            }
            else {
                # code...
                $modif=$ligne;
            }
            $newligne=$newligne.$modif;
        }
        fclose($file);
        $file=fopen("../Fichiers/utilisateur2.txt","w");
        fwrite($file,trim($newligne));
        fclose($file);
        unlink("../Fichiers/utilisateur.txt");
        copy("../Fichiers/utilisateur2.txt","../Fichiers/utilisateur.txt");
        unlink("../Fichiers/utilisateur2.txt");
        header('location:admin.php');
?>
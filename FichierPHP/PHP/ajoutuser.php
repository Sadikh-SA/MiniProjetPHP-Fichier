<html>
<head>
<title>Ajouter Utilisateur</title>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <style>
        .loginbox input[type="mail"], input[type="number"]
            {
                border: none;
                border-bottom: 1px solid #fff;
                background: transparent;
                outline: none;
                height: 40px;
                color: #fff;
                font-size: 16px;
            }

            .loginbox select {
                height: 40px;
                width: 40%;
                margin-bottom: 20px;
            }
    </style>

<body>
<?php include("header1.php");?>
<section class="container">
    <div class="loginbox" style="height:650px; width:420px; background:#170b01; margin-top:380px;">
    <img src="../images/avatar.png" class="avatar">
        <h1>Ajouter Utilisateur</h1>
        <form action="ajoutuser.php" method="POST" >
            <p>Login</p>
            <input type="text" name="login" placeholder=" value="<?php if(isset($_POST['login']))echo $_POST['login']?>"Enter login" required>
            <p>Mot de Passe</p>
            <input type="password" name="pwd" placeholder="Enter Password" required>
            <p>Profil</p>
            <select name="profil" id="" value="<?php if(isset($_POST['profil']))echo $_POST['profil']?>">
                <option value="User" name="profil">User</option>
                <option value="Admin" name="profil">Admin</option>
            </select>
            <p>Prénom</p>
            <input type="text" name="prenom" value="<?php if(isset($_POST['prenom']))echo $_POST['prenom']?>" placeholder="Entrer Votre Prénom" required>
            <p>Téléphone</p>
            <input type="number" name="tel" value="<?php if(isset($_POST['tel']))echo $_POST['tel']?>" placeholder="Entrer Votre téléphone" required>
            <p>Adresse Mail</p>
            <input type="mail" name="mail" placeholder="Entrer Votre Email" value="<?php if(isset($_POST['mail']))echo $_POST['mail']?>" required>
            <input type="submit" name="creer" value="Créer">
        </form>
        
    </div>
    </section>
    <?php
    if(isset($_POST['creer'])) {
        $login=$_POST['login'];
        $mdp=$_POST['pwd'];
        $profil=$_POST['profil'];
        $prenom=$_POST['prenom'];
        $tel=$_POST['tel'];
        $mail=$_POST['mail'];
        $id_file = fopen("../Fichiers/utilisateur.txt","r");
        $existe=false;
        while ($ligne=fgets($id_file)) {
            $tab = explode(",",$ligne);
            for ($i=0; $i <count($tab) ; $i++) { 
                if ($tab[0]==$login) {
                    $existe=true;
                }
            }
        }
        fclose($id_file);
        $id_file = fopen("../Fichiers/utilisateur.txt","a+");
        if ($existe) {
            # code...
            echo "<h2 style='color: darkred; text-align: center; margin-top: -22px'>Ce login existe déja</h2>";
        } else {
            echo "<h2 style='color: darkgreen; text-align: center; margin-top: -22px;'>Utilisateur inscrit avec succès</h2>";
            fwrite($id_file,$login.",".$mdp.",".$profil.",".$prenom.",".$tel.",".$mail.",Actif"."\n");
        }
        fclose($id_file);
    }
?>
</body>
</head>
</html>
<?php require "view_begin.php"?>

<?php

// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'aquabdd');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

if (isset($_POST['username'])){
	$Username = stripslashes($_REQUEST['username']);
	$Username = mysqli_real_escape_string($conn, $Username);
	$Password = stripslashes($_REQUEST['password']);
	$Password = mysqli_real_escape_string($conn, $Password);
    $query = "SELECT * FROM `login` WHERE username='$Username' and Password='$Password'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['username'] = $Username;
	    header("Location: ?controller=acceuil&action=acceuil");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}

?>



<body class="bg03">
    <?php 
    $tab = ["container","row tm-mt-big","col-12 mx-auto tm-login-col","bg-white tm-block","row","col-12 text-center"];
    foreach($tab as $val) :?>
        <div class="<?= $val?>">
    <?php endforeach ?>
    <object data="Content/img/LOGOTYPE-Officiel-Universite-Sorbonne-Paris-Nord.png" width="325" height="200"> </object>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <form 
                 method="post" class="tm-login-form">
                    <div class="input-group">
                        <label for="username" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Identifiant</label>
                        <input name="username" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="username" value="Identifiant" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de passe</label>
                        <input name="password" type="password" class="form-control validate" id="password" value="1234" required>
                    </div>
                    <div class="input-group mt-3">
                        <button type="submit" class="btn btn-primary d-inline-block mx-auto" name="formlogin">Connexion</button>
                    </div>
                    <?php if(isset($message)) : ?>
                        <p>Erreur : <?= e($message) ?></p>
                    <?php  endif;?>
                    <div class="input-group mt-3">
                        <p><a href="https://moncompte.univ-paris13.fr/">Mot de passe oublié /</a></p>
                        <p><a href="https://moncompte.univ-paris13.fr/">obtenir mes identifiants</a></p>
                    </div>
                </form>
        
        <?php foreach($tab as $val) :?>
            </div>
        <?php endforeach ?>

        


<?php require "view_end.php"?>

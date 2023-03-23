<div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="?controller=acceuil&action=acceuil">
                            <object data="Content/img/LOGOTYPE-Officiel-Universite-Sorbonne-Paris-Nord.png" width="250" height="150"> </object>
                            <!--<h1 class="tm-site-title mb-0"></h1>-->
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item <?php if($_GET["controller"] == "acceuil"){
                                    echo("active");}?>">
                                    <a class="nav-link" href="?controller=acceuil&action=acceuil">Accueil
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>

                                <li class="nav-item  <?php if($_GET["controller"] == "bos"){
                                    echo("active");}?>">
                                    <a class="nav-link" href="?controller=bos&action=bos">BOS</a>
                                </li>

                                <li class="nav-item  <?php if($_GET["controller"] == "etudiant"){
                                    echo("active");}?>">
                                    <a class="nav-link" href="?controller=etudiant&action=etudiant">Etudiants</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Paramètres
                                    </a>
                                    <div class="dropdown-menu <?php if($_GET["controller"] == "compte"){echo("active");}?> <?php if($_GET["controller"] == "entreprise"){echo("active");}?>" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="?controller=compte&action=compte&name=<?= $_SESSION["username"]?>"> Modifier le profil</a>
                                        <a class="dropdown-item" href="?controller=entreprise&action=entreprise">Historique Entreprise </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="https://ent.univ-paris13.fr/applications/webmail/" role="button">
                                        <object data="Content/img/bell.svg" width="30" height="30"> </object>
                                    </a>
                                </li>
                            </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="?controller=auth&action=auth">
                                    <img src="Content/img/user.png" height="30">
                                    <span id="login">Login</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </nav>
                </div>
            </div>

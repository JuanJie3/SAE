<?php require "view_begin.php"?>

<body class="bg02">
<?php require "view_navigation.php"?>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="grandblock">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Profil étudiant</h2>
                        </div>
                    </div>

                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form class="tm-edit-product-form" method="get">
                            <input type="hidden" name="controller" value="profil">
                            <input type="hidden" name="action" value="validation">
                            <input type="hidden" name="id" value="<?= $liste["student_id"]?>">
                            <input type="hidden" name="idBOS" value="<?= $liste["BOS_ID"]?>">
                              
                            <div class="input-group mb-3">

                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Prénom
                                    
                                </label>

                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"><?= $liste["nom"] ?> <?= $liste["prenom"] ?>
                                    </label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Information</label>
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2"><?= $liste["student_id"] ?> <br> <?= $liste["Groupe"] ?> <br> <?= $liste["departement"] ?></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="expire_date" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Dernière modification
                                    </label>
                                    <label for="expire_date" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                        <?= $liste["date_heure"] ?>
                                    </label>
                                </div>
                                <div class="input-group mb-3" name="status">
                                    <label for="category" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Etat</label>
                                    <select name="status">
                                        <option value="Validé" <?php if($liste["status"] == "validé"){echo("selected");} ?>> Validé </option>
                                        <option value="En attente" <?php if($liste["status"] == null or $liste["status"] == "En attente"){echo("selected");} ?> > En attente </option>
                                        <option value="Refusé" <?php if($liste["status"] == "Refusé"){echo("selected");} ?> > Refusé </option>
                                    </select>
                                </div>
                        </div>
                    </div>

                    <div class="imgbos">
                        <div>
                            <center><h4>BOS</h4> </center>
                            <img src="Content/img/bordereau.png" alt="Profile Image" class="img-fluid mx-auto d-block">
                            <div class="custom-file mt-3 mb-3"><a href="<?=$liste["url"]?>">
                                <input type="button" class="btn btn-primary d-block mx-auto" value="Voir"
                                /></a>
                            </div>
                        </div>
                        <div class="confirmer">
                        <div class="input-group mb-3">
                            <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                <button type="submit" class="btn btn-primary">Confirmer
                                </button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require "view_end.php"?>

<?php require "view_begin.php"?>

<body id="reportsPage" class="bg02">

<?php require "view_navigation.php";?>

            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="grandblock">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Liste des étudiants</h2>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche" title="Type in a name">
                            </div>
                            <!--
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="" class="btn btn-small btn-primary">Filtre</a>
                            </div>
                            -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-Blue">
                                        <th scope="col">Numéro étudiants</th>
                                        <th scope="col">Nom Prénom</th>
                                        <th scope="col" class="text-center">Formation</th>
                                        <th scope="col" class="text-center">Groupe</th>
                                        <th scope="col" class="text-center">Stage</th>
                                        <th scope="col">Etat</th>
                                    </tr>
                                </thead>
                                <tbody id ="myTable">
                                    <?php
                                    foreach( $liste as $eleve ) : ?>
                                        <tr>      
                                            <td class="tm-product-name"><a href="?controller=profil&action=profil&id=<?= e($eleve['Student_id']) ?>&idBOS=<?= e($eleve['BOS_ID']) ?>" class="tm-link-black"><?= $eleve["Student_id"] ?> </a> </td>
                                            <td class="tm-product-name"><a href="?controller=profil&action=profil&id=<?= e($eleve['Student_id']) ?>&idBOS=<?= e($eleve['BOS_ID']) ?>" class="tm-link-black"><?= $eleve["Nom"] ?> <?= $eleve["Prenom"] ?></a>  </td>
                                            <td class="text-center"><a href="?controller=profil&action=profil&id=<?= e($eleve['Student_id']) ?>&idBOS=<?= e($eleve['BOS_ID']) ?>" class="tm-link-black"><?= $eleve["Departement"] ?></a>  </td>
                                            <td class="text-center"><a href="?controller=profil&action=profil&id=<?= e($eleve['Student_id']) ?>&idBOS=<?= e($eleve['BOS_ID']) ?>" class="tm-link-black"><?= $eleve["Groupe"] ?> </a> </td>
                                            <td class="text-center"><a href="?controller=profil&action=profil&id=<?= e($eleve['Student_id']) ?>&idBOS=<?= e($eleve['BOS_ID']) ?>" class="tm-link-black"><?= $eleve["Mission"] === null ? 'recherche' : e($eleve["Mission"]) ?></a>  </td>
                                            <td class="text-center"><a href="?controller=profil&action=profil&id=<?= e($eleve['Student_id']) ?>&idBOS=<?= e($eleve['BOS_ID']) ?>" class="tm-link-black"><?=  $eleve["Status"] === null ? 'recherche' : e($eleve["Status"]) ?></a> </td>
                                      </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require "view_end.php"?>

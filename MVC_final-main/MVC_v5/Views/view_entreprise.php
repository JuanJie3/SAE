<?php require "view_begin.php"?>
<body id="reportsPage" class="bg02">
<?php require "view_navigation.php"?>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="grandblock">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Liste des entreprises</h2>

                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche" title="Type in a name">

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <!-- <a href="add-product.html" class="btn btn-small btn-primary">Filtre</a> -->
                                <li class="btn btn-small btn-primary">
                                    <!--
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Filtre
                                    </a>-->
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="accounts.html"> Modifier le profil</a>
                                        <a class="dropdown-item" href="#">Historique Entreprise </a>
                                        <a class="dropdown-item" href="#">Mode Sombre</a>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-Blue">
                                        <th scope="col">Société</th>
                                        <th scope="col">Nom Tuteur</th>
                                        <th scope="col" class="text-center">Poste</th>
                                        <th scope="col">Nombre d'étudiant</th>
                                    </tr>
                                </thead>

                                <tbody id ="myTable">
                                  <?php
                                  foreach ($liste as $entreprise) :?>
                                    <tr>
                                        <td class="tm-product-name"><?= $entreprise["enom"]?></td>
                                        <td class="tm-product-name"><?php if($entreprise["tprenom"] === null or $entreprise["tnom"] === null){
                                            echo('Pas de tuteur');
                                        }
                                        else{
                                            $val1 = e($entreprise["tprenom"]);
                                            $val2 = e($entreprise["tnom"]);
                                            echo("$val1 $val2");
                                        }?></td>
                                        <td class="text-center"><?= $entreprise["description"] ?></td>
                                        <td class="text-center"><?= $entreprise["nb"]?></td>
                                        </div>
                                    </th>
                                    </tr>
                                    <?php  endforeach ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                            </div>
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

    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>

<?php require "view_end.php"?>

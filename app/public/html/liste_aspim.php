<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Spa-rac</title>
    <meta name="description" content="Spa-rac">
    <meta name="keywords" content="Spa-rac">
    <link rel="icon" type="image/ico" href="favicon.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <meta name="author" content="Spa-rac">
    <meta name="geo.placename" content="Tunisie,Tunis">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">

    <?php include '_css.php' ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="body" class="front">
<div class="wrap_spa">

    <!-- overlay -->
    <?php include '_overlay.php' ?>
    <!-- overlay -->

    <!-- header -->
    <header id="header_interne" class="header_interne">

        <div class="container-fluid no-padding">
            <div class="row">
                <!-- logo -->
                <?php include '_logo.php' ?>
                <!-- logo -->

                <!-- Menu -->
                <?php include '_menu_header.php' ?>
                <!-- Menu -->

                <div class="col-xs-12 col-sm-12 col-md-7 text-center">
                    <h1 class="title_top">
                        Liste des ASPIM
                    </h1>
                    <ul class="box_type_display">
                        <li class="list">
                            <a href="#?">liste</a>
                        </li>
                        <li class="carte">
                            <a href="liste_aspim_map.php">carte</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        <a href="index.php" class="breadcrumb_home" title="Accueil">Accueil</a>
                        <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="breadcrumb_current_page"> Liste des aspim</span>
                    </div>
                    <div class="container_search">
                        <form class="form_search row" method="post" action="" novalidate="novalidate">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <input type="text" name="recherche" class="input_recherche"
                                       placeholder="Rechercher dans la liste des ASPIM" autocomplete="off">
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="select_box_spa">
                                    <select class="" id="pays_aspim">
                                        <option>Pays</option>
                                        <option>Tunisie</option>
                                        <option>Tunisie</option>
                                        <option>Tunisie</option>
                                        <option>Tunisie</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="select_box_spa">
                                    <select class="" id="anne_inscri">
                                        <option>Anné inscri.</option>
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_sparac">
            <div class="container-fluid no-padding">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-1.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Tunisie</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Parc National de Zembra & Zembretta
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-2.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Espagne</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Parc Naturel de Cabo de Gata-Nijar
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-3.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Algérie</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Réserve Marine du Banc des Kabyles
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-4.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Italie</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Aire Marine Protégée de Portofino
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-5.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Chypre</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Réserve des tortues de Lara – Toxeftra
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-6.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Espagne</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Parc Naturel de Cabo de Gata-Nijar
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-7.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Algérie</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Réserve Marine du Banc des Kabyles
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <a href="fiche_aspim.php" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/img-8.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Italie</p>
                                    <span class="link_liste">
                                            <i class="zmdi zmdi-plus"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Aire Marine Protégée de Portofino
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">Statut:</span>
                                        <span class="texte_status">Parc national</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Année de Création :</span>
                                        <span class="texte_status">1977</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Texte de création :</span>
                                        <span class="texte_status">Decree no-77-34</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Superficie :</span>
                                        <span class="texte_status">5090 ha</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Categorie :</span>
                                        <span class="texte_status">II</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="show_more_list">
                            <i class="zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <?php include '_footer.php' ?>

    <?php include '_js.php' ?>
</div>
</body>
</html>

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

<body id="body">
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
                </div>

            </div>
        </div>
    </header>

    <section class="wrap_content_pages">
        <!--<img src="assets/images/jpg/bg_interne.jpg" alt="banniere interne" class="img_back_page" />-->
        <div class="bloc_top_fiche_aspim">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4">
                        <div class="bloc_fiche_aspim">
                            <div class="bloc_top_aspim">
                                <img src="assets/images/jpg/img-1.jpg" alt="image aspim" class="img_aspim"/>
                                <span class="lieu_aspim">Tunisie</span>
                                <a href="#?" class="loop_gallerie" data-toggle="modal" data-target="#gallerie_aspim"><i
                                            class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="bloc_bottom_aspim">
                                <h2 class="title_aspim">Parc National de Zembra & Zembretta</h2>
                                <ul>
                                    <li><span>Pays : </span>Tunisie</li>
                                    <li><span>Année de Création : </span>1977</li>
                                    <li><span>Date d’inclusion dans la liste : </span>1983</li>
                                    <li><span>Statut : </span>Parc national</li>
                                    <li><span>Texte de création : </span>Decree no-77-34</li>
                                    <li><span>Superficie : </span>5090 ha</li>
                                    <li><span>Superficie marine : </span>4000 ha</li>
                                    <li><span>Longueur de la côte principal : </span>8800 km</li>
                                    <li><span>Categorie : </span>II</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="owl-carousel owl_fiche_aspim owl-theme">
                            <div class="item"
                                 style="background: url(assets/images/png/ocean.png) bottom right no-repeat">
                                <div class="content_aspim">
                                    <h3 class="title_schema">Schéma ISEA : </h3>
                                    <p>Suivant la recommandation de la Quatorzième Réunion Ordinaire des Parties
                                        Contractantes à la Convention de Barcelone concernant l’établissement des
                                        inventaires, la cartographie et la mise en place des réseaux de surveillance des
                                        herbiers marins, le CAR/ASP.</p>
                                </div>
                                <a href="#?" class="downnload_aspim"><i class="fa fa-download"></i></a>
                            </div>
                            <div class="item">
                                <div class="content_aspim">
                                    <h3 class="titre_blc_details_aspim">Caractéristique physique : </h3>
                                    <p>Réaliser un inventaire et une caractérisation des herbiers de posidonies,</p>
                                </div>
                                <div class="content_aspim">
                                    <h3 class="titre_blc_details_aspim">Spécificité et importance : </h3>
                                    <p>Le projet vise essentiellement la collecte d’informations sur la présence et
                                        l’évolution des herbiers.</p>
                                </div>
                                <div class="content_aspim">
                                    <h3 class="titre_blc_details_aspim">Territoire : </h3>
                                    <p>Ce projet a été développé grâce au soutien financier de la Fondation Total</p>
                                </div>
                                <div class="content_aspim">
                                    <h3 class="titre_blc_details_aspim">Management </h3>
                                    <p>Cartographier les herbiers sélectionnés</p>
                                </div>
                                <a href="#?" class="downnload_aspim"><i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="website_aspim">
                            <p><span>Site web : </span> <a href="#?" target="_blank"> www.p_n_zembrazembretta.tn</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="bloc_bas_fiche_aspim">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="liste_aspim.php" class="btn_back_page"><i class="zmdi zmdi-chevron-left"></i></a>
                    </div>
                    <div class="col-xs-8 blc_btn_download_pdf">
                        <a href="#?" class="btn_download_pdf"><i
                                    class="fa fa-download"></i><span>Télécharger fiche PDF</span></a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Modal -->
    <div id="gallerie_aspim" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <a href="index.php" class="img_logo_overlay"><img src="assets/images/png/logo.png" alt="logo"/></a>
                    <button type="button" class="close btn_close_modal" data-dismiss="modal"><i
                                class="zmdi zmdi-close"></i></button>
                    <div class="owl-carousel owl_gallerie_aspim owl-theme">
                        <div class="item">
                            <img src="assets/images/jpg/img_gal1.jpg"/>
                        </div>
                        <div class="item">
                            <img src="assets/images/jpg/img_gal1.jpg"/>
                        </div>
                        <div class="item">
                            <img src="assets/images/jpg/img_gal1.jpg"/>
                        </div>
                    </div>
                    <div class="owl_nav_gal">
                        <div class="container">
                            <button type="button" role="presentation" class="owl-prev"><i
                                        class="zmdi zmdi-chevron-left"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i
                                        class="zmdi zmdi-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php include '_footer.php' ?>

    <?php include '_js.php' ?>
</div>
</body>
</html>

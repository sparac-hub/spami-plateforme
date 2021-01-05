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
                        Liste des gestionnaires
                    </h1>
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
                        <span class="breadcrumb_current_page"> Liste des gestionnaires</span>
                    </div>
                    <div class="container_search">
                        <form class="form_search row" method="post" action="" novalidate="novalidate">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <input type="text" name="recherche" class="input_recherche"
                                       placeholder="Rechercher des gestionnaires" autocomplete="off">
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
                                        <option>ASPIM</option>
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
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-1.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Tunisie</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Arlette Du pont
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-2.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Albanie</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Slim Ben Falten
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-3.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Algérie</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Arlette Du pont
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-4.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Liban</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Arlette Du pont
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-5.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Tunisie</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Arlette Du pont
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-6.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Albanie</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Slim Ben Falten
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-7.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Algérie</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Arlette Du pont
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                        <div href="#?" class="fiche_liste">
                            <div class="content_img_liste">
                                <div class="img_liste">
                                    <img src="assets/images/jpg/gestionnaire-8.jpg" alt="">
                                </div>
                                <div class="content_tag_link">
                                    <p class="tag_liste">Liban</p>
                                </div>
                            </div>
                            <div class="content_fiche_liste">
                                <h2 class="title_liste">
                                    Arlette Du pont
                                </h2>
                                <div class="bottom_listes">
                                    <div class="row_status">
                                        <span class="title_status">ASPIM:</span>
                                        <span class="texte_status">Port-Cros National Park</span>
                                    </div>

                                    <div class="row_status">
                                        <span class="title_status">Email :</span>
                                        <span class="texte_status">arlette.dupont@post-cros.com</span>
                                    </div>
                                    <div class="row_status">
                                        <span class="title_status">Site :</span>
                                        <a href="#?" class="texte_status link_status">www.Post-cros.com</a>
                                    </div>
                                    <div class="row_tel_fiche">
                                        <a href="tel:+698369885697" class="icon_tel_fiche">
                                            <i class="fa fa-phone"></i>
                                            <span class="num_tel_fiche">(+698)369885697</span>
                                        </a>
                                        <a href="tel:+698369885697" class="icon_skype_fiche">
                                            <i class="zmdi zmdi-skype"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
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

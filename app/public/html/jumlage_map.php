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
                        Les programmes de jumelage
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
                        <span class="breadcrumb_current_page"> Liste des aspim</span>
                    </div>
                    <div class="container_search">
                        <form class="form_search row" method="post" action="" novalidate="novalidate">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input type="text" name="recherche" class="input_recherche"
                                       placeholder="Rechercher dans la liste des ASPIM" autocomplete="off">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_map">
            <div class="container-fluid no-padding">
                <div class="col-md-3 no-padding bloc_right_map">
                    <h3>Liste des jumelages</h3>
                    <ul>
                        <li><a href="#?">MedMPA</a></li>
                        <li><a href="#?">MedPosidonia Project</a></li>
                        <li><a href="#?">Completed</a></li>
                        <li><a href="#?">MedMPA</a></li>
                        <li><a href="#?">MedPosidonia</a></li>
                        <li><a href="#?">EcAp-Med I</a></li>
                        <li><a href="#?">EcAp-Med II</a></li>
                        <li><a href="#?">MedMPAnet</a></li>
                        <li><a href="#?">MedKeyHabitats</a></li>
                        <li><a href="#?">SPAMIs in open seas</a></li>
                        <li><a href="#?">Deep Sea Lebanon</a></li>
                        <li><a href="#?">Underway</a></li>
                        <li><a href="#?">MedMPA Network</a></li>
                        <li><a href="#?">Bycatch</a></li>
                        <li><a href="#?">Kuriat</a></li>
                        <li><a href="#?">Marine Turtles</a></li>
                        <li><a href="#?">MedKeyHabitats II</a></li>
                        <li><a href="#?">Odyssea Project</a></li>
                        <li><a href="#?">Species Project</a></li>
                        <li><a href="#?">SPAMI Project</a></li>
                        <li><a href="#?">QUIETMED2</a></li>
                    </ul>
                </div>
                <div class="col-md-9 no-padding col_map_jumlage">
                    <img src="assets/images/jpg/img_map.jpg">
                    <div class="bloc_infos_map">
                        <div class="title_info_map">
                            MedPosidonia Project
                        </div>
                        <p class="text_info_map">
                            Following the recommendation of the 14th Ordinary Meeting of the Contracting Parties to the
                            Barcelona Convention...
                        </p>
                        <a href="#?" class="link_liste">
                            <i class="zmdi zmdi-plus"></i>
                        </a>
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

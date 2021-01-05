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
                        Contact
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

                </div>
            </div>
        </div>
        <div class="container container_contact">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-2 float-right-menu">
                    <span class="title_col_form">Nos coordonnées</span>
                    <span class="subtitle_col_form">Centre d’Activités Régionales pour les Aires Spécialement Protégées (CAR/ASP)</span>
                    <p class="adress_sparac"><span>Adresse:</span> Boulevard du Leader Yasser Arafet - B.P. 337 - 1080 -
                        Tunis Cedex - Tunisie</p>
                    <p class="adress_sparac"><span>Téléphone:</span> +216 71 206 649 / +216 71 206 485</p>
                    <p class="adress_sparac"><span>Email:</span> <a href="mailto:car-asp@spa-rac.org">car-asp@spa-rac.org</a>
                    </p>
                    <div class="iframe_sparac">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d25539.2014521114!2d10.144775736910384!3d36.85683897101109!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2stn!4v1536750527207"
                            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 block_form_contact">
                    <span class="title_col_form">Formulaire de contact</span>
                    <form class="form_contact" id="form_contact" action="/#?">
                        <div class="form-group">
                            <input class="form-control form-control-sparac" type="text" id="nom" name="nom"
                                   placeholder="Nom *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-sparac" type="text" id="prenom" name="prenom"
                                   placeholder="Prénom *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-sparac" type="email" id="email" name="mail"
                                   placeholder="Adresse mail *" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-sparac" rows="5" id="message" name="message"
                                      placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <span class="text_obligatoire">* Champ obligatoire</span>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                                <button type="submit" class="btn_submit_sparac">Envoyer</button>
                            </div>
                        </div>
                    </form>
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

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
                        Détails News
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
        <div class="container container_cms">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    <div class="img_detail_news">
                        <img src="assets/images/jpg/img_cms-1.jpg">
                    </div>

                    <h2 class="title_h2">Titre paraghraphe (h2)</h2>

                    <div class="title_cms">
                        On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions, et empêche de se concentrer.
                    </div>

                    <p>
                        Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                        impression. Le Lorem Ipsum est le faux texte
                        standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble
                        des morceaux de texte pour réaliser un livre
                        spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté
                        à la <a href="#?">bureautique informatique,</a> sans que son
                        contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles
                        Letraset contenant des passages du Lorem Ipsum.
                    </p>

                    <p>
                        plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus
                        PageMaker mais la majeure partie d'entre elles a
                        été altérée par l'addition d'humour ou de mots aléatoires.
                    </p>


                    <ul class="list_cms">
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i> Neque porro quisquam est qui dolorem
                            ipsum quia dolor sit amet, consectetur, adipisci velit
                        </li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i> Duis quis massa ut elit tempus
                            pharetra.
                        </li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i> Nulla faucibus metus vitae metus
                            pellentesque, et scelerisque nibh placerat.
                        </li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i> Quisquam est qui dolorem ipsum quia
                            dolor
                        </li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i> Neque porro quisquam est qui dolorem
                            ipsum quia dolor sit amet,
                        </li>
                    </ul>
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

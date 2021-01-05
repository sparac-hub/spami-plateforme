$(document).ready(function () {

    $(".owl_gallerie_aspim").owlCarousel({
        center: false,
        items: 1,
        loop: false,
        margin: 0,
        nav: false,
        dots: false,

    });
    $(".owl_gallerie_aspim").trigger("refresh.owl.carousel");

    $('.owl_nav_gal .owl-next').on('click', function () {
        $(".owl_gallerie_aspim").trigger('next.owl.carousel');
    });

    $('.owl_nav_gal .owl-prev').on('click', function () {
        $(".owl_gallerie_aspim").trigger('prev.owl.carousel');
    });


    $(".owl_fiche_aspim").owlCarousel({
        center: false,
        items: 2,
        loop: false,
        margin: 30,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },

            768: {
                items: 2
            }
        }

    });
    $(".banner_principale").owlCarousel({
        center: false,
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: false,

    });
    $(".banner_principale").trigger("refresh.owl.carousel");


    $('.bloc_next_slide a').on('click', function () {
        $(".banner_principale").trigger('next.owl.carousel');
    });


    $('.icon_menu').on('click', function () {
        $(this).toggleClass('active');
        $('.overlay').toggleClass('open');

        if ($('.overlay').hasClass('open')) {
            $(".icon_lang").css("display", "inline-block");
            $("body").css("overflow-y", "hidden");
        } else {
            $(".icon_lang").css("display", "none");
            $("body").css("overflow-y", "auto");
        }

    });

    /****magnificPopup********/
    $('.popup-youtube').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    /****datepicker********/
    $.fn.datepicker.dates['fr'] = {
        days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
        months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1,
        format: "dd/mm/yyyy"
    };
    $('.datepicker').datepicker({
        language: 'fr',
        autoclose: true,
        todayHighlight: true
    });


    jQuery('.scrollbar-inner').scrollbar();

    $('.title_quest_faq').on('click', function () {
        $(this).parent().find('.content_quest_faq').slideToggle();
        $(this).find('.toggle_faq').toggleClass('active_title');
    });

    // ------- contact form validate ------- //
    $("#form_contact").validate({
        rules: {
            'nom': {
                required: true,
                lettersonly: true
            },
            'prenom': {
                required: true,
                lettersonly: true
            },
            'email': {
                required: true,
                email: true
            }
        },
        messages: {
            'nom': {
                required: 'Nom est obligatoire',
                lettersonly: 'Veuillez insérer seulement des caractères'
            },
            'prenom': {
                required: 'Prénom est obligatoire',
                lettersonly: 'Veuillez insérer seulement des caractères'
            },
            'phone': {
                required: 'Téléphone est obligatoire',
                digits: 'Veuillez insérer seulement des chiffres',
                minlength: 'Veuillez entrer au moins 8 caractères.'
            },
            'email': {
                required: 'Email est obligatoire',
                email: 'Email est invalide'
            }
        }
    });


});


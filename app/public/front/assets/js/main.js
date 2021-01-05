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
        nav: true,
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
    /*********back-to-top**********/
    $('.back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 1000);

    });
    /*********max input date**********/
    $(".input_annee_recherche").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });

    /*$('.input_annee_recherche[type=number][max]:not([max=""])').on('input', function(ev) {
        var $this = $(this);
        var maxlength = $this.attr('max').length;
        var value = $this.val();
        if (value && value.length >= maxlength) {
            $this.val(value.substr(0, maxlength));
        }
    });*/

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


    $('.toggle_bloc_map').on('click', function () {
        $(this).parent().find('.bloc_left_map_aspim').toggleClass('toggle_bloc_left');
        $(this).toggleClass('active_toggle_btn');
    });

    // ------- contact form validate FR------- //
    if (document.documentElement.lang.toLowerCase() === "fr") {
        $("#form_contact").validate({
            rules: {
                'last_name': {
                    required: true,
                    lettersonly: true
                },
                'first_name': {
                    required: true,
                    lettersonly: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'message': {
                    required: true
                }
            },
            messages: {
                'last_name': {
                    required: 'Nom est obligatoire',
                    lettersonly: 'Veuillez insérer seulement des caractères'
                },
                'first_name': {
                    required: 'Prénom est obligatoire',
                    lettersonly: 'Veuillez insérer seulement des caractères'
                },
                'email': {
                    required: 'Email est obligatoire',
                    email: 'Email est invalide'
                },
                'message': {
                    required: 'Message est obligatoire'
                }
            }
        });
    }
    // ------- contact form validate EN ------- //
    if (document.documentElement.lang.toLowerCase() === "en") {
        $("#form_contact").validate({
            rules: {
                'last_name': {
                    required: true,
                    lettersonly: true
                },
                'first_name': {
                    required: true,
                    lettersonly: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'message': {
                    required: true
                }
            },
            messages: {
                'last_name': {
                    required: 'Name is required',
                    lettersonly: 'Please insert only characters'
                },
                'first_name': {
                    required: 'First name is required',
                    lettersonly: 'Please insert only characters'
                },
                'email': {
                    required: 'Email is required',
                    email: 'Email is invalid'
                },
                'message': {
                    required: 'Message is required'
                }
            }
        });
    }


});

jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters");

/* Sample function that returns boolean in case the browser is Internet Explorer*/
function isIE() {
    ua = navigator.userAgent;
    /* MSIE used to detect old browsers and Trident used to newer ones*/
    var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

    return is_ie;
}

/* Create an alert to show if the browser is IE or not */
if (isIE()) {
    $('option').each(function () {
        var optionText = this.text;
        var newOption = optionText.substring(0, 36);
        $(this).text(newOption + '...');
    });
}

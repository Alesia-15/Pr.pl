$(document).ready(function () {

    $('#form-3').submit(function() {
        var model = $('#form-3 input[name="model"]').val();
        var phone = $('#form-3 input[name="phone"]').val();
        if(model != "" && phone != "")
        {
            $('#form-3 input[type="submit"]').attr('disabled', true);
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    $(".shops-row.owl-carousel").owlCarousel({
        loop:true,
        /*margin:20,*/
        nav:true,
        /*stagePadding: 20,*/
        autoHeight: false,
        responsive:{
            0:{
                items:1,
                dots: 0,
                stagePadding: 0,
                nav:1,
            },
            576:{
                items:2,
                nav:false,
            },
            768:{
                items:3,
                nav:false,
            },
            1200:{
                items:4,
            }
        }
    });

    $(".akcii.owl-carousel").owlCarousel({
        loop:false,
        margin:20,
        nav:true,
        stagePadding: 15,
        responsive:{
            0:{
                items:1,
                dots: 0
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    search = document.location.search;
    if ((search.length) > 0 && (search.indexOf('utm_source') > -1)) {
        expires = new Date((Date.now() + 24*3600*1000*700)).toUTCString()
        document.cookie="search=" + search + "; Domain=.privoz.pl; expires=" + expires;
    }

    $('.splLink').each(function() {
        let link = $(this);
        link.on('click', function() {
            setTimeout( function() {
                console.log(link.next('.splCont').css('display'))
                if ( link.next('.splCont').css('display') === 'block' ) {
                    link.addClass('active');
                } else {
                    link.removeClass('active');
                }
            }, 500);
        });
    });

    $("#phone").mask("+375 (99) 999-9999");
    $("input[name~='phone']").mask("+375 (99) 999-9999");

    /* karatt */
    function scrollAnchor(elem) {
        var el = elem.attr('href');
        var elScroll = $(el).offset().top-100;

        $('html, body').animate({
            scrollTop: elScroll}, 1500);

        return false;
    }

    $('.menu a[href^="#"]').click(function(){
        scrollAnchor($(this));
    });

    $( 'a[href^="#"]' ).click( function(e) {
        e.preventDefault();
        scrollAnchor($(this));
    } );

    /*** Add attribute ***/
    $("a.close").click(function () {
        $(".overlay").fadeOut();
        $("#new-order").fadeOut();
    });
    $("a.close-call").click(function () {
        $(".overlay").fadeOut();
        $("#call-order").fadeOut();
    });


    /*** Remove attribute ***/
    $("a.fast-order").click(function () {
        $(".overlay").fadeIn();
        $("#new-order").fadeIn();
    });
    /////
    $("a.close-fast-order").click(function () {
        $(".overlay").fadeOut();
        $("#fast-order").fadeOut();
    });
    $("a.fast-order-form").click(function () {
        $(".overlay").fadeIn();
        $("#fast-order").fadeIn();
    });
    /////
    $("a.call-order").click(function () {
        $(".overlay").fadeIn();
        $("#call-order").fadeIn();
    });

    $("a.blog-price").click(function () {
        $(".overlay2").fadeIn();
        $("#blog-price").fadeIn();
    });

    $("a.close-blog-price").click(function () {
        $(".overlay2").fadeOut();
        $("#blog-price").fadeOut();
    });

	$('.splLink').click(function () {
        $(this).parent().children('div.splCont').toggle('normal');
        return false;
    });

    /* Показ всех чатов при клике по лаунчеру */
    $('.launcher-button').click(function () {
        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened').addClass('active');
            $('.all-chats').hide(500);
        } else {
            $('.all-chats').show(500);
            $(this).delay(1200).addClass('opened').removeClass('active');
        }
    });
    /* Показ чат бота при клике */
    $('.open-bot').click(function () {
        $('.all-chats, .launcher-button').hide(500);
        $('.display-bot').delay(500).show(1200);
        $('.close-bot').delay(1500).show(500);
    });
    /* Прячим чат бот  */
    $('.close-bot').click(function () {
        $(this).hide(500);
        $(this).parent().hide(1500);
        $('.launcher-button').delay(1500).show(500);
        $('.all-chats').delay(1500).show(500);
    });
    /* Покажем кнопку чат бота с задержкой */
    $(function () {      // сработает, когда документ загрузится
        $('#widget-chatbot').delay(3000) // пауза в 3 сек.
            .show(1000); // появление элемента в течении 1 сек.
        setTimeout(function () { // добавим класс для старта анимации
            $('.launcher-button').addClass('active');
        }, 7000);
    });

});

// Одинаковая высота карточек категорий и магазинов
$(window).on('scroll load resize', function(){

    function fixMenu() {
        var nav = $('.top');
        var menuHead = $('.menu');
        var callButton = $('.call');

        // if ($(document).width() >= 991) {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 136) {
                nav.addClass("fixed");
                menuHead.addClass("fix");
                callButton.attr("style", "position:fixed; top:2%;z-index:9999999999;float:none;right:4%;");
            } else {
                nav.removeClass("fixed");
                menuHead.removeClass("fix");
                callButton.removeAttr("style");
            }
        });
        // }
    }
    fixMenu();

    var max_height = Math.max.apply(0, $('.item-shop, .item-cat').map(function(){
        $(this).height('auto');

        return $(this).height();
    }).get());

    if($(window).width() >= 766 ) {
        $(".item-shop, .item-cat").height(max_height);
        $(".item-shop, .item-cat").find('a').css({'position': 'relative', 'top': '50%', 'transform': 'translateY(-50%)'});
    }

    if ( $(window).width() <= 991 ) {
        $('.open-close-menu').on('click', function() {
            $('header .menu').toggleClass('active');
        });

        $('.open-close-submenu > a').on('click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass('active');
        });
    }

    div_arr = document.getElementsByClassName('bloglink');
    for (var i = 0; i < div_arr.length; i++) {
        if (div_arr[i].innerHTML.length > 50) {
            div_arr[i].innerHTML = div_arr[i].innerHTML.substr( 0, 50 )+ "...";
        }
    }
});


// Одинаковая высота карточек категорий и магазинов
$(window).on('scroll load resize', function(){

    function fixMenu() {
        var nav = $('.top');
        var menuHead = $('.menu');
        // var callButton = $('.call');

        // if ($(document).width() >= 991) {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 136) {
                nav.addClass("fixed");
                menuHead.addClass("fix");
                // callButton.attr("style", "position:fixed; top:2%;z-index:9999999999;float:none;right:4%;");
            } else {
                nav.removeClass("fixed");
                menuHead.removeClass("fix");
                // callButton.removeAttr("style");
            }
        });
        // }
    }
    fixMenu();

    var max_height = Math.max.apply(0, $('.item-shop, body:not(.home-page):not(.inner-page) .item-cat').map(function(){
        $(this).height('auto');

        return $(this).height();
    }).get());

    if($(window).width() >= 766 ) {
        $(".item-shop, body:not(.home-page):not(.inner-page) .item-cat").height(max_height);
        $(".item-shop, body:not(.home-page):not(.inner-page) .item-cat").find('a').css({'position': 'relative', 'top': '50%', 'transform': 'translateY(-50%)'});
    }

    div_arr = document.getElementsByClassName('bloglink');
    for (var i = 0; i < div_arr.length; i++) {
        if (div_arr[i].innerHTML.length > 50) {
            div_arr[i].innerHTML = div_arr[i].innerHTML.substr( 0, 50 )+ "...";
        }
    }
});

// если в URL есть #anhor, то скролим к нему после загрузки
window.addEventListener("load", function(event) {
    if (location.hash !== '') {
        let anhor = location.hash.slice(1,),
            elem = document.getElementById(anhor);
        elem.scrollIntoView({block: "top", behavior: "smooth"});
    }
});

$(document).ready(function () {

    $('#form-1, #form-3, #form-4, #form-6').on('submit', function(event) {
        event.preventDefault();
        $('.error').remove();

        var inputEmail = $(this).find("input[type=email]"),
            email = inputEmail.val(),
            inputPhone = $(this).find("input[name=phone]"),
            phone = inputPhone.val(),
            subm = $(this, ":submit");

        if (email != "" || phone != "") { //если хоть одно поле не пустое отправляем форму
            subm.attr('disabled', true);
            this.submit();
        } else { // если нет, то выдаем ошибку
            if (email == "" && phone == "") {
                if ($(inputEmail).next('.error').length < 1 || $(inputPhone).next('.error').length < 1 ) {
                    $(inputEmail).after('<small class="error">Заполните поле Email или телефон</small>');
                    $(inputPhone).after('<small class="error">Заполните поле телефон или Email</small>');
                }
            }
        }
    });

    /*$('#form-3').submit(function() {
        var model = $('#form-3 input[name="model"]').val();
        var phone = $('#form-3 input[name="phone"]').val();
        if(model != "" && phone != "")
        {
            $('#form-3 input[type="submit"]').attr('disabled', true);
        }
    });*/

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
    function scrollAnchor(event, elem) {
        if (location.href == location.origin) {
            event.preventDefault();
            var el = elem.attr('href');
            var elScroll = $(el).offset().top-100;

            $('html, body').animate({
                scrollTop: elScroll
            }, 1500);
        }
        return false;
    }



    $( 'a[href^="#"]' ).click( function(e) {
        scrollAnchor(e, $(this));
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

    if ( $(window).width() <= 991 ) {
        $('.open-close-menu').on('click', function() {
            $('header .menu').toggleClass('active');
        });

        $('.open-close-submenu > a').on('click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass('active');
        });
    }
});
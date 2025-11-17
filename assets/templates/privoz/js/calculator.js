
$(document).ready(function(){   
        /*** Add attribute ***/
        $("a.close").click(function(){
            $(".overlay").fadeOut();
            $("#new-order").fadeOut();
        });     
		$("a.close-call").click(function(){
            $(".overlay").fadeOut();
            $("#call-order").fadeOut();
        }); 
		
		
        /*** Remove attribute ***/
        $("a.fast-order").click(function(){
            $(".overlay").fadeIn();
            $("#new-order").fadeIn();
        });
	/////
		$("a.close-fast-order").click(function(){
            $(".overlay").fadeOut();
            $("#fast-order").fadeOut();
        }); 
		$("a.fast-order-form").click(function(){
            $(".overlay").fadeIn();
            $("#fast-order").fadeIn();
        });
	/////
		$("a.call-order").click(function(){
            $(".overlay").fadeIn();
            $("#call-order").fadeIn();
        });
	
		$("a.blog-price").click(function(){
            $(".overlay2").fadeIn();
            $("#blog-price").fadeIn();
        });
	
		$("a.close-blog-price").click(function(){
            $(".overlay2").fadeOut();
            $("#blog-price").fadeOut();
        });

	
		var nav = $('.top');
		var menuHead = $('.menu');
		var callButton = $('.call');
		
		$(window).scroll(function () {
			if ($(this).scrollTop() > 136) {
				nav.addClass("fixed");
				menuHead.addClass("fix");
				callButton.attr("style","position:fixed; top:2%;z-index:9999999999;float:none;right:4%;");
			} else {
				nav.removeClass("fixed");
				menuHead.removeClass("fix");
				callButton.removeAttr("style");
			}
		});
		
		$('.splLink').click(function(){
		  $(this).parent().children('div.splCont').toggle('normal');
		  return false;
		});
	/* Показ всех чатов при клике по лаунчеру */
	$('.launcher-button').click(function(){
		if( $(this).hasClass('opened') ) {
			$(this).removeClass('opened').addClass('active');
			$('.all-chats').hide(500);
		} else {
			$('.all-chats').show(500);
			$(this).delay(1200).addClass('opened').removeClass('active');
		}
    });
	/* Показ чат бота при клике */
	$('.open-bot').click(function(){
		$('.all-chats, .launcher-button').hide(500);
		$('.display-bot').delay(500).show(1200);
		$('.close-bot').delay(1500).show(500);
    });
	/* Прячим чат бот  */
	$('.close-bot').click(function(){
		$(this).hide(500);
		$(this).parent().hide(1500);
		$('.launcher-button').delay(1500).show(500);
		$('.all-chats').delay(1500).show(500);
    });
	/* Покажем кнопку чат бота с задержкой */
	$(function(){      // сработает, когда документ загрузится
		$('#widget-chatbot').delay(3000) // пауза в 3 сек.
					.show(1000); // появление элемента в течении 1 сек.
		setTimeout (function() { // добавим класс для старта анимации
		  $('.launcher-button').addClass('active');
		}, 7000);
	});
});
		$(document).ready(function(){
   $("#phone").mask("+7(999) 999-99-99");
   $("#phone1").mask("+7(999) 999-99-99");
   $("#phone2").mask("+7(999) 999-99-99");
$("input").focus(function(event) {
    event.preventDefault();
}).focusin(function(event) {
    event.preventDefault();
});
                        $("#show_foto_1").css("display","none");
			PopUpHideForma();
			PopUpHideFormaD();
			PopUpHideSRO();
			PopUpHideSV();
			PopUpHideREV1();
			PopUpHideREV2();
			PopUpHideREV3();
				PopUpHideIMG();
				PopUpHideIMG2();
				PopUpHideIMG3();
				PopUpHideIMG4();
				PopUpHideIMG5();
				PopUpHideIMG6();
				PopUpHideIMG7();
				PopUpHideIMG8();
				PopUpHideIMG9();
				PopUpHideIMG10();
				PopUpHideIMG11();
				PopUpHideIMG12();
				PopUpHideIMG13();
				PopUpHideIMG14();
				PopUpHideIMG15();
				PopUpHideIMG16();
				PopUpHideIMGB1();
				PopUpHideIMGB2();
				PopUpHideIMGB3();
				PopUpHideIMGB4();
			//меню скролл
			var $menu = $("#menu");
			$(window).scroll(function () {
				if ($(this).scrollTop() > 500 && $menu.hasClass("default")) {
					$menu.removeClass("default").addClass("fixed");
					//$('#contacts').fadeIn();
				} else if ($(this).scrollTop() <= 500 && $menu.hasClass("fixed")) {
					$menu.removeClass("fixed").addClass("default");
					//$('#contacts').fadeOut();
				} 
			}); //scroll
		});
                function validate() {  
                        $("#form_d").hide();
                        $("html,body").css("overflow","auto");
                        $("#menu").css("z-index","1511");
                }
		function PopUpHideBIGIMG() {
		        $("#show_foto_1").hide();
			$("#show_foto_1").addClass("fixed1");
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
                function ShowMenuClosePopUp() {
                       if ($(window).scrollTop() > 500) {
					$("#menu").removeClass("default").addClass("fixed");
					//$('#contacts').fadeIn();
				} else if ($(window).scrollTop() <= 500) {
					$("#menu").removeClass("fixed").addClass("default");
					//$('#contacts').fadeOut();
				} 
                }
		//Функция отображения PopUp
		function PopUpShowForma(a){
			$("#form .btn").val(a);
			$("#form .form_name").val(a);
			window.scrollTo(0,0);
			$("#form").show();
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowFormaSUB(){
			$("#form_sub").show();
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowFormaD(a){
			$("#form_d").show();
			$("#menu").css("z-index","0");
                        $("#menu").removeClass("fixed").addClass("default");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowSRO(){
			$("#popup1").show();
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowSV(){
			$("#popup2").show();
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowREV1(){
			$("#popup_rev1").show();
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowREV2(){
			$("#popup_rev2").show();
 			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		function PopUpShowREV3(){
			$("#popup_rev3").show();
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		//фото ховер
			function PopUpShowIMG(){
				$("#popup_imgf1").show();
			}
			function PopUpShowIMG2(){
				$("#popup_imgf2").show();
			}
			function PopUpShowIMG3(){
				$("#popup_imgf3").show();
			}
			function PopUpShowIMG4(){
				$("#popup_imgf4").show();
			}
			function PopUpShowIMG5(){
				$("#popup_imgf5").show();
			}
			function PopUpShowIMG6(){
				$("#popup_imgf6").show();
			}
			function PopUpShowIMG7(){
				$("#popup_imgf7").show();
			}
			function PopUpShowIMG8(){
				$("#popup_imgf8").show();
			}
			function PopUpShowIMG9(){
				$("#popup_imgf9").show();
			}
			function PopUpShowIMG10(){
				$("#popup_imgf10").show();
			}
			function PopUpShowIMG11(){
				$("#popup_imgf11").show();
			}
			function PopUpShowIMG12(){
				$("#popup_imgf12").show();
			}
			function PopUpShowIMG13(){
				$("#popup_imgf13").show();
			}
			function PopUpShowIMG14(){
				$("#popup_imgf14").show();
			}
			function PopUpShowIMG15(){
				$("#popup_imgf15").show();
			}
			function PopUpShowIMG16(){
				$("#popup_imgf16").show();
			}
			function PopUpShowIMGB1(){
				$("#popup_img_b1").show();
			}
			function PopUpShowIMGB2(){
				$("#popup_img_b2").show();
			}
			function PopUpShowIMGB3(){
				$("#popup_img_b3").show();
			}
			function PopUpShowIMGB4(){
				$("#popup_img_b4").show();
			}
		//показ большого фото
		function PopUpShowBIGIMG() {
			$("#show_foto_1").show();
			$("#show_foto_1").removeClass("fixed1").addClass("default1");
                        $("#show_foto_1").css("visibility","visible");
			$("#menu").removeClass("fixed").addClass("default");
                        $("#menu").css("z-index","0");
                        $("html,body").css("overflow","hidden");
		}
		//Функция скрытия PopUp
		function PopUpHideForma(){
			$("#form").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
		function PopUpHideFormaSUB(){
			$("#form_sub").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
                function PopUpHideFormaD(){
			$("#form_d").hide();
                        $("html,body").css("overflow","auto");
                        $("#menu").css("z-index","1511");
		}
		function PopUpHideSRO(){
			$("#popup1").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
		function PopUpHideSV(){
			$("#popup2").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
		function PopUpHideREV1(){
			$("#popup_rev1").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
		function PopUpHideREV2(){
			$("#popup_rev2").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
		function PopUpHideREV3(){
			$("#popup_rev3").hide();
                        $("#menu").css("z-index","1511");
                        $("html,body").css("overflow","auto");
		}
		//фото ховер скрытие
			function PopUpHideIMG(){
				$("#popup_imgf1").hide();
			}
			function PopUpHideIMG2(){
				$("#popup_imgf2").hide();
			}
			function PopUpHideIMG3(){
				$("#popup_imgf3").hide();
			}
			function PopUpHideIMG4(){
				$("#popup_imgf4").hide();
			}
			function PopUpHideIMG5(){
				$("#popup_imgf5").hide();
			}
			function PopUpHideIMG6(){
				$("#popup_imgf6").hide();
			}
			function PopUpHideIMG7(){
				$("#popup_imgf7").hide();
			}
			function PopUpHideIMG8(){
				$("#popup_imgf8").hide();
			}
			function PopUpHideIMG9(){
				$("#popup_imgf9").hide();
			}
			function PopUpHideIMG10(){
				$("#popup_imgf10").hide();
			}
			function PopUpHideIMG11(){
				$("#popup_imgf11").hide();
			}
			function PopUpHideIMG12(){
				$("#popup_imgf12").hide();
			}
			function PopUpHideIMG13(){
				$("#popup_imgf13").hide();
			}
			function PopUpHideIMG14(){
				$("#popup_imgf14").hide();
			}
			function PopUpHideIMG15(){
				$("#popup_imgf15").hide();
			}
			function PopUpHideIMG16(){
				$("#popup_imgf16").hide();
			}
			function PopUpHideIMGB1(){
				$("#popup_img_b1").hide();
			}
			function PopUpHideIMGB2(){
				$("#popup_img_b2").hide();
			}
			function PopUpHideIMGB3(){
				$("#popup_img_b3").hide();
			}
			function PopUpHideIMGB4(){
				$("#popup_img_b4").hide();
			}
		//скрытие большого фото
	$( document ).ready(function() {
  $('.b-popup_form,.b-popup_rev2,.b-popup_rev1,.b-popup_rev3,.show_foto_1,.b-popupsv,.b-popup').click(function(event) {
    if ($(event.target).closest(".sale_form,#wrapper,.b-popup-content").length) return;
    PopUpHideForma(); PopUpHideFormaD();ShowMenuClosePopUp();PopUpHideSRO(); ShowMenuClosePopUp();PopUpHideBIGIMG(); ShowMenuClosePopUp();PopUpHideREV1(); ShowMenuClosePopUp();PopUpHideREV3(); ShowMenuClosePopUp();PopUpHideREV1(); ShowMenuClosePopUp();
    PopUpHideForma(); ShowMenuClosePopUp();PopUpHideREV2(); ShowMenuClosePopUp();PopUpHideSV(), ShowMenuClosePopUp();PopUpHideSRO(); ShowMenuClosePopUp();
    event.stopPropagation();
  });
  $("input").focus(function(event) {
    event.preventDefault();
	}).focusin(function(event) {
	    event.preventDefault();
	});
	function PopUpShowForma(){
			window.scrollTo(0,0);
			$("#form").show();
			$("#menu").removeClass("fixed").addClass("default");
            $("#menu").css("z-index","0");
            $("html,body").css("overflow","hidden");
	}
});
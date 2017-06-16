(function(){var a,b,c,d,e,f,g,h,i,j;b=window.device,a={},window.device=a,d=window.document.documentElement,j=window.navigator.userAgent.toLowerCase(),a.ios=function(){return a.iphone()||a.ipod()||a.ipad()},a.iphone=function(){return!a.windows()&&e("iphone")},a.ipod=function(){return e("ipod")},a.ipad=function(){return e("ipad")},a.android=function(){return!a.windows()&&e("android")},a.androidPhone=function(){return a.android()&&e("mobile")},a.androidTablet=function(){return a.android()&&!e("mobile")},a.blackberry=function(){return e("blackberry")||e("bb10")||e("rim")},a.blackberryPhone=function(){return a.blackberry()&&!e("tablet")},a.blackberryTablet=function(){return a.blackberry()&&e("tablet")},a.windows=function(){return e("windows")},a.windowsPhone=function(){return a.windows()&&e("phone")},a.windowsTablet=function(){return a.windows()&&e("touch")&&!a.windowsPhone()},a.fxos=function(){return(e("(mobile;")||e("(tablet;"))&&e("; rv:")},a.fxosPhone=function(){return a.fxos()&&e("mobile")},a.fxosTablet=function(){return a.fxos()&&e("tablet")},a.meego=function(){return e("meego")},a.cordova=function(){return window.cordova&&"file:"===location.protocol},a.nodeWebkit=function(){return"object"==typeof window.process},a.mobile=function(){return a.androidPhone()||a.iphone()||a.ipod()||a.windowsPhone()||a.blackberryPhone()||a.fxosPhone()||a.meego()},a.tablet=function(){return a.ipad()||a.androidTablet()||a.blackberryTablet()||a.windowsTablet()||a.fxosTablet()},a.desktop=function(){return!a.tablet()&&!a.mobile()},a.television=function(){var a;for(television=["googletv","viera","smarttv","internet.tv","netcast","nettv","appletv","boxee","kylo","roku","dlnadoc","roku","pov_tv","hbbtv","ce-html"],a=0;a<television.length;){if(e(television[a]))return!0;a++}return!1},a.portrait=function(){return window.innerHeight/window.innerWidth>1},a.landscape=function(){return window.innerHeight/window.innerWidth<1},a.noConflict=function(){return window.device=b,this},e=function(a){return-1!==j.indexOf(a)},g=function(a){var b;return b=new RegExp(a,"i"),d.className.match(b)},c=function(a){var b=null;g(a)||(b=d.className.replace(/^\s+|\s+$/g,""),d.className=b+" "+a)},i=function(a){g(a)&&(d.className=d.className.replace(" "+a,""))},a.ios()?a.ipad()?c("ios ipad tablet"):a.iphone()?c("ios iphone mobile"):a.ipod()&&c("ios ipod mobile"):a.android()?c(a.androidTablet()?"android tablet":"android mobile"):a.blackberry()?c(a.blackberryTablet()?"blackberry tablet":"blackberry mobile"):a.windows()?c(a.windowsTablet()?"windows tablet":a.windowsPhone()?"windows mobile":"desktop"):a.fxos()?c(a.fxosTablet()?"fxos tablet":"fxos mobile"):a.meego()?c("meego mobile"):a.nodeWebkit()?c("node-webkit"):a.television()?c("television"):a.desktop()&&c("desktop"),a.cordova()&&c("cordova"),f=function(){a.landscape()?(i("portrait"),c("landscape")):(i("landscape"),c("portrait"))},h=Object.prototype.hasOwnProperty.call(window,"onorientationchange")?"orientationchange":"resize",window.addEventListener?window.addEventListener(h,f,!1):window.attachEvent?window.attachEvent(h,f):window[h]=f,f(),"function"==typeof define&&"object"==typeof define.amd&&define.amd?define(function(){return a}):"undefined"!=typeof module&&module.exports?module.exports=a:window.device=a}).call(this);
var promo_code = '';

(function(){
	var spider_detect = function(user_agent) {
		var agent_dump = [
			['Aport', 'Aport robot'],
			['Google', 'Google'],
			['msnbot', 'MSN'],
			['Rambler', 'Rambler'],
			['Yahoo', 'Yahoo'],
			['AbachoBOT', 'AbachoBOT'],
			['accoona', 'Accoona'],
			['AcoiRobot', 'AcoiRobot'],
			['ASPSeek', 'ASPSeek'],
			['CrocCrawler', 'CrocCrawler'],
			['Dumbot', 'Dumbot'],
			['FAST-WebCrawler', 'FAST-WebCrawler'],
			['GeonaBot', 'GeonaBot'],
			['Gigabot', 'Gigabot'],
			['Lycos', 'Lycos spider'],
			['MSRBOT', 'MSRBOT'],
			['Scooter', 'Altavista robot'],
			['AltaVista', 'Altavista robot'],
			['WebAlta', 'WebAlta'],
			['IDBot', 'ID-Search Bot'],
			['eStyle', 'eStyle Bot'],
			['Mail.Ru', 'Mail.Ru Bot'],
			['Scrubby', 'Scrubby robot'],
			['Yandex', 'Yandex'],
			['Mediapartners-Google', 'Mediapartners-Google (Adsense)'],
			['Slurp', 'Hot Bot search'],
			['WebCrawler', 'WebCrawler search'],
			['ZyBorg', 'Wisenut search'],
			['ia_archiver', 'Alexa search engine'],
			['FAST', 'AllTheWeb'],
			['YaDirectBot', 'Yandex Direct'],
			['Googlebot'],
			['Mediapartners'],
		    ['rambler'],
		    ['googlebot'],
		    ['aport'],
		    ['yahoo'],
		    ['msnbot'],
		    ['turtle'],
		    ['mail.ru'],
		    ['omsktele'],
	    	['yetibot'],
	    	['picsearch'],
	    	['sape.bot'],
	    	['sape_context'],
	    	['gigabot'],
	    	['snapbot'],
	    	['alexa.com'],
	    	['megadownload.net'],
	    	['askpeter.info'],
	    	['igde.ru'],
	    	['ask.com'],
	    	['qwartabot'],
	    	['yanga.co.uk'],
	    	['scoutjet'],
	    	['similarpages'],
	    	['oozbot'],
	    	['shrinktheweb.com'],
	    	['aboutusbot'],
	    	['followsite.com'],
	    	['dataparksearch'],
	    	['google-sitemaps'],
	    	['appEngine-google'],
	    	['feedfetcher-google'],
	    	['liveinternet.ru'],
	    	['xml-sitemaps.com'],
	    	['agama'],
	    	['metadatalabs.com'],
	    	['h1.hrn.ru'],
	    	['googlealert.com'],
	    	['seo-rus.com'],
	    	['yaDirectBot'],
	    	['yandeG'],
	    	['yandex'],
	    	['yandexSomething'],
	    	['Copyscape.com'],['AdsBot-Google'],['domaintools.com'],
	    	['Nigma.ru'],
	    	['bing.com'],
	    	['dotnetdotcom']
		];
		var l = false;
		for(var j=0;j<agent_dump.length;j++) {
			if(user_agent.toLowerCase().indexOf(agent_dump[j][0].toLowerCase()) >=0 ) {
				l = true;
			}
		}

		return l;
	}
	//Глобальные переменные
	var fisrt_title = '';
	var style = '';
	var city = '';
	var promo_code = '';
	var from = '';
	var to = '';
	//Получили промо-код
	function get_promo_code(code){
		promo_code = code;
	//	console.log("Ваш промо код "+code);
		$('.promo').text(code);
		$(".promo_value").val(code);
	}
 	/*Определяем браузер*/
	function get_name_browser() {
		var ua = navigator.userAgent;
	    if (ua.search(/Edge/) > -1) return "Edge";
        if (ua.search(/MSIE/) > -1) return "IE";
        if (ua.search(/Trident/) > -1) return "ie11";
        if (ua.search(/Firefox/) > -1) return "Firefox";
        if (ua.search(/Opera/) > -1) return "Opera";
        if (ua.search(/OPR/) > -1) return "OperaWebkit";
        if (ua.search(/YaBrowser/) > -1) return "Yabrowser";
        if (ua.search(/Chrome/) > -1) return "Google Chrome";
        if (ua.search(/Safari/) > -1) return "Safari";
        if (ua.search(/Maxthon/) > -1) return "Maxthon";
		return 'Не определен';
	};

	function get_device(){
		if (device.mobile()) return 'mobile';
		if (device.tablet()) return 'tablet';
		if (device.desktop()) return 'desktop';
		return 'Не определен';
	}
	function getQueryVariable(variable) {
	    var query = decodeURIComponent(window.location.search.substring(1));
	    var vars = query.split('&');
	    for (var i = 0; i < vars.length; i++) {
	        var pair = vars[i].split('=');
	        if (decodeURIComponent(pair[0]) == variable) {
	            return decodeURIComponent(pair[1]);
	        }
	    }
	    return '';
	}

	var statistic = {
		'refer': window.location.referrer || document.referrer || '',
		'enter_page' : decodeURIComponent(window.location.pathname + window.location.search) || '',
		'chanel' : getQueryVariable('utm_medium'),
		'refer_key' : getQueryVariable('utm_term'),
		'count' : localStorage.getItem('count') || 0,
		'promo_code' : localStorage.getItem('promo_code') || 0,
		'browser' : get_name_browser() || '',
		'device' : get_device() || ''
	}

	function req(data){
		if ( !localStorage.getItem('last_update') || (parseInt(localStorage.getItem('last_update')) + 60000 < Date.now() )){
		data = JSON.stringify(data);
		$.post( "/promo_code/promo_code/api/metr.api.php", { data: data })
			.done(function( data ) {
		//		console.log(data);
				data_new = JSON.parse(data);

		   		if (data_new['action'])
		   		{

		   			if (data_new['promo_code']){
		   				localStorage.setItem('promo_code',data_new['promo_code']);
		   				get_promo_code(data_new['promo_code']);
				   	}else
				   	{
				   		if (localStorage.getItem('promo_code')){
							get_promo_code(localStorage.getItem('promo_code'));
						}
				   	}
				   	if (data_new['count']){
				   		localStorage.setItem('count',data_new['count']);
				   	}
				   	localStorage.setItem('last_update',Date.now());
				}
			});
		}else{
			if (localStorage.getItem('promo_code')){
				get_promo_code(localStorage.getItem('promo_code'));
			}
		}
		return (function(){

				var html_first_message = '';
				var html_second_message = '';
			  var second = 0;
			  var active = false;
			  var px_detected = false;
			  var returned = false;
			  var setting_second = 15;
			  var setting_top_margin = 40;
			  var break_question = 0;
        promo_code = localStorage.getItem('promo_code') || promo_code;
			  $.post( "/promo_code/feedback/api.php", {'action':'get_setting'}) /*Настройки feedback модуля*/
			  .done(function( data ) {
			    data1 = JSON.parse(data)['basic'];
			    basic = JSON.parse(data1);
			    setting_second = parseInt(basic['delay']);
			    setting_top_margin = parseInt(basic['top_margin']);
			    break_question = parseInt(basic['break']);
			    first = JSON.parse(data)['first'];
			    first = JSON.parse(first);
					fisrt_title = basic['fisrt_title'];
					to = basic['to'];
					from = basic['from'];

			  	//console.log(JSON.parse(data));
					if (basic['style'])
					{
						style = basic['style'];
						$('body').append('<style>'+style+'</style>');
					
					}
						$('body').append('<div class="promo-wrap" style="left: 0px; bottom: 0px;">'+
					'<div class="promo-text">Промокод</div><div class="promo">000</div></div>');
					$('.promo').text(promo_code);
			    html_first_message = '<div class="message fancy first_modal"><h2>'+fisrt_title+'</h2>';
					if (first && first.length != null){
				    for (var i=0;i<first.length;i++){
				      html_first_message += '<div style="" number="'+i+'" class="first_modal_line"><div class="custom-checkbox"><input type="checkbox"/></div><p>'+first[i]+'</p></div>';
				    }
					}
			    html_first_message += '<p class="line-other">Свой вариант</p><form><textarea placeholder="Текст сообщения"></textarea><input type="submit" сlass=""  value="Отправить"></form></div>';
			//		console.log(statistic);
					if (!statistic['refer_key']){
						var tm2 = 'Бесплатный замер и бесплатная смета по г. '+city;
					}else{
						var tm2 = 'Вы искали <b>'+statistic['refer_key']+'</b> в городе '+city+'?';
					}
			    html_second_message = '<div class="message fancy second_modal"><h2>'+tm2+'</h2><p>Возможно вы не нашли то, что искали. Но мы делаем эти работы.</p><p>Звоните сейчас: <span class="phone">'+basic['phone']+'</span>.</p>';
				//<p>Ваш промокод на подарок: <span class="promo_code">'+promo_code+'</span>!</p>
			    html_second_message += '<p>Или оставьте заявку на <strong>бесплатный</strong> звонок:</p><input type="text" placeholder="+7-(___)-___-____" class="phone_callback"><input type="submit" сlass=""  value="Отправить"></form></div>';
			 	
			  });

			  //Click to fist moadl window
				//Действия по клику кнопки первого модального окна
			  var first_modal_click = function(){

					var tmp = $('.first_modal textarea').val();

					$.post( "/promo_code/feedback/api.php", {action: 'other_update',promo_code: promo_code, other_update: tmp}).done(function( data ) {
						/* данные с окна прочее*/
				//		console.log(data);
					});
			    $.fancybox.close();
			    setTimeout(function(){
			    $.fancybox.open(html_second_message);
			    $(".phone_callback").mask("+7-(999)-999-9999");
					$('div.message.fancy.second_modal input[type="submit"]').click(function(){
						second_modal_click();
						return false;
					});
				}, 300);
			    
			  };
			  //

			  //Second modal Click
			  var second_modal_click = function(){
					//Обратный звонок
					var phone_second_modal = $('input.phone_callback').val();
					if (phone_second_modal){
					$.post( "/promo_code/feedback/api.php", {action: 'email',from: from,to: to,promo_code: promo_code,key: statistic['refer_key'],city:city,phone: phone_second_modal }).done(function( data ) {
				//		console.log(data);
						$.fancybox.close();
						
						if (typeof function_submit_second_popup == 'function')
  							function_submit_second_popup(to,statistic,phone_second_modal,promo_code);

					});
					}else{
						$('input.phone_callback').val('').addClass('error').change(function(){$('input.phone_callback').removeClass('error')});
					}
				};
			  //

			  setInterval(function(){
			    if ((second > setting_second) && !active){
			      active = true;
			      //Смотрим вышел ли курсор за пределы экрана
			      function f1(event){
			      		//console.log(event.pageY); 
			      		//var date = new Date();
        				//console.log(date.getTime());
			          var y = event.pageY;
			          if (px_detected){
			            $('div.message.fancy').mouseover(function(){
			              if (!returned){
			                $.post( "/promo_code/feedback/api.php", {action: 'returned',promo_code: promo_code }).done(function( data ) {
												/* Произощел возврат*/
											});
			                returned = true;
			              }
			            });
			          }
								/*Следим за курсором*/
						
						if (device.mobile())
							px_detected = true;
			          if ((event.pageY - $(window).scrollTop()) < setting_top_margin && !px_detected){
			            px_detected = true;
						$.fancybox.defaults.openEffect  = 'fade';
						$.fancybox.defaults.closeEffect = 'fade';
						$.fancybox.defaults.openSpeed   = 1000;
						$.fancybox.defaults.closeSpeed  = 1000;
			           // $.fancybox.defaults.speed = 500;
			            $.fancybox.open(html_first_message);

			            $('.first_modal_line').click(function(){
			            	$(this).find('.custom-checkbox').toggleClass('checked');
			            	 
			            	if ($(this).find('.custom-checkbox').find('input').prop("checked"))
			            	{
			            		$(this).find('.custom-checkbox').find('input').prop( "checked", false );
							} else {
								$(this).find('.custom-checkbox').find('input').prop( "checked", true );
							}
							update_checkbox();
							//console.log(break_question);
							//console.log($(this).attr('number') + 1);
							if (break_question == (parseInt($(this).attr('number')) + 1)){
								first_modal_click();
			              		return false;
							}
						});

									$(".first_modal textarea").change(function() {
											if (this.value.length > 200)
													this.value = this.value.substr(0, 200);
									});
									function update_checkbox(){ /*Следим за чекбоксами */
							
										var objects = $('.first_modal_line');
										var tmp = {}
										if (objects.length){
											for (var i = 0;i<objects.length;i++)
											{
												var question = $(objects[i]).find('p').text();
												var answer = $(objects[i]).find('input').prop('checked') ? true : false;
												tmp[question] = answer;
												
											}
											$.post( "/promo_code/feedback/api.php", {action: 'first_line_update',promo_code: promo_code, first_line: JSON.stringify(tmp)}).done(function( data ) {
													//Отправляем данные о чекбоксах ajaxом
												});
										}
									}
								
			            $('div.message.fancy.first_modal input[type="submit"]').click(function(){
			              first_modal_click();
			              return false;
			            });
			            return false;
			          }
			      };


			      $(document).mousemove(function(event){f1(event);});
			      $('body').mouseleave(function(event){f1(event);});

			    }else{
			      second++;
			    }
			  },1000);
		})();
	}
	if(!spider_detect(navigator.userAgent) && navigator.userAgent) { /*Запрашиваем данные о геопозиции*/
		return $.getJSON('http://api.sypexgeo.net/json/', function(data) {
			//console.log(data['city']['name_ru']);
		 	city = data['city']['name_ru'];
		 	var ip = data["ip"];
		 	statistic["ip"] = ip;
		  	statistic["city"] = city;
		 // 	console.log(statistic);
		  	if (!(data['city']['name_en'] == 'Mountain View'))
		 		req((statistic));

		 });
	}



})();

var TINY={};
function T$(i){return document.getElementById(i)}
function T$$(e,p){return p.getElementsByTagName(e)}

TINY.slider=function(){
	function slide(n,p){this.n=n; this.init(p)}
	slide.prototype.init=function(p){
		var s=this.x=T$(p.id), u=this.u=T$$('ul',s)[0], c=this.m=T$$('li',u), l=c.length, i=this.l=this.c=0; this.b=1;
		if(p.navid&&p.activeclass){this.g=T$$('li',T$(p.navid)); this.s=p.activeclass}
		this.a=p.auto||0; this.p=p.resume||0; this.r=p.rewind||0; this.e=p.elastic||false; this.v=p.vertical||0; s.style.overflow='hidden';
		for(i;i<l;i++){if(c[i].parentNode==u){this.l++}}
		if(this.v){;
			u.style.top=0; this.h=p.height||c[0].offsetHeight; u.style.height=(this.l*this.h)+'px'
		}else{
			u.style.left=0; this.w=p.width||c[0].offsetWidth; u.style.width=(this.l*this.w)+'px'
		}
		this.nav(p.position||0);
		if(p.position){this.pos(p.position||0,this.a?1:0,1)}else if(this.a){this.auto()}
		if(p.left){this.sel(p.left)}
		if(p.right){this.sel(p.right)}
	},
	slide.prototype.auto=function(){
		this.x.ai=setInterval(new Function(this.n+'.move(1,1,1)'),this.a*1000)
	},
	slide.prototype.move=function(d,a){
		var n=this.c+d;
		if(this.r){n=d==1?n==this.l?0:n:n<0?this.l-1:n}
		this.pos(n,a,1)
	},
	slide.prototype.pos=function(p,a,m){
		var v=p; clearInterval(this.x.ai); clearInterval(this.x.si);
		if(!this.r){
			if(m){
				if(p==-1||(p!=0&&Math.abs(p)%this.l==0)){
					this.b++;
					for(var i=0;i<this.l;i++){this.u.appendChild(this.m[i].cloneNode(1))}
					this.v?this.u.style.height=(this.l*this.h*this.b)+'px':this.u.style.width=(this.l*this.w*this.b)+'px';
				}
				if(p==-1||(p<0&&Math.abs(p)%this.l==0)){
					this.v?this.u.style.top=(this.l*this.h*-1)+'px':this.u.style.left=(this.l*this.w*-1)+'px'; v=this.l-1
				}
			}else if(this.c>this.l&&this.b>1){
				v=(this.l*(this.b-1))+p; p=v
			}
		}
		var t=this.v?v*this.h*-1:v*this.w*-1, d=p<this.c?-1:1; this.c=v; var n=this.c%this.l; this.nav(n);
		if(this.e){t=t-(8*d)}
		this.x.si=setInterval(new Function(this.n+'.slide('+t+','+d+',1,'+a+')'),10)
	},
	slide.prototype.nav=function(n){
		if(this.g){for(var i=0;i<this.l;i++){this.g[i].className=i==n?this.s:''}}
	},
	slide.prototype.slide=function(t,d,i,a){
		var o=this.v?parseInt(this.u.style.top):parseInt(this.u.style.left);
		if(o==t){
			clearInterval(this.x.si);
			if(this.e&&i<3){
				this.x.si=setInterval(new Function(this.n+'.slide('+(i==1?t+(12*d):t+(4*d))+','+(i==1?(-1*d):(-1*d))+','+(i==1?2:3)+','+a+')'),10)
			}else{
				if(a||(this.a&&this.p)){this.auto()}
				if(this.b>1&&this.c%this.l==0){this.clear()}
			}
		}else{
			var v=o-Math.ceil(Math.abs(t-o)*.1)*d+'px';
			this.v?this.u.style.top=v:this.u.style.left=v
		}
	},
	slide.prototype.clear=function(){
		var c=T$$('li',this.u), t=i=c.length; this.v?this.u.style.top=0:this.u.style.left=0; this.b=1; this.c=0;
		for(i;i>0;i--){
			var e=c[i-1];
			if(t>this.l&&e.parentNode==this.u){this.u.removeChild(e); t--}
		}
	},
	slide.prototype.sel=function(i){
		var e=T$(i); e.onselectstart=e.onmousedown=function(){return false}
	}
	return{slide:slide}
}();
var slideshow=new TINY.slider.slide('slideshow',{
							id:'slider',
							//auto:10,
							resume:false,
							vertical:false,
							navid:'pagination',
							activeclass:'current',
							position:0,
							rewind:false,
							elastic:true,
							left:'slideleft',
							right:'slideright'
						});
						
function function_submit_second_popup(to,statistic,phone_second_modal,promo_code){ 
  $.post('/forms.php', {'Имя':'Обратный звонок с модального окна','Форма':'После опроса','Промокод': promo_code,'Источник-перехода': statistic['refer'],'Телефон': phone_second_modal }, function (result) {
   yaCounter27754605.reachGoal ('zayavka');
   alert('Ваша заявка отправлена!');
  });
   console.log('send reachGoal');  
};
$( document ).ready(function() {
	height=screen.height;
	var blocks_form = $('#form .b-popup-content');
	if (height<=400){
		$('.sale_form input').focus(function(){
			last_position = parseInt(blocks_form.css('top')) || 0;
			var new_position = (last_position - $(this).offset().top + 20);
			blocks_form.css({'top': new_position.toString()+'px'});
		}).focusout(function(){
			blocks_form.css({'top': '0px'});
		});
	}
	$("form").on('submit', function (event) {
		event.preventDefault();
		var massive=$(this).serialize();
		massive= massive + '&Источник-перехода=' + referer;
		$.post('/forms.php', massive, function (result) {
			$("form input[type=text]").val('');
			yaCounter27754605.reachGoal ('zayavka');
			alert('Ваша заявка отправлена!');
		});
	});
	setTimeout('yaCounter27754605.reachGoal("time_goal");', 45000);
	$(".prices li").click(function(){
		var index = $( ".prices li" ).index( this ) + 1;
		$(".prices li").removeClass("active");
		$(".prices li:nth-child("+index+")").addClass("active");
		$(".price_block > div").hide();
		$(".price" + index).show();
	});
	$(".price_item_img").click(function(){
		$(this).fancybox({
			image : {
				protect: true
			}
		});
	});
});
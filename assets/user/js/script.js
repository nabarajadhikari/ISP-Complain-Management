$(function(){
	$('.list-1 li a').hover(function(){$(this).stop().animate({color:'#000'},300)},function(){$(this).stop().animate({color:'#929193'})})
	$('.menu li a').hover(function(){$(this).stop().animate({color:'#252426'},300)},function(){$(this).stop().animate({color:'#8e8d8f'})})
	$('.sf-menu li li li a').hover(function(){$(this).stop().animate({color:'#fefefe'},300)},function(){$(this).stop().animate({color:'#7a7979'})})
	$('.stroke').css({opacity:'0'});
	$(".stroke").hover(function(){
			$(this).stop().animate({opacity:1.0}, "normal")
		}, function(){
			$(this).stop().animate({opacity:0}, "normal")
	});
	$('.paginations li').hover(
		function(){$(this).find('em').stop().animate({width:6},350)},
		function(){$(this).find('em').stop().animate({width:0},50)}
	);
})
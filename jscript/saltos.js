/*======================================= ANCORA COM ANIMAÇÃO ===============================================*/
	$(document).ready(function(){
		$(".voltaTopo").click(function() {
			$('html, body').animate({
				scrollTop: $("#top").offset().top
			}, 1000);
			setTimeout(function() { document.getElementById('top').focus(); }, 0);
		});
	});
	
	$(document).ready(function(){
		$(".saltarConteudo").click(function() {
			$('html, body').animate({
				scrollTop: $("#conteudo").offset().top
			}, 1000);
			setTimeout(function() { document.getElementById('conteudo').focus(); }, 0);
		});
	});
	
	$(document).ready(function(){
		$(".saltarMenuPrincipal").click(function() {
			$('html, body').animate({
				scrollTop: $("#menuPrincipal").offset().top
			}, 1000);
			setTimeout(function() { document.getElementById('menuPrincipal').focus(); }, 0);
		});
	});
	
	$(document).ready(function(){
		$(".saltarMenuSecundario").click(function() {
			$('html, body').animate({
				scrollTop: $("#menuSecundario").offset().top
			}, 1000);
			setTimeout(function() { document.getElementById('menuSecundario').focus(); }, 0);
		});
	});
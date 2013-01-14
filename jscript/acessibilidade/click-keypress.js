/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				Função Aumentar, Diminuir, Normalizar fonte, Contraste
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/				
		
	$(document).ready(function(){
		$("#aumentar_fonte").click(function() {
			setStyle('16', '');
		});
		
		$("#aumentar_fonte").keypress(function() {
			setStyle('16', '');
		});
	});
	
	$(document).ready(function(){
		$("#normalizar_fonte").click(function() {
			setStyle('13', '');
		});
		
		$("#normalizar_fonte").keypress(function() {
			setStyle('13', '');
		});
	});
	
	$(document).ready(function(){
		$("#diminuir_fonte").click(function() {
			setStyle('11', '');
		});
		
		$("#diminuir_fonte").keypress(function() {
			setStyle('11', '');
		});
	});
	
	$(document).ready(function(){
		$("#comContraste").click(function() {
			setStyle('', 'contraste');
		});
		
		$("#comContraste").keypress(function() {
			setStyle('', 'contraste');
		});
	});
	$(document).ready(function(){
		$("#semContraste").click(function() {
			setStyle('', 'padrao');
		});
		
		$("#semContraste").keypress(function() {
			setStyle('', 'padrao');
		});
	});

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				Função que carrega a fonte e a cor selecionada ou inicial
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

$(document).ready(function(){
	setStyle();
});
	

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		Ajusta o tipo de estilo quando o usuário clica em +fonte/-fonte/contraste
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
function setStyle(fonte, contraste){
	//Verificamos se já existe um cookie gravado na máquina
	var valor = getCookie("style");
	// Se existe o cookie, capturamos seu valor e jogamos em váriaveis para serem usadas mais abaixo

	if(valor != null){
		valor = valor.substring(6, valor.length);
		var arrayFontColor = valor.split(",");{
			var fontSize = arrayFontColor[0];
			var cssType = arrayFontColor[1];
		}
	}

	// Se passamos um tamanho de fonte ou uma cor de fundo, então sobrepomos o valor das variaveis vindas do Cookie
	if(fonte != "" && fonte != undefined){
		var fontSize = fonte;
	}
	if(contraste != "" && contraste != undefined){
		var cssType = contraste;
	}
	
	// Ajusta o tamanho da fonte do site conforme o font size passado pelo botão ou guardado no Cookie
	if(fontSize != "" && fontSize != undefined){
		if(fontSize == 13 || fontSize == ""){
			document.getElementById("font").href = "estilos/fontNormal.css";
		}
		if(fontSize == 11){
			document.getElementById("font").href = "estilos/fontMenor.css";
		}
		if(fontSize == 16){
			document.getElementById("font").href = "estilos/fontMaior.css";
		}
	}

	// Verifica se deve ser aplicado auto contraste no site
	if(cssType == undefined || cssType == ""){
		document.getElementById("design").href = "estilos/padrao.css";
	}
	else if(cssType == "padrao"){
		document.getElementById("design").href = "estilos/padrao.css";
	}
	else if(cssType == "contraste"){
		document.getElementById("design").href = "estilos/contraste.css";
	}

	createCookies("style", fontSize, cssType, 365);
}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				        Cria os cookies na máquina do usuário
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
function createCookies(nome, fonte, contraste, dias){
	// Criamos uma váriavel do tipo data
	var dataAtual = new Date();
	// Caso seja passado o tempo de vda do cookie, calculamos o tempo de expiração
	if(dias){
		dataAtual.setTime(dataAtual.getTime() + (dias * 24 * 60 * 60 * 1000));
		var Expirex = "; expires=" + dataAtual.toGMTString();
	}
	// O cookie vai durar somente o tempo de permanecia na página.
	else{
		var Expirex = "";
	}
	// Criamos o cookie com as informações
	document.cookie = nome + "=" + fonte + "," + contraste + Expirex + ";path=/";
}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				        Lê os cookies da máquina do usuário
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
function getCookie(nome){
	// Passamos qual o nome do cookie que iremos ler
	var nomeIgual = nome + "=";
	// Recuperamos todos os cookies gravados
	var arrayCookies = document.cookie.split(";");
	// Executamos um array para limpar os cookies
	for(var i = 0; i < arrayCookies.length;i++)
	{
		var valorCookie = arrayCookies[i];
		// Removemos todos os espaços em branco dos cookies;
		while(valorCookie.charAt(0) == " ")
		{
			valorCookie = valorCookie.substring(1, valorCookie.length);
		}
		// Comparamos todos os cookies com o nome do nosso cookie (A ser encontrado) se ele existir, retona o cookie e seus dados
		if(valorCookie.indexOf(nome) == 0)
		{	
			return valorCookie.substring(nomeIgual.lenght, valorCookie.length);
		}
		
	}
	return null;
}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			Salva o estilo selecionado no cookie ao sair/fechar a página
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

window.onunload = saveActiveStyle();


function saveActiveStyle(){
	//Verificamos se já existe um cookie gravado na máquina
	var valor = getCookie("style");
	// Se existe o cookie, ele pega os valores e faz um set no tipo de configuração e recria o cookie
	if (valor != null){
		valor = valor.substring(6, valor.length);
		var arrayFontColor = valor.split(",");
		var fontSize = arrayFontColor[0];
		var cssType = arrayFontColor[1];
		createCookies("style", fontSize, cssType, 365);
	}
	// Caso o cookie não exista, é criano um cookie novo
	else{
		//createCookies("style", 13, "padrao", 365);
		
	}
}
<?php	
	$destino = $_SERVER['REQUEST_URI'];
	$destino = str_replace("campus/teste/", "", $destino);
	$inicial = substr($destino,0,1);
	if ($inicial == "/"){
		// Retira a barra "/" do inicio da URL
		$destino = substr_replace($destino, '', 0,1);
	}
	$final = substr($destino,-1);
	if ($final == "/"){
		// Retira a barra "/" do final da URL
		$destino = substr_replace($destino, '', -1);
	}

	/*
		 CASO HOUVER ÁREA DE DEPOIMENTOS USAMOS O CÓDIGO ABAIXO
	*/
		 
	// Verificamos se na variável destino existe a palavra depoimentos, caso sim, executamos o trecho de código
	if( preg_match("/^depoimentos/", $destino) ){
		// Alocamos o valor de $destino em uma nova váriavel ($destino_antigo)
		$destino_antigo = $destino;

		// Passamos a palavra "depoimentos" como novo valor para a variável $destino, para o arquivo regra-de-carregamento.php
		$destino = "depoimentos";

		// Removemos a palavra depoismentos da var $destino_antigo, assim ficamos com as seguintes opções:
		//		"" - Vazio, ou seja, o usuário acessou a pag depoimentos e será apresentado o ultimo depoimento cadastrado;
		//		"deixe-seu-depoimento" || "depoimento-enviado" -  Páginas do sistema;
		//		"45" - Id do depoimento no banco de dados;
		$destino_depoimentos = str_replace("depoimentos", '', $destino_antigo);

		// Caso exista uma "/" no'início da string, nós a removemos para que o script não de erro, ficando apenas o nome da página ou id;
		$inicial = substr($destino_depoimentos,0,1);
		if ($inicial == "/"){
			// Retira a barra "/" do inicio da URL
			$destino_depoimentos = substr_replace($destino_depoimentos, '', 0,1);
		}
		
	}
?>
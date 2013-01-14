<?php

	/*==================================================================================================
									  			CARREGA A HOME DO SITE
	==================================================================================================*/
	if(empty($destino) || $destino == 'home'){
		$titulo = "Socorro SP : Viaje para o interior através do site Socorro.tur";
		$keywords = "socorro sp, socorro, hotel, hotel fazenda, hotéis fazenda, pousada, pousadas, hospedagens, rafting, malhas, turismo rural, turismo de aventura, cidades turísticas, ecoturismo";
		$description = "Socorro SP, quer viajar? Então, venha conhecer as opções de turismo, hotéis fazenda e pousadas de um dos melhores destinos no interior de SP!";
	}
	/*==================================================================================================
									  CARREGA AS PÁGINAS SOBRE A CIDADE
	==================================================================================================*/
	
	//========================================= HISTÓRIA ===============================================
	elseif($destino == 'cidade/historia'){
		$titulo = "Socorro SP | Cidades turísticas: História de Socorro";
		$keywords = "socorro, cidade de socorro, nossa senhora do perpétuo socorro, 9 de agosto, revolução constitucionalista, estância hidromineral, turismo rural, turismo de aventura, malhas, esportes de aventura";
		$description = "Conheça mais sobre Socorro, um dos melhores destinos das cidades turísticas na região para você passar suas férias e curtir o melhor do turismo de aventura.";
	}
	
	
	//======================================= 404 - PAGE NOT FOUND =====================================
	else{
		$titulo = "Socorro SP | Você está em nosso site";
		$keywords = "turismo de aventura, interior de sp, página de erro, o que fazer em socorro, turismo, caminhos turísticos, hospedagens, ace socorro, comtur";
		$description = "Navegue pelo site do Socorro.tur. Verifique seu link e não deixe a página de erro fazer você perder o melhor do turismo de aventura no interior de SP!";
	}
?>
<title><?php echo $titulo; ?></title>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />

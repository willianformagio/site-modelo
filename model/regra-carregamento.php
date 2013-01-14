<?php
	/*==================================================================================================
									  			CARREGA A HOME DO SITE
	==================================================================================================*/
	if(empty($destino) || $destino == 'home'){
		include 'includes/internas/home/index.php';
	}
	/*==================================================================================================
									  CARREGA AS PÁGINAS SOBRE A CIDADE
	==================================================================================================*/
	
	//========================================= INTERNAS ===============================================
	elseif($destino == 'chales'){
		include 'includes/internas/chales/index.php';
	}
	elseif($destino == 'depoimentos'){

		// Pegamos a variável $destino_depoimentos da página ur-amigavel.php
		if($destino_depoimentos == 'deixe-seu-depoimento'){
			include 'includes/internas/depoimentos/deixe-seu-depoimento.php';
		}
		elseif($destino_depoimentos == 'depoimento-enviado'){
			include 'includes/internas/depoimentos/sucesso.php';
		}
		else{
			// Atende o caso do usuário ter acessado a página "depoimentos" pela primeira vez
			// Atende o caso do usuário ter escolhido um depoimento para ler.
			include 'includes/internas/depoimentos/index.php';
		}
	}
	
	//======================================= ROBOTS ===================================================
	elseif($destino == 'robots'){
		include 'includes/internas/errors/robots.php';
	}
	//======================================= 404 - PAGE NOT FOUND =====================================
	else{
		include 'includes/internas/errors/404.php';
	}
?>
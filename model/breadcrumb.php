<?php

	$breadcrumbOculto = "<div class=\"hidden\"><p tabindex=\"".$contaTabIndex ++."\">Abaixo o <span lang=\"en\">breadcrumb</span> do <span lang=\"en\">site</span></p></div>";
	
	/*==================================================================================================
									  			MONTA O BREADCRUMB
	==================================================================================================*/
	//========================================= HOME ===================================================
	if(empty($destino) || $destino == 'home'){
		$bread_crumb = "";
	}	
	//========================================= INTERNAS ===============================================
	elseif($destino == 'chales'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Chalés";									
	}
	elseif($destino == 'reservas'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Reservas";									
	}
	elseif($destino == 'pacotes-especiais'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Pacotes especiais";									
	}
	elseif($destino == 'lazer'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Lazer";									
	}
	elseif($destino == 'lazer/espaco-zen'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"lazer\" title=\"Voltar para a página de Lazer\" tabindex=\"".$contaTabIndex ++."\">Lazer &raquo;</a> Espaço Zen";			
	}
	elseif($destino == 'lazer/praticar-nadismo'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"lazer\" title=\"Voltar para a página de Lazer\" tabindex=\"".$contaTabIndex ++."\">Lazer &raquo;</a> Praticar Nadismo";			
	}
	elseif($destino == 'gastronomia'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Gastronômia";									
	}
	elseif($destino == 'suites-tematicas'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Suítes temáticas";									
	}
	elseif($destino == 'tarifario'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Tarifário";									
	}
	elseif($destino == 'como-chegar'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Como chegar";									
	}
	elseif($destino == 'sustentabilidade'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Sustentabilidade";									
	}
	elseif($destino == 'circuito-das-aguas'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Circuito das águas";
	}
	elseif($destino == 'fale-conosco'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Fale conosco";
	}
	elseif($destino == 'fale-conosco/erro'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"fale-conosco\" title=\"Voltar para a página de contato\" tabindex=\"".$contaTabIndex ++."\">Fale conosco &raquo;</a>
		  Erro ao enviar";
	}
	elseif($destino == 'fale-conosco/enviado-com-sucesso'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"fale-conosco\" title=\"Voltar para a página de contato\" tabindex=\"".$contaTabIndex ++."\">Fale conosco &raquo;</a>
		  Enviado com Sucesso";
	}
	elseif($destino == 'depoimentos'){
		
		// Pegamos a variável $destino_depoimentos da página ur-amigavel.php
		if($destino_depoimentos == 'deixe-seu-depoimento'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"depoimentos\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Depoimentos &raquo;</a> Deixe seu depoimento";
		}
		elseif($destino_depoimentos == 'depoimento-enviado'){
			$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"depoimentos\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Depoimentos &raquo;</a> Depoimento enviado";
		}
		else{
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Depoimentos";
		}
	}
	elseif($destino == 'mapa-do-site'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Mapa do site";
	}
	elseif($destino == 'acessibilidade-deste-site'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Acessibilidade deste site";
	}
	elseif($destino == 'jardins'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Jardins";
	}
	elseif($destino == 'servicos-especiais'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	Serviços especiais";
	}
	
	/*======================================= ROBOTS =====================================*/
	elseif($destino == 'errors/robots'){
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">Home</a>
		&raquo;	<a href=\"fale-conosco\" title=\"Voltar para a página de contato\" tabindex=\"".$contaTabIndex ++."\">Fale conosco &raquo;</a>
		 Robots";
	}
	/*======================================= 404 - PAGE NOT FOUND =====================================*/
	else{
		$bread_crumb = "<a href=\"home\" title=\"Voltar para a Home\" tabindex=\"".$contaTabIndex ++."\">HOME</a>
		&raquo;	ERRO 404 &raquo; Página não encontrada";
	}
	
	echo $breadcrumbOculto;
	
	if(empty($destino) || $destino == 'home'){
           
    }else{
       	echo "<div id=\"bread_crumb\">";
       	echo $bread_crumb;
       	echo "</div>";
    }
?>
            
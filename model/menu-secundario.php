<?php
	$pag = "";
	$menuSecundarioOculto = "<div class=\"hidden\"><p id=\"menuSecundario\" tabindex=\"".$contaTabIndex ++."\" accesskey=\"3\">Abaixo o menu de segundo nível do conteúdo <strong>\"".$pag."\"</strong></p></div>";


	/*==================================================================================================
										MONTA O MENU SECUNDÁRIO
	==================================================================================================*/									
	
	$inicial_historia = substr($destino,0,15);
	$inicial_informacoes_gerais = substr($destino,0,25);
	$inicial_curiosidades = substr($destino,0,19);
	$inicial_programas_projetos = substr($destino,0,27);
	$inicial_caminhos_turisticos = substr($destino,0,27);
	$inicial_oque_fazer_em_socorro = substr($destino,0,30);
	$inicial_noticias = substr($destino,0,15);
	$inicial_contato = substr($destino,0,8);
	
	//========================================= HISTÓRIA ===============================================
	if($inicial_historia == 'cidade/historia'){
		$menu_secundario = "<li><a href=\"cidade/historia\" title=\"História da Cidade\" tabindex=\"".$contaTabIndex ++."\">História da Cidade</a></li>
                            <li><a href=\"cidade/historia/monumentos-e-predios-historicos\" title=\"Monumentos e Prédios Históricos\" tabindex=\"".$contaTabIndex ++."\">Monumentos e Prédios</a></li>";
		$pag = "História";
	}
	//========================================= INFORMAÇÕES GERAIS =====================================
	if($inicial_informacoes_gerais == 'cidade/informacoes-gerais'){
		$menu_secundario = "<li><a href=\"cidade/informacoes-gerais/sobre-a-cidade\" title=\"Sobre a Cidade\" tabindex=\"".$contaTabIndex ++."\">Sobre a Cidade</a></li>
                            <li><a href=\"cidade/informacoes-gerais/hino-da-cidade\" title=\"Hino da Cidade\" tabindex=\"".$contaTabIndex ++."\">Hino da Cidade</a></li>
                            <li><a href=\"cidade/informacoes-gerais/onibus-e-circulares\" title=\"Ônibus e Circulares\" tabindex=\"".$contaTabIndex ++."\">Ônibus e Circulares</a></li>";
		$pag = "Informações Gerais";
	}
	//========================================= CURIOSIDADES ==========================================
	if($inicial_curiosidades == 'cidade/curiosidades'){
		$menu_secundario = "<li><a href=\"cidade/curiosidades/uma-terra-encantada\" title=\"Uma Terra Encantada\" tabindex=\"".$contaTabIndex ++."\">Uma Terra Encantada</a></li>
                            <li><a href=\"cidade/curiosidades/socorro-na-segunda-guerra-mundial\" title=\"Socorro na 2ª Guerra\" tabindex=\"".$contaTabIndex ++."\">Segunda Guerra Mundial</a></li>";
		$pag = "Curiosidades";
	}
	//========================================= NOTÍCIAS ===============================================
	if($inicial_noticias == 'cidade/noticias'){
		$menu_secundario = "<li><a href=\"cidade/noticias/ultimas-noticias\" title=\"Últimas Notícias\" tabindex=\"".$contaTabIndex ++."\">Últimas Notícias</a></li>
                            <li><a href=\"cidade/noticias/socorro-na-midia\" title=\"Socorro na Mídia\" tabindex=\"".$contaTabIndex ++."\">Socorro na Mídia</a></li>";
		$pag = "Notícias";
	}
	//========================================= PROGRAMAS E PROJETOS ===================================
	if($inicial_programas_projetos == 'cidade/programas-e-projetos'){
		$menu_secundario = "<li><a href=\"cidade/programas-e-projetos/socorro-acessivel\" title=\"Socorro Acessível\" tabindex=\"".$contaTabIndex ++."\">Socorro Acessível</a></li>
                            <li><a href=\"cidade/programas-e-projetos/projeto-endomarketing\" title=\"Projeto Endomarketing\" tabindex=\"".$contaTabIndex ++."\">Projeto Endomarketing</a></li>";
		$pag = "Programas e Projetos";
	}
	//========================================= CAMINHOS TURÍSTICOS ====================================	
	if($inicial_caminhos_turisticos == 'turismo/caminhos-turisticos'){
		$menu_secundario = "<li><a href=\"turismo/caminhos-turisticos/jaboticabal\" title=\"Jaboticabal\" tabindex=\"".$contaTabIndex ++."\">Jaboticabal</a></li>
							<li><a href=\"turismo/caminhos-turisticos/lavras-de-baixo\" title=\"Lavras de Baixo\" tabindex=\"".$contaTabIndex ++."\">Lavras de Baixo</a></li>
							<li><a href=\"turismo/caminhos-turisticos/lavras-de-cima\" title=\"Lavras de Cima\" tabindex=\"".$contaTabIndex ++."\">Lavras de Cima</a></li>
							
							<li><a href=\"turismo/caminhos-turisticos/mirante-do-cristo\" title=\"Mirante do Cristo\" tabindex=\"".$contaTabIndex ++."\">Mirante do Cristo</a></li>
							<li><a href=\"turismo/caminhos-turisticos/oratorio\" title=\"Oratório\" tabindex=\"".$contaTabIndex ++."\">Oratório</a></li>
							<li><a href=\"turismo/caminhos-turisticos/pedra-bela-vista\" title=\"Pedra Bela Vista\" tabindex=\"".$contaTabIndex ++."\">Pedra Bela Vista</a></li>
							
							<li><a href=\"turismo/caminhos-turisticos/pereiras\" title=\"Pereiras\" tabindex=\"".$contaTabIndex ++."\">Pereiras</a></li>
							<li><a href=\"turismo/caminhos-turisticos/pompeia\" title=\"Pompéia\" tabindex=\"".$contaTabIndex ++."\">Pompéia</a></li>
							<li><a href=\"turismo/caminhos-turisticos/rio-do-peixe\" title=\"Rio do Peixe\" tabindex=\"".$contaTabIndex ++."\">Rio do Peixe</a></li>
							
							<li><a href=\"turismo/caminhos-turisticos/saltinho\" title=\"Saltinho\" tabindex=\"".$contaTabIndex ++."\">Saltinho</a></li>
							<li><a href=\"turismo/caminhos-turisticos/serrote\" title=\"Serrote\" tabindex=\"".$contaTabIndex ++."\">Serrote</a></li>
							<li><a href=\"turismo/caminhos-turisticos/usina\" title=\"Usina\" tabindex=\"".$contaTabIndex ++."\">Usina</a></li>
							
							<li><a href=\"turismo/caminhos-turisticos/visconde\" title=\"Visconde\" tabindex=\"".$contaTabIndex ++."\">Visconde</a></li>";
		$pag = "Caminhos Turísticos";
	}
	//========================================= O QUE FAZER EM SOCORRO? ================================
	if($inicial_oque_fazer_em_socorro == 'turismo/o-que-fazer-em-socorro'){
		$menu_secundario = "<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-de-aventura\" title=\"Turismo de Aventura\" tabindex=\"".$contaTabIndex ++."\">Aventura</a></li>
							<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-cultural\" title=\"Turismo Cultural\" tabindex=\"".$contaTabIndex ++."\">Cultural</a></li>
							<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-de-ecoturismo\" title=\"Turismo de Ecoturismo\" tabindex=\"".$contaTabIndex ++."\">Ecoturismo</a></li>
							
                            <li><a href=\"turismo/o-que-fazer-em-socorro/turismo-de-estudos-e-intercambio\" title=\"Turismo de Estudos e Intercâmbio\" tabindex=\"".$contaTabIndex ++."\">Estudos e Intercâmbio</a></li>
							<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-de-negocios-e-eventos\" title=\"Turismo de Negócios e Eventos\" tabindex=\"".$contaTabIndex ++."\">Negócios e Eventos</a></li>
							<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-rural\" title=\"Turismo Rural\" tabindex=\"".$contaTabIndex ++."\">Rural</a></li>
							
							<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-de-saude\" title=\"Turismo Saúde\" tabindex=\"".$contaTabIndex ++."\">Saúde</a></li>
							<li><a href=\"turismo/o-que-fazer-em-socorro/turismo-social\" title=\"Turismo Social\" tabindex=\"".$contaTabIndex ++."\">Social</a></li>";
		$pag = "O que fazer em Socorro?";
	}
	//======================================= SERVIÇOS =================================================
	if(($destino == 'servicos/hospedagens') || ($destino == 'servicos/operadoras') || ($destino == 'servicos/turismo-rural') || ($destino == 'servicos/comercio-local') || ($destino == 'servicos/gastronomia') || ($destino == 'servicos/servicos-de-apoio') || ($destino == 'servicos/malharias-e-confeccoes')){
		$menu_secundario = "<li><a href=\"servicos/hospedagens\" title=\"Hospedagens\" tabindex=\"".$contaTabIndex ++."\">Hospedagens</a></li>
                            <li><a href=\"servicos/operadoras\" title=\"Operadoras\" tabindex=\"".$contaTabIndex ++."\">Operadoras</a></li>
							<li><a href=\"servicos/turismo-rural\" title=\"Turismo Rural\" tabindex=\"".$contaTabIndex ++."\">Turismo Rural</a></li>
                            <li><a href=\"servicos/comercio-local\" title=\"Comércio Local\" tabindex=\"".$contaTabIndex ++."\">Comércio Local</a></li>
                            <li><a href=\"servicos/gastronomia\" title=\"Gastronomia\" tabindex=\"".$contaTabIndex ++."\">Gastronomia</a></li>
                            <li><a href=\"servicos/servicos-de-apoio\" title=\"Serviços de apoio\" tabindex=\"".$contaTabIndex ++."\">Serviços de apoio</a></li>
                            <li><a href=\"servicos/malharias-e-confeccoes\" title=\"Malharias e Confecções\" tabindex=\"".$contaTabIndex ++."\">Malharias e Confecções</a></li>";
		$pag = "Serviços";
	}
	//======================================= CONTATO ===================================================
	if($inicial_contato == 'contato/'){
		$menu_secundario = "<li><a href=\"contato/fale-conosco\" title=\"Fale Conosco\" tabindex=\"".$contaTabIndex ++."\">Fale Conosco</a></li>
                            <li><a href=\"contato/ace-socorro\" title=\"ACE Socorro\" tabindex=\"".$contaTabIndex ++."\">ACE Socorro</a></li>
                            <li><a href=\"contato/comtur\" title=\"COMTUR\" tabindex=\"".$contaTabIndex ++."\">COMTUR</a></li>";
		$pag = "Contato";
	}
	
	echo $menuSecundarioOculto;
?>
            
            <div id="menu_secundario">
            	<ul>
            		<?php echo $menu_secundario; ?>
                </ul>
                <br class="clear" />
            </div>
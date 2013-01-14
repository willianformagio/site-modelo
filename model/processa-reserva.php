<?php 
	// Um ob_start() irá pegar todos os dados de saída e guardar em buffer. Os dados só serão enviados ao navegador no momento em que você encerrar o buffer.
	ob_start();
	// INCLUIMOS O ARQUIVO DE MANIPULAÇÃO DA CAMADA DE DADOS;	
	require_once '../control/DAO.class.php';
	
	// INCLUIMOS O ARQUIVO DE MANIPULAÇÃO DOS EMAILS;	
	require_once '../control/SEND_EMAIL.class.php';
	
	// INCLUIMOS O ARQUIVO DE SEGURANÇA;
	require_once '../control/SECURITY.class.php';
	
	// VERIFICAMOS SE NÃO É UM ROBO, ATRAVÉS DO CAMPO @email20, SE ELE TIVER VALOR, É UM ROBO;	
	if(empty($_POST['email20'])){
		if(empty($_POST['nome']) || empty($_POST['email']) || 
		   empty($_POST['telefone']) || empty($_POST['celular']) || 
		   empty($_POST['data_chegada']) || empty($_POST['data_saida'])){
			header("Location: ../fale-conosco/erro");
			die;
	}

		/*
			PEGAMOS OS DADOS ENVIADOS PELO FORMULÁRIO;
			COLOCAMOS OS DADOS DENTRO DE UM ARRAY PARA A FUNÇÃO SEND EMAIL;
		*/ 
		$dados = array();
		$SECURITY = new SECURITY;
		
		$dados[0] = $nome = $SECURITY->anti_injection($_POST['nome']);
		$dados[1] = $acompanhantes = $SECURITY->anti_injection($_POST['acompanhantes']);
		$dados[2] = $adultos = $SECURITY->anti_injection($_POST['adultos']);
		$dados[3] = $criancas_10 = $SECURITY->anti_injection($_POST['criancas_10']);
		$dados[4] = $criancas_3 = $SECURITY->anti_injection($_POST['criancas_3']);
		$dados[5] = $email = $SECURITY->anti_injection($_POST['email']);
		$dados[6] = $telefone = $SECURITY->anti_injection($_POST['telefone']);
		$dados[7] = $celular = $SECURITY->anti_injection($_POST['celular']);
		$dados[8] = $data_chegada = $SECURITY->anti_injection($_POST['data_chegada']);
		$dados[9] = $data_saida = $SECURITY->anti_injection($_POST['data_saida']);
		$dados[11] = $data = date('d/m/Y - H:i');

		$email_news = ($_POST['email_news']);
		if($email_news == 'sim'){
			$dados[10] = $dados[5];
		}else{
			$$dados[10] = '';
		}
		
		// INSTÂNCIAMOS O OBJETO DE MANIPULAÇÃO DE DADOS (DAO);
		$DAO = new DAO;
		
		// CRIAMOS O SCRIPT SQL PARA INSERÇÃO NA BASE DE DADOS
		$sql = "INSERT INTO reservas 
		(res_nome, res_acompanhantes, res_adultos, res_criancas_10, res_criancas_3, res_email, res_telefone, res_celular, res_data_chegada, res_data_saida, res_email_news, res_data) 
		VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]','$dados[8]','$dados[9]','$dados[10]','$dados[11]')";
				
		// EXECUTAMOS A FUNÇÃO E VERIFICAMOS SEU RETORNO (TRUE || FALSE);
		if($DAO->query($sql)){ // TRUE
			/*
				INSTÃNCIAMOS  OBJETO DE MANIPULAÇÃO DE ENVO DE EMAILS (SEND_EMAIL);	
				EXECUTAMOS A FUNÇÃO SEND_EMAIL COM OS DADOS DO FORM;				
			*/
			$SEND = new EMAIL;
			$SEND->send_email_reserva($dados);
			// REDIRECIONA PARA A PÁGINA DE AGRADECIMENTO
			header("Location: ../fale-conosco/enviado-com-sucesso");
		}
		else{//FALSE
			/*
				INSTÃNCIAMOS  OBJETO DE MANIPULAÇÃO DE ENVO DE EMAILS (SEND_EMAIL);	
				EXECUTAMOS A FUNÇÃO SEND_EMAIL COM OS DADOS DO FORM;
				EXECUTAMOS A FUNÇÃO SEND_EMAIL_ERROR PARA A WEBSOCORRO INFORMANDO QUE OS DADOS NÃO FORAM SALVOS NO BANO DE DADOS;				
			*/	
			$SEND = new EMAIL;
			$SEND->send_email_reserva($dados);
			$SEND->send_email_error_BD_reserva($dados);
			// REDIRECIONA PARA A PÁGINA DE AGRADECIMENTO
			header("Location: ../fale-conosco/enviado-com-sucesso");
		}
	}
	/* CASO SEJA UM ROBO QUE TENHA PRENCHIDO */
	else{
		/*
			INSTÃNCIAMOS  OBJETO DE MANIPULAÇÃO DE ENVO DE EMAILS (SEND_EMAIL);	
			EXECUTAMOS A FUNÇÃO SEND_EMAIL_ERROR PARA A WEBSOCORRO INFORMANDO QUE OS DADOS NÃO FORAM SALVOS NO BANO DE DADOS;				
		*/
		
		// PEGAMOS TODOS OS DADOS SEM REMOVER AS TAGS MAS TRANSFORMAMOS EM HTML;
		$dados_maliciosos = array();
		$SECURITY = new SECURITY;
		
		$dados_maliciosos[0] = $nome = $SECURITY->anti_injection($_POST['nome']);
		$dados_maliciosos[1] = $acompanhantes = $SECURITY->anti_injection($_POST['acompanhantes']);
		$dados_maliciosos[2] = $adultos = $SECURITY->anti_injection($_POST['adultos']);
		$dados_maliciosos[3] = $criancas_10 = $SECURITY->anti_injection($_POST['criancas_10']);
		$dados_maliciosos[4] = $criancas_3 = $SECURITY->anti_injection($_POST['criancas_3']);
		$dados_maliciosos[5] = $email = $SECURITY->anti_injection($_POST['email']);
		$dados_maliciosos[6] = $telefone = $SECURITY->anti_injection($_POST['telefone']);
		$dados_maliciosos[7] = $celular = $SECURITY->anti_injection($_POST['celular']);
		$dados_maliciosos[8] = $data_chegada = $SECURITY->anti_injection($_POST['data_chegada']);
		$dados_maliciosos[9] = $data_saida = $SECURITY->anti_injection($_POST['data_saida']);
		$dados_maliciosos[11] = $data = date('d/m/Y - H:i');
		$dados_maliciosos[12] = $captcha = $SECURITY->visualiza_script_malicioso($_POST['email20']);
		
		$SEND = new EMAIL;
		$SEND->send_email_robots_reserva($dados_maliciosos);
		// REDIRECIONA PARA A PÁGINA DE ERRO;
		header('Location: ../errors/robots');
		
	}
	// Já podemos encerrar o buffer e limpar tudo que há nele
	ob_end_clean();
?>
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
		   empty($_POST['telefone']) || empty($_POST['comentario'])){
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
		$dados[1] = $email = $SECURITY->anti_injection($_POST['email']);
		$dados[2] = $telefone = $SECURITY->anti_injection($_POST['telefone']);
		$dados[3] = $comentario = $SECURITY->anti_injection($_POST['comentario']);
		$dados[5] = $ip_visitante = $_SERVER['REMOTE_ADDR'];
		$dados[6] = $data = date('d/m/Y - H:i');

		$email_news = ($_POST['email_news']);
		if($email_news == 'sim'){
			$dados[4] = $dados[1];
		}else{
			$$dados[4] = '';
		}
		
		// INSTÂNCIAMOS O OBJETO DE MANIPULAÇÃO DE DADOS (DAO);
		$DAO = new DAO;
		
		// CRIAMOS O SCRIPT SQL PARA INSERÇÃO NA BASE DE DADOS
		$sql = "INSERT INTO contatos
				(con_nome, con_email, con_telefone, con_email_news, con_mensagem, con_data)
				VALUES
				('$nome','$email','$telefone', '$dados[4]','$comentario','$data')";
				
		// EXECUTAMOS A FUNÇÃO E VERIFICAMOS SEU RETORNO (TRUE || FALSE);
		if($DAO->query($sql)){ // TRUE
			/*
				INSTÃNCIAMOS  OBJETO DE MANIPULAÇÃO DE ENVO DE EMAILS (SEND_EMAIL);	
				EXECUTAMOS A FUNÇÃO SEND_EMAIL COM OS DADOS DO FORM;				
			*/
			$SEND = new EMAIL;
			$SEND->send_email_contato($dados);
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
			$SEND->send_email_contato($dados);
			$SEND->send_email_error_BD($dados);
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
		
		$dados_maliciosos[0] = $nome = $SECURITY->visualiza_script_malicioso($_POST['nome']);
		$dados_maliciosos[1] = $email = $SECURITY->visualiza_script_malicioso($_POST['email']);
		$dados_maliciosos[2] = $telefone = $SECURITY->visualiza_script_malicioso($_POST['telefone']);
		$dados_maliciosos[3] = $comentario = $SECURITY->visualiza_script_malicioso($_POST['comentario']);
		$dados_maliciosos[5] = $ip_visitante = $_SERVER['REMOTE_ADDR'];
		$dados_maliciosos[6] = $data = date('d/m/Y - H:i');
		$dados_maliciosos[7] = $captcha = $SECURITY->visualiza_script_malicioso($_POST['email20']);
		
		$SEND = new EMAIL;
		$SEND->send_email_robots($dados_maliciosos);
		// REDIRECIONA PARA A PÁGINA DE ERRO;
		header('Location: ../errors/robots');
		
	}
	// Já podemos encerrar o buffer e limpar tudo que há nele
	ob_end_clean();
?>
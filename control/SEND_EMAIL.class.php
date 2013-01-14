<?php
class EMAIL{
	/*
		CLASSE RESPOSNSÁVEL POR ENVIAR OS EMAILS DO SITE SOCORRO TUR - CONTATO;
	*/
	public $html_head = "<!DOCTYPE HTML>
				<html>
				<head>
				<meta charset=\"utf-8\">
				<style>
				  body {background:#FFF; color:#FFF;}
				  table{background-color: #81AB4B;}
				  .titulo{border:dashed 1px #81AB4B; padding:15px; text-align:center;}
				  h1{font: bold 18px arial, helvetica, sans-serif; padding:0px; margin:0px; color:#000;}
				  a, a:link {	color:#FF3300;	text-decoration:underline;}
				  .laranja{ color:#f17610;}
				  #tab {margin:0; padding:0px; width:700px; border:1px solid #1D5A38;	padding:0px;}
				  #tab tr {background:#FFF;}
				  #tab .td {width: 320px; color:#000;	font: bold 12px arial, helvetica, sans-serif;	border:dashed 1px #1D5A38;	padding:15px;}
				  #tab .td2 {color:#000;	font: bold 12px arial, helvetica, sans-serif;	border:dashed 1px #1D5A38;	padding:15px;}
				  #tab .rodape {width: 670px;	color:#000;	font: bold 12px arial, helvetica, sans-serif;	border:dashed 1px #1D5A38;	padding:15px; text-align:center;}
				  #texlink {overflow-x: hidden;}
				  </style>
				</head>
				<body>";

	/*===========================================================================================
				ENVIA EMAIL DE CONTATO
===========================================================================================*/
					
	function send_email_contato($dados = array()){
		// Formata o campo para receber os acentos corretamente
				
		$nome = utf8_encode($dados[0]);
		$email = utf8_encode($dados[1]);
		$telefone = utf8_encode($dados[2]);
		$comentario = utf8_encode($dados[3]);
		$ip_visitante = utf8_encode($dados[5]);
		$data = utf8_encode($dados[6]);
		
		
		// Este email será o responsável por enviar o email pelo servidor e deve ser um e-mail válido sobre o dominio em questão;
		$mail_remetente = "contato@portaldosolhotelfazenda.com.br";
		
		// Email que receberá uma cópia;
		//$email_copy =  "suporte@websocorro.com.br";
		
		// Este váriavel e para colocar em qual caixa de email deve chegar a mensagem.
		$__to = "suporte@websocorro.com.br";//"contato@portaldosolhotelfazenda.com.br";
		
		// Titulo da mensagem, observe as regras de SPAN ao montar um titulo
		$__sj = "Contato - Portal do Sol Hotel Fazenda";
		
		// Aqui esta sendo montada a estrutura do e-mail.
		$html = $this->html_head;
		// Está parte do código deve ser ajustado conforme a necessidade de casa formulário.
		$html .= "
			<center>
				<table border='0' cellspacing='3' cellpadding='0' id='tab' align='center'>
					 <tr>
						<td colspan='4'><img src='http://www.portaldosolhotelfazenda.com.br/imagens/estrutura/cabecalho-email-contato.jpg' alt='Imagem de Socorro - Cabeçalho da página contato' title='Imagem de Socorro - Cabeçalho da página contato' /></td>
					 </tr>
					 <tr>
						<td colspan='4' class='titulo'><h1>Contato | Portal do Sol Hotel Fazenda</h1></td>
					 </tr>
					 <tr>
						<th scope='row' align='right'  width='45%' class='td'>Nome:</th>
						<td colspan='3' align='left' class='td'>$nome</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Email:</th>
						<td colspan='3' align='left' class='td'><a href='mailto:$email'>$email</a></td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Telefone:</th>
						<td colspan='3' align='left' class='td'>$telefone</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Comentários:</th>
						<td colspan='3' align='left' class='td'>$comentario</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data e Hora:</th>
						<td colspan='3' align='left' class='td'>$data</td>
					 </tr>
					 <tr>
						<td colspan='4' align='left' class='rodape'><a href='mailto:suporte@websocorro.com.br'>Agência WebSocorro</a></td>
					  </tr>
				 </table>
				 </center>
			 </body>
		 </html>";	
					
			// Verifica qual o sistema operacional que estará enviando o e-mail, para formatar as quabras de linhas		
			if(PHP_OS == "Linux") $snap  = "\n"; //Se for Linux
			elseif(PHP_OS == "WINNT") $snap  = "\r\n"; // Se for Windows
			else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
				// Configura a versão do cab_emais
				$head = "MIME-Version: 1.1".$snap;
				// Recebe as váriaveis de quem recebe o e-mail
				$head.= "From: ". $mail_remetente . $snap;
				// Recebe a váriavel de qual e-mail será utilizado para resposta do e-mail, no caso o email de quem preencheu o formulário.
				$head.= "Reply-To: ". $email . $snap;
				// Recebe a váriavel de qual e-mail será enviado uma cópia do e-mail.
				if(empty($email_copy)){
				}
				else{
					$head.= "Bcc: ".$email_copy . $snap;
				}
				$head.= "Content-type: text/html; charset=utf-8".$snap;
				
			if(!mail($__to, $__sj, $html, $head ,"-r".$mail_remetente)){ // Se for Postfix
				$head .= "Return-Path: " . $mail_remetente . $snap;
				mail($__to, $__sj, $html, $head);
			}
	}
	/*
		ENVIA A MENSAGEM PARA A WEBSOCORRO AVISANDO QUE OS DADOS DO CONTATO NÃO FORAM SALVOS NO BANCO DE DADOS;
	*/
	function send_email_error_BD($dados = array()){
		// Formata o campo para receber os acentos corretamente
		$nome = utf8_encode($dados[0]);
		$email = utf8_encode($dados[1]);
		$telefone = utf8_encode($dados[2]);
		$comentario = utf8_encode($dados[3]);
		$ip_visitante = utf8_encode($dados[5]);
		$data = utf8_encode($dados[6]);
		
		/// Este email será o responsável por enviar o email pelo servidor e deve ser um e-mail válido sobre o dominio em questão;
		$mail_remetente = "contato@portaldosolhotelfazenda.com.br";
		
		// Email que receberá uma cópia;
		$email_copy =  "dalcio@websocorro.com.br";
		
		// Este váriavel e para colocar em qual caixa de email deve chegar a mensagem.
		$__to = "suporte@websocorro.com.br"; 
		
		// Titulo da mensagem, observe as regras de SPAN ao montar um titulo
		$__sj = "Erro no form de contato | Portal do Sol Hotel Fazenda";
		
		// Aqui esta sendo montada a estrutura do e-mail.
		$html = $this->html_head;
		// Está parte do código deve ser ajustado conforme a necessidade de casa formulário.
		$html .= "<table border='0' cellspacing='3' cellpadding='0' id='tab' align='center'>
					 <tr>
						<td colspan='4'><img src='http://www.portaldosolhotelfazenda.com.br/imagens/estrutura/cabecalho-email-contato.jpg' alt='Imagem de Socorro - Cabeçalho da página contato' title='Imagem de Socorro - Cabeçalho da página contato' /></td>
					 </tr>
					 <tr>
						<td colspan='4' class='titulo'><h1>Houve um erro ao salvar os dados deste contato na Base de Dados <br /> Verificar o erro!</h1></td>
					 </tr>
					 <tr>
						<th scope='row' align='right'  width='45%' class='td'>Nome:</th>
						<td colspan='3' align='left' class='td'>$nome</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Email:</th>
						<td colspan='3' align='left' class='td'><a href='mailto:$email'>$email</a></td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Comentários:</th>
						<td colspan='3' align='left' class='td'>$comentario</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data e Hora:</th>
						<td colspan='3' align='left' class='td'>$data</td>
					 </tr>
					 <tr>
						<td colspan='4' align='left' class='rodape'><a href='mailto:suporte@websocorro.com.br'>Agência WebSocorro</a></td>
					  </tr>
				 </table>
			 </body>
		 </html>";
					
			// Verifica qual o sistema operacional que estará enviando o e-mail, para formatar as quabras de linhas		
			if(PHP_OS == "Linux") $snap  = "\n"; //Se for Linux
			elseif(PHP_OS == "WINNT") $snap  = "\r\n"; // Se for Windows
			else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
				// Configura a versão do cab_emais
				$head = "MIME-Version: 1.1".$snap;
				// Recebe as váriaveis de quem recebe o e-mail
				$head.= "From: ". $mail_remetente . $snap;
				// Recebe a váriavel de qual e-mail será utilizado para resposta do e-mail, no caso o email de quem preencheu o formulário.
				$head.= "Reply-To: ". $email . $snap;
				// Recebe a váriavel de qual e-mail será enviado uma cópia do e-mail.
				if(empty($email_copy)){
				}
				else{
					$head.= "Bcc: ".$email_copy . $snap;
				}
				$head.= "Content-type: text/html; charset=utf-8".$snap;
				
			if(!mail($__to, $__sj, $html, $head ,"-r".$mail_remetente)){ // Se for Postfix
				$head .= "Return-Path: " . $mail_remetente . $snap;
				mail($__to, $__sj, $html, $head);
			}
	}
	/*
		AVISA A WEBSOCORRO QUE ESTÃO TENTANDO FAZER PREENCHIMENTO VIA ROBOTS NO FORMULÁRIO DE CONTATO;
	*/
	function send_email_robots($dados_maliciosos = array()){
		// Formata o campo para receber os acentos corretamente
		$nome = utf8_encode($dados_maliciosos[0]);
		$email = utf8_encode($dados_maliciosos[1]);
		$telefone = utf8_encode($dados_maliciosos[2]);
		$comentario = utf8_encode($dados_maliciosos[3]);
		$ip_visitante = utf8_encode($dados_maliciosos[5]);
		$data = utf8_encode($dados_maliciosos[6]);
		$captcha = utf8_encode($dados_maliciosos[7]);
		
		// Este email será o responsável por enviar o email pelo servidor e deve ser um e-mail válido sobre o dominio em questão;
		$mail_remetente = "contato@portaldosolhotelfazenda.com.br";
		
		// Email que receberá uma cópia;
		$email_copy =  "dalcio@websocorro.com.br";
		
		// Este váriavel e para colocar em qual caixa de email deve chegar a mensagem.
		$__to = "suporte@websocorro.com.br";
		
		// Titulo da mensagem, observe as regras de SPAN ao montar um titulo
		$__sj = "Tentativa forcada de preenchimento do form de contato Portal do Sol";
		
		// Aqui esta sendo montada a estrutura do e-mail.
		$html = $this->html_head;
		// Está parte do código deve ser ajustado conforme a necessidade de casa formulário.
		$html .= "<table border='0' cellspacing='3' cellpadding='0' id='tab' align='center'>
					 <tr>
						<td colspan='4'><img src='http://www.portaldosolhotelfazenda.com.br/imagens/estrutura/cabecalho-email-contato.jpg' alt='Imagem de Socorro - Cabeçalho da página contato' title='Imagem de Socorro - Cabeçalho da página contato' /></td>
					 </tr>
					 <tr>
						<td colspan='4' class='titulo'><h1>Houve um erro ao salvar os dados deste contato na Base de Dados <br /> Verificar o erro!</h1></td>
					 </tr>
					 <tr>
						<th scope='row' align='right'  width='45%' class='td'>Nome:</th>
						<td colspan='3' align='left' class='td'>$nome</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Email:</th>
						<td colspan='3' align='left' class='td'><a href='mailto:$email'>$email</a></td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Telefone:</th>
						<td colspan='3' align='left' class='td'>$telefone</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Comentários:</th>
						<td colspan='3' align='left' class='td'>$comentario</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data e Hora:</th>
						<td colspan='3' align='left' class='td'>$data</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Captcha:</th>
						<td colspan='3' align='left' class='td'>$captcha</td>
					 </tr>
					 <tr>
						<td colspan='4' align='left' class='rodape'><a href='mailto:suporte@websocorro.com.br'>Agência WebSocorro</a></td>
					  </tr>
				 </table>
			 </body>
		 </html>";	
					
			// Verifica qual o sistema operacional que estará enviando o e-mail, para formatar as quabras de linhas		
			if(PHP_OS == "Linux") $snap  = "\n"; //Se for Linux
			elseif(PHP_OS == "WINNT") $snap  = "\r\n"; // Se for Windows
			else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
				// Configura a versão do cab_emais
				$head = "MIME-Version: 1.1".$snap;
				// Recebe as váriaveis de quem recebe o e-mail
				$head.= "From: ". $mail_remetente . $snap;
				// Recebe a váriavel de qual e-mail será utilizado para resposta do e-mail, no caso o email de quem preencheu o formulário.
				$head.= "Reply-To: ". $email . $snap;
				// Recebe a váriavel de qual e-mail será enviado uma cópia do e-mail.
				if(empty($email_copy)){
				}
				else{
					$head.= "Bcc: ".$email_copy . $snap;
				}
				$head.= "Content-type: text/html; charset=utf-8".$snap;
				
			if(!mail($__to, $__sj, $html, $head ,"-r".$mail_remetente)){ // Se for Postfix
				$head .= "Return-Path: " . $mail_remetente . $snap;
				mail($__to, $__sj, $html, $head );
			}
	}

/*===========================================================================================
				ENVIA EMAIL DE RESERVA
===========================================================================================*/
	function send_email_reserva($dados = array()){
		// Formata o campo para receber os acentos corretamente
				
		$nome = utf8_encode($dados[0]);
		$acompanhantes = utf8_encode($dados[1]);
		$adultos = utf8_encode($dados[2]);
		$criancas_10 = utf8_encode($dados[3]);
		$criancas_3 = utf8_encode($dados[4]);
		$email = utf8_encode($dados[5]);
		$telefone = utf8_encode($dados[6]);
		$celular = utf8_encode($dados[7]);
		$data_chegada = utf8_encode($dados[8]);
		$data_saida = utf8_encode($dados[9]);
		$data = $dados[11];
		
		
		// Este email será o responsável por enviar o email pelo servidor e deve ser um e-mail válido sobre o dominio em questão;
		$mail_remetente = "contato@portaldosolhotelfazenda.com.br";
		
		// Email que receberá uma cópia;
		//$email_copy =  "suporte@websocorro.com.br";
		
		// Este váriavel e para colocar em qual caixa de email deve chegar a mensagem.
		$__to = "contato@portaldosolhotelfazenda.com.br";
		
		// Titulo da mensagem, observe as regras de SPAN ao montar um titulo
		$__sj = "Reserva - Portal do Sol Hotel Fazenda";
		
		// Aqui esta sendo montada a estrutura do e-mail.
		$html = $this->html_head;
		// Está parte do código deve ser ajustado conforme a necessidade de casa formulário.
		$html .= "
			<center>
				<table border='0' cellspacing='3' cellpadding='0' id='tab' align='center'>
					 <tr>
						<td colspan='4'><img src='http://www.portaldosolhotelfazenda.com.br/imagens/estrutura/cabecalho-email-contato.jpg' alt='Imagem de Socorro - Cabeçalho da página contato' title='Imagem de Socorro - Cabeçalho da página contato' /></td>
					 </tr>
					 <tr>
						<td colspan='4' class='titulo'><h1>Reserva | Portal do Sol Hotel Fazenda</h1></td>
					 </tr>
					 <tr>
						<th scope='row' align='right'  width='45%' class='td'>Nome:</th>
						<td colspan='3' align='left' class='td'>$nome</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Número de acompanhantes:</th>
						<td colspan='3' align='left' class='td'>$acompanhantes</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Número de adultos:</th>
						<td colspan='3' align='left' class='td'>$adultos</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Crianças de 4 a 10 anos:</th>
						<td colspan='3' align='left' class='td'>$criancas_10</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Crianças até 3 anos:</th>
						<td colspan='3' align='left' class='td'>$criancas_3</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Email:</th>
						<td colspan='3' align='left' class='td'><a href='mailto:$email'>$email</a></td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Telefone:</th>
						<td colspan='3' align='left' class='td'>$telefone</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Celular:</th>
						<td colspan='3' align='left' class='td'>$celular</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data de chegada:</th>
						<td colspan='3' align='left' class='td'>$data_chegada</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data de saída:</th>
						<td colspan='3' align='left' class='td'>$data_saida</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data e Hora:</th>
						<td colspan='3' align='left' class='td'>$data</td>
					 </tr>
					 <tr>
						<td colspan='4' align='left' class='rodape'><a href='mailto:suporte@websocorro.com.br'>Agência WebSocorro</a></td>
					  </tr>
				 </table>
				 </center>
			 </body>
		 </html>";	
					
			// Verifica qual o sistema operacional que estará enviando o e-mail, para formatar as quabras de linhas		
			if(PHP_OS == "Linux") $snap  = "\n"; //Se for Linux
			elseif(PHP_OS == "WINNT") $snap  = "\r\n"; // Se for Windows
			else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
				// Configura a versão do cab_emais
				$head = "MIME-Version: 1.1".$snap;
				// Recebe as váriaveis de quem recebe o e-mail
				$head.= "From: ". $mail_remetente . $snap;
				// Recebe a váriavel de qual e-mail será utilizado para resposta do e-mail, no caso o email de quem preencheu o formulário.
				$head.= "Reply-To: ". $email . $snap;
				// Recebe a váriavel de qual e-mail será enviado uma cópia do e-mail.
				if(empty($email_copy)){
				}
				else{
					$head.= "Bcc: ".$email_copy . $snap;
				}
				$head.= "Content-type: text/html; charset=utf-8".$snap;
				
			if(!mail($__to, $__sj, $html, $head ,"-r".$mail_remetente)){ // Se for Postfix
				$head .= "Return-Path: " . $mail_remetente . $snap;
				mail($__to, $__sj, $html, $head);
			}
	}
	/*
		ENVIA A MENSAGEM PARA A WEBSOCORRO AVISANDO QUE OS DADOS DO CONTATO NÃO FORAM SALVOS NO BANCO DE DADOS;
	*/
	function send_email_error_BD_reserva($dados = array()){
		// Formata o campo para receber os acentos corretamente
		$nome = utf8_encode($dados[0]);
		$acompanhantes = utf8_encode($dados[1]);
		$adultos = utf8_encode($dados[2]);
		$criancas_10 = utf8_encode($dados[3]);
		$criancas_3 = utf8_encode($dados[4]);
		$email = utf8_encode($dados[5]);
		$telefone = utf8_encode($dados[6]);
		$celular = utf8_encode($dados[7]);
		$data_chegada = utf8_encode($dados[8]);
		$data_saida = utf8_encode($dados[9]);
		$data = $dados[11];
		
		/// Este email será o responsável por enviar o email pelo servidor e deve ser um e-mail válido sobre o dominio em questão;
		$mail_remetente = "contato@portaldosolhotelfazenda.com.br";
		
		// Email que receberá uma cópia;
		$email_copy =  "dalcio@websocorro.com.br";
		
		// Este váriavel e para colocar em qual caixa de email deve chegar a mensagem.
		$__to = "suporte@websocorro.com.br"; 
		
		// Titulo da mensagem, observe as regras de SPAN ao montar um titulo
		$__sj = "Erro no form de contato | Portal do Sol Hotel Fazenda";
		
		// Aqui esta sendo montada a estrutura do e-mail.
		$html = $this->html_head;
		// Está parte do código deve ser ajustado conforme a necessidade de casa formulário.
		$html .= "<center>
				<table border='0' cellspacing='3' cellpadding='0' id='tab' align='center'>
					 <tr>
						<td colspan='4'><img src='http://www.portaldosolhotelfazenda.com.br/imagens/estrutura/cabecalho-email-contato.jpg' alt='Imagem de Socorro - Cabeçalho da página contato' title='Imagem de Socorro - Cabeçalho da página contato' /></td>
					 </tr>
					 <tr>
						<td colspan='4' class='titulo'><h1>Reserva | Portal do Sol Hotel Fazenda</h1></td>
					 </tr>
					 <tr>
						<th scope='row' align='right'  width='45%' class='td'>Nome:</th>
						<td colspan='3' align='left' class='td'>$nome</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Número de acompanhantes:</th>
						<td colspan='3' align='left' class='td'>$acompanhantes</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Número de adultos:</th>
						<td colspan='3' align='left' class='td'>$adultos</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Crianças de 4 a 10 anos:</th>
						<td colspan='3' align='left' class='td'>$criancas_10</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Crianças até 3 anos:</th>
						<td colspan='3' align='left' class='td'>$criancas_3</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Email:</th>
						<td colspan='3' align='left' class='td'><a href='mailto:$email'>$email</a></td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Telefone:</th>
						<td colspan='3' align='left' class='td'>$telefone</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Celular:</th>
						<td colspan='3' align='left' class='td'>$celular</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data de chegada:</th>
						<td colspan='3' align='left' class='td'>$data_chegada</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data de saída:</th>
						<td colspan='3' align='left' class='td'>$data_saida</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data e Hora:</th>
						<td colspan='3' align='left' class='td'>$data</td>
					 </tr>
					 <tr>
						<td colspan='4' align='left' class='rodape'><a href='mailto:suporte@websocorro.com.br'>Agência WebSocorro</a></td>
					  </tr>
				 </table>
				 </center>
			 </body>
		 </html>";
					
			// Verifica qual o sistema operacional que estará enviando o e-mail, para formatar as quabras de linhas		
			if(PHP_OS == "Linux") $snap  = "\n"; //Se for Linux
			elseif(PHP_OS == "WINNT") $snap  = "\r\n"; // Se for Windows
			else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
				// Configura a versão do cab_emais
				$head = "MIME-Version: 1.1".$snap;
				// Recebe as váriaveis de quem recebe o e-mail
				$head.= "From: ". $mail_remetente . $snap;
				// Recebe a váriavel de qual e-mail será utilizado para resposta do e-mail, no caso o email de quem preencheu o formulário.
				$head.= "Reply-To: ". $email . $snap;
				// Recebe a váriavel de qual e-mail será enviado uma cópia do e-mail.
				if(empty($email_copy)){
				}
				else{
					$head.= "Bcc: ".$email_copy . $snap;
				}
				$head.= "Content-type: text/html; charset=utf-8".$snap;
				
			if(!mail($__to, $__sj, $html, $head ,"-r".$mail_remetente)){ // Se for Postfix
				$head .= "Return-Path: " . $mail_remetente . $snap;
				mail($__to, $__sj, $html, $head);
			}
	}
	/*
		AVISA A WEBSOCORRO QUE ESTÃO TENTANDO FAZER PREENCHIMENTO VIA ROBOTS NO FORMULÁRIO DE CONTATO;
	*/
	function send_email_robots_reserva($dados_maliciosos = array()){
		// Formata o campo para receber os acentos corretamente
		$nome = utf8_encode($dados_maliciosos[0]);
		$acompanhantes = utf8_encode($dados_maliciosos[1]);
		$adultos = utf8_encode($dados_maliciosos[2]);
		$criancas_10 = utf8_encode($dados_maliciosos[3]);
		$criancas_3 = utf8_encode($dados_maliciosos[4]);
		$email = utf8_encode($dados_maliciosos[5]);
		$telefone = utf8_encode($dados_maliciosos[6]);
		$celular = utf8_encode($dados_maliciosos[7]);
		$data_chegada = utf8_encode($dados_maliciosos[8]);
		$data_saida = utf8_encode($dados_maliciosos[9]);
		$data = $dados_maliciosos[11];
		
		// Este email será o responsável por enviar o email pelo servidor e deve ser um e-mail válido sobre o dominio em questão;
		$mail_remetente = "contato@portaldosolhotelfazenda.com.br";
		
		// Email que receberá uma cópia;
		$email_copy =  "dalcio@websocorro.com.br";
		
		// Este váriavel e para colocar em qual caixa de email deve chegar a mensagem.
		$__to = "suporte@websocorro.com.br";
		
		// Titulo da mensagem, observe as regras de SPAN ao montar um titulo
		$__sj = "Tentativa forcada de preenchimento do form de contato Portal do Sol";
		
		// Aqui esta sendo montada a estrutura do e-mail.
		$html = $this->html_head;
		// Está parte do código deve ser ajustado conforme a necessidade de casa formulário.
		$html .= "<center>
				<table border='0' cellspacing='3' cellpadding='0' id='tab' align='center'>
					 <tr>
						<td colspan='4'><img src='http://www.portaldosolhotelfazenda.com.br/imagens/estrutura/cabecalho-email-contato.jpg' alt='Imagem de Socorro - Cabeçalho da página contato' title='Imagem de Socorro - Cabeçalho da página contato' /></td>
					 </tr>
					 <tr>
						<td colspan='4' class='titulo'><h1>Reserva | Portal do Sol Hotel Fazenda</h1></td>
					 </tr>
					 <tr>
						<th scope='row' align='right'  width='45%' class='td'>Nome:</th>
						<td colspan='3' align='left' class='td'>$nome</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Número de acompanhantes:</th>
						<td colspan='3' align='left' class='td'>$acompanhantes</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Número de adultos:</th>
						<td colspan='3' align='left' class='td'>$adultos</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Crianças de 4 a 10 anos:</th>
						<td colspan='3' align='left' class='td'>$criancas_10</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Crianças até 3 anos:</th>
						<td colspan='3' align='left' class='td'>$criancas_3</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Email:</th>
						<td colspan='3' align='left' class='td'><a href='mailto:$email'>$email</a></td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Telefone:</th>
						<td colspan='3' align='left' class='td'>$telefone</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Celular:</th>
						<td colspan='3' align='left' class='td'>$celular</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data de chegada:</th>
						<td colspan='3' align='left' class='td'>$data_chegada</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data de saída:</th>
						<td colspan='3' align='left' class='td'>$data_saida</td>
					 </tr>
					 <tr>
						<th scope='row' align='right' class='td'>Data e Hora:</th>
						<td colspan='3' align='left' class='td'>$data</td>
					 </tr>
					 <tr>
						<td colspan='4' align='left' class='rodape'><a href='mailto:suporte@websocorro.com.br'>Agência WebSocorro</a></td>
					  </tr>
				 </table>
				 </center>
			 </body>
		 </html>";	
					
			// Verifica qual o sistema operacional que estará enviando o e-mail, para formatar as quabras de linhas		
			if(PHP_OS == "Linux") $snap  = "\n"; //Se for Linux
			elseif(PHP_OS == "WINNT") $snap  = "\r\n"; // Se for Windows
			else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
				// Configura a versão do cab_emais
				$head = "MIME-Version: 1.1".$snap;
				// Recebe as váriaveis de quem recebe o e-mail
				$head.= "From: ". $mail_remetente . $snap;
				// Recebe a váriavel de qual e-mail será utilizado para resposta do e-mail, no caso o email de quem preencheu o formulário.
				$head.= "Reply-To: ". $email . $snap;
				// Recebe a váriavel de qual e-mail será enviado uma cópia do e-mail.
				if(empty($email_copy)){
				}
				else{
					$head.= "Bcc: ".$email_copy . $snap;
				}
				$head.= "Content-type: text/html; charset=utf-8".$snap;
				
			if(!mail($__to, $__sj, $html, $head ,"-r".$mail_remetente)){ // Se for Postfix
				$head .= "Return-Path: " . $mail_remetente . $snap;
				mail($__to, $__sj, $html, $head );
			}
	}
}
?>
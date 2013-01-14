<?php
	// INCLUIMOS O ARQUIVO DE MANIPULAÇÃO DA CAMADA DE DADOS;	
	require_once '../control/DAO.class.php';
	require_once '../control/IMG.class.php';
	$DAO = new DAO;

	$width_resize = 206;
	$height_resize = 155;	

	if(empty($_POST['email20'])){

		$nome = utf8_decode($_POST['nome']);
		$email = $_POST['email'];
		$cidade = utf8_decode($_POST['cidade']);
		$comentarios = utf8_decode($_POST['comentarios']);
		$foto1 = $_FILES['foto1'];
		$foto2 = $_FILES['foto2'];
		$foto3 = $_FILES['foto3'];
		$foto4 = $_FILES['foto4'];
		$foto5 = $_FILES['foto5'];
		$foto6 = $_FILES['foto6'];

		$nome_imagem1 = "";
		$nome_imagem2 = "";
		$nome_imagem3 = "";
		$nome_imagem4 = "";
		$nome_imagem5 = "";
		$nome_imagem6 = "";

 
	// Se a foto estiver sido selecionada
	if (!empty($foto1["name"])) {
		$IMAGE = new IMAGE($foto1);

		//Pegamos a orientação da imagem para sabermos sua posição.
		// 		Landscape - Paisagem;
		// 		Square - Quadrado;
		// 		Potrait - Retrato;
		$orientation = $IMAGE->get_orientation();

		//Aplicamos os ajustes conforme a orientação da imagem
		switch ($orientation) {
			
			case 'square': // quadrada
			case 'portrait': // vertical

				// Como a imagem esta na horizontal, temos que ajusta-la primeiro pela altura
				// Assim sobrará pixels a mais na largura, exemplo: ??? X 116
				//$IMAGE->fit_to_height($height_resize);
				$IMAGE->fit_to_width($width_resize);
				// Pegamos a largura da nova imagem, criada pelo fit_to_height();
				//$width = $IMAGE->get_width();

				$height = $IMAGE->get_height();

				//echo $width."<br>";
				// Pegamos a largura da nova imagem (???) e subtraimos o tamanho correto da imagem (215);
				// O resto dessa divisão será dividida por dois, achando assim o quanto de margem temos que dar para centralizar o crop;
				// Assim achamos o valor da variável $x1 - left;
				$x1 = 0;

				// $y1 - top;
				$y1 = ($height - $height_resize) / 2;

				// Para centralizarmos o crop, temos que pegar o valor da margem a qual temos em $x1 e somar com a largura que queremos;
				$x2 = $x1 + $width_resize;

				// $y2 = bottom;
				$y2 = $y1 +$height_resize;
				break;

				// Se fossemos desenhar isto para compreendermos melhor, o que estamos fazendo seria isto (Cada . (ponto) representa um pixel)
				// Cada variável representa o número do pixel em seu eixo x - Horizontal, y - vertical;
				// .....$y1...............................
				// .....$x1.....................$x2.......
				// .......................................
				// .......................................
				// .............................$y2.......
				// .......................................
			
			case 'landscape': // horizontal
				$original_height = $IMAGE->get_height();
				$original_width = $IMAGE->get_width();

				$proporcao = $original_height * 1.33;

				if($proporcao <= $original_width){
					$IMAGE->fit_to_height($height_resize);
					$height = $IMAGE->get_height();
					$x1 = 0;
					$y1 = ($height - $height_resize) / 2;
					$x2 = $width_resize;
					$y2 = $y1 + $height_resize;
				}else{
					$IMAGE->fit_to_width($width_resize);

					$height = $IMAGE->get_height();

					$x1 = 0;

					$y1 = ($height - $height_resize) / 2;

					$x2 = $x1 + $width_resize;

					$y2 = $y1 +$height_resize;
				}
				break;


			default:
				throw new Exception("Formato de imagem nao reconhecido");
				break;
		}

		// Fazemos o recorte da imagem nas proporções necessárias, depois de calculadas pelo switch acima
		$IMAGE->crop($x1, $y1, $x2, $y2);
		
		// Pegamos a extensão da imagem (jpg | gif | png);
		$file_extension = $IMAGE->file_ext();

		// Conacatenamos o nome da imagem (Dia+mês+ano+hora+minuto+segundo) com a extensão da imagem;
		$nome_imagem = strtolower(uniqid(date("d-m-Y-HIs")) . "." . $file_extension);

		// Salvamos a imagem 
		$IMAGE->save(null, null, $nome_imagem);

		$nome_imagem1 = $nome_imagem;

	}

	// Se a foto estiver sido selecionada
	if (!empty($foto2["name"])) {
 
    	$IMAGE = new IMAGE($foto2);
		$orientation = $IMAGE->get_orientation();
		switch ($orientation) {
			
			case 'square': // quadrada
			case 'portrait': // vertical

				$IMAGE->fit_to_width($width_resize);
				$height = $IMAGE->get_height();
				$x1 = 0;
				$y1 = ($height - $height_resize) / 2;
				$x2 = $x1 + $width_resize;
				$y2 = $y1 +$height_resize;
				break;
	
			case 'landscape': // horizontal
				$original_height = $IMAGE->get_height();
				$original_width = $IMAGE->get_width();

				$proporcao = $original_height * 1.33;

				if($proporcao <= $original_width){
					$IMAGE->fit_to_height($height_resize);
					$height = $IMAGE->get_height();
					$x1 = 0;
					$y1 = ($height - $height_resize) / 2;
					$x2 = $width_resize;
					$y2 = $y1 + $height_resize;
				}else{
					$IMAGE->fit_to_width($width_resize);

					$height = $IMAGE->get_height();

					$x1 = 0;

					$y1 = ($height - $height_resize) / 2;

					$x2 = $x1 + $width_resize;

					$y2 = $y1 +$height_resize;
				}
				break;


			default:
				throw new Exception("Formato de imagem nao reconhecido");
				break;
		}

		// Fazemos o recorte da imagem nas proporções necessárias, depois de calculadas pelo switch acima
		$IMAGE->crop($x1, $y1, $x2, $y2);

		$file_extension = $IMAGE->file_ext();

		$nome_imagem = strtolower(uniqid(date("d-m-Y-HIs")) . "." . $file_extension);

		$IMAGE->save(null, null, $nome_imagem);

		$nome_imagem2 = $nome_imagem;

	}

	// Se a foto estiver sido selecionada
	if (!empty($foto3["name"])) {
 
    	$IMAGE = new IMAGE($foto3);
		$orientation = $IMAGE->get_orientation();
		switch ($orientation) {
			
			case 'square': // quadrada
			case 'portrait': // vertical

				$IMAGE->fit_to_width($width_resize);
				$height = $IMAGE->get_height();
				$x1 = 0;
				$y1 = ($height - $height_resize) / 2;
				$x2 = $x1 + $width_resize;
				$y2 = $y1 +$height_resize;
				break;
	
			case 'landscape': // horizontal
				$original_height = $IMAGE->get_height();
				$original_width = $IMAGE->get_width();

				$proporcao = $original_height * 1.33;

				if($proporcao <= $original_width){
					$IMAGE->fit_to_height($height_resize);
					$height = $IMAGE->get_height();
					$x1 = 0;
					$y1 = ($height - $height_resize) / 2;
					$x2 = $width_resize;
					$y2 = $y1 + $height_resize;
				}else{
					$IMAGE->fit_to_width($width_resize);

					$height = $IMAGE->get_height();

					$x1 = 0;

					$y1 = ($height - $height_resize) / 2;

					$x2 = $x1 + $width_resize;

					$y2 = $y1 +$height_resize;
				}
				break;


			default:
				throw new Exception("Formato de imagem nao reconhecido");
				break;
		}

		// Fazemos o recorte da imagem nas proporções necessárias, depois de calculadas pelo switch acima
		$IMAGE->crop($x1, $y1, $x2, $y2);

		$file_extension = $IMAGE->file_ext();

		$nome_imagem = strtolower(uniqid(date("d-m-Y-HIs")) . "." . $file_extension);

		$IMAGE->save(null, null, $nome_imagem);

		$nome_imagem3 = $nome_imagem;

	}

	// Se a foto estiver sido selecionada
	if (!empty($foto4["name"])) {
 
    	$IMAGE = new IMAGE($foto4);
		$orientation = $IMAGE->get_orientation();
		switch ($orientation) {
			
			case 'square': // quadrada
			case 'portrait': // vertical

				$IMAGE->fit_to_width($width_resize);
				$height = $IMAGE->get_height();
				$x1 = 0;
				$y1 = ($height - $height_resize) / 2;
				$x2 = $x1 + $width_resize;
				$y2 = $y1 +$height_resize;
				break;
	
			case 'landscape': // horizontal
				$original_height = $IMAGE->get_height();
				$original_width = $IMAGE->get_width();

				$proporcao = $original_height * 1.33;

				if($proporcao <= $original_width){
					$IMAGE->fit_to_height($height_resize);
					$height = $IMAGE->get_height();
					$x1 = 0;
					$y1 = ($height - $height_resize) / 2;
					$x2 = $width_resize;
					$y2 = $y1 + $height_resize;
				}else{
					$IMAGE->fit_to_width($width_resize);

					$height = $IMAGE->get_height();

					$x1 = 0;

					$y1 = ($height - $height_resize) / 2;

					$x2 = $x1 + $width_resize;

					$y2 = $y1 +$height_resize;
				}
				break;


			default:
				throw new Exception("Formato de imagem nao reconhecido");
				break;
		}

		// Fazemos o recorte da imagem nas proporções necessárias, depois de calculadas pelo switch acima
		$IMAGE->crop($x1, $y1, $x2, $y2);

		$file_extension = $IMAGE->file_ext();

		$nome_imagem = strtolower(uniqid(date("d-m-Y-HIs")) . "." . $file_extension);

		$IMAGE->save(null, null, $nome_imagem);

		$nome_imagem4 = $nome_imagem;

	}

	// Se a foto estiver sido selecionada
	if (!empty($foto5["name"])) {
 		
 		$IMAGE = new IMAGE($foto5);
		$orientation = $IMAGE->get_orientation();
		switch ($orientation) {
			
			case 'square': // quadrada
			case 'portrait': // vertical

				$IMAGE->fit_to_width($width_resize);
				$height = $IMAGE->get_height();
				$x1 = 0;
				$y1 = ($height - $height_resize) / 2;
				$x2 = $x1 + $width_resize;
				$y2 = $y1 +$height_resize;
				break;
	
			case 'landscape': // horizontal
				$original_height = $IMAGE->get_height();
				$original_width = $IMAGE->get_width();

				$proporcao = $original_height * 1.33;

				if($proporcao <= $original_width){
					$IMAGE->fit_to_height($height_resize);
					$height = $IMAGE->get_height();
					$x1 = 0;
					$y1 = ($height - $height_resize) / 2;
					$x2 = $width_resize;
					$y2 = $y1 + $height_resize;
				}else{
					$IMAGE->fit_to_width($width_resize);

					$height = $IMAGE->get_height();

					$x1 = 0;

					$y1 = ($height - $height_resize) / 2;

					$x2 = $x1 + $width_resize;

					$y2 = $y1 +$height_resize;
				}
				break;


			default:
				throw new Exception("Formato de imagem nao reconhecido");
				break;
		}

		// Fazemos o recorte da imagem nas proporções necessárias, depois de calculadas pelo switch acima
		$IMAGE->crop($x1, $y1, $x2, $y2);

		$file_extension = $IMAGE->file_ext();

		$nome_imagem = strtolower(uniqid(date("d-m-Y-HIs")) . "." . $file_extension);

		$IMAGE->save(null, null, $nome_imagem);

		$nome_imagem5 = $nome_imagem;

	}

	// Se a foto estiver sido selecionada
	if (!empty($foto6["name"])) {
 
    	$IMAGE = new IMAGE($foto6);
		$orientation = $IMAGE->get_orientation();
		switch ($orientation) {
			
			case 'square': // quadrada
			case 'portrait': // vertical

				$IMAGE->fit_to_width($width_resize);
				$height = $IMAGE->get_height();
				$x1 = 0;
				$y1 = ($height - $height_resize) / 2;
				$x2 = $x1 + $width_resize;
				$y2 = $y1 +$height_resize;
				break;
	
			case 'landscape': // horizontal
				$original_height = $IMAGE->get_height();
				$original_width = $IMAGE->get_width();

				$proporcao = $original_height * 1.33;

				if($proporcao <= $original_width){
					$IMAGE->fit_to_height($height_resize);
					$height = $IMAGE->get_height();
					$x1 = 0;
					$y1 = ($height - $height_resize) / 2;
					$x2 = $width_resize;
					$y2 = $y1 + $height_resize;
				}else{
					$IMAGE->fit_to_width($width_resize);

					$height = $IMAGE->get_height();

					$x1 = 0;

					$y1 = ($height - $height_resize) / 2;

					$x2 = $x1 + $width_resize;

					$y2 = $y1 +$height_resize;
				}
				break;


			default:
				throw new Exception("Formato de imagem nao reconhecido");
				break;
		}

		// Fazemos o recorte da imagem nas proporções necessárias, depois de calculadas pelo switch acima
		$IMAGE->crop($x1, $y1, $x2, $y2);

		$file_extension = $IMAGE->file_ext();

		$nome_imagem = strtolower(uniqid(date("d-m-Y-HIs")) . "." . $file_extension);

		$IMAGE->save(null, null, $nome_imagem);

		$nome_imagem6 = $nome_imagem;

	}

		$data = date('d/m/Y');
		//Cadastrando os dados no BD...		
		$sql = "INSERT INTO depoimentos (`dep_nome` ,`dep_email` ,`dep_cidade` ,`dep_comentarios` ,`dep_data`,`dep_foto1` ,`dep_foto2` ,`dep_foto3` ,`dep_foto4` ,`dep_foto5` ,`dep_foto6`) VALUES ('$nome','$email','$cidade','$comentarios','$data','$nome_imagem1','$nome_imagem2','$nome_imagem3','$nome_imagem4','$nome_imagem5','$nome_imagem6');";
		
		if($DAO->query($sql)){
			// Enviar o e-mail para o usuário confirmar o cadastro
			$remetente="suporte@websocorro.com.br";
					
			$mensagem="<html><head></head><body>Foi cadastrado mais um depoimento no site Portal do Sol Hotel Fazenda enviado por $nome</body></html>";

			$headers="From:<$remetente>\n";
			$headers.="X-Sender:<$remetente>\n";
			$headers.="X-mailer: PHP\n";
			$headers.="X-Priority: 1\n";
			$headers.="Return-Path: <$remetente>\n";
			$headers.="Content-Type: text/html; charset=iso-8859-1\n";

			$para = "suporte@websocorro.com.br";
			$assunto = "Tem depoimento cadastrado no site Shangrilá";

			mail($para,$assunto,$mensagem,$headers);


			?><!--
			<script type="text/javascript">
				window.location = "http://www.portaldosolhotelfazenda.com.br/depoimentos/depoimento-enviado#centro";
			</script>
			-->	
			<?php
			header("Location: ../depoimentos/depoimento-enviado");
		}
		else{
			echo "erro";
		}
	}

?>

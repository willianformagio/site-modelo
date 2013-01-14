	<?php
	// INCLUIMOS O ARQUIVO DE MANIPULAÇÃO DA CAMADA DE DADOS;   
	    require_once 'control/DAO.class.php';
	    $DAO = new DAO; 

	    require_once 'control/limita-caracter.php';
	//Fazendo a busca no Banco de Dados

	$depoimento_id = $destino_depoimentos;

	//Se nenhum depoimento foi escolhido
	if ($depoimento_id == ""){

	    $sql = "SELECT dep_id,dep_nome,dep_cidade,dep_comentarios,dep_foto1,dep_foto2,dep_foto3,dep_foto4,dep_foto5,dep_foto6,dep_aprovado FROM depoimentos WHERE dep_aprovado=1 ORDER BY dep_id DESC LIMIT 0,1"; 

	}else{

	//Se o cliente selecionou algum depoimento
	    $sql = "SELECT dep_id,dep_nome,dep_cidade,dep_comentarios,dep_foto1,dep_foto2,dep_foto3,dep_foto4,dep_foto5,dep_foto6,dep_aprovado FROM depoimentos WHERE dep_aprovado=1 AND dep_id=$depoimento_id"; 

	}

	$depoimento_integra = $DAO->show_depoimento($sql);

	$titulo = utf8_encode($depoimento_integra[0][1]);
	$cidade = utf8_encode($depoimento_integra[0][2]);

	$foto1 = $depoimento_integra[0][4];
	$foto2 = $depoimento_integra[0][5];
	$foto3 = $depoimento_integra[0][6];
	$foto4 = $depoimento_integra[0][7];
	$foto5 = $depoimento_integra[0][8];
	$foto6 = $depoimento_integra[0][9];


	?>
	<div id="interna">
		<h2 tabindex="<?php echo $contaTabIndex ++; ?>">Depoimentos</h2>
		<article tabindex="<?php echo $contaTabIndex ++; ?>">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc est, aliquet id ullamcorper non, varius ac eros. Vivamus ut tincidunt mauris. Sed pretium rutrum neque, at porttitor libero viverra ac. Ut feugiat sodales enim vintum odio dapibus ultrices. Ut feugiat sodales enim vitae eleifend.</p> <p>Pellentesque rhoncus risus fermentum odio dapibus ultrices. Duis fringilla ipsum quis purus condimentum non varius nibh suscipit.</p>
		</article>
		<div class="titulo-interna">
	        <div class="flor-pequena"></div>
	        <h3 tabindex="<?php echo $contaTabIndex ++; ?>"><?php echo "$titulo - $cidade";?></h3>
	        <br class="clear">
	    </div>
	    <section class="secao-de-fotos">
	    	<div id="vlightbox1">
	    		<?php if (!empty($foto1)){
                    echo "<figure>";
                    echo "<img src=\"sistema-depoimentos/fotos/$foto1\" alt=\"Imagem ilustrativa do depoimento\" >";
                    echo "</figure>";
                } ?>
                <?php if (!empty($foto2)){
                    echo "<figure>";
                    echo "<img src=\"sistema-depoimentos/fotos/$foto2\" alt=\"Imagem ilustrativa do depoimento\" >";
                    echo "</figure>";
                } ?>
                <?php if (!empty($foto3)){
                    echo "<figure>";
                    echo "<img src=\"sistema-depoimentos/fotos/$foto3\" alt=\"Imagem ilustrativa do depoimento\" >";
                    echo "</figure>";
                } ?>
                <?php if (!empty($foto4)){
                    echo "<figure>";
                    echo "<img src=\"sistema-depoimentos/fotos/$foto4\" alt=\"Imagem ilustrativa do depoimento\" >";
                    echo "</figure>";
                } ?>
                <?php if (!empty($foto5)){
                    echo "<figure>";
                    echo "<img src=\"sistema-depoimentos/fotos/$foto5\" alt=\"Imagem ilustrativa do depoimento\" >";
                    echo "</figure>";
                } ?>
                <?php if (!empty($foto6)){
                    echo "<figure>";
                    echo "<img src=\"sistema-depoimentos/fotos/$foto6\" alt=\"Imagem ilustrativa do depoimento\" >";
                    echo "</figure>";
                } ?>

				<br class="clear">
			</div>
			<div>
				<p tabindex="<?php echo $contaTabIndex ++; ?>" ><?php echo utf8_encode($depoimento_integra[0][3]);?></p>
			</div>
			<br class="clear">
	    </section>
	    		<div id="botao-deixe-depo">
                	<a href="depoimentos/deixe-seu-depoimento" title="Clique para deixar seu depoimento" tabindex="<?php echo $contaTabIndex ++; ?>">Envie seu depoimento</a>
                </div>
                <br class="clear">
	    <div class="titulo-interna">
	        <div class="flor-pequena"></div>
	        <h3 tabindex="<?php echo $contaTabIndex ++; ?>">Confira mais depoimentos abaixo</h3>
	        <br class="clear">
	    </div>
	    <section class="secao-de-fotos">
	    				<?php
                                $ssql = "SELECT dep_id,dep_nome,dep_cidade,dep_comentarios,dep_foto1,dep_foto2,dep_foto3,dep_foto4,dep_foto5,dep_foto6,dep_aprovado FROM depoimentos WHERE dep_aprovado=1 ORDER BY dep_id DESC"; 

                                $rs = mysql_query($ssql); 

                                // Enquanto não terminar as linhas de dados faça...
                                while ( $linhas = mysql_fetch_array($rs)){
                                    /* Apresente os campos cadastrados */
                                    echo "<div class=\"titulo-interna\">
                                            <div class=\"flor-pequena\"></div>
                                                <p class=\"lista-de-itens\">";
                                    $mensagem = utf8_encode(limita_caracteres($linhas[3],75));
                                    $nome = utf8_encode($linhas[1]);
                                    $cidade = utf8_encode($linhas[2]);
                                    print "<a href=\"depoimentos/$linhas[0]\" title=\"Confira a publicação do hospede $nome\" tabindex=\"$contaTabIndex\" ><strong>$nome - $cidade </strong></a>";
                                    echo "</p>
                                          <br class=\"clear\">
                                          <p class=\"descricao\"><a href=\"depoimentos/$linhas[0]\" title=\"Confira a publicação do hospede $nome\" tabindex=\"$contaTabIndex\" >$mensagem</a></p>
                                          </div>";

                                    $contaTabIndex ++;
                                } 
                                //Fechamos o conjunto de resultado 
                                mysql_free_result($rs);    
                            ?>
	    </section>
	    
	    <?php include 'includes/estrutura/comentario-face.php';?>
	</div>
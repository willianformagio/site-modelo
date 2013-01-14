<?php
    require_once 'control/DAO.class.php';
    $DAO = new DAO; 

    require_once 'control/limita-caracter.php';

        $sql = "SELECT dep_id, dep_nome, dep_cidade, dep_comentarios, dep_data, dep_foto1, dep_aprovado FROM depoimentos WHERE dep_aprovado=1 and dep_foto1 LIKE '%.jpg%' ORDER BY dep_id DESC LIMIT 0,3";

        $depoimento = $DAO->show_depoimento($sql);
?>
            <figure id="figure-melhor-vista">
            	<img src="imagens/home/corpo/foto-da-paisagem-do-hotel.jpg" alt="Foto da linda paisagem do hotel" />
                <figcaption><h2 tabindex="<?php echo $contaTabIndex ++; ?>">A Melhor vista do Circuito das Águas ao abrir as janelas</h2></figcaption>
            </figure>
            <article tabindex="<?php echo $contaTabIndex ++; ?>">
            	<p>A arte da hospedagem em Serra Negra, a pousada encontra-se abraçada pelo vale da lua azul na serra na Mantiqueira, ocupando uma área de 30.000m² . É um grande jardim onde estão distribuídos os chalés e apartamentos, comodidades e opções de lazer.</p>
                <p>Em 1991, foi adquirido o terreno, e inspirados em Shangri lá no Tibet, começaram a erguer este espaço voltado para pessoas que precisam descansar, “praticar nadismo”. Desde então, o lugar vem trazendo momentos especiais aos seus hóspedes, com a sutileza e rusticidade na decoração, a atenção nos detalhes e o atendimento personalisado.</p>
            </article>
            <section class="espaco-zen">
            	<figure>
                	<img src="imagens/home/corpo/imagem-ilustrativa-espaco-zen-servicos-especiais.jpg" alt="Foto ilustrativa do espaço zen e serviços especiais" />
                </figure>
                <div>
                	<div class="flor-pequena"></div>
                	<h3><a href="lazer/espaco-zen" title="Clique e conheça nosso espaço Zen" tabindex="<?php echo $contaTabIndex ++; ?>">Espaço Zen</a></h3>
                	<div class="flor-pequena"></div>
                    <br class="clear">
                </div>
                <article tabindex="<?php echo $contaTabIndex ++; ?>">
                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc est, aliquet id ullamcorper non, varius ac eros. Vivamus ut tincidunt mauris.
                </article>
            </section>
            <section class="espaco-zen">
            	<figure>
                	<img src="imagens/home/corpo/imagem-ilustrativa-praticar-nadismo.jpg" alt="Foto ilustrativa do espaço para praticas nadismo" />
                </figure>
                <div>
                	<div class="flor-pequena"></div>
                	<h3><a href="lazer/praticar-nadismo" title="Clique e conheça a nossa Pratica de Nadismo" tabindex="<?php echo $contaTabIndex ++; ?>">Praticar nadismo</a></h3>
                	<div class="flor-pequena"></div>
                    <br class="clear">
                </div>
                <article tabindex="<?php echo $contaTabIndex ++; ?>">
                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc est, aliquet id ullamcorper non, varius ac eros. Vivamus ut tincidunt mauris.
                </article>
            </section>
            <br class="clear">
            <section id="depoimentos">
            	<div id="titulo-depo">
                	<h4><a href="depoimentos" title="Clique para e conheça os depoimentos" tabindex="<?php echo $contaTabIndex ++; ?>">Conheça nosso Holel pelos olhos de quem já passou por aqui</a></h4>
                </div>
                <figure>
                    <?php
                        if(!empty($depoimento[0][0])){
                        $id = $depoimento[0][0];
                        $nome = utf8_encode($depoimento[0][1]);
                        $caminho = $depoimento[0][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[1][0])){
                        $id = $depoimento[1][0];
                        $nome = utf8_encode($depoimento[1][1]);
                        $caminho = $depoimento[1][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[2][0])){
                        $id = $depoimento[2][0];
                        $nome = utf8_encode($depoimento[2][1]);
                        $caminho = $depoimento[2][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[3][0])){
                        $id = $depoimento[3][0];
                        $nome = utf8_encode($depoimento[3][1]);
                        $caminho = $depoimento[3][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[4][0])){
                        $id = $depoimento[4][0];
                        $nome = utf8_encode($depoimento[4][1]);
                        $caminho = $depoimento[4][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[5][0])){
                        $id = $depoimento[5][0];
                        $nome = utf8_encode($depoimento[5][1]);
                        $caminho = $depoimento[5][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[6][0])){
                        $id = $depoimento[6][0];
                        $nome = utf8_encode($depoimento[6][1]);
                        $caminho = $depoimento[6][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[7][0])){
                        $id = $depoimento[7][0];
                        $nome = utf8_encode($depoimento[7][1]);
                        $caminho = $depoimento[7][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[8][0])){
                        $id = $depoimento[8][0];
                        $nome = utf8_encode($depoimento[8][1]);
                        $caminho = $depoimento[8][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[9][0])){
                        $id = $depoimento[9][0];
                        $nome = utf8_encode($depoimento[9][1]);
                        $caminho = $depoimento[9][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[10][0])){
                        $id = $depoimento[10][0];
                        $nome = utf8_encode($depoimento[10][1]);
                        $caminho = $depoimento[10][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                    <?php
                        if(!empty($depoimento[11][0])){
                        $id = $depoimento[11][0];
                        $nome = utf8_encode($depoimento[11][1]);
                        $caminho = $depoimento[11][5];
                        $tabindex = $contaTabIndex ++;
                        echo "<a href=\"depoimentos/$id\" title=\"Clique para visualizar o depoimento do hospede $nome\" tabindex=\"$tabindex\">
                            <img src=\"sistema-depoimentos/fotos/$caminho\" alt=\"Foto enviado junto a um depoimento do hospede $nome\" />
                            </a>";
                        }
                    ?>
                </figure>
                <p tabindex="<?php echo $contaTabIndex ++; ?>">Envie-nos as fotos que você fez em nosso Hotel e deixe seu depoimento</p>
                <div id="botao-deixe-depo">
                	<a href="depoimentos/deixe-seu-depoimento" title="Clique para deixar seu depoimento" tabindex="<?php echo $contaTabIndex ++; ?>">Envie seu depoimento</a>
                </div>
                
                <br class="clear">
            </section>
                <?php include 'includes/estrutura/comentario-face.php';?>
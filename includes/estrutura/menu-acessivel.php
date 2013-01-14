			<div class="hidden"><p id="top" tabindex="<?php echo $contaTabIndex ++; ?>">Você está no menu de acessibilidade deste <span lang="en">site</span>, através desta área você poderá acessar áreas especificas do <span lang="en">site</span> de forma fácil e rápida, confira a lista de link:</p></div>
            <nav id="menu_acessivel">
                <ul>
                    <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>#conteudo" class="saltarConteudo" title="Ir direto ao conteúdo" tabindex="<?php echo $contaTabIndex ++; ?>">Ir para conteúdo</a></li>
                    <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>#menuPrincipal" class="saltarMenuPrincipal" title="Saltar para o menu principal de navegação" tabindex="<?php echo $contaTabIndex ++; ?>">Ir para menu principal</a></li>
                    <li><a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>#saltarMenuSecundario" class="saltarMenuSecundario" title="Saltar para o menu secundário de navegação" tabindex="<?php echo $contaTabIndex ++; ?>">Ir para menu secundário</a></li>
                    <li><a href="mapa-do-site" title="Ir para a página mapa do site" tabindex="<?php echo $contaTabIndex ++; ?>" accesskey="4">Ir para mapa do <span lang="en">site</span></a></li>                    
                    <li><a title="Aumentar fonte" id="aumentar_fonte" tabindex="<?php echo $contaTabIndex ++; ?>"><span class="hidden">Aumentar fonte </span>A+</a></li>                    
                    <li><a title="Diminuir fonte" id="diminuir_fonte" tabindex="<?php echo $contaTabIndex ++; ?>"><span class="hidden">Diminuir fonte </span>A-</a></li>
                    <li><a title="Normalizar fonte" id="normalizar_fonte" tabindex="<?php echo $contaTabIndex ++; ?>"><span class="hidden">Normalizar fonte </span>A</a></li>
                    <li><a title="Com contraste" id="comContraste" tabindex="<?php echo $contaTabIndex ++; ?>">Com contraste</a></li>
                    <li><a title="Sem contraste" id="semContraste" tabindex="<?php echo $contaTabIndex ++; ?>">Sem contraste</a></li>
                    <li><a href="acessibilidade-deste-site" title="Ir para a página acessibilidade deste site" tabindex="<?php echo $contaTabIndex ++; ?>" accesskey="5">Acessibilidade do <span lang="en">site</span></a></li>
                </ul>
            </nav> <!-- FIM NAV #menu_acessivel -->
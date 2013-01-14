	<div id="interna">
		<h2 tabindex="<?php echo $contaTabIndex ++; ?>">Deixe seu depoimento</h2>
		<article tabindex="<?php echo $contaTabIndex ++; ?>">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc est, aliquet id ullamcorper non, varius ac eros. Vivamus ut tincidunt mauris. Sed pretium rutrum neque, at porttitor libero viverra ac. Ut feugiat sodales enim vintum odio dapibus ultrices. Ut feugiat sodales enim vitae eleifend.</p> <p>Pellentesque rhoncus risus fermentum odio dapibus ultrices. Duis fringilla ipsum quis purus condimentum non varius nibh suscipit.</p>
		</article>
		<form action="model/processa-depoimento.php" method="post" id="form_contato" name="form" enctype="multipart/form-data">
	    	<fieldset>
	            <legend title="Preencha o formulário abaixo"  tabindex="<?php echo $contaTabIndex ++; ?>" >Preencha o formulário abaixo</legend>
	            	<div class="labels">
	            		<label for="nome">Nome:</label>
	            		<label for="email">E-mail:</label>
	            		<label for="cidade">Cidade:</label>
	            		<label for="comentarios" id="comentario" >Comentário:</label>
	            		<label for="foto1">Foto #1 (Foto principal):</label>
	            		<label for="foto2">Foto #2:</label>
	            		<label for="foto3">Foto #3:</label>
	            		<label for="foto4">Foto #4:</label>
	            		<label for="foto5">Foto #5:</label>
	            		<label for="foto6">Foto #6:</label>

	            		<label for="email20" class="email20">email20</label>
	            	</div>
	            	<div class="inputs">
	            		<input type="text" id="nome" name="nome" class="campos" title="Digite seu nome" required placeholder="Digite seu nome..." tabindex="<?php echo $contaTabIndex ++; ?>" />
	            		<input type="email" id="email" name="email" class="campos" title="Digite seu E-mail" required placeholder="Digite seu E-mail..." tabindex="<?php echo $contaTabIndex ++; ?>" />
	            		<input type="text" id="cidade" name="cidade" class="campos" title="Digite sua cidade" required tabindex="<?php echo $contaTabIndex ++; ?>" placeholder="Digite sua cidade..." />
	            		<textarea id="comentarios" name="comentarios" title="Digite aqui a seu comentário" required tabindex="<?php echo $contaTabIndex ++; ?>" spellcheck="true" placeholder="Digite aqui seu comentário" ></textarea>

	            		<div id="input_fotos">
		            		<input type="file" id="foto1" name="foto1" class="campos" title="Clique para adicionar sua foto" tabindex="<?php echo $contaTabIndex ++; ?>" />
		            		<input type="file" id="foto2" name="foto2" class="campos" title="Clique para adicionar sua foto" tabindex="<?php echo $contaTabIndex ++; ?>" />
		            		<input type="file" id="foto3" name="foto3" class="campos" title="Clique para adicionar sua foto" tabindex="<?php echo $contaTabIndex ++; ?>" />
		            		<input type="file" id="foto4" name="foto4" class="campos" title="Clique para adicionar sua foto" tabindex="<?php echo $contaTabIndex ++; ?>" />
		            		<input type="file" id="foto5" name="foto5" class="campos" title="Clique para adicionar sua foto" tabindex="<?php echo $contaTabIndex ++; ?>" />
		            		<input type="file" id="foto6" name="foto6" class="campos" title="Clique para adicionar sua foto" tabindex="<?php echo $contaTabIndex ++; ?>" />
	            		</div>


	<!--========================================================================================================-->
			        	<input type="text" id="email20" name="email20" class="email20" title="Captcha amigável, por favor, não preencha este campo!" />
	<!--========================================================================================================-->
	            	</div>
		            <br class="clear"> 
			    <div id="buttons">      
	            	<button type="reset" title="Limpar Dados" class="botao_limpar" tabindex="<?php echo $contaTabIndex ++; ?>">Limpar</button>
	            	<button type="submit" title="Enviar Dados" class="botao_enviar" tabindex="<?php echo $contaTabIndex ++; ?>">Enviar</button>
	        	</div>
	        </fieldset>
	    </form>

	</div>
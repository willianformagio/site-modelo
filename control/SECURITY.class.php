<?php
class SECURITY{
	/*
		LIMPA TODOS OS DADOS PASSADOS POR CADA CAMPO DO FORMULÁRIO DE CONTATO, REMOVENDO SCRIPTS MALICIOSOS.	
	*/
	 function anti_injection($campo){
		/*
			preg_replace = Faz uma pesquisa de expressão regular e substitui o valor;
			strip_tags = Remove tags HTML, JAVASCRIPT e PHP da string;
			sql_regcase =  Faz com que o valor seja comparado tanto em Uppercase como Lowercase;
			trim = Retira os espaços vazios no ínicio e final de uma string;
			str_replace = Substitui um caractere ou mais por outro; 
			utf8_decode = Codifica a string para aceitar caracteres especiais;
			htmlentities = Converte qualquer comando em html texto;
		*/
		
		// REMOVE AS PALAVRAS QUE CONTENHAM A SINTAXE SQL;
		$campo = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$campo);
		
		// REMOVE TODAS AS TAGS HTML, JS E PHP;
		$campo = strip_tags($campo,'');
		
		// LIMPA OS SPAÇOS VAZIOS DO INICIO E FINAL DA STRING;
		$campo = trim($campo);
		
		// SUBSTITUI O APOSTROFO POR ASPAS DUPLAS;
		$campo = str_replace("'","\"",$campo);
		
		// DECODIFICA O CAMPO PARA RECEBER CARÁCTERES ESPECIAS;
		$campo = utf8_decode($campo);
		
		// RETORNA O VALOR DO CAMPO COM OS DADOS JÁ TRATADOS;
		return $campo;
	}
	
	/*
		CASO SEJA EXECUTADO O PREENCHIMENTO POR ROBOTS, RECEBEMOS UMA CÓPIA DA MENSAGEM;	
	*/
	function visualiza_script_malicioso($campo){
		// TRANSFORMAMOS O VALOR DO CAMPO EM HTML, PARA SABERMOS QUAL FOI O CÓDIGO QUE ELE TENTOU EXECUTAR;
		$campo = htmlentities($campo);
		
		// RETORNA O VALOR DO CAMPO COM OS DADOS JÁ TRATADOS;
		return $campo;
	}
}
?>
<?php 

class DAO{
	protected $host; // Endereco do banco de dados
	protected $user; // Usuario do BD
	protected $pass; // Senha
	protected $base; // Base de dados
	protected $conexao; // Conecta com os dados das variaveis anteriores
	protected $data_base_selected;
	public $result;

	// Constroi as variaveis para uso da classe, e executada toda vez que estanciamos o objeto
	function __construct(){
		$this->host = "127.0.0.1";
		$this->user = "root";
		$this->pass = "";
		$this->base = "shangrila";
	}
	
	//conecta no banco de daddos e seleciona a base que iremos trabalhar
	function connect_bd(){
		$this->conexao = mysql_connect($this->host,$this->user,$this->pass) or die(mysql_error());
		//seleciona a base
		mysql_select_db($this->base, $this->conexao);	
	}
	//  executa o comando sql no banco e nos retorna ok ou falho
	function query($sql){
		$this->connect_bd();
		$this->result = mysql_query($sql, $this->conexao) ;
		if ($this->result){
				return true;
			}
		else{
			return false;
			}
	}

		//  fecha a conexao que estiver aberta no momento em que for executada
	function connect_close(){
		mysql_close($this->conexao);	
	}
		//  monta um array quando executamos uma consulta onde retorna varias linhas (resultados)
	function fetchArray(){
		return mysql_fetch_array($this->result);
	}
	// Obtém o numero de linhas de um conjunto de resultados. Este comando é valido apenas para comandos como SELECT ou SHOW que atualmente retornam um conjunto de resultados. Para obter o numero de linhas afetadas por uma consulta INSERT, UPDATE, REPLACE ou DELETE
	function numRows(){
		return mysql_num_rows($this->result);
	}
	function select_bd(){
		$this->connect_bd();
		$this->data_base_selected = mysql_select_db($this->base, $this->conexao) or die('Não foi possível encontrar a base de dados!'."<br />".mysql_error());	
	}

	function show_depoimento($sql = null){
		if($sql == null){
			$sql = "SELECT dep_id,dep_nome,dep_cidade,dep_comentarios FROM depoimentos WHERE dep_aprovado =1 ORDER BY dep_id DESC"; 
		}
		$this->select_bd();
		$this->query($sql);
		$dados = array();
		$i = 0;
		while($linha = mysql_fetch_array($this->result)){
			$dados[$i] = $linha;
			$i++;
		}
		return $dados;
	}
}
?>
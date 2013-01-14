<?php require("validasessao.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administra&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css">
body, td, th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
</style>
</head>
<body>
<div id="FormContato">
<?php

$conexao = mysql_connect('127.0.0.1','root','') or die("Não foi possível realizar a conexão"); 

if ( !($selecao = mysql_select_db("shangrila", $conexao)) ){
	echo "No foi possvel selecionar o Banco de Dados";
	exit;
}

$acao = $_GET[acao];

if ($acao=="logar"){
	
	$usuario = $_POST[Usuario];
	$senha = $_POST[Senha];
	

	$sql = "SELECT AdminUsuario, AdminSenha FROM depoimentos_admin where AdminUsuario = '$usuario' and AdminSenha = '$senha'" ;
	$resultado = mysql_query($sql);
	if($linha=mysql_fetch_array($resultado)){
		$_SESSION["logado"] = "ok";
		$usuario = "";
		$senha = "";
	}else{
		$msg = "<font color='ff0000'>Nome de Usurio ou Senha incorretos!</font>";
	}
}


if ($acao=="deslogar"){
	$_SESSION["logado"] = "";
	echo "<script>location.href = \"http://www.portaldosolhotelfazenda.com.br\"</script>";
}
 
if ($_SESSION["logado"] == "ok") {

	if ($resposta != 1) {


		if ($acao=="deslogar"){
			$_SESSION["logado"] = "";
		}


		$tamanho_pagina = 50; 


		$pagina = $_GET["pagina"]; 


		if (!$pagina) { 
		   $inicio = 0; 
		   $pagina=1; 
		} else {
		   $inicio = ($pagina - 1) * $tamanho_pagina; 
		} 

	
		if ($acao=="EditarI") {


			$sql = "SELECT dep_id,dep_nome FROM depoimentos ORDER BY dep_id ASC";
			$resultado = mysql_query($sql);
			if ( !$linha = mysql_fetch_array($resultado ) ){
				echo "<br>Nenhum registro encontrado!<br>";
				end;
			}else{

				$num_total_registros = mysql_num_rows($resultado); 

				$total_paginas = ceil($num_total_registros / $tamanho_pagina); 

				$ssql = "SELECT dep_id,dep_nome,dep_email,dep_cidade,dep_aprovado FROM depoimentos ORDER BY dep_id DESC limit  $inicio , $tamanho_pagina"; 
				$rs = mysql_query($ssql); 

				echo "<form action=\"admin.php?acao=deletar\" method=\"POST\" name=\"dmsg\"><table width=\"790\"><tr bgcolor=\"FFCC00\"><td width='70'><b>Deletar:</b></td><td width='120'><b>Nome:</b></td><td width='180'><b>E-mail:</b></td><td width='120'><b>Cidade:</b></td><td width='150'><b>Status:</b></td><td></td></tr>";

				$cor = "ffffff";
				while ( $linhas = mysql_fetch_array($rs)){

					print "<tr bgcolor=\"$cor\"><td><input type=checkbox name=\"$linhas[0]\" value=\"sim\"></td><td> $linhas[1] </td><td> $linhas[2] </td><td> $linhas[3] </td><td> $linhas[4] </td><td><a href=\"admin.php?acao=EditarII&ID=$linhas[0]\">Editar</a></td></tr>";
					if ($cor == "ffffff"){
						$cor = "";
					}else{
						$cor = "ffffff";
					}	
				} 
				echo "</table><br><input type=submit value=\"Deletar cadastros selecionados\"></form>";

				mysql_free_result($rs); 

				echo "<div align=\"center\"><h5><br><b> $num_total_registros </b> registros encontrados, mostrando<b> $tamanho_pagina </b>registros por página<br>Página<b> $pagina </b>de<b> $total_paginas </b></div></h5>"; 


				echo "<div align=\"center\">";
				if ($total_paginas > 1){ 
				    for ($i=1;$i<=$total_paginas;$i++){ 
						if ($pagina == $i){ 

							echo $pagina . " "; 
						}else{ 
	
							echo "<a href='admin.php?acao=EditarI&pagina=" . $i . "&criterio=" . $txt_criterio . "'>" . $i . "</a> "; 
						}
					}
					echo "</div>";
				}
			}

		}

		if ($acao=="EditarII") {

			$sql2 = "SELECT dep_id, dep_nome, dep_email, dep_cidade, dep_comentarios,dep_aprovado FROM depoimentos WHERE dep_id = '" .$_GET["ID"]. "';";
			$resultado = mysql_query($sql2);
			$linhas = mysql_fetch_array($resultado)
		
?>
  <form action="admin.php?acao=EditarIII" method="post">
    <fieldset>
    <legend>Edi&ccedil;&atilde;o de cadastro</legend>
    <table width="40%">
      <tr>
        <td width="70">Nome</td>
        <td><input name="nome" type="text" id="nome" value="<? echo $linhas[1] ?>" size="30" maxlength="45" /></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input name="Email" type="text" id="Email" value="<? echo $linhas[2] ?>" size="30" maxlength="45" /></td>
      </tr>
      <tr>
        <td>Cidade</td>
        <td><input name="Cidade" type="text" id="Cidade" value="<? echo $linhas[3] ?>" size="30" maxlength="45" /></td>
      </tr>
      <tr>
        <td>Comentarios</td>
        <td><textarea name="Comentarios" cols="80" rows="10" id="Comentarios"><? echo $linhas[4] ?></textarea></td>
      </tr>
      <tr>
        <td height="50" colspan="2"><b>Selecione:</b><br />
          <b>- 0 para n&atilde;o visualizar <br />
          - 1 para visualizar </b><br />
          <select name="aprovado" id="aprovado">
            <option selected="selected" value="0">0</option>
            <option value="1">1</option>
          </select>
          <br />
          <div align="center">
            <label>
            <input type="hidden" name="id" value="<? echo $linhas["0"] ?>" />
            <input type="submit" name="Submit" value="Editar" onclick="return submit_editar()" />
            </label>
          </div></td>
      </tr>
    </table>
    </fieldset>
  </form>
  <?php	
		} 


		if ($acao=="EditarIII") {

			$id= $_POST['id'];
			$nome= $_POST['nome'];
			$email= $_POST['Email'];
			$cidade= $_POST['Cidade'];
			$comentarios= $_POST['Comentarios'];
			$aprovado = $_POST['aprovado'];


			$atualiza = "UPDATE `portaldosolhot`.`depoimentos` SET `dep_nome` = '$nome', `dep_email` = '$email', `dep_cidade` = '$cidade', `dep_comentarios` = '$comentarios', `dep_aprovado` = '$aprovado' WHERE `depoimentos`.`dep_id` = '$id' LIMIT 1 ;";

			mysql_query($atualiza);
			if (!$atualiza){
				echo "Não foi possivel editar os dados";
			} else {
				echo "<font color='ff0000'>Os dados foram editados com sucesso...<br><br></font>";
			}
		}


		if ($acao=="deletar") {

			$sql = "SELECT dep_id FROM depoimentos ORDER BY dep_id ASC";
			$resultado = mysql_query($sql);
			$cont = 0;
			while ( $linhas = mysql_fetch_array($resultado)){
				if ($_POST[$linhas[0]]=="sim"){
				$deleta = "DELETE FROM depoimentos WHERE dep_id='" .$linhas[0]. "'" ;
				$deletando = mysql_query($deleta);
				$cont = $cont + 1;
				}
			}
			echo "Foram deletados <b>$cont</b> cadastros.";	

		}



		echo "<p align=center><a href='admin.php?acao=EditarI'>Editar Depoimento</a> || <a href='admin.php?acao=inicial'>Home da Admin</a>|| <a href='admin.php?acao=deslogar'>Sair</a><br><br><br></p>";


		mysql_close($conexao);  
	}else{
		echo "Sua sessão expirou devido a um longo período de inatividade!";
	}


}else{
	echo "Você não tem permissão para acessa esta página!<br>Favor logar-se informando os dados abaixo.<br>";
	echo $msg;
	$msg = "";
?>
  <form action="admin.php?acao=logar" method="post" id="logar">
    <fieldset>
    <legend>Informa&ccedil;&otilde;es para logon </legend>
    <table width="40%">
      <tr>
        <td width="70">Nome</td>
        <td><input name="Usuario" type="text" id="Usuario" value="" size="30" maxlength="45" /></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input name="Senha" type="password" id="Senha" value="" size="30" maxlength="45" /></td>
      </tr>
      <tr>
        <td height="50" colspan="2"><div align="center">
            <label>
            <input type="submit" name="Submit" value="Logon" />
            </label>
          </div></td>
      </tr>
    </table>
    </fieldset>
  </form>
  <?php
}    
?>
</div>
</body>
</html>

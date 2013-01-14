<?php 

$temposessao = 300;
session_start(); 

if ($_SESSION["sessiontime"]) { 

    if ($_SESSION["sessiontime"] < (time() - $temposessao)) { 
        
        session_unset();
		$resposta = 1; 
    } 
} else { 

    session_unset(); 
} 

$_SESSION["sessiontime"] = time();

?> 

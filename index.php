<?php
	// Abre a Sessão
	session_start();
	
	// INCLUDE DO ARQUIVO DE URL AMIGÁVEL;
	include 'model/url-amigavel.php';
	
	// INICIA O CONTADOR TABINDEX
	$contaTabIndex = 1;
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="pt-br"><head>
<base href="" />
<meta name="google-site-verification" content="S_TGoeU8pk6gOT8fohFFp6W2V1C_x_vdjk1majdwwYM" />
<!--======================================= META TAGS =========================================================-->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<?php include 'model/meta.php'; ?>
<meta name="Robots" content="index,follow" />
<meta name="author" content="Agência WebSocorro" />
<meta name="viewport" content="width=device-width">
<link rel="canonical" href=""/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<!--==============================  CSS BOILERPLATE  =========================================================-->
<link rel="stylesheet" type="text/css" href="estilos/normalize.css"  media="all"/>
<link rel="stylesheet" type="text/css" href="estilos/main.css"  media="all"/>
<!--================================ CSS GERAIS ===============================================================-->
<link rel="stylesheet" type="text/css" href="estilos/padrao.css" id="design" media="all"/>
<link rel="stylesheet" type="text/css" href="estilos/fontNormal.css" id="font" media="all"/>
<link rel="stylesheet" type="text/css" href="estilos/fontFamily.css" media="all" />
<!--===========================================================================================================-->
<!--================================ BIBLIOTECA JQUERY ========================================================-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="jscript/vendor/jquery-1.8.3.min.js"><\/script>')</script>
<script src="jscript/plugins.js"></script>
<!--===========================================================================================================-->
<!--================================ BIBLIOTECA MODERNIZR =====================================================-->
<script src="jscript/vendor/modernizr-2.6.2.min.js"></script>
<!--===========================================================================================================-->
</head>
<body>
    <!--================================ GOOGLE ANALYTICS =====================================================-->
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    <!--======================== ATUALIZE SEU NAVEGADOR =================-->
	<?php
        include 'model/atualize-seu-navegador.php';
    ?>
         
	<noscript>Seu navegador não suporta JavaScript!</noscript>
    <!--======================== MENU ACESSIVEL =========================-->
    <?php include 'includes/estrutura/menu-acessivel.php';?>
    <div id="centraliza">
    	<header>
        	<?php include 'includes/estrutura/header.php'; ?>
        </header>
        <section id="content-left">
        	<?php include 'includes/estrutura/content-left.php'; ?>
        </section>
        <section id="content-center">
            <?php include 'model/breadcrumb.php';?>
            <?php// include 'model/regra-carregamento.php'; ?>
            <div id="voltar-ao-topo">
                <img src="imagens/estrutura/seta-voltar-ao-topo.gif" alt="Seta ilustrativa para voltar ao topo">
                <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>#top" class="voltaTopo" title="Clique para voltar ao topo da página"tabindex="<?php echo $contaTabIndex ++; ?>">Voltar ao Topo</a>
            </div>
        </section>
        <br class="clear">
        <footer>
        	<?php include 'includes/estrutura/footer.php'; ?>
        </footer>
    </div>

<!--================================= SCRIPT PARA O FACEBOOK ===================================-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

    <!--================================= FONTE NORMAL, MAIOR, MENOR - SETSTYLE ===================================-->
    <script src="jscript/acessibilidade/click-keypress.js"></script>
    <!--================================= FONTE NORMAL, MAIOR, MENOR ==============================================-->
    <script src="jscript/acessibilidade/tamanho-contraste.js"></script>
    <!--================================= ACCESSKEY ===============================================================-->
    <script src="jscript/acessibilidade/accesskey.js"></script>    
    <!--======================================= ANCORA COM ANIMAÇÃO ===============================================-->
    <script src="jscript/saltos.js"></script>
</body>
</html>
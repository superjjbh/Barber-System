<?php
session_start();
require_once '../loader.php';
$site = new Site();
$site->getMeta();

$contatos = new Contato();
$contatos->getContato();

$curso_id = intval($_GET['id']);
$curso = new Curso();
$curso->curso_id = "$curso_id";
$curso->getCurso();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="images/apple-touch-startup-image-640x1096.png">
<meta name="author" content="SINDEVO.COM" />
<meta name="description" content="<?= $site->site_meta_titulo ?>" />
<meta name="keywords" content="mobile css template, mobile html template, jquery mobile template, mobile app template, html5 mobile design, mobile design" />
<title><?= $site->site_meta_titulo ?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<script type="text/javascript">
</script>
<script>
function enviardados(){
	
if(document.dados.inscricao_nome.value=="" || document.dados.inscricao_nome.value.length < 3)
{
alert( "Preencha o campo SEU NOME corretamente!" );
document.dados.inscricao_nome.focus();
return false;
}
  
  
if( document.dados.inscricao_email.value=="" || document.dados.inscricao_email.value.indexOf('@')==-1 || document.dados.inscricao_email.value.indexOf('.')==-1 )
{
alert( "Preencha o campo SEU E-MAIL corretamente!" );
document.dados.inscricao_email.focus();
return false;
}

if(document.dados.inscricao_telefone.value=="" || document.dados.inscricao_telefone.value.length < 11)
{
alert( "Preencha o campo NÚMERO DO WHATSAPP corretamente! O seu número do WhatsApp deve ter o DDD e o numero, SEM ESPAÇOS, e são 11 números! Exemplo: 31986407398." );
document.dados.inscricao_telefone.focus();
return false;
}
  
	//else if (dataInicial.getTime() == dataFinal.getTime()){
    	//alert("A data de agendamento é hoje");
		//document.dados.inscricao_data.focus();
		//return false;

    //}else{
    	//alert("A data de agendamento maior que hoje");
		//document.dados.inscricao_data.focus();
		//return false;
    //}   
return true;	
}
</script>
		
</head>
<body>

<div data-role="page" id="about" class="secondarypage" data-theme="b">

    <div data-role="header" data-position="fixed">
        <div class="nav_left_button"><a href="#" class="nav-toggle"><span></span></a></div>
        <div class="nav_center_logo"><?= $site->site_meta_titulo ?></div>
        <div class="nav_right_button"><a href="#right-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></div>
        <div class="clear"></div>
    </div><!-- /header -->

    <div role="main" class="ui-content">
    
       <div class="pages_maincontent">
              <h2 class="page_title"><?= stripslashes($curso->curso_nome) ?></h2> 
              <div class="page_content"> 
				<div align="center" class="imgBorder" style="min-height: 100px; margin-top:5px">
				<img src="../images/team/<?= $curso->curso_imagem ?>" alt="" class="img-responsive" /> 
				</div>              
					
					<h3>Data do Curso (Período):</h3> <span><?= $curso->curso_data_inicio ?> a <?= $curso->curso_data_fim ?></span>
					<h3>Horarios:</h3> <span><?= $curso->curso_horario ?></span>
					<h3>Valor:</h3> R$ <span><?= $curso->curso_valor ?></span>
					<h3>Professor/Ministrante:</h3> <span><?= $curso->curso_profissional ?></span>
					<h3>Descrição do Curso:</h3> <span><?= $curso->curso_descricao ?></span>
										
					</br>
					<h2 class="page_title">Cadastro On line</h2>
					<h3>Envie seus dados, para garantir a sua participação no curso <?= stripslashes($curso->curso_nome) ?>!</h3>
									<div class="contactform">
									<form class="cmxform" method="post" action="confirmarcurso.php" id="contactfrm" role="form" name="dados" onSubmit="return enviardados();">
                                            <div>
												<label>Seu Nome:</label>
                                                <input type="text" name="inscricao_nome" id="inscricao_nome" required value="<?php echo $_SESSION['nome']?>" style="text-transform:uppercase" placeholder="Informe seu nome" title="Por favor informe seu nome"/>
                                            </div>
                                            <div>
												<label>Seu E-mail:</label>
                                                <input type="email" name="inscricao_email" id="inscricao_email" required value="<?php echo $_SESSION['email']?>" placeholder="Informe seu email" title="Por favor informe um endereço de email válido"/>
                                            </div>											
                                            <div>
                                                <label>Informe o número do WhatsApp</label>
                                                <label>Obs.: Somente os números com DDD</label>
                                                <input type="text" name="inscricao_telefone" id="inscricao_telefone" required value="<?php echo $_SESSION['telefone']?>" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Exemplo: 31986407398" title="Por favor informe o celular"/>
                                            </div>											
											
                                            <div class="result"></div>
											<input type="hidden" name="inscricao_curso" value="<?= stripslashes($curso->curso_nome) ?>">
											<input type="hidden" name="inscricao_data" value="<?= stripslashes($curso->curso_data_inicio) ?>">
											<input type="hidden" name="inscricao_curso_id" value="<?= stripslashes($curso->curso_id) ?>">
											<input type="hidden" name="inscricao_resumo" value="Curso: <?= $curso->curso_nome ?> | Data: <?= $curso->curso_data_inicio ?> a <?= $curso->curso_data_fim ?> | Horario: <?= $curso->curso_horario ?> | Valor: <?= $curso->curso_valor ?> | Professor: <?= $curso->curso_profissional ?>">
											<input type="hidden" name="inscricao_observacao" id="inscricao_observacao" value="PENDENTE">
											<button name="submit" type="submit" class="btn btn-primary" id="submit"> Enviar Cadastro</button>

                                        </form>
										</div>
									</div>
									<div align="center" class="a2a_kit a2a_kit_size_32 a2a_default_style">									
									<h2 align="center">Compartilhar</h2>
									<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
									<a class="a2a_button_facebook"></a>
									<a class="a2a_button_twitter"></a>
									<a class="a2a_button_google_plus"></a>
									<a class="a2a_button_pinterest"></a>
									<a class="a2a_button_linkedin"></a>
									<a class="a2a_button_whatsapp"></a>
									<a class="a2a_button_email"></a>
									<a class="a2a_button_google_gmail"></a>
									</div>
									<script async src="https://static.addtoany.com/menu/page.js"></script>
									
       </div>
	   <hr/>
				<div align="center">
				<p><b><?= $site->site_meta_titulo ?></b></p>
				<address>
				<p>Contato: <?= $site->site_meta_desc ?> <br> E-mail: <?= $site->site_meta_palavra ?></p>
                </address>	
				</div>
	   

    </div><!-- /content -->

    <div data-role="panel" id="left-panel" data-display="reveal" data-position="left">

		<?php require_once './menu_esquerdo.php'; ?>


    </div><!-- /panel -->

    <div data-role="panel" id="right-panel" data-display="reveal" data-position="right">
    
		<?php require_once './menu_direito.php'; ?>
          <div class="close_loginpopup_button"><a href="#" data-rel="close"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
          
    </div><!-- /panel -->
</div><!-- /page -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>

<?php
require_once '../loader.php';
@session_start();
$site = new Site();
$site->getMeta();

$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();

$topo = new Modulo1();
$topo->getModulo1();

$menu = new Modulo2();
$menu->getModulo2();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Modulo7();
$portfolio->getModulo7();

$contato = new Modulo9();
$contato->getModulo9();

$contato = new Contato();
$contato->getContato();

$blog = new Modulo10();
$blog->getModulo10();

$pagina_id = intval($_GET['id']);
$pagina = new Pagina();
$pagina->pagina_id = "$pagina_id";
$pagina->getPagina();

$portfolio_id = intval($_GET['id']);
$categoria_portfolio = new Area1();
$categoria_portfolio->getAreas1();

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
</head>
<body>

<div data-role="page" id="features" class="secondarypage" data-theme="b">

    <div data-role="header" data-position="fixed">
        <div class="nav_left_button"><a href="#" class="nav-toggle"><span></span></a></div>
        <div class="nav_center_logo"><?= $site->site_meta_titulo ?></div>
        <div class="nav_right_button"><a href="#right-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></div>
        <div class="clear"></div>
    </div><!-- /header -->

    <div role="main" class="ui-content">
       <div class="pages_maincontent">
              <h2 class="page_title">depoimentos de clientes</h2> 
              <div class="page_content"> 
    

	  <ul class="features_list_detailed">
                                    <?php $depoimento = new Depoimento(); ?>
                                    <?php $depoimento->getDepoimentos() ?>
                                    <?php if (isset($depoimento->db->data[0])): ?>
                                        <?php foreach ($depoimento->db->data as $d): ?>
										<?php if ($d->depoimento_cargo == "SIM") : ?>
          <li>
          <div class="feat_small_icon"><img src="images/icons/black/message.png" alt="" title="" /></div>		 
          <div class="feat_small_details"> 
          <h4><?= stripslashes($d->depoimento_nome) ?></h4>
          <blockquote><?= stripslashes($d->depoimento_sobre) ?></blockquote>
          </div>
          </li> 
											<?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
          
      </ul>
								<div>
								<h2 class="page_title">Envie seu depoimento</h2> 
                                    </div>
                                    <div>
										<h2>Preencha o formulário abaixo!</h2>
							    <?php
                                    if (isset($_POST['depoimento_nome']) && !empty($_POST['depoimento_nome'])) {
                                       
									  $_SESSION[dv_nome] = $_POST[servico_nome];
										date_default_timezone_set('America/Sao_Paulo');
									  //envio o charset para evitar problemas com acentos
									  header("Content-Type: text/html; charset=UTF-8");
										$data = date('d/m/Y');
										$depoimento_nome = addslashes($_POST['depoimento_nome']);
										$depoimento_cargo = addslashes($_POST['depoimento_cargo']);
										$depoimento_sobre = addslashes($_POST['depoimento_sobre']);

										$depoimento = new Depoimento();
										$depoimento->depoimento_nome = $depoimento_nome;
										$depoimento->depoimento_cargo = $depoimento_cargo;
										$depoimento->depoimento_sobre = $depoimento_sobre;
										$depoimento->incluir();										
										require_once '../plugin/email/email.php';
										global $mail;
										$smtp = new Smtpr();
										$smtp->getSmtp();
										$mail->Port = $smtp->smtp_port;
										$mail->Host = $smtp->smtp_host;
										$mail->Username = $smtp->smtp_username;
										$mail->From = $smtp->smtp_username;
										$mail->Password = $smtp->smtp_password;
										$mail->FromName = $smtp->smtp_fromname;
										$mail->Subject = utf8_decode("Novo Depoimento Enviado - " . $site->site_meta_titulo);
										//$mail->AddBCC($servico->servico_email);
										$mail->AddCC($smtp->smtp_username);
										$mail->AddAddress($smtp->smtp_username);
										//$mail->AddReplyTo($servico_email);
										$body = "<b>Data do envio: </b> $data <br />";
										$body .= "<b>Nome:</b> $depoimento_nome <br />";
										$body .= "<b>Depoimento: </b>$depoimento_sobre <br />";
										$body .= "O depoimento não foi publicado automaticamente! O mesmo deve ser revisado e publicado pelo painel de controle, pelo link *Depoimentos*! <br />";
										$body .= "Atenciosamente, <br /><br />";
										$body .= "$site->site_meta_titulo <br />";
																				
										$mail->Body = nl2br($body);
																			  
										if ($mail->Send()) {
											//echo "<div class='alert alert-success' id='msg_alert'> <h3><font style='color:#009900;font-weight:bold;'><strong>Obrigado !</strong> Sua mensagem foi entregue com sucesso. Vamos verificar e confirmar a disponibilidade de horário e logo retornaremos!</font></h3></div>";
											echo '<script>alert("OBRIGADO! Seu depoimento foi entregue com sucesso. Vamos verificar e em breve poderemos publicá-lo em nosso aplicativo!");</script>';
											echo '<script>location.href="javascript:history.go(-1)";</script>';
                                        } else {
                                            echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                        }
                                    }
                                    $contatos = new Contato();
                                    $contatos->getContato();                                    
                                    ?> 
                                    <form class="cmxform" method="post" id="contactfrm" role="form">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="control-label">Nome</label>
                                                <input type="text" id="depoimento_nome" value="<?php echo $_SESSION['nome']?>" name="depoimento_nome" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label">Depoimento. Máximo 300 caracteres!</label>
                                                <textarea type="text" id="depoimento_sobre" name="depoimento_sobre" required maxlength="300"></textarea>
                                            </div>

                                            <div class="form-footer">
                                                <div class="pull-right">
                                                    <input type="hidden" id="depoimento_cargo"  name="depoimento_cargo" value="NÃO" />
                                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
									</div>
									<div align="center" class="a2a_kit a2a_kit_size_32 a2a_default_style">
									<h2>Compartilhar</h2>
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
									 
	   <hr/>
				<div align="center">
				<p><b><?= $site->site_meta_titulo ?></b></p>
				<address>
				<p>Contato: <?= $site->site_meta_desc ?> <br> E-mail: <?= $site->site_meta_palavra ?></p>
                </address>	
				</div>
      </div>
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
</body>
</html>


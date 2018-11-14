<?php
require_once '../loader.php';
@session_start();
$site = new Site();
$site->getMeta();

$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();

$topo = new Modulo1();
$topo->getModulo1();

$modulo2 = new Modulo2();
$modulo2->getModulo2();


$menu = new Modulo2();
$menu->getModulo2();

$contato = new Modulo9();
$contato->getModulo9();

$contatos = new Contato();
$contatos->getContato();

$sobre = new Modulo3();
$sobre->getModulo3();

$face = new Social();
$face->getSocialFace();

$twitter = new Social();
$twitter->getSocialTwitter();

$insta = new Social();
$insta->getSocialInsta();

$unidade = new Unidade();
$unidade->db = new DB;
$unidade->db->url = "unidade";
$unidade->db->paginate(24);
$unidade->getUnidades();

$portfolio = new Modulo7();
$portfolio->getModulo7();

$blog = new Modulo10();
$blog->getModulo10();

if (isset($_POST['email']) && !empty($_POST['email'])) {
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
    $mail->Subject = utf8_decode("Contato Via App " . $site->site_meta_titulo);
    $mail->AddBCC($smtp->smtp_bcc);
    $mail->AddAddress($smtp->smtp_username);

	date_default_timezone_set('America/Sao_Paulo');
    $data = date('d/m/Y');
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $mail->AddReplyTo($email);
    $body = "<b>Data da Mensagem: </b> $data <br />";
    $body .= "<b>Nome:</b> $nome <br />";
    $body .= "<b>Telefone:</b> $telefone <br />";
    $body .= "<b>E-mail:</b> $email <br />";
    $body .= "<b>Mensagem: </b>$mensagem <br />";
	$body .= "$site->site_meta_titulo <br />";
	$body .= "$site->site_meta_desc<br />";
	$body .= "$site->site_meta_palavra<br /><br />";
    $mail->Body = nl2br($body);
}

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

<div data-role="page" id="contact" class="secondarypage" data-theme="b">

    <div data-role="header" data-position="fixed">
        <div class="nav_left_button"><a href="#" class="nav-toggle"><span></span></a></div>
        <div class="nav_center_logo"><?= $site->site_meta_titulo ?></div>
        <div class="nav_right_button"><a href="#right-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></div>
        <div class="clear"></div>
    </div><!-- /header -->

    <div role="main" class="ui-content">

       <div class="pages_maincontent">
              <h2 class="page_title">fale conosco</h2> 
              <div class="tabs_content"> 

                        <div data-role="tabs" id="tabs">
                          <div data-role="navbar">
                            <ul>
                              <li><a href="#two" class="ui-btn-active">Unidades</a></li>
                              <li><a href="#one">WhatsApp</a></li>
                            </ul>
                          </div>
                          <div id="one">
                                    <h3>Atendimento WhatsApp</h3>
							<h3 align="center">Clique no botão abaixo, para iniciar uma conversa no WhatsApp com <?= $site->site_meta_titulo ?></h3>
						   <p align="center">

							<a href="https://api.whatsapp.com/send?phone=55<?= $site->site_meta_autor ?>&text=Ola,%20Pode%20me%20ajudar?%20Estou%20vindo%20do%20seu%20Aplicativo." target="_blank">
								<img src="images/whatsapp.png" width="200px" alt="" title="" />
							</a></p>
                          </div>
                          
                          <div id="two">
                                    <h3>Nossas Unidades</h3>
									<h4>Expediente: <?= $site->site_analytics ?></h4>
									<?php if (isset($unidade->db->data[0])): ?>
										<?php foreach ($unidade->db->data as $setor): ?>
															<div data-role="collapsible" data-content-theme="false">
																<h4>Unidade: <?= $setor->unidade_nome ?></h4>
																<p>Endereço: <?= $setor->unidade_endereco ?></p>
																<p>Telefone: <?= $setor->unidade_telefone ?></p>
																<p>Celular: <?= $setor->unidade_celular ?></p>
																<p>E-mail: <?= $setor->unidade_email ?></p>																
																  <br>
																  <div style="width: 100%"><iframe width="100%" height="350" src="https://maps.google.com/maps?width=100%&amp;height=350&amp;hl=pt&amp;q=<?= $setor->unidade_endereco ?>+(Unidade: <?= $setor->unidade_nome ?>)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><br />
															</div>
										<?php endforeach; ?>
									<?php endif; ?>
                          </div>
                                                    
                        </div>

              </div>                <div class="page_content"> 
                        <ul class="user_social">
						<?php if (isset($face->db->data[0])): ?>
                        <li><a href="<?= Filter::UrlExternal($face->social_url) ?>" target="_blank"><img src="images/icons/facebook2.png" alt="" title="" /></a></li>						
                        <?php endif; ?>							
						<!--<?php if (isset($twitter->db->data[0])): ?>
                        <li><a href="<?= Filter::UrlExternal($twitter->social_url) ?>" target="_blank"><img src="images/icons/twitter.png" alt="" title="" /></a></li>						
                        <?php endif; ?>-->
						<?php if (isset($insta->db->data[0])): ?>
                        <li><a href="<?= Filter::UrlExternal($insta->social_url) ?>" target="_blank"><img src="images/icons/instagram2.png" alt="" title="" /></a></li>						
                        <?php endif; ?>	
						<?php if (!empty($site->site_meta_autor)) : ?>
						<li><a href="https://api.whatsapp.com/send?phone=55<?= $site->site_meta_autor ?>&text=Ola,%20Pode%20me%20ajudar?%20Estou%20vindo%20do%20seu%20Aplicativo." target="_blank"><img src="images/icons/whatsapp2.png" alt="" title="" /></a></li>	
						<?php endif; ?>
                        </ul> 
                      
                      <div class="contact_info">
                      </div> 
					  <div class="call_button"><a href="tel:<?= $contatos->contato_telefone1 ?>" class="external"><i class="fa fa-phone"></i>LIGUE PRA NÓS!</a></div>
                    <h2 id="Note"></h2>
                            <?php
                            if (isset($_POST['email']) && !empty($_POST['email'])) {
                                if ($mail->Send()) {
								echo '<script>alert("OBRIGADO! Sua mensagem foi entregue com sucesso. Vamos entrar em contato o mais breve possivel!");</script>';
								echo '<script>location.href="javascript:history.go(-1)";</script>';
                                } else {
                                    echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                }
                            }
                            ?> 
                    <div class="contactform">
					<h3>Formulário de Contato</h3>
					<form class="cmxform" method="post" id="contactfrm" role="form">
                    <label>Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['nome']?>" class="form_input required" required data-role="none" />
                    <label>Telefone:</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $_SESSION['telefone']?>" class="form_input required" required data-role="none" />
					<label>E-mail:</label>
                    <input type="text" name="email" id="email" value="<?php echo $_SESSION['email']?>" class="form_input required email" data-role="none" />
                    <label>Mensagem:</label>
                    <textarea name="mensagem" id="mensagem" class="form_textarea textarea required" rows="" required cols="" data-role="none"></textarea>
                    <input type="submit" name="submit" class="form_submit" id="submit" data-role="none" value="Enviar" />
                    <label id="loader" style="display:none;"><img src="images/loader.gif" alt="Loading..." id="LoadingGraphic" /></label>
                    </form>
                    </div>
                                <div align="center">
                                 <img src="../thumb.php?h=110&src=images/<?= $modulo_aparencia->modulo_aparencia_logo ?>" alt="" id="footerLogo" class="img-responsive">
									<p>
								</p>
								<p>
								</p>
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

		<?php require_once 'menu_esquerdo.php'; ?>

    </div><!-- /panel -->

    <div data-role="panel" id="right-panel" data-display="reveal" data-position="right">
    
		<?php require_once 'menu_direito.php'; ?>
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
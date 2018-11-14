<?php
require_once '../loader.php';
@session_start();
$site = new Site();
$site->getMeta();

$contatos = new Contato();
$contatos->getContato();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Portfolio();

$rodape = new Modulo11();
$rodape->getModulo11();
$pagina = new Pagina();

$face = new Social();
$face->getSocialFace();

$twitter = new Social();
$twitter->getSocialTwitter();

$insta = new Social();
$insta->getSocialInsta();

if (empty($_SESSION['email']))
{
$_SESSION['email'] = $_POST['email'];	
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
<meta name="description" content="barber system - sistema ideal para sua barbearia" />
<meta name="keywords" content="mobile css template, mobile html template, jquery mobile template, mobile app template, html5 mobile design, mobile design" />
<title><?= $site->site_meta_titulo ?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<link type="text/css" rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>

<div data-role="page" id="homepage" data-theme="b">
    <div data-role="header" data-position="fixed">
        <div class="nav_left_button"><a href="#" class="nav-toggle"><span></span></a></div>
        <div class="nav_center_logo"><?php if (isset($face->db->data[0])): ?>
                        <a href="<?= Filter::UrlExternal($face->social_url) ?>" target="_blank"><img src="images/icons/facebook.png" alt="" title="" /></a>
                        <?php endif; ?>
						<?php if (isset($insta->db->data[0])): ?>
                        <a href="<?= Filter::UrlExternal($insta->social_url) ?>" target="_blank"><img src="images/icons/instagram.png" alt="" title="" /></a>
                        <?php endif; ?>
						<?php if (!empty($site->site_meta_autor)) : ?>
						<a href="https://api.whatsapp.com/send?phone=55<?= $site->site_meta_autor ?>&text=Ola,%20Pode%20me%20ajudar?%20Estou%20vindo%20do%20seu%20Aplicativo." target="_blank"><img src="images/icons/whatsapp.png" alt="" title="" /></a>
						<?php endif; ?>
						</div>
        <div class="nav_right_button"><a href="#right-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></div>
        <div class="clear"></div>
    </div><!-- /header -->


    <div role="main" class="ui-content">

        <div class="logo_container">
            <div class="logo">
			<?php if (!empty($_SESSION['email']) || !empty($_SESSION['nome'])) : ?>
			<?php echo "<h3>Seja bem-vindo(a) novamente ".$_SESSION['nome']."</h3>"; ?>
			<?php endif; ?>
            <img src="images/logo.png" alt="barber" title="barber" />
            <h2>System</h2>
            <span>3.0 </span>
			<span> </span>
            </div>
			<?php if (empty($_SESSION['email'])) : ?>
            <form id="LoginForm" role="form" method="post" >
            <h2>Por favor, informe o seu e-mail:</h2>
			<input type="text" name='email' style="text-align: center;" value="<?php echo $_SESSION['email']?>" required  placeholder="Seu e-mail">
				<span class="input-group-btn">												
					<button type="submit" class="btn btn-primary">Começar</button>						
				</span>
            </form>
			<?php endif; ?>
			<?php if (!empty($_SESSION['email'])) : ?>
					<a href="servicos.php"><button class="btn btn-warning"><img src="images/icons/white/servico.png" width="20" height="20" alt="" title="" /> Serviços</button></a>
					<a href="agenda.php"><button class="btn btn-success"><img src="images/icons/white/blog.png" width="20" height="20" alt="" title="" /> Minha Agenda</button></a>
			<?php endif; ?>
        </div>      
        <div> </div>
		<!--<div class="slide_info"><a href="#left-panel" class="external"><button type="button" class="btn btn-primary"><img src="images/icons/white/menu.png" height="32" width="32" alt="" title="" /></button></a></div>-->
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

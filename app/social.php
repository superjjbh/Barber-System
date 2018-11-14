<?php
require_once '../loader.php';

$contatos = new Contato();
$contatos->getContato();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Portfolio();

$rodape = new Modulo11();
$rodape->getModulo11();
$pagina = new Pagina();

$site = new Site();
$site->getMeta();

$face = new Social();
$face->getSocialFace();

$twitter = new Social();
$twitter->getSocialTwitter();

$insta = new Social();
$insta->getSocialInsta();


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
<meta name="description" content="biotic - mobile and tablet web app template" />
<meta name="keywords" content="mobile css template, mobile html template, jquery mobile template, mobile app template, html5 mobile design, mobile design" />
<title><?= $site->site_meta_titulo ?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
</head>
<body>

<div data-role="page" id="social" class="secondarypage" data-theme="b">



    <div role="main" class="ui-content">
    
       <div class="pages_maincontent">
              <h2 class="page_title">Nossa Rede Social</h2> 
              <div class="page_content"> 
                  <p>Nos acompanhe nas redes sociais</p>
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
                  <div class="close_loginpopup_button"><a href="#" data-rel="back"><img src="images/icons/black/menu_close.png" alt="" title="" /></a></div>
              </div>
				<div align="center">
				<p><b><?= $site->site_meta_titulo ?></b></p>
				<address>
				<p>Contato: <?= $site->site_meta_desc ?> <br> E-mail: <?= $site->site_meta_palavra ?></p>
                </address>	
				</div>
    </div>          

    </div><!-- /content -->


</div><!-- /page -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>
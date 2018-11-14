<?php
require_once '../loader.php';
session_start();

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

$contatos = new Contato();
$contatos->getContato();

$blog = new Modulo10();
$blog->getModulo10();

$categoria_servico = new Area();
$categoria_servico->db = new DB;
$categoria_servico->getAreas();


$pagina = new Pagina();
$pagina->getPaginasAtiva();


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
              <h2 class="page_title">nossos serviços</h2> 
              <div class="page_content">
				  <?php if (!empty($_SESSION['email'])) : ?>
					<div align="right"><a href="agenda.php">Meus Horários<img src="images/icons/black/blog.png" width="32" height="32" alt="" title="" /></a></div>
				  <?php endif; ?>
				<section class="widget search clearfix">
					<div class="contactform">
					<form class="form-inline" role="form" method="post" action="servico_busca.php">
						<div class="input-group input-group">
							<select name="busca" required >
							  <option value="">Buscar por Categoria</option>
                                <?php if (isset($categoria_servico->db->data[0])): ?>
                                    <?php foreach ($categoria_servico->db->data as $categoria): ?>
									<option value="<?= stripslashes($categoria->area_nome) ?>"><?= stripslashes($categoria->area_nome) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
							</select>
								<input type="submit" name="submit" class="form_submit" id="submit" data-role="none" value="Buscar" />
						</div>
					</form>
					</div>
				</section>				  
				<ul class="features_list_detailed">
						<?php if (isset($pagina->db->data[0])): ?>									
							<?php foreach ($pagina->db->data as $e): ?>
					  <li>
					  <div class="feat_small_icon"><img src="../images/blog/<?= $e->pagina_imagem ?>" alt="" title="" /></div>		 
					  <div class="feat_small_details"> 
					  <h3><a href="servico.php?id=<?= $e->pagina_id ?>" data-transition="slidefade"><?= stripslashes($e->pagina_nome) ?></a></h3>
					  <span><b>Categoria: <?= stripslashes($e->area_nome) ?></b></span><br>
					  <span><b>Valor: R$ <?= stripslashes($e->pagina_autor) ?></b></span><br>
					  <span><b>Descrição: <?= stripslashes(Validacao::cut($e->pagina_descricao, 30, '...')) ?></b></span>
					  </div>
					  <div class="view_more"><a href="servico.php?id=<?= $e->pagina_id ?>" data-transition="slidefade"><img src="images/mais.png" alt="" title="" /></a></div>
					  </li> 
					<?php endforeach; ?>
				<?php endif; ?>
					  
				  </ul>
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


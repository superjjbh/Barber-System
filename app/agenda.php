<?php
session_start();
require_once '../loader.php';
$site = new Site();
$site->getMeta();

$contato = new Modulo9();
$contato->getModulo9();

$contatos = new Contato();
$contatos->getContato();

$modulo2 = new Modulo2();
$modulo2->getModulo2();

$servico = new Servico();
$servico->db = new DB;
$servico->db->url = "servico";
$servico->db->paginate(1000);
$servico->getServicos();

$unidade = new Unidade();
$unidade->db = new DB;
$unidade->db->url = "unidade";
$unidade->db->paginate(24);
$unidade->getUnidades();

	if($_POST['servico_status'] == 1)
	{
		$servico_status = 'Confirmado';
	}
	else if($_POST['servico_status'] == 2)
	{
		$servico_status = 'Atendido e Finalizado';
	}
	else
	{
		$servico_status = 'Não Confirmado';
	}
if (empty($_SESSION['email']))
{
$_SESSION['email'] = $_POST['email'];	
}

?>
	
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
<style>       
      #map {
        height: 350px;  
        width: 100%;  
       }
	  #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }
      #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }</style>
</head>
<body>

<div data-role="page" id="tabs" class="secondarypage" data-theme="b">

    <div data-role="header" data-position="fixed">
        <div class="nav_left_button"><a href="#" class="nav-toggle"><span></span></a></div>
        <div class="nav_center_logo"><?= $site->site_meta_titulo ?></div>
        <div class="nav_right_button"><a href="#right-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></div>
        <div class="clear"></div>
    </div><!-- /header -->

    <div role="main" class="ui-content">

       <div class="pages_maincontent">              
              <h2 class="page_title">meus agendamentos</h2> 
              <div class="page_content"> 
				<?php if (!empty($_SESSION['email'])) : ?>
				<?php echo "<div><h3>Olá ".$_SESSION['nome']."!</h3></div>"; ?>
				<?php endif; ?>
				<?php if (empty($_SESSION['email'])) : ?>
				<form class="form-inline" id="busca" name="busca" role="form" method="post">
					<div class="input-group input-group">
						Informe o seu e-mail:<br>
						<input type="text" name="email" value="<?php echo $_SESSION['email']?>" required class="form-control" placeholder="Buscar pelo E-mail…">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>						
						</span>
					</div>
				</form>
				<?php endif; ?>
				<hr><br>
	<?php if (isset($_SESSION['email'])) : ?>
		<?php $servico->getAgenda(); ?>
            <?php if (isset($servico->db->data[0])): ?>
                <?php foreach ($servico->db->data as $service): ?>
                        <div data-role="collapsible" data-content-theme="false">
                            <h4>Data: <?= stripslashes($service->servico_data) ?> | Horário: <?= stripslashes($service->servico_horario) ?> <br> 
										<?php if (stripslashes($service->servico_status) == 1): ?>
										Status Atual: <font style="color:#f9ef18;font-weight:bold;">CONFIRMADO!</font>
										<?php endif; ?>
										<?php if (stripslashes($service->servico_status) == 2): ?>
										Status Atual: <font style="color:#009900;font-weight:bold;">ATENDIDO!</font>
										<?php endif; ?>
										<?php if (stripslashes($service->servico_status) == 0): ?>
										Status Atual: <font style="color:#f2195b;font-weight:bold;">NÃO CONFIRMADO!</font>
										<?php endif; ?>
							
							</h4>
										<?php $_SESSION['nome'] = $service->servico_nome;?>
										<?php $_SESSION['email'] = $service->servico_email;?>
										<?php $_SESSION["telefone"] = $service->servico_icon;?>
										<b>Nome:</b> <?= stripslashes($service->servico_nome) ?></br>
										<b>Contato:</b> <?= stripslashes($service->servico_icon) ?></br>
										<b>E-mail:</b> <?= stripslashes($service->servico_email) ?></br>
										<hr>
										<b>Unidade:</b> <?= stripslashes($service->servico_unidade) ?></br>
										<b>Serviço Solicitado:</b> <?= stripslashes($service->servico_descricao) ?></br>
										<b>Serviços Adicionais:</b> <?= stripslashes($service->servico_adicional) ?> | <?= stripslashes($service->servico_adicional2) ?> | <?= stripslashes($service->servico_adicional3) ?> | <?= stripslashes($service->servico_adicional4) ?></br>
										<b>Promoção Escolhida:</b> <?= stripslashes($service->servico_promocao) ?></br>
										<b>Valor total dos Serviço:</b> R$ <?= stripslashes($service->servico_valor_total) ?></br>
										<b>Data Escolhida:</b> <?= stripslashes($service->servico_data) ?></br>
										<b>Horário Escolhido:</b> <?= stripslashes($service->servico_horario) ?></br>
										<b>Profissional Designado: <?= stripslashes($service->servico_profissional) ?></b></br><hr>
										<?php if (stripslashes($service->servico_status) == 1): ?>
										Status Atual do Agendamento: <font style="color:#f9ef18;font-weight:bold;">CONFIRMADO!</font>
										<?php endif; ?>
										<?php if (stripslashes($service->servico_status) == 2): ?>
										Status Atual do Agendamento: <font style="color:#009900;font-weight:bold;">ATENDIDO E FINALIZADO!</font>
										<?php endif; ?>
										<?php if (stripslashes($service->servico_status) == 0): ?>
										Status Atual do Agendamento: <font style="color:#f2195b;font-weight:bold;">NÃO CONFIRMADO!</font>
										<?php endif; ?>
										<h3>Fale conosco pelo WhatsApp</h3>
										<?php if (stripslashes($service->servico_status) == 1): ?>
                                        <a class="btn btn-circle btn-success atualizar" href="https://api.whatsapp.com/send?phone=55<?= $site->site_meta_autor ?>&text=Ola <?= $site->site_meta_titulo ?>, tudo bem? Meu nome é <?= $service->servico_nome ?> e gostaria de conversar sobre o meu agendamento, que está com status *CONFIRMADO*, na data: <?= $service->servico_data ?> e horário: <?= $service->servico_horario ?>. Pode me ajudar? " target="_blank">
                                            <img src="images/whatsapp.png" width="200px" alt="" title="" />
                                        </a>
										<?php endif; ?>
										<?php if (stripslashes($service->servico_status) == 2): ?>
                                        <a class="btn btn-circle btn-success atualizar" href="https://api.whatsapp.com/send?phone=55<?= $site->site_meta_autor ?>&text=Ola <?= $site->site_meta_titulo ?>, tudo bem? Meu nome é <?= $service->servico_nome ?> e gostaria de conversar sobre o meu agendamento, que está com status *ATENDIDO E FINALIZADO*, na data: <?= $service->servico_data ?> e horário: <?= $service->servico_horario ?>. Pode me ajudar?" target="_blank">
                                            <img src="images/whatsapp.png" width="200px" alt="" title="" />
                                        </a>
										<?php endif; ?>
										<?php if (stripslashes($service->servico_status) == 0): ?>
                                        <a class="btn btn-circle btn-success atualizar" href="https://api.whatsapp.com/send?phone=55<?= $site->site_meta_autor ?>&text=Ola <?= $site->site_meta_titulo ?>, tudo bem? Meu nome é <?= $service->servico_nome ?> e gostaria de conversar sobre o meu agendamento, que está com status *NÃO CONFIRMADO*, na data: <?= $service->servico_data ?> e horário: <?= $service->servico_horario ?>. Pode me ajudar?" target="_blank">
                                            <img src="images/whatsapp.png" width="200px" alt="" title="" />
                                        </a>
										<?php endif; ?>                        </div>
                <?php endforeach; ?>
            <?php endif; ?>
	<?php endif; ?>
              </div>  
              <h2 class="page_title">atendimento <?= $site->site_meta_titulo ?></h2>             
              <div class="tabs_content"> 

                        <div data-role="tabs" id="tabs">
                          <div data-role="navbar">
                            <ul>
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

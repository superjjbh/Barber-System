<?php
require_once '../loader.php';
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

$pagina = new Pagina();
$pagina->getBlog();

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

<div data-role="page" id="about" class="secondarypage" data-theme="b">

    <div data-role="header" data-position="fixed">
        <div class="nav_left_button"><a href="#" class="nav-toggle"><span></span></a></div>
        <div class="nav_center_logo"><?= $site->site_meta_titulo ?></div>
        <div class="nav_right_button"><a href="#right-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></div>
        <div class="clear"></div>
    </div><!-- /header -->

    <div role="main" class="ui-content">
    
       <div class="pages_maincontent">
			<div class="page_content">
			</div>
              <h2 class="page_title">Confirmar Agendamento</h2> 
			  <div class="page_content">
			  <?php if (isset($_POST['servico_email']) && !empty($_POST['servico_email'])) : ?>
			  <div><h3>Confira os dados do seu agendamento:</h3></div>
				<b>Nome:</b> <?= stripslashes($_POST['servico_nome']) ?></br>
				<b>Unidade:</b> <?= stripslashes($_POST['servico_unidade']) ?></br>	
				<b>Serviço Solicitado:</b> <?= stripslashes($_POST['servico_descricao']) ?></br>
				<b>Serviços Adicionais: <?= stripslashes($_POST['servico_adicional']) ?> | <?= stripslashes($_POST['servico_adicional2']) ?> | <?= stripslashes($_POST['servico_adicional3']) ?> | <?= stripslashes($_POST['servico_adicional4']) ?> | </br>								
				<b>Promoção escolhida:</b> <?= stripslashes($_POST['servico_promocao']) ?></br>
				<b>Data Escolhida:</b> <?= date("d/m/Y", strtotime($_POST['servico_data'])) ?></br>				
				<b>Horário Escolhido:</b> <?= stripslashes($_POST['servico_horario']) ?></br>
				<b>Profissional Designado: <?= stripslashes($_POST['servico_profissional']) ?></b></br>
				<b>Contato:</b> <?= stripslashes($_POST['servico_icon']) ?></br>
				<b>E-mail:</b> <?= stripslashes($_POST['servico_email']) ?></br>
				</div>
			  <div align="center"><h3>Agendamento Realizado! Clique no botão abaixo para confirmar seu agendamento pelo WhatsApp!</h3></div>
			  <?php endif; ?>
              <div class="page_content"> 
							    <?php
                                    if (isset($_POST['servico_email']) && !empty($_POST['servico_email'])) {
										date_default_timezone_set('America/Sao_Paulo');
									  //envio o charset para evitar problemas com acentos
									  header("Content-Type: text/html; charset=UTF-8");
										$data = date('d/m/Y');
									    $dataservico = date("d/m/Y", strtotime($_POST['servico_data']));
										$servico_nome = addslashes($_POST['servico_nome']);
										$servico_icon = $_POST['servico_icon'];
										$servico_descricao = addslashes($_POST['servico_descricao']);
										$servico_unidade = addslashes($_POST['servico_unidade']);
										$servico_promocao = addslashes($_POST['servico_promocao']);
										$servico_email = $_POST['servico_email'];
										$servico_pagina = $_POST['servico_id_pagina'];
										$servico_horario = $_POST['servico_horario'];
										$servico_data = date("d/m/Y", strtotime($_POST['servico_data']));
										$servico_status = $_POST['servico_status'];
										$servico_profissional = $_POST['servico_profissional'];
										$servico_adicional = $_POST['servico_adicional'];
										$servico_adicional2 = $_POST['servico_adicional2'];
										$servico_adicional3 = $_POST['servico_adicional3'];
										$servico_adicional4 = $_POST['servico_adicional4'];
										$mensagem = $_POST['mensagem'];
										
									
										global $servico_nome, $servico_email;
										
										$erro=0;
										
										if (empty($servico_nome)){
										   $erro=1;
												  echo '<script>alert("O campo *Seu Nome* é Obrigatório!");</script>';
												  echo "<script>location.href='promocao.php?id=$servico_pagina';</script>";
												  //echo '<script>location.href="javascript:history.go(-1)";</script>';
										   exit;
										   }
										if(strlen($servico_icon) < 11){
										   $erro=1;
												  echo '<script>alert("O seu *número do WhatsApp* deve ter o DDD e o numero, SEM ESPAÇOS, que são 11 números! Exemplo: 31986407398.");</script>';
												  echo "<script>location.href='promocao.php?id=$servico_pagina';</script>";
												  //echo '<script>location.href="javascript:history.go(-1)";</script>';
										   exit;
										   }
																				   
										$servico = new Servico();
										$servico->db = new DB;
										$servico->servico_nome = $servico_nome;
										$servico->servico_icon = $servico_icon;
										$servico->servico_descricao = $servico_descricao;
										$servico->servico_promocao = $servico_promocao;
										$servico->servico_unidade = $servico_unidade;
										$servico->servico_email = $servico_email;
										$servico->servico_horario = $servico_horario;
										$servico->servico_data = $servico_data;
										$servico->servico_status = $servico_status;
										$servico->servico_profissional = $servico_profissional;
										$servico->servico_adicional = $servico_adicional;
										$servico->servico_adicional2 = $servico_adicional2;
										$servico->servico_adicional3 = $servico_adicional3;
										$servico->servico_adicional4 = $servico_adicional4;
										$servico->gravar();
										
										                                    
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
										$mail->Subject = utf8_decode("Agendamento (Disponibilidade) - " . $site->site_meta_titulo);
										$mail->AddBCC($servico->servico_email);
										$mail->AddCC($smtp->smtp_username);
										$mail->AddAddress($smtp->smtp_username);
										
										$promocao = $_POST['promocao'];


										$mail->AddReplyTo($servico_email);
										$body = "<b>Data do envio: </b> $data <br />";
										$body .= "<b>Nome:</b> $servico_nome <br />";
										$body .= "<b>Celular (WhatsApp):</b> $servico_icon <br />";
										$body .= "<b>E-mail:</b> $servico_email <br />";
										$body .= "<b>Unidade: </b>$servico_unidade <br />";
										$body .= "<b>Serviço: </b>$servico_descricao <br />";
										$body .= "<b>Serviços Adicionais nesse Agendamento: </b>$servico_adicional - $servico_adicional2 - $servico_adicional3 - $servico_adicional4 <br />";
										$body .= "<b>Promoção: </b>$servico_promocao <br />";
										$body .= "<b>Profissional: </b>$servico_profissional <br />";
										$body .= "<b>Data desejada: </b>$servico_data <br />";
										$body .= "<b>Horário desejado: </b>$servico_horario <br />";
										$body .= "<b>Mensagem: </b>$mensagem <br />";
										$body .= "Nós agradecemos o seu contato! Vamos verificar a disponibilidade e logo retornaremos, confirmando ou reagendando o seu horário.<br />";
										$body .= "Atenciosamente, <br /><br />";
										$body .= "$site->site_meta_titulo <br />";
										$body .= "$site->site_meta_desc<br />";
										$body .= "$site->site_meta_palavra<br /><br />";
																				
										$mail->Body = nl2br($body);
										
									  $mysqli = new mysqli('localhost', 'u421847002_srbla', '090979', 'u421847002_srbla');
									  $horario = filter_input(INPUT_POST, 'servico_horario');
									  $servico = filter_input(INPUT_POST, 'servico_descricao');
									  $status = 1;
									  $sql = "SELECT * FROM `servico` WHERE `servico_data` = '{$dataservico}' AND `servico_horario` = '{$horario}' AND `servico_descricao` = '{$servico}' AND `servico_status` = '{$status}'"; //monto a query
									  $query = $mysqli->query( $sql ); //executo a query
									  
										
										if ($mail->Send()) {
												  if( $query->num_rows > 0 ) {//se retornar algum resultado
												echo '<script>alert("ATENÇÃO! Já existe uma confirmação de agendamento nessa data e horário! Mesmo assim, vamos verificar a disponibilidade! Confirme seu agendamento pelo WhatsApp na próxima tela!");</script>';
												//echo "<script>location.href='confirmaragenda.php';</script>";
												//echo "<script>location.href='https://api.whatsapp.com/send?phone=55$site->site_meta_autor&text=Ola, me chamo $servico_nome, tudo bem? Acabei de enviar um agendamento e gostaria de verificar a disponibilidade conforme enviado: Status agendamento: NÃO CONFIRMADO | Meu Nome: $servico_nome | Meu Celular: $servico_icon | Serviço solicitado: $servico_descricao | Data: $servico_data | Horário: $servico_horario | Observação: $mensagem. Teria disponibilidade?';</script>";
												//echo '<div align="center"> <a href="javascript:history.go(-1)"><button>VOLTAR</button></a></b></br></div>';
												//echo '<script>location.href="javascript:history.go(0)";</script>';
												//echo '<script>alert("Desculpe! Mas já existe uma confirmação de agendamento nessa data e horário! Escolha outro horário ou data para verificarmos a disponibilidade!");</script>';
												//echo '<script>location.href="javascript:history.go(0)";</script>';
												//return false;
												}											
											//echo "<div class='alert alert-success' id='msg_alert'> <h3><font style='color:#009900;font-weight:bold;'><strong>Obrigado !</strong> Sua mensagem foi entregue com sucesso. Vamos verificar e confirmar a disponibilidade de horário e logo retornaremos!</font></h3></div>";
											echo '<script>alert("Seu agendamento foi entregue com sucesso. Vamos verificar a disponibilidade! Confirme seu agendamento pelo WhatsApp na próxima tela!");</script>';
											//echo '<script>location.href="javascript:history.go(-1)";</script>';
												//echo "<script>location.href='agenda.php';</script>";
											//echo "<script>location.href='https://api.whatsapp.com/send?phone=55$site->site_meta_autor&text=Ola, me chamo $servico_nome, tudo bem? Acabei de enviar um agendamento e gostaria de verificar a disponibilidade conforme enviado: Status agendamento: NÃO CONFIRMADO | Meu Nome: $servico_nome | Meu Celular: $servico_icon | Serviço solicitado: $servico_descricao | Data: $servico_data | Horário: $servico_horario | Observação: $mensagem. Teria disponibilidade?';</script>";
											//echo "<script>location.href='servico.php?id=$servico_pagina';</script>";
                                        } else {
                                            echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                        } 
									}
                                    ?> 
				<?php if (isset($_POST['servico_email']) && !empty($_POST['servico_email'])) : ?>					
				<div align="center">
				<a href="https://api.whatsapp.com/send?phone=55<?= stripslashes($site->site_meta_autor) ?>&text=Ola, me chamo <?= stripslashes($_POST['servico_nome']) ?>, tudo bem? Acabei de enviar um agendamento e gostaria de verificar a disponibilidade. Inclusive escolhi a promoção: <?= stripslashes($_POST['servico_promocao']) ?>conforme enviado: Meu Nome: <?= stripslashes($_POST['servico_nome']) ?> | Meu Celular: <?= stripslashes($_POST['servico_icon']) ?> | Unidade: <?= stripslashes($_POST['servico_unidade']) ?> | Serviço: <?= stripslashes($_POST['servico_descricao']) ?> - <?= stripslashes($_POST['servico_adicional']) ?> - <?= stripslashes($_POST['servico_adicional2']) ?> - <?= stripslashes($_POST['servico_adicional3']) ?> - <?= stripslashes($_POST['servico_adicional4']) ?> | Data: <?= date("d-m-Y", strtotime($_POST['servico_data'])) ?> | Horário: <?= stripslashes($_POST['servico_horario']) ?> | Observação: <?= stripslashes($_POST['mensagem']) ?>. Teria disponibilidade?"><img src="images/whatsapp.png" alt="" title="" /></a>
				<?php endif; ?>
				</div>
				<div align="center">
				<a href="home.php"><img src="images/voltar.png" alt="" title="" /></a>
				</div>
              </div>
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
<!-- /panel -->

</div><!-- /page -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>

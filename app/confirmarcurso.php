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
              <h2 class="page_title">Confirmar Cadastro de Curso</h2> 
			  <div class="page_content">
			  <?php if (isset($_POST['inscricao_email']) && !empty($_POST['inscricao_email'])) : ?>
			  <div><h3>Confira os dados do seu cadastro:</h3></div>
				<b>Nome:</b> <?= stripslashes($_POST['inscricao_nome']) ?></br>
				<b>E-mail:</b> <?= stripslashes($_POST['inscricao_email']) ?></br>
				<b>Contato:</b> <?= stripslashes($_POST['inscricao_telefone']) ?></br>
				
				<b>Curso:</b> <?= stripslashes($_POST['inscricao_curso']) ?></br>	
				<b>Data:</b> <?= stripslashes($_POST['inscricao_data']) ?></br>
				<b>Resumo do período e horários:</b> <?= stripslashes($_POST['inscricao_resumo']) ?></br>
				<b>Status atual:</b> <?= stripslashes($_POST['inscricao_observacao']) ?></br>
				</div>
			  <div align="center"><h3>Cadastro Realizado! Clique no botão abaixo para confirmar sua participação pelo WhatsApp!</h3></div>
			  <?php endif; ?>
              <div class="page_content"> 
							    <?php
                                    if (isset($_POST['inscricao_email']) && !empty($_POST['inscricao_email'])) {
										date_default_timezone_set('America/Sao_Paulo');
									  //envio o charset para evitar problemas com acentos
									  header("Content-Type: text/html; charset=UTF-8");
										$data = date('d/m/Y');
									    $datainscricao = date("d/m/Y", strtotime($_POST['inscricao_data']));
										$inscricao_nome = addslashes($_POST['inscricao_nome']);
										$inscricao_email = $_POST['inscricao_email'];
										$inscricao_telefone = $_POST['inscricao_telefone'];
										
										$inscricao_curso = addslashes($_POST['inscricao_curso']);
										$inscricao_data = addslashes($_POST['inscricao_data']);
										$inscricao_resumo = addslashes($_POST['inscricao_resumo']);
										$inscricao_observacao = addslashes($_POST['inscricao_observacao']);
										$inscricao_curso_id = $_POST['inscricao_curso_id'];

										
									
										global $inscricao_nome, $inscricao_email;
										
										$erro=0;
										
										if (empty($inscricao_nome)){
										   $erro=1;
												  echo '<script>alert("O campo *Seu Nome* é Obrigatório!");</script>';
												  echo "<script>location.href='curso.php?id=$inscricao_curso_id';</script>";
												  //echo '<script>location.href="javascript:history.go(-1)";</script>';
										   exit;
										   }
										if(strlen($inscricao_telefone) < 11){
										   $erro=1;
												  echo '<script>alert("O seu *número do WhatsApp* deve ter o DDD e o numero, SEM ESPAÇOS, que são 11 números! Exemplo: 31986407398.");</script>';
												  echo "<script>location.href='curso.php?id=$inscricao_curso_id';</script>";
												  //echo '<script>location.href="javascript:history.go(-1)";</script>';
										   exit;
										   }
																				   
										$inscricao = new Inscricao();
										$inscricao->db = new DB;
										$inscricao->inscricao_nome = $inscricao_nome;
										$inscricao->inscricao_email = $inscricao_email;
										$inscricao->inscricao_telefone = $inscricao_telefone;
										$inscricao->inscricao_curso = $inscricao_curso;
										$inscricao->inscricao_data = $inscricao_data;
										$inscricao->inscricao_resumo = $inscricao_resumo;
										$inscricao->inscricao_observacao = $inscricao_observacao;
										$inscricao->incluir();
										
										                                    
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
										$mail->Subject = utf8_decode("Cadastro de Cursos - " . $site->site_meta_titulo);
										$mail->AddBCC($servico->inscricao_email);
										$mail->AddCC($smtp->smtp_username);
										$mail->AddAddress($smtp->smtp_username);
										

										$mail->AddReplyTo($inscricao_email);
										$body = "<b>Data do envio: </b> $data <br />";
										$body .= "<b>Nome:</b> $inscricao_nome <br />";
										$body .= "<b>Celular (WhatsApp):</b> $inscricao_telefone <br />";
										$body .= "<b>E-mail:</b> $inscricao_email <br />";
										$body .= "<b>Curso Escolhido: </b>$inscricao_curso <br />";
										$body .= "<b>Data: </b>$inscricao_data <br />";
										$body .= "<b>Resumo Data e Horários: </b>$inscricao_resumo <br />";
										$body .= "<b>Status Atual: </b>$inscricao_observacao <br />";
										$body .= "Nós agradecemos o seu contato! Logo retornaremos, confirmando sua participação e todos os detalhes para o pagamento.<br />";
										$body .= "Atenciosamente, <br /><br />";
										$body .= "$site->site_meta_titulo <br />";
										$body .= "$site->site_meta_desc<br />";
										$body .= "$site->site_meta_palavra<br /><br />";
																				
										$mail->Body = nl2br($body);
										
									  $mysqli = new mysqli('localhost', 'root', '', 'srblack');
									  $horario = filter_input(INPUT_POST, 'servico_horario');
									  $servico = filter_input(INPUT_POST, 'servico_descricao');
									  $status = 1;
									  $sql = "SELECT * FROM `servico` WHERE `servico_data` = '{$dataservico}' AND `servico_horario` = '{$horario}' AND `servico_descricao` = '{$servico}' AND `servico_status` = '{$status}'"; //monto a query
									  $query = $mysqli->query( $sql ); //executo a query
									  
										
										if ($mail->Send()) {
												  if( $query->num_rows > 0 ) {//se retornar algum resultado
												echo '<script>alert("Seu cadastro foi entregue com sucesso. Em breve retornaremos com mais detalhes! Confirme seu cadastro pelo WhatsApp na próxima tela!");</script>';
												//echo "<script>location.href='confirmaragenda.php';</script>";
												//echo "<script>location.href='https://api.whatsapp.com/send?phone=55$site->site_meta_autor&text=Ola, me chamo $inscricao_nome, tudo bem? Acabei de enviar um agendamento e gostaria de verificar a disponibilidade conforme enviado: Status agendamento: NÃO CONFIRMADO | Meu Nome: $inscricao_nome | Meu Celular: $inscricao_telefone | Serviço solicitado: $servico_descricao | Data: $servico_data | Horário: $servico_horario | Observação: $mensagem. Teria disponibilidade?';</script>";
												//echo '<div align="center"> <a href="javascript:history.go(-1)"><button>VOLTAR</button></a></b></br></div>';
												//echo '<script>location.href="javascript:history.go(0)";</script>';
												//echo '<script>alert("Desculpe! Mas já existe uma confirmação de agendamento nessa data e horário! Escolha outro horário ou data para verificarmos a disponibilidade!");</script>';
												//echo '<script>location.href="javascript:history.go(0)";</script>';
												//return false;
												}											
											//echo "<div class='alert alert-success' id='msg_alert'> <h3><font style='color:#009900;font-weight:bold;'><strong>Obrigado !</strong> Sua mensagem foi entregue com sucesso. Vamos verificar e confirmar a disponibilidade de horário e logo retornaremos!</font></h3></div>";
											echo '<script>alert("Seu cadastro foi entregue com sucesso. Em breve retornaremos com mais detalhes! Confirme seu cadastro pelo WhatsApp na próxima tela!");</script>';
											//echo '<script>location.href="javascript:history.go(-1)";</script>';
												//echo "<script>location.href='agenda.php';</script>";
											//echo "<script>location.href='https://api.whatsapp.com/send?phone=55$site->site_meta_autor&text=Ola, me chamo $inscricao_nome, tudo bem? Acabei de enviar um agendamento e gostaria de verificar a disponibilidade conforme enviado: Status agendamento: NÃO CONFIRMADO | Meu Nome: $inscricao_nome | Meu Celular: $inscricao_telefone | Serviço solicitado: $servico_descricao | Data: $servico_data | Horário: $servico_horario | Observação: $mensagem. Teria disponibilidade?';</script>";
											//echo "<script>location.href='servico.php?id=$servico_pagina';</script>";
                                        } else {
                                            echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                        } 
									}
                                    ?> 
				<?php if (isset($_POST['inscricao_email']) && !empty($_POST['inscricao_email'])) : ?>					
				<div align="center">
				<a href="https://api.whatsapp.com/send?phone=55<?= stripslashes($site->site_meta_autor) ?>&text=Ola, me chamo <?= stripslashes($_POST['inscricao_nome']) ?>, tudo bem? Acabei de enviar meu cadastro para o curso: <?= stripslashes($_POST['inscricao_curso']) ?>. Seguem os dados completos: Meu Nome: <?= stripslashes($_POST['inscricao_nome']) ?> | Meu Celular: <?= stripslashes($_POST['inscricao_telefone']) ?> | E-mail: <?= stripslashes($_POST['inscricao_email']) ?> | <?= stripslashes($_POST['inscricao_resumo']) ?> | Status: <?= stripslashes($_POST['inscricao_observacao']) ?>. Teria disponibilidade?"><img src="images/whatsapp.png" alt="" title="" /></a>
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

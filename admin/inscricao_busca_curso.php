<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$inscricao = new Inscricao();
$inscricao->db = new DB;
$inscricao->db->url = "inscricao";
$inscricao->db->paginate(1000);
$inscricao->getInscricoes();

$contatos = new Contato();
$contatos->getContato();                                    

$icon = new Icon();
$icon->db = new DB;
$icon->getIcones();
	if (isset($_POST['inscricao_email']) && !empty($_POST['inscricao_email'])){
	date_default_timezone_set('America/Sao_Paulo');

	$data = date('d/m/Y');
    $inscricao_nome = addslashes($_POST['inscricao_nome']);
    $inscricao_email = $_POST['inscricao_email'];
    $inscricao_celular = addslashes($_POST['inscricao_celular']);
    $inscricao_observacao = addslashes($_POST['inscricao_observacao']);
    $inscricao_curso = addslashes($_POST['inscricao_curso']);
    $inscricao_data = addslashes($_POST['inscricao_data']);
    $inscricao_data_fim = addslashes($_POST['inscricao_data_fim']);
    $inscricao_horario = addslashes($_POST['inscricao_horario']);
    $inscricao_valor = addslashes($_POST['inscricao_valor']);
    $inscricao_observacao = addslashes($_POST['inscricao_observacao']);
																			
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
	$mail->Subject = utf8_decode("Agendamento (Status) - " . $site->site_meta_titulo);
	$mail->AddBCC($inscricao->inscricao_email);
	$mail->AddCC($smtp->smtp_username);
	$mail->AddAddress($smtp->smtp_username);
	
	
	$mail->AddReplyTo($inscricao_email);
	$body = "<b>Data do envio: </b> $data <br />";
	$body .= "<b>Nome:</b> $inscricao_nome <br />";
	$body .= "<b>Celular (WhatsApp):</b> $inscricao_icon <br />";
	$body .= "<b>E-mail:</b> $inscricao_email <br />";
	$body .= "<b>Serviço: </b>$inscricao_descricao <br />";
	$body .= "<b>Data escolhida: </b>$inscricao_data <br />";
	$body .= "<b>Horário escolhido: </b>$inscricao_horario <br />";
	$body .= "O status do seu agendamento foi alterado para: $inscricao_observacao<br />";
	$body .= "Qualquer dúvida, entre em contato conosco! <br /><br />";
	$body .= "Atenciosamente, <br /><br />";
	$body .= "$site->site_meta_titulo <br />";
	$body .= "$contatos->contato_telefone1<br />";
	$body .= "$contatos->contato_endereco<br /><br />";
											
	$mail->Body = nl2br($body);
	}
																	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <?php require_once './base.php'; ?>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?= $site->site_meta_titulo ?></title>
        <!--/ END META SECTION -->

        <!-- START @FAVICONS -->
        <link href="./assets/img/ico/favicon.ico?<?= rand(0, 100) ?>" rel="shortcut icon" sizes="144x144">
        <!--/ END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="./assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/bootstrap-switch.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="./assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="./assets/css/animate.min.css" rel="stylesheet">
        <link href="./assets/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="./assets/css/datatables.responsive.css" rel="stylesheet">
        <link href="./assets/css/fuelux.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="./assets/css/reset.css" rel="stylesheet">
        <link href="./assets/css/layout.css" rel="stylesheet">
        <link href="./assets/css/components.css" rel="stylesheet">
        <link href="./assets/css/plugins.css" rel="stylesheet">
        <link href="./assets/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="./assets/css/custom.css" rel="stylesheet">
        <link href="./assets/css/jquery.rtnotify.css" rel="stylesheet">
        <link href="./assets/css/noty_theme_default.css" rel="stylesheet">
        <link href="./assets/css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="./assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
        <link href="./assets/css/chosen.min.css" rel="stylesheet">
        <!--/ END THEME STYLES -->

        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="./assets/js/html5shiv.min.js"></script>
        <script src="./assets/js/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
    </head>
    <!--/ END HEAD -->
    <body>
        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <section id="wrapper" class="page-sound">
            <?php require_once './navegacao.php'; ?> <!-- /#header -->
            <?php require_once './menu.php'; ?>
            <section id="page-content">
                <div class="header-content">
                    <h2><i class="fa fa-calendar"></i> <span>Inscrições de Cursos</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Inscrições</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel rounded shadow">
                                <div class="panel-heading">
							<div class="pull-left">
                            <p>Legenda do Status:</p>
							<p><img src="./images/erro.png" /> NÃO CONFIRMADO</p>
                            <p><img src="./images/confirmado.png" /> CONFIRMADO</p>
                            <p><img src="./images/inicio.png" /> REALIZADO</p>
								<?php require_once './form_busca_veiculo.php'; ?>
								</br>
								<?php require_once './form_busca_curso.php'; ?>								
								</br>
								<?php require_once './form_busca_periodo.php'; ?>
                            </div>
							<div class="pull-right">
							<h3 class="panel-title"><a class="btn btn-success" href="gerarAnotacao.php"  style="color:#fff"><i class="fa fa-file-excel-o" ></i> Exportar Inscrições para Excel</a></h3>										
                            <h3 class="panel-title"><a href="inscricao/novo/"><button class="btn btn-primary" ><i class="fa fa-plus-circle"></i> Nova Inscrição</button></a></h3>
							</div>
							
                                    <div class="clearfix"></div>
                                </div>
																														<?php
														if (isset($_POST['inscricao_email']) && !empty($_POST['inscricao_email'])) {
															if ($mail->Send()) {
																echo "<p class='alert alert-success' id='msg_alert'> <strong>Sucesso !</strong> Sua notificação foi entregue ao cliente.</p>";
															} else {
																echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
															}
														}
														?> 

<div class="panel-group" id="accordion">
            <?php if (isset($inscricao->db->data[0])): ?>
				<?php if (isset($_POST['busca'])) : ?>

				<?php $servico->getSearch(); ?>

                <?php foreach ($inscricao->db->data as $service): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#<?= stripslashes($service->inscricao_id) ?>">
											
													<?php if (stripslashes($service->inscricao_observacao) == 'CONFIRMADO'): ?>
													<img src="./images/confirmado.png" alt="CONFIRMADO" />  Cliente: <?= stripslashes($service->inscricao_nome) ?> </br> Curso: <?= stripslashes($service->inscricao_curso) ?> | Data do Curso: <?= stripslashes($service->inscricao_data) ?> 
													<?php endif; ?>
													<?php if (stripslashes($service->inscricao_observacao) == 'REALIZADO'): ?>
													<img src="./images/inicio.png" alt="REALIZADO" />  Cliente: <?= stripslashes($service->inscricao_nome) ?> </br> Curso: <?= stripslashes($service->inscricao_curso) ?> | Data do Curso: <?= stripslashes($service->inscricao_data) ?>
													<?php endif; ?>
													<?php if (stripslashes($service->inscricao_observacao) == 'PENDENTE'): ?>
													<img src="./images/erro.png" alt="PENDENTE" />  Cliente: <?= stripslashes($service->inscricao_nome) ?> </br> Curso: <?= stripslashes($service->inscricao_curso) ?> | Data do Curso: <?= stripslashes($service->inscricao_data) ?>
													<?php endif; ?>
										</a>
									</h4>
								</div>
								<div id="<?= stripslashes($service->inscricao_id) ?>" class="panel-collapse collapse" style="height: 0px;">
									<div class="panel-body">
										<b>Nome:</b> <?= stripslashes($service->inscricao_nome) ?></br>
										<b>Celular (WhatsApp):</b> <?= stripslashes($service->inscricao_telefone) ?></br>
										<b>E-mail:</b> <?= stripslashes($service->inscricao_email) ?></br>
										<b>Curso:</b> <?= stripslashes($service->inscricao_curso) ?></br>
										<b>Data do Curso:</b> <?= stripslashes($service->inscricao_data) ?></br>
										<b>Data e Horários Completos do Curso:</b> <?= stripslashes($service->inscricao_resumo) ?></br>
										
										<?php if (stripslashes($service->inscricao_observacao) == 'CONFIRMADO'): ?>
										Status Atual da Inscrição: <font style="color:#009900;font-weight:bold;">CONFIRMADO!</font>
										<?php endif; ?>
										<?php if (stripslashes($service->inscricao_observacao) == 'REALIZADO'): ?>
										Status Atual da Inscrição: <font style="color:#f9ef18;font-weight:bold;">REALIZADO!</font>
										<?php endif; ?>
										<?php if (stripslashes($service->inscricao_observacao) == 'PENDENTE'): ?>
										Status Atual da Inscrição: <font style="color:#f2195b;font-weight:bold;">NÃO CONFIRMADO!</font>
										<?php endif; ?>
										<h3>Ações</h3>
										<?php if (stripslashes($service->inscricao_observacao) == 'CONFIRMADO'): ?>
                                        <a class="btn btn-circle btn-success atualizar" href="https://api.whatsapp.com/send?phone=55<?= $service->inscricao_icon ?>&text=Ola <?= $service->inscricao_nome ?>, tudo bem? Esse é o contato do(a) <?= $site->site_meta_titulo ?>. Gostaria de confirmar o seu agendamento, conforme os dados a seguir: Status agendamento: CONFIRMADO | Nome: <?= $service->inscricao_nome ?> | Serviço agendado: <?= $service->inscricao_descricao ?> | Data: <?= $service->inscricao_data ?> | Horário: <?= $service->inscricao_curso ?> | Profissional designado: <?= $service->inscricao_profissional ?>. Posso manter o agendamento? " target="_blank">
                                            <i class="fa fa-whatsapp icon-white"></i>
                                        </a>
										<?php endif; ?>
										<?php if (stripslashes($service->inscricao_observacao) == 'REALIZADO'): ?>
                                        <a class="btn btn-circle btn-success atualizar" href="https://api.whatsapp.com/send?phone=55<?= $service->inscricao_icon ?>&text=Ola <?= $service->inscricao_nome ?>, tudo bem? Esse é o contato do(a) <?= $site->site_meta_titulo ?>. Gostaria de agradecer pela preferência! O status do seu agendamento foi  alterado para REALIZADO e finalizado! Estamos à disposição, para atendê-lo(a) novamente!" target="_blank">
                                            <i class="fa fa-whatsapp icon-white"></i>
                                        </a>
										<?php endif; ?>
										<?php if (stripslashes($service->inscricao_observacao) == 'PENDENTE'): ?>
                                        <a class="btn btn-circle btn-success atualizar" href="https://api.whatsapp.com/send?phone=55<?= $service->inscricao_icon ?>&text=Ola <?= $service->inscricao_nome ?>, tudo bem? Esse é o contato do(a) <?= $site->site_meta_titulo ?>. Gostaria de conversar sobre o seu agendamento! O mesmo ainda não pôde ser confirmado. Podemos conversar?" target="_blank">
                                            <i class="fa fa-whatsapp icon-white"></i>
                                        </a>
										<?php endif; ?>
                                        <a class="btn btn-circle btn-info atualizar" href="inscricao/editar/<?= $service->inscricao_id ?>/" >
                                            <i class="fa fa-edit icon-white"></i>
                                        </a>
                                        <a class="btn btn-circle btn-danger delete" data-url="inscricao_fn.php?acao=remover&AMP;id=<?= $service->inscricao_id ?>">
                                            <i class="fa fa-trash icon-white"></i>
                                        </a>									
										</div>
								</div>
							</div>
                <?php endforeach; ?>
            <?php endif; ?>
		<?php endif; ?>
</div>								
                            </div>
                            <?= $inscricao->db->paginacao ?>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div>

        <!--***************MODAL REMOVER*****************-->
        <div class="modal fade" id="MODALREMOVE" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="text-center text-danger">Atenção!</h4>
                        <p class="text-center text-danger">
                            Você está prestes à excluir um registro de forma permanente.<br />
                            Deseja realmente executar este procedimento?
                        </p>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</button>
                            <button type="button" class="btn btn-danger" id="btn-confirm-remove"><i class="glyphicon glyphicon-ok-circle"></i> Remover</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--***************MODAL REMOVER*****************-->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="./assets/js/handlebars.js"></script>
        <script src="./assets/js/typeahead.bundle.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.min.js"></script>
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/jquery.easing.1.3.min.js"></script>
        <script src="./assets/ionsound/ion.sound.min.js"></script>
        <script src="./assets/js/bootbox.js"></script>
		
  
        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="./assets/js/bootstrap-tagsinput.min.js"></script>
        <script src="./assets/js/jasny-bootstrap.fileinput.min.js"></script>
        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap.js"></script>
        <script src="./assets/js/datatables.responsive.js"></script>
        <script src="./assets/js/fuelux.min.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <script src="./assets/js/chosen.jquery.min.js"></script>
        <script src="./assets/js/apps.js"></script>
		<script src="./assets/js/tableToExcel.js"></script>
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/bootstrap-switch.min.js"></script>

        <script>
<?php if (isset($_GET['delete'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});				
                });				
<?php endif; ?>
		</script>
        <script>
<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado!",
                        type: "default"});				
                });				
<?php endif; ?>

            $("[name='switch']").bootstrapSwitch();

            $('.atualizar').on('click', function () {
                var id = $(this).attr('data-update');
                $('#inscricao_id').val(id);
                var url = "inscricao_fn.php?acao=Json";
                $.getJSON(url, {inscricao_id: id}, function (data) {
                    //console.log(data);
                    $('#modal-16  #inscricao_id').val(data.inscricao_id);
                    $('#modal-16  #social_url').val(data.social_url);
                });
                $('#modal-16').modal('show');
            });
            $(".sound").on("click", function () {
                ion.sound.play("button_push.mp3");
            });
            $('.delete').on('click', function () {
                var url = $(this).attr('data-url');
                $('#MODALREMOVE').modal('show');
                $('#btn-confirm-remove').on('click', function () {
                    window.location = url;
                });
            });

            $('.listarservico').addClass('active');
        </script>
    </body>
</html>
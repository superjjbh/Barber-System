<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$contatos = new Contato();
$contatos->getContato();                                    

$icon = new Icon();
$icon->db = new DB;
$icon->getIcones();
$servico_id = intval($_GET['id']);
$servico = new Servico();
$servico->servico_id = $servico_id;
$servico->getServico();

$profissional = new Profissional();
$profissional->db = new DB;
$profissional->getAreas();

$horario = new Horario();
$horario->db = new DB;
$horario->getAreas();

$pagina_id = intval($_GET['id']);
$pagina = new Pagina();
$pagina->db = new DB;
$pagina->getPosts();
$pagina->pagina_id = "$pagina_id";


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
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="./assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="./assets/css/animate.min.css" rel="stylesheet">
        <link href="./assets/css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="./assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
        <link href="./assets/css/chosen.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="./assets/css/reset.css" rel="stylesheet">
        <link href="./assets/css/layout.css" rel="stylesheet">
        <link href="./assets/css/components.css" rel="stylesheet">
        <link href="./assets/css/plugins.css" rel="stylesheet">
        <link href="./assets/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="./assets/css/custom.css" rel="stylesheet">

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

        <!-- START @WRAPPER -->
        <section id="wrapper" class="page-sound">
            <!-- START @HEADER -->
            <?php require_once './navegacao.php'; ?>
            <!--/ END HEADER -->



            <!-- /#sidebar-left -->
            <?php require_once './menu.php'; ?>
            <!--/ END SIDEBAR LEFT -->

            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-suitcase"></i>  <span>Agendamento</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Agendamentos</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div><!-- /.breadcrumb-wrapper -->
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">

                    <!-- Start input fields - basic form -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel rounded shadow">
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">
							    <?php
                                    if (isset($_POST['servico_email']) && !empty($_POST['servico_email'])) {
                                        
										date_default_timezone_set('America/Sao_Paulo');

									  
										  
										$data = date('d/m/Y');
										
										$servico_nome = addslashes($_POST['servico_nome']);
										$servico_icon = addslashes($_POST['servico_icon']);
										$servico_descricao = addslashes($_POST['servico_descricao']);
										$servico_email = addslashes($_POST['servico_email']);
										$servico_horario = addslashes($_POST['servico_horario']);
										$servico_data = addslashes($_POST['servico_data']);
										$servico_status = addslashes($_POST['servico_status']);
										$servico_profissional = addslashes($_POST['servico_profissional']);
										$servico_adicional = $_POST['servico_adicional'];
										$servico_id = addslashes($_POST['servico_id']);
											
										$servico = new Servico();
										$servico->db = new DB;
										$servico->servico_nome = $servico_nome;
										$servico->servico_icon = $servico_icon;
										$servico->servico_descricao = $servico_descricao;
										$servico->servico_email = $servico_email;
										$servico->servico_horario = $servico_horario;
										$servico->servico_data = $servico_data;
										$servico->servico_status = $servico_status;
										$servico->servico_profissional = $servico_profissional;
										$servico->servico_adicional = $servico_adicional;
										$servico->servico_id = intval($_REQUEST['servico_id']);
										$servico->atualizar();
										Filter :: redirect("cliente/?success");
										
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
										$mail->AddBCC($servico->servico_email);
										$mail->AddCC($smtp->smtp_username);
										$mail->AddAddress($smtp->smtp_username);
										
										if($_POST['servico_status'] == 1)
										{
											$servico_status = 'Confirmado';
										}
										else if($_POST['servico_status'] == 2)
										{
											$servico_status = 'Finalizado e Atendido';
										}
										else
										{
											$servico_status = 'Não Confirmado';
										}

										
										$mail->AddReplyTo($servico_email);
										$body = "<b>Data do envio: </b> $data <br />";
										$body .= "<b>Nome:</b> $servico_nome <br />";
										$body .= "<b>Celular (WhatsApp):</b> $servico_icon <br />";
										$body .= "<b>E-mail:</b> $servico_email <br />";
										$body .= "<b>Serviço: </b>$servico_descricao <br />";
										$body .= "<b>Serviços Adicionais: </b>$servico_adicional <br />";
										$body .= "<b>Profissional: </b>$servico_profissional <br />";
										$body .= "<b>Data escolhida: </b>$servico_data <br />";
										$body .= "<b>Horário escolhido: </b>$servico_horario <br />";
										$body .= "<b>O status do seu agendamento foi alterado para: </b>$servico_status <br /><br />";
										$body .= "Qualquer dúvida, entre em contato conosco! <br /><br />";
										$body .= "Atenciosamente, <br /><br />";
										$body .= "$site->site_meta_titulo <br />";
										$body .= "$site->site_meta_desc<br />";
										$body .= "$site->site_meta_palavra<br /><br />";
																				
										$mail->Body = nl2br($body);
										
										
										if ($mail->Send()) {
											echo '<script>alert("Atualizado com sucesso. O Cliente recebeu um e-mail com essa atualização!");</script>';
											echo '<script>location.href="cliente/";</script>';
											
                                        } else {
                                            echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                        }
                                    }
                                    $contatos = new Contato();
                                    $contatos->getContato();  
											//<form method="post" action="servico_fn.php?acao=atualizar">
                                    ?>                                    
									<div class="form-body">
										
										<form method="post" id="contactfrm" role="form">

                                            <div class="form-group">
                                                <label class="control-label">Status de Agendamento</label>
												<h4><input type="radio" id="servico_status" name="servico_status" value="1" <?php echo ($servico->servico_status==1)?'checked':'' ?> > SIM, CONFIRMADO </h4>
												<h4><input type="radio" id="servico_status" name="servico_status" value="0" <?php echo ($servico->servico_status==0)?'checked':'' ?> > NÃO CONFIRMADO </h4>
												<h4><input type="radio" id="servico_status" name="servico_status" value="2" <?php echo ($servico->servico_status==2)?'checked':'' ?> > FINALIZADO E ATENDIDO </h4>
												<input type="hidden" id="servico_id"  name="servico_id" value="<?= $servico->servico_id ?>">
                                            </div>
                                            <div class="form-group">
											<button class="btn btn-primary" type="submit">Atualizar</button>   
											</div>
                                            <div class="form-group">
                                                <label class="control-label">Cliente</label>
                                                <input class="form-control rounded" type="text" id="servico_nome" name="servico_nome" required value="<?= stripslashes($servico->servico_nome) ?>" />
                                            </div>
											
                                            <div class="form-group">
												<span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Se for editar o contato, deve ser nesse formato DDD+NÚMERO. Ex.: 31986407398, para que o cliente receba as notificações!</span>
                                                <label class="control-label">Contato</label>
                                                <input class="form-control rounded" type="text" id="servico_icon" name="servico_icon" value="<?= stripslashes($servico->servico_icon) ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">E-mail</label>
                                                <input class="form-control rounded" type="text" id="servico_email" name="servico_email" required value="<?= stripslashes($servico->servico_email) ?>" />
                                            </div>
											
                                            <div class="form-group ">
                                                <label class="control-label">Escolha um outro Serviço</label>
                                                <input class="form-control rounded" type="text" id="servico_descricao" name="servico_descricao" readonly value="<?= stripslashes($servico->servico_descricao) ?>" />
                                                <select data-placeholder="Selecione um serviço" name="servico_descricao" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_descricao) ?>">Selecione um serviço</option>
                                                    <?php if (isset($pagina->db->data[0])): ?>
                                                        <?php foreach ($pagina->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->pagina_nome ?>" ><?= $categoria->pagina_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
											
                                            <div class="form-group ">
                                                <label class="control-label">Adicionar outros Serviços ao Agendamento</label>
                                                <label class="control-label">Serviço Adicional 1</label>
												<input class="form-control rounded" type="text" id="servico_adicional" name="servico_adicional" readonly value="<?= stripslashes($servico->servico_adicional) ?>" />
                                                <select data-placeholder="Selecione um serviço" name="servico_adicional" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_adicional) ?>">Selecione um serviço</option>
                                                    <?php if (isset($pagina->db->data[0])): ?>
                                                        <?php foreach ($pagina->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->pagina_nome ?>" ><?= $categoria->pagina_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <label class="control-label">Serviço Adicional 2</label>
												<input class="form-control rounded" type="text" id="servico_adicional2" name="servico_adicional2" readonly value="<?= stripslashes($servico->servico_adicional2) ?>" />
                                                <select data-placeholder="Selecione um serviço" name="servico_adicional2" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_adicional2) ?>">Selecione um serviço</option>
                                                    <?php if (isset($pagina->db->data[0])): ?>
                                                        <?php foreach ($pagina->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->pagina_nome ?>" ><?= $categoria->pagina_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <label class="control-label">Serviço Adicional 3</label>
												<input class="form-control rounded" type="text" id="servico_adicional3" name="servico_adicional3" readonly value="<?= stripslashes($servico->servico_adicional3) ?>" />
                                                <select data-placeholder="Selecione um serviço" name="servico_adicional3" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_adicional3) ?>">Selecione um serviço</option>
                                                    <?php if (isset($pagina->db->data[0])): ?>
                                                        <?php foreach ($pagina->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->pagina_nome ?>" ><?= $categoria->pagina_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <label class="control-label">Serviço Adicional 4</label>
												<input class="form-control rounded" type="text" id="servico_adicional4" name="servico_adicional4" readonly value="<?= stripslashes($servico->servico_adicional4) ?>" />
                                                <select data-placeholder="Selecione um serviço" name="servico_adicional4" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_adicional4) ?>">Selecione um serviço</option>
                                                    <?php if (isset($pagina->db->data[0])): ?>
                                                        <?php foreach ($pagina->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->pagina_nome ?>" ><?= $categoria->pagina_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="control-label">Escolha outra Data</label>
                                                <input class="form-control rounded" type="text" id="servico_data" name="servico_data" value="<?= stripslashes($servico->servico_data) ?>" />
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label">Escolha um outro horário</label>
                                                <input class="form-control rounded" type="text" id="servico_horario" name="servico_horario" readonly value="<?= stripslashes($servico->servico_horario) ?>" />
                                                <select data-placeholder="Obrigatório selecionar a área" name="servico_horario" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_horario) ?>">Selecione um horário</option>
                                                    <?php if (isset($horario->db->data[0])): ?>
                                                        <?php foreach ($horario->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->horario_nome ?>" ><?= $categoria->horario_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
																						
                                            <div class="form-group ">
                                                <label class="control-label">Escolha um outro profissional</label>
                                                <input class="form-control rounded" type="text" id="servico_profissional" name="servico_profissional" readonly value="<?= stripslashes($servico->servico_profissional) ?>" />
                                                <select data-placeholder="Selecione um profissional" name="servico_profissional" class="form-control" >
                                                    <option value="<?= stripslashes($servico->servico_profissional) ?>">Selecione outro profissional</option>
                                                    <?php if (isset($profissional->db->data[0])): ?>
                                                        <?php foreach ($profissional->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->profissional_nome ?>"><?= $categoria->profissional_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>																						

                                            <div class="form-footer">
                                                <div class="pull-right">
                                                
                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End body content -->
            </section>
        </section>

        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

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
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="./assets/js/bootstrap-tagsinput.min.js"></script>
        <script src="./assets/js/jasny-bootstrap.fileinput.min.js"></script>
        <script src="./assets/js/holder.js"></script>
        <script src="./assets/js/bootstrap-maxlength.min.js"></script>
        <script src="./assets/js/jquery.autosize.min.js"></script>
        <script src="./assets/js/chosen.jquery.min.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/dark.form.js"></script>
        <script src="./assets/js/bootstrap-datepicker.js"></script>
        <script src="./assets/js/bootstrap-datepicker.pt-BR.js"></script>
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

    </body>
    <script>
        $('#servico_data').datepicker({
          format: "dd/mm/yyyy",
            language: "pt-BR"
        });
function mascaraData(val) {
  var pass = val.value;
  var expr = /[0123456789]/;
  
  for (i = 0; i < pass.length; i++) {
    // charAt -> retorna o caractere posicionado no índice especificado
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
      // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
      // instStr.search(expReg);
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        // substring(indice1,indice2)
        // indice1, indice2 -> será usado para delimitar a string
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}
    </script>
    <script>
        $('.servicoeditar').addClass('active');
        $('#servico_icon').val("<?= $servico->servico_icon ?>").trigger("chosen:updated");
        $(".sound").on("click", function () {
            ion.sound.play("button_push.mp3");
        });
    </script>
    <!--/ END BODY -->

</html>
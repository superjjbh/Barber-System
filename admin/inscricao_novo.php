<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$area = new Area();
$area->getAreas();

$inscricao_id = intval($_GET['id']);
$inscricao = new Inscricao();
$inscricao->inscricao_id = $inscricao_id;
//$inscricao->db = new DB;
$inscricao->getInscricao();

$curso = new Curso();
$curso->db = new DB;
$curso->getCursos();

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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
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
                    <h2><i class="fa fa-tags"></i>  <span>Inscrição</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Inscrição</a>
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
                                <div class="panel-sub-heading">
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong>Cadastrar Inscrição</strong></p></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">
                                    <form enctype="multipart/form-data" method="post" action="inscricao_fn.php?acao=incluir">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="control-label">Nome do Cliente</label>
                                                <input class="form-control rounded" type="text" id="inscricao_nome"  name="inscricao_nome" required value="<?= stripslashes($inscricao->inscricao_nome) ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">E-mail do Cliente</label>
                                                <input class="form-control rounded" type="text" id="inscricao_email"  name="inscricao_email" required value="<?= stripslashes($inscricao->inscricao_email) ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Número do Whatsapp (Apenas números, sem espaços com DDD. Ex.: 31986407398)</label>
                                                <input class="form-control rounded" type="text" id="inscricao_telefone"  name="inscricao_telefone" required value="<?= stripslashes($inscricao->inscricao_telefone) ?>" />
                                            </div>
											<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
											<script>
											$('body').on('change', '#mySelect', function() {
											  $('#inscricao_resumo').val($(this).val());
											  $('#inscricao_curso').val($("option:selected", this).text());
											  $('#inscricao_data').val($("option:selected", this).data('curso_data_inicio'))
											});

											$('#mySelect').trigger('change');
											</script>
                                            <div class="form-group">
                                                <label class="control-label">Escolha o Curso</label>
                                                <select data-placeholder="Selecione um curso" id="mySelect" class="form-control" >
                                                    <option value="">Selecione um curso</option>
                                                    <?php if (isset($curso->db->data[0])): ?>
                                                        <?php foreach ($curso->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->curso_nome ?> | <?= $categoria->curso_data_inicio ?> a <?= $categoria->curso_data_fim ?> | Horario: <?= $categoria->curso_horario ?>" data-curso_data_inicio="<?= $categoria->curso_data_inicio ?>"><?= $categoria->curso_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>                                            
											
											<div class="form-group">
                                                <label class="control-label">Curso Escolhido</label>
                                                <input class="form-control rounded" readonly type="text" style="border:2px solid green;" id="inscricao_curso" name="inscricao_curso" value="<?= stripslashes($inscricao->inscricao_curso) ?>" />
                                            </div>
											
											<div class="form-group">
                                                <label class="control-label">Data Inicial do Curso</label>
                                                <input class="form-control rounded" readonly type="text" style="border:2px solid green;" id="inscricao_data" name="inscricao_data" value="<?= stripslashes($inscricao->inscricao_data) ?>" />
                                            </div>
											
											<div class="form-group">
                                                <label class="control-label">Data e Horários Completos do Curso</label>
                                                <input class="form-control rounded" readonly type="text" style="border:2px solid green;" id="inscricao_resumo" name="inscricao_resumo" value="<?= stripslashes($inscricao->inscricao_resumo) ?>" />
                                            </div>
											
                                            <div class="form-group">
                                                <label class="control-label">Status da Inscrição</label>
												<h4><input type="radio" id="inscricao_observacao" name="inscricao_observacao" value="CONFIRMADO" checked > CONFIRMADO</h4>
												<h4><input type="radio" id="inscricao_observacao" name="inscricao_observacao" value="PENDENTE" > NÃO CONFIRMADO</h4>
												<h4><input type="radio" id="inscricao_observacao" name="inscricao_observacao" value="REALIZADO" > REALIZADO</h4>
											</div>
											

                                            <div class="form-footer">
                                                <div class="pull-right">
                                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
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
        $('.clientenovo').addClass('active');

        $(".sound").on("click", function () {
            ion.sound.play("button_push.mp3");
        });
		
		
    </script>
    <!--/ END BODY -->

</html>
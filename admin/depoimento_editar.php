<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();


$depoimento_id = intval($_GET['id']);
$editar = new Depoimento();
$editar->depoimento_id = $depoimento_id;
$editar->getDepoimento();
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
		<script language="Javascript">
		var limite=200;

		function soma() {

		var mais_um=eval(document.form.caracteres.value.length-1);
		mais_um++;

		 if (document.form.caracteres.value.length>limite) 
		 {
		  document.form.caracteres.value='';
		  document.form.caracteres.value=valor_limite;
		  alert("Você deve digitar no máximo "+limite+" caracteres");
		 }
		 else
		 {
		  document.form.exibe.value='';
		  document.form.exibe.value=eval(mais_um);
		  valor_limite=document.form.caracteres.value;
		  document.form.exibe2.value='';
		  document.form.exibe2.value=(limite-mais_um);
		 }

		document.form.caracteres.focus();
		}

		function mostra_tamanho(){
		document.form.exibe2.value=limite;
		}
		</script>    </head>
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
                    <h2><i class="fa fa-users"></i>  <span>Depoimento</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Depoimento</a>
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
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong>Editar Depoimento</strong></p></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">
                                    <form enctype="multipart/form-data" method="post" action="depoimento_fn.php?acao=atualizar">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="control-label">Nome</label>
                                                <input class="form-control rounded" type="text" id="depoimento_nome"  name="depoimento_nome" required value="<?= stripslashes($editar->depoimento_nome)?>"/>
                                            </div>

                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Atenção: Máximo de 300 caracteres. </span>
                                                <label class="control-label">Depoimento</label>
                                                <textarea class="form-control rounded" type="text" id="depoimento_sobre" name="depoimento_sobre" maxlength="200"><?= stripslashes($editar->depoimento_sobre) ?></textarea>
                                            </div>
											
                                            <div class="form-group">
											<h4 class="media-heading text-capitalize"> Publicado: </h4>
												<h4><input type="radio" id="depoimento_cargo" name="depoimento_cargo" style="text-transform: uppercase;" value="SIM" <?php echo ($editar->depoimento_cargo=='SIM')?'checked':'' ?> > Sim </h4>
												<h4><input type="radio" id="depoimento_cargo" name="depoimento_cargo" style="text-transform: uppercase;" value="NÃO" <?php echo ($editar->depoimento_cargo=='NÃO')?'checked':'' ?> > Não	</h4>											  
											</div>


                                            <div class="form-footer">
                                                <div class="pull-right">
                                                    <input type="hidden" id="depoimento_id"  name="depoimento_id" value="<?= $editar->depoimento_id ?>" />
                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
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
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

    </body>
    <script>
        $('.depoimentonovo').addClass('active');

        $(".sound").on("click", function () {
            ion.sound.play("button_push.mp3");
        });
    </script>
    <!--/ END BODY -->

</html>
<?php
require_once './loader.php';
require_once './modulos.php';


?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <?php //require_once './analytics.php'; ?>
        <?php require_once './base.php'; ?>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title><?= $site->site_meta_titulo ?></title>
        <meta name="description" content="<?= $site->site_meta_desc ?>">
        <meta name="keywords" content="<?= $site->site_meta_palavra ?>">
        <meta name="author" content="<?= $site->site_meta_autor ?>">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
        ================================================== -->
        <!-- Bootstrap  -->
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <!-- web font  -->
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- plugin css  -->
        <link rel="stylesheet" type="text/css" href="js-plugin/animation-framework/animate.css">
        <!-- Pop up-->
        <link rel="stylesheet" type="text/css" href="js-plugin/magnific-popup/magnific-popup.css">
        <!-- Flex slider-->
        <link rel="stylesheet" type="text/css" href="js-plugin/flexslider/flexslider.css">
        <!-- Owl carousel-->
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.transitions.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.theme.css">
        <!-- icon fonts -->
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons.css">
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons-ie7.css">
        <!-- nekoAnim-->
        <link rel="stylesheet" type="text/css" href="js-plugin/appear/nekoAnim.css">
        <!-- Custom css -->
        <link type="text/css" rel="stylesheet" href="css/layout.css">
        <link type="text/css" id="colors" rel="stylesheet" href="css/<?= $modulo_aparencia->modulo_aparencia_cor ?>.css">
        <link type="text/css" rel="stylesheet" href="css/custom.css">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
        <script src="js/modernizr-2.6.1.min.js"></script>
        <!-- Favicons
        ================================================== -->
      <link rel="shortcut icon" href="admin/assets/img/ico/favicon.ico?<?= rand(0, 10) ?>">
    </head>
    <body class="activateAppearAnimation" id="<?= $modulo_aparencia->modulo_aparencia_wide?>">
        <div id="globalWrapper" >
            <!-- ==============================================
                              MENU
            =============================================== -->
            <header class="navbar-fixed-top">			
                <!-- header -->
                <div id="mainHeader" role="banner">
                    <?php require_once './menu.php'; ?>
                </div>
            </header>
            <!-- ==============================================
                         FIM  MENU
            =============================================== -->

            <!-- ==============================================
                 SLIDE
            =============================================== -->

            <?php if ($topo->modulo1_status == 1): ?>
             <?php
                $slide = new Slide();
                $slide->getImagens();                   
             ?>            
                <section id="homeFlex">
                    <div class="flexslider flexFullScreen" >
                        <ul class="slides sliderWrapper">
                            <?php $i = 0; ?>
                            <?php if ($slide->db->data[0]): ?>
                                <?php foreach ($slide->db->data as $imagens): ?>
                                    <li class="slideN<?= $i++; ?>">
                                        <img src="images/<?= $imagens->slide_imagem ?>" alt="Slides" height="500px" width="1150px" class="img-responsive"/>
                                        <div class="caption right">

                                            <?php if( stripslashes($imagens->slide_nome) != "" ): ?>
                                            <div class='element1-1' data-animation="fadeInRightBig">
                                                <h1><?= stripslashes($imagens->slide_nome) ?></h1>
                                            </div>
                                            <?php endif; ?>
                                            <?php if( stripslashes($imagens->slide_subtitulo) != "" ): ?>
                                            <div class='element1-2' data-animation="fadeInRightBig">
                                                <h2><?= stripslashes($imagens->slide_subtitulo) ?></h2>
                                            </div>
                                            <?php endif; ?>
                                            <?php if( stripslashes($imagens->slide_subtitulo1) != "" ): ?>
                                            <div class='element1-3 hidden-xs' data-animation="fadeInRightBig">
                                                <p><?= stripslashes($imagens->slide_subtitulo1) ?></p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>				
                    </div>
                </section>
				

		<section id="content">
			<!-- call to action -->
			<!--<section class="color2 shadowBox">  
				<?php
                    $modulo4 = new Modulo4();
                    $modulo4->getModulo4();                
                ?>

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="ctaBox ctaBoxFullwidth ctaBox2Cols">
								<div class="ctaBoxText" data-nekoanim="fadeInUp" data-nekodelay="0">
									<h2>
										<?= stripslashes($modulo4->modulo4_descricao) ?>										  
									</h2>
								</div>
								<div class="ctaBoxBtn" data-nekoanim="fadeInDown" data-nekodelay="0">
									<a class="btn btn-lg btn-border" title="Fale Conosco" href="contato/">
										<i class="icon-down-open-big"></i> Fale Conosco
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>-->
			<!-- call to action -->				
                <section id="content">
                <?php endif; ?>
				


			<!-- news -->                
			<!-- ==============================================
                    SLIDE
                =============================================== -->


                <!-- ==============================================
                 PORTFÓLIO
                 =============================================== -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb30">
                        </div>
                    </div>
                </div>
                <?php 
                    $portfolio = new Modulo7();
                    $portfolio->getModulo7();
                ?>                  
                <?php if ($portfolio->modulo7_status == 1): ?>
                <?php 
                    $projeto = new Portfolio();
                    $projeto->getPortfoliosUltimos();
                ?> 
                    <?php if ($projeto->db->data[0]): ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center mb40">
                                    <h1><?= stripslashes($portfolio->modulo7_nome) ?></h1>
                                    <h2 class="subTitle"><?= stripslashes($portfolio->modulo7_descricao) ?></h2>
									</br>
									<a href="galerias/"><button type="button" class="btn btn-default btn-lg">Conheça a Galeria Completa</button></a>
                                </div>
                            </div>
                        </div>
                        <section class="nekoDataOwl owl-carousel pb30 imgHover" data-neko_items="4" data-neko_navigation="true" data-neko_pagination="false" data-neko_autoplay="true" data-neko_mousedrag="true"  data-nekoanim="fadeInUp" data-nekodelay="100">
                            <?php foreach ($projeto->db->data as $work): ?>
                                <article class="item">
                                    <div class="imgWrapper">
                                        <img alt="" src="thumb.php?w=500&h=350&src=images/portfolio/<?= $work->portfolio_imagem ?>" class="img-responsive">
                                    </div>
                                    <div class="mediaHover">
                                        <div class="mask"></div>
                                        <div class="iconLinks"> 
                                            <?php $projeto->getWork($work->portfolio_id); ?>
                                            <?php if (isset($projeto->db->data[0])): ?>
                                                <?php $img = ""; ?>
                                                <?php foreach ($projeto->db->data as $images) : ?>
                                                    <?php $img .= "thumb.php?w=600&h=400&zc=1&src=./images/portfolio/$images->foto_url,"; ?>
                                                <?php endforeach; ?>

                                                <a href="galeria/<?= Filter::slug2($work->portfolio_nome) ?>/<?= $work->portfolio_id ?>/">
                                                    <i class="icon-link iconRounded"></i>
                                                    <span>detalhes</span>
                                                </a> 

                                                <a href="images/portfolio/<?= $work->portfolio_imagem ?>" class="image-link" title="Zoom" data-gallery="<?= substr($img, 0, -1) ?>">
                                                    <i class="icon-search iconRounded"></i>
                                                     <span>ampliar</span>
                                                </a> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="boxContent">
                                        <h2><?= stripslashes($work->portfolio_nome) ?></h2>
										<h4>Categoria: <?= stripslashes($work->area1_nome) ?></h4>
                                        <p>
                                            <a href="galeria/<?= Filter::slug2($work->portfolio_nome) ?>/<?= $work->portfolio_id ?>/" class="moreLink"><button type="button" class="btn btn-primary btn-sm">+ Detalhes</button></a>
                                        </p>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- ==============================================
                               FIM  PORTFÓLIO
                 =============================================== -->

                <!-- ==============================================
                                BANNER CENTRAL
                =============================================== -->
                <!-- parallax -->
                <?php
                    $modulo4 = new Modulo4();
                    $modulo4->getModulo4();                
                ?>
                <?php if ($modulo4->modulo4_status == 1): ?>
                    <section id="paralaxSlice3" data-stellar-background-ratio="0.5">
                        <div class="maskParent">
                            <div class="paralaxMask"></div>
                            <div class="paralaxText">
                                <blockquote>
                                    <?= stripslashes($modulo4->modulo4_descricao) ?>
                                </blockquote>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <!-- ==============================================
                              FIM   BANNER CENTRAL
                =============================================== -->

                <!-- ==============================================
                 PROMOÇÕES
                 =============================================== -->
                 <?php
                    $pagina = new Pagina();
                    $pagina->getPaginas();                    
                 ?>
                    <?php if (isset($pagina->db->data[0])): ?>
			<!-- carousel -->
			<section class="carouselHome pt40 pb40" data-nekoanim="fadeInUp" data-nekodelay="0">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1>Nossos Serviços</h1>
                                </div>
                            </div>
							<div class="owl-carousel nekoDataOwl" data-neko_items="2" data-neko_singleitem="true" data-neko_autoplay="true" data-neko_paginationnumbers="true">
								<?php foreach ($pagina->db->data as $trabalhos): ?>
								<div class="item">
									<div class="row">
										<div class="col-md-3 col-md-offset-1">
											<img src="thumb.php?w=300&zc=0&src=images/blog/<?= $trabalhos->pagina_imagem ?>" alt="<?= stripslashes($trabalhos->pagina_nome) ?>" class="img-responsive"/>
										</div>
										<div class="col-md-6 pt40">
											<h1><?= stripslashes($trabalhos->pagina_nome) ?></h1>
											<p>
												<?= Validacao::cut(stripslashes($trabalhos->pagina_descricao), 350, '...') ?>
											</p>
											<p><a href="pagina/<?= Filter::slug2($trabalhos->pagina_nome) ?>/<?= $trabalhos->pagina_id ?>/" class="moreLink"><button type="button" class="btn btn-default">+ Detalhes</button></a></p>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- carousel -->                    
			
			<!-- tabs & list -->
			<section class="pt40 pb40">
				<div class="container">
					<div class="row">
						<div class="col-md-6" data-nekoanim="fadeInUp" data-nekodelay="0">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active"><a href="#homeTab" data-toggle="tab">Home</a></li>
								<li><a href="#profile" data-toggle="tab">Profile</a></li>
								<li><a href="#messages" data-toggle="tab">Messages</a></li>
								<li><a href="#settings" data-toggle="tab">Settings</a></li>
							</ul>
							<div class="tab-content">
								<!-- tab 1 -->
								<div class="tab-pane fade active in" id="homeTab">
									<div class="row">
										<div class="col-md-4">
											<img alt="" src="images/portfolio/vign5.jpg" class="img-responsive">
										</div>
										<div class="col-md-8">
											<h3>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											</h3>
											<p>
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</div>
									</div>
								</div>
								<!-- tab 2 -->
								<div class="tab-pane fade" id="profile">
									<div class="row">
										<div class="col-md-4">
											<img alt="" src="images/portfolio/vign2.jpg" class="img-responsive">
										</div>
										<div class="col-md-8">
											<h3>
												Cillum dolore eu fugiat nulla pariatur
											</h3>
											<p>
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat.
											</p>
										</div>
									</div>
								</div>
								<!-- tab 3 -->
								<div class="tab-pane fade" id="messages">
									<div class="row">
										<div class="col-md-6">
											<ul class="list-unstyled iconList">
												<li>Build with Bootstrap 3</li>
												<li>Mobile first design</li>
												<li>10 colors schemes</li>
											</ul>
										</div>
										<div class="col-md-6">
											<ul class="list-unstyled iconList">
												<li>Clean and well commented code</li>
												<li>Smart Neko CSS and JS components</li>
												<li>Fully responsive</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- tab 4 -->
								<div class="tab-pane" id="settings">
									<div class="row">
										<div class="col-sm-4">
											<img alt="" src="images/portfolio/vign4.jpg" class="img-responsive" />
										</div>

										<div class="col-sm-4">
											<img alt="" src="images/portfolio/vign7.jpg" class="img-responsive" />
										</div>

										<div class="col-sm-4">
											<img alt="" src="images/portfolio/vign8.jpg" class="img-responsive" />
										</div>
									</div>
								</div>
							</div>
						</div>
						 <?php
							$cliente = new Cliente();
							$cliente->getClientes();                    
						 ?>
						<div class="col-md-6" data-nekoanim="fadeInUp" data-nekodelay="50">								
							<div class="owl-carousel nekoDataOwl" data-neko_items="2" data-neko_singleitem="true" data-neko_autoplay="true" data-neko_paginationnumbers="true">
								<?php foreach ($cliente->db->data as $clientes): ?>
								<div class="item">
									<div class="row">
										<div class="col-md-3 col-md-offset-1">
											<img src="images/team/<?=$clientes->cliente_imagem ?>" alt="<?= stripslashes($clientes->cliente_imagem) ?>" class="img-responsive"/>
										</div>
										<div class="col-md-6 pt40">
											<h1><?= stripslashes($clientes->cliente_nome) ?></h1>
											<p>
												<?= stripslashes($clientes->cliente_subtitulo) ?>
											</p>
											<p><a href="promocao/<?= Filter::slug2($clientes->cliente_nome) ?>/<?= $clientes->cliente_id ?>/" class="moreLink"><button type="button" class="btn btn-default">+ Detalhes</button></a></p>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>						
							</div>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<!-- tabs & list -->
			<!-- ==============================================
                 PROMOÇÕES
                 =============================================== -->


                 <?php 
                    $depoimentos = new Depoimento();
                    //$depoimentos->db->paginate(4);
                    $depoimentos->getDepoimentos();
                 ?>
                <?php if (isset($depoimentos->db->data[0])): ?>
                <!-- ==============================================
                                DEPOIMENTOs
                 =============================================== -->                                                  
                <section id="paralaxSlice3" data-stellar-background-ratio="0.5">
                    <div class="maskParent">
                        <div class="paralaxMask"></div>
                        <div id="depoimentos" class="paralaxText container" data-nekoanim="fadeIn" data-nekodelay="50">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel nekoDataOwl" data-neko_items="1" data-neko_singleitem="true" data-neko_paginationnumbers="true" data-neko_transitionstyle="fade">
                                        <?php foreach ($depoimentos->db->data as $d): ?>
                                        <?php if ($d->depoimento_cargo == "SIM") : ?>
                                        <div class="item">
                                            <img src="thumb.php?w=300&h=300&zc=1&src=images/user.png" class="img-circle mb15" alt="client">
                                            <blockquote> <?= Validacao::cut(stripslashes($d->depoimento_sobre),200,'...') ?><br/><small><?= stripslashes($d->depoimento_nome) ?></small></blockquote>
                                        </div>
										<?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
									</br>
								<a href="depoimentos/"><button type="button" class="btn btn-default btn-lg">Envie seu depoimento</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif; ?>                
                <!-- parallax testimonial --> 

               <!-- ==============================================
                                          CONTATO
                  =============================================== -->
                <?php if ($contato->modulo9_status == 1): ?>
                    <section id="contact" class="color1 pt40 pb40">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb40 text-center">
                                    <h1><?= stripslashes($contato->modulo9_nome) ?></h1>
                                    <h2 class="subTitle"><?= stripslashes($contato->modulo9_subtitulo) ?></h2>
                                </div>
                                <div class="col-md-4 mb15" data-nekoanim="fadeInUp" data-nekodelay="0">
                                    <div id="mapWrapper"></div>
                                </div>
                                <div class="col-md-5 col-sm-8"  data-nekoanim="fadeInUp" data-nekodelay="100">
                                    <div class="boxFocus color0">
							    <?php
                                    if (isset($_POST['servico_email']) && !empty($_POST['servico_email'])) {
                                        
										date_default_timezone_set('America/Sao_Paulo');
										$data = date('d/m/Y');
										$servico_nome = addslashes($_POST['servico_nome']);
										$servico_icon = $_POST['servico_icon'];
										$servico_descricao = addslashes($_POST['servico_descricao']);
										$servico_email = $_POST['servico_email'];
										$servico_data = $data;
											
										$servico = new Servico();
										$servico->db = new DB;
										$servico->servico_nome = $servico_nome;
										$servico->servico_icon = $servico_icon;
										$servico->servico_descricao = $servico_descricao;
										$servico->servico_email = $servico_email;
										$servico->servico_data = $data;
										$servico->gravar();
										
										require_once './plugin/email/email.php';
										global $mail;
										$smtp = new Smtpr();
										$smtp->getSmtp();
										$mail->Port = $smtp->smtp_port;
										$mail->Host = $smtp->smtp_host;
										$mail->Username = $smtp->smtp_username;
										$mail->From = $smtp->smtp_username;
										$mail->Password = $smtp->smtp_password;
										$mail->FromName = $smtp->smtp_fromname;
										$mail->Subject = utf8_decode("Contato via Site - " . $site->site_meta_titulo);
										$mail->AddBCC($servico->servico_email);
										$mail->AddCC($smtp->smtp_username);
										$mail->AddAddress($smtp->smtp_username);
										
										$mensagem = $_POST['mensagem'];


										$mail->AddReplyTo($servico_email);
										$body = "<b>Data da Mensagem: </b> $data <br />";
										$body .= "<b>Nome:</b> $servico_nome <br />";
										$body .= "<b>Telefone:</b> $servico_icon <br />";
										$body .= "<b>E-mail:</b> $servico_email <br />";
										$body .= "<b>Assunto: </b>$servico_descricao <br />";
										$body .= "<b>Mensagem: </b>$mensagem <br />";
										$body .= "Nós agradecemos o seu contato!<br /><br />";
										$body .= "Atenciosamente, <br /><br />";
										$body .= "$site->site_meta_titulo <br /><br />";
																				
										$mail->Body = nl2br($body);	
										
										if ($mail->Send()) {
                                            echo "<div class='alert alert-success' id='msg_alert'> <h2><font style='color:#009900;font-weight:bold;'><strong>Obrigado !</strong> Sua mensagem foi entregue com sucesso.</font></h2></div>";
											
                                        } else {
                                            echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                        }
                                    }
                                    $contatos = new Contato();
                                    $contatos->getContato();                                    
                                    ?>
									<form method="post" id="contactfrm" role="form">

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="servico_nome" id="servico_nome" style="text-transform:uppercase" placeholder="Informe seu nome" required title="Por favor informe seu nome"/>
                                            </div>
											<div class="form-group">
												<input type="text" class="form-control" name="servico_icon" id="servico_icon" required placeholder="Informe seu telefone" required title="Por favor informe seu telefone"/>
											</div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="servico_email" id="servico_email" placeholder="Informe seu email" required title="Por favor informe um endereço de email válido"/>
                                            </div>
											
											<div class="form-group">
												<input type="text" class="form-control" name="servico_descricao" id="servico_descricao" required placeholder="Informe o assunto" required title="Por favor informe o assunto"/>
											</div>

                                            <div class="form-group">
                                                <textarea name="mensagem" class="form-control" id="comments" cols="3" style="height:60px" rows="3" placeholder="Mensagem…" required title="Por favor informe a mensagem (acima de 10 caracteres)"></textarea>
                                            </div>

                                            <div class="result"></div>
                                            <button name="submit" type="submit" class="btn btn-primary" id="submit"> <?= stripslashes($contato->modulo9_button) ?></button>

                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4"  data-nekoanim="fadeInUp" data-nekodelay="200">
                                    <h2>Localização:</h2>
                                    <h3>
                                        <i class="icon-location"></i><?= $contatos->contato_endereco ?><br/>
                                    </h3>
                                    <h2>Contatos:</h2>
                                    <h3>
										<?php if (!empty($contatos->contato_telefone1)) : ?>
										<i class="icon-phone"></i><?= $contatos->contato_telefone1 ?><br />
										<?php endif; ?>
										<?php if (!empty($contatos->contato_telefone2)) : ?>
                                        <i class="icon-mobile"></i><?= $contatos->contato_telefone2 ?><br />
										<?php endif; ?>
										<?php if (!empty($contatos->contato_telefone4)) : ?>
										<i class="icon-mobile"></i><?= $contatos->contato_telefone4 ?><br />
										<?php endif; ?>
										<?php if (!empty($contatos->contato_telefone5)) : ?>
										<i class="icon-phone"></i><?= $contatos->contato_telefone5 ?><br />
										<?php endif; ?>
										
                                    </h3>
                                    <h4>Visitas:</h4>
							<?
								$txt		= "contador.txt";
								$arquivo	= fopen($txt,"a+");
								$visitas	= fgets($arquivo,1024);
								fclose($arquivo);

								$arquivo	= fopen($txt,"r+");
								$visitas	= $visitas + 1;
								fwrite($arquivo,$visitas);
								fclose($arquivo);
								   
								echo "Este site foi visitado $visitas vez(es)";
							?>
                                </div>
								<br>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <!-- ==============================================
                                FIM  CONTATO
                =============================================== -->
                <!-- content -->
            </section>
            <!-- ==============================================
                              FIM  RODAPÉ
            =============================================== -->
            <footer id="footerWrapper" class="footer2">
                <?php require_once './footer.php'; ?>
            </footer>
            <!-- ==============================================
                               FIM  RODAPÉ
            =============================================== -->
        </div>


        <!-- global wrapper -->
        <!-- End Document 
        ================================================== -->
        <script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
        <!-- third party plugins  -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>
        <!-- carousel -->
        <script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
        <!-- pop up -->
        <script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- flex slider -->
        <script type="text/javascript" src="js-plugin/flexslider/jquery.flexslider-min.js"></script>
        <!-- isotope -->
        <script type="text/javascript" src="js-plugin/isotope/jquery.isotope.min.js"></script>
        <!-- form -->
        <script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="js-plugin/parallax/js/jquery.stellar.min.js"></script>
        <script type="text/javascript" src="js-plugin/parallax/js/jquery.localscroll-1.2.7-min.js"></script>
        <!-- appear -->
        <script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>	
        <!-- Custom  -->
        <script type="text/javascript" src="js/custom.js"></script>
        <script>
            $('#index').addClass('active');
            var locations = [
                //point number 1
                ['<?= $site->site_meta_titulo ?>', '<?= $contatos->contato_endereco ?>']

            ];
        </script>
        <script>
            jQuery(document).ready(function () {
                //hide a div after 3 seconds
                setTimeout(function () {
                    jQuery("#msg_alert").hide();
                }, 30000);
            });
        </script>
     
    </body>
</html>

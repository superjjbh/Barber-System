<?php
session_start();
require_once '../loader.php';
$site = new Site();
$site->getMeta();

$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();

$topo = new Modulo1();
$topo->getModulo1();

$modulo2 = new Modulo2();
$modulo2->getModulo2();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Modulo7();
$portfolio->getModulo7();

$contato = new Modulo9();
$contato->getModulo9();

$contatos = new Contato();
$contatos->getContato();

$unidade = new Unidade();
$unidade->db = new DB;
$unidade->db->url = "unidade";
$unidade->db->paginate(24);
$unidade->getUnidades();

$pagina_id = intval($_GET['id']);
$pagina = new Pagina();
$pagina->pagina_id = "$pagina_id";
$pagina->getPagina();

$portfolio_id = intval($_GET['id']);
$categoria_portfolio = new Area1();
$categoria_portfolio->getAreas1();

$horario = new Horario();
$horario->db = new DB;
$horario->getAreas();

date_default_timezone_set('America/Sao_Paulo');
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
<meta name="author" content="JM Tecnologia" />
<meta name="description" content="<?= $site->site_meta_titulo ?>" />
<meta name="keywords" content="mobile css template, mobile html template, jquery mobile template, mobile app template, html5 mobile design, mobile design" />
<title><?= $site->site_meta_titulo ?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.css">
<link type="text/css" rel="stylesheet" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/colors/yellow.css" />
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<script>
function add(_this){
  var resultado = document.getElementById('resultado');
  var value = _this.value;
  var hasAdd = resultado.value.search(_this.value) > 0
  if(_this.checked && !hasAdd){
    resultado.value += ' '+_this.value;
  }else if(!_this.checked && hasAdd){
    var er = new RegExp(_this.value, 'ig');
    resultado.value = resultado.value.replace(er, '');
  }
  resultado.value = resultado.value.replace(/ {2,}/g, ' ');
}
</script>

<script>
function enviardados(){
	
if(document.dados.servico_nome.value=="" || document.dados.servico_nome.value.length < 3)
{
alert( "Preencha o campo SEU NOME corretamente!" );
document.dados.servico_nome.focus();
return false;
}
  
  
if( document.dados.servico_email.value=="" || document.dados.servico_email.value.indexOf('@')==-1 || document.dados.servico_email.value.indexOf('.')==-1 )
{
alert( "Preencha o campo SEU E-MAIL corretamente!" );
document.dados.servico_email.focus();
return false;
}

if(document.dados.servico_icon.value=="" || document.dados.servico_icon.value.length < 11)
{
alert( "Preencha o campo NÚMERO DO WHATSAPP corretamente! O seu número do WhatsApp deve ter o DDD e o numero, SEM ESPAÇOS, e são 11 números! Exemplo: 31986407398." );
document.dados.servico_icon.focus();
return false;
}
  
if (document.dados.servico_unidade.value=="")
{
alert( "Escolha uma UNIDADE na qual deseja agendar!" );
document.dados.servico_unidade.focus();
return false;
}

if(document.dados.servico_data.value=="")
{
alert( "O campo ESCOLHA A DATA DESEJADA não pode está vazio!" );
document.dados.servico_data.focus();
return false;
}

    var dataInicialSplit = $("input[name='hoje']").val().split('-');
    var dataFinalSplit = $("input[name='servico_data']").val().split('-');
    var dataInicial = new Date(dataInicialSplit[0], dataInicialSplit[1] - 1, dataInicialSplit[2]);
    var dataFinal = new Date(dataFinalSplit[0], dataFinalSplit[1] - 1, dataFinalSplit[2]);
    if (!dataInicial || !dataFinal) return false;
    if (dataInicial.getTime() > dataFinal.getTime()) {
        alert("A data de agendamento não pode ser menor que a data atual!");
		document.dados.servico_data.focus();
		return false;
    }
	//else if (dataInicial.getTime() == dataFinal.getTime()){
    	//alert("A data de agendamento é hoje");
		//document.dados.servico_data.focus();
		//return false;

    //}else{
    	//alert("A data de agendamento maior que hoje");
		//document.dados.servico_data.focus();
		//return false;
    //}



if (document.dados.servico_horario.value=="")
{
alert( "Escolha UM HORÁRIO DESEJADO" );
document.dados.servico_horario.focus();
return false;
}
   
return true;	
}
</script>
		
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
              <h2 class="page_title"><?= stripslashes($pagina->pagina_nome) ?> - R$ <?= stripslashes($pagina->pagina_autor) ?></h2> 
              <div class="page_content"> 
				<div align="center" class="imgBorder" style="min-height: 100px; margin-top:5px">
				<img src="../images/blog/<?= $pagina->pagina_imagem ?>" alt="" class="img-responsive" /> 
				</div>              
					<h2 class="page_title">Descrição do Serviço:</h2>
					<p><?= $pagina->pagina_descricao ?></p>
					</br>
					<h2 class="page_title">Agendamento On line</h2>
					<p>Envie seus dados, data e horário para verificarmos a disponibilidade, para melhor atendê-lo!</p>
									<div class="contactform">
									<form method="post" action="confirmaragenda.php" id="contactfrm" role="form" name="dados" onSubmit="return enviardados();">
                                            <div>
												<label>Seu Nome:</label>
                                                <input type="text" name="servico_nome" id="servico_nome" required value="<?php echo $_SESSION['nome']?>" style="text-transform:uppercase" placeholder="Informe seu nome" title="Por favor informe seu nome"/>
                                            </div>
                                            <div>
												<label>Seu E-mail:</label>
                                                <input type="email" name="servico_email" id="servico_email" required value="<?php echo $_SESSION['email']?>" placeholder="Informe seu email" title="Por favor informe um endereço de email válido"/>
                                            </div>											
                                            <div>
                                                <label>Informe o número do WhatsApp</label>
                                                <label>Obs.: Somente os números com DDD</label>
                                                <input type="text" name="servico_icon" id="servico_icon" required value="<?php echo $_SESSION['telefone']?>" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Exemplo: 31986407398" title="Por favor informe o celular"/>
                                            </div>
											<div>
											<br>
											<hr>
                                                <label>Adicionar + Serviços ao Agendamento</label>
												<p><font style='color:#009900;font-weight:bold;'>Adicione até 4 serviços adicionais, além do serviço selecionado:</font> <font style='color:blue;font-weight:bold;'><?= stripslashes($pagina->pagina_nome) ?></font></p>
												<?php $adicional = new Pagina(); ?>
												<?php $adicional->getAdicionais($pagina_id) ?>
                                                <select data-placeholder="Escolha outro serviço" id="servico_adicional" name="servico_adicional" tabindex="2" >
                                                <option value="">Selecione outro Serviço</option>
												<?php if (isset($adicional->db->data[0])): ?>
                                                        <?php foreach ($adicional->db->data as $servicos): ?>
														<option value="<?= stripslashes($servicos->pagina_nome) ?>"><?= stripslashes($servicos->pagina_nome) ?> (R$ <?= $servicos->pagina_autor ?>)</option>
														<?php endforeach; ?>
												<?php endif; ?>
                                                </select>
                                                <select data-placeholder="Escolha outro serviço" id="servico_adicional2" name="servico_adicional2" tabindex="2" >
                                                <option value="">Selecione outro Serviço</option>
												<?php if (isset($adicional->db->data[0])): ?>
                                                        <?php foreach ($adicional->db->data as $servicos): ?>
														<option value="<?= stripslashes($servicos->pagina_nome) ?>"><?= stripslashes($servicos->pagina_nome) ?> (R$ <?= $servicos->pagina_autor ?>)</option>
														<?php endforeach; ?>
												<?php endif; ?>
                                                </select>
                                                <select data-placeholder="Escolha outro serviço" id="servico_adicional3" name="servico_adicional3" tabindex="2" >
                                                <option value="">Selecione outro Serviço</option>
												<?php if (isset($adicional->db->data[0])): ?>
                                                        <?php foreach ($adicional->db->data as $servicos): ?>
														<option value="<?= stripslashes($servicos->pagina_nome) ?>"><?= stripslashes($servicos->pagina_nome) ?> (R$ <?= $servicos->pagina_autor ?>)</option>
														<?php endforeach; ?>
												<?php endif; ?>
                                                </select>
                                                <select data-placeholder="Escolha outro serviço" id="servico_adicional4" name="servico_adicional4" tabindex="2" >
                                                <option value="">Selecione outro Serviço</option>
												<?php if (isset($adicional->db->data[0])): ?>
                                                        <?php foreach ($adicional->db->data as $servicos): ?>
														<option value="<?= stripslashes($servicos->pagina_nome) ?>"><?= stripslashes($servicos->pagina_nome) ?> (R$ <?= $servicos->pagina_autor ?>)</option>
														<?php endforeach; ?>
												<?php endif; ?>
                                                </select>
											</div>
											<br>
											<hr>
                                            <div>
                                                <label>Escolha uma Unidade</label>
                                                <select data-placeholder="Obrigatório selecionar a unidade" required id="servico_unidade" name="servico_unidade" tabindex="2" >
                                                    <option value="">Selecione uma Unidade</option>
													<?php if (isset($unidade->db->data[0])): ?>
														<?php foreach ($unidade->db->data as $categoria): ?>
														<option value="<?= stripslashes($categoria->unidade_nome) ?>"><?= stripslashes($categoria->unidade_nome) ?></option>
														<?php endforeach; ?>
													<?php endif; ?>
                                                </select>
                                            </div>											
											
                                            <div>
                                                <label>Escolha a data desejada <font style='color:#009900;font-weight:bold;'>(Hoje é <?php echo date('d/m/Y'); ?>)</font></label>
                                                
												<input type="date" name="servico_data" id="servico_data" required maxlength="10" value="<?php isset($_SESSION['dv_data']) ? print $_SESSION['dv_data'] : false; ?>" placeholder="Informe a data" title="Por favor escolha uma data"/>
                                            </div>
											
                                            <div>
                                                <label>Escolha um horário desejado</label>
                                                <select data-placeholder="Obrigatório selecionar a área" required id="servico_horario" name="servico_horario" tabindex="2" >
                                                    <option value="">Selecione um horário</option>
                                                    <?php if (isset($horario->db->data[0])): ?>
                                                        <?php foreach ($horario->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->horario_nome ?>"><?= $categoria->horario_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>											
											
                                            <div>
												<label>Mensagem(Opcional)</label>
                                                <input type="text" name="mensagem" id="mensagem" value="" placeholder="Mensagem Opcional" title="Mensagem"/>
                                            </div>

                                            <div class="result"></div>
											<input type="hidden" name="servico_descricao" style="text-transform:uppercase" value="<?= stripslashes($pagina->pagina_nome) ?>">
											<input type="hidden" name="servico_status" value="0">
											<input type="hidden" name="servico_valor" value="<?= stripslashes($pagina->pagina_autor) ?>">
											<input type="hidden" name="servico_pagina" style="text-transform:uppercase" value="<?= stripslashes($pagina->pagina_id) ?>">
											<input type="hidden" name="servico_profissional" value="A confirmar ou o Profissional que estiver disponível">
											<input type="hidden" name="hoje" id="hoje" value="<?php echo date('Y-m-d'); ?>">
											<button name="submit" type="submit" class="btn btn-primary" id="submit"> Enviar Agendamento</button>

                                        </form>
										</div>
									</div>
									<div align="center" class="a2a_kit a2a_kit_size_32 a2a_default_style">
									<h2 align="center">Compartilhar</h2>
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
</div><!-- /page -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script src="js/jquery.mobile-custom.js"></script>
</body>
</html>

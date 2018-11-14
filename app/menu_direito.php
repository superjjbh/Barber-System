<?php
require_once '../loader.php';
@session_start();
$site = new Site();
$site->getMeta();

$contatos = new Contato();
$contatos->getContato();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Portfolio();

$rodape = new Modulo11();
$rodape->getModulo11();
$pagina = new Pagina();

$face = new Social();
$face->getSocialFace();


?>

          <div class="user_login_info">
          
                    <div class="user_thumb_container">
                    <img src="images/profile.jpg" alt="" title="" /> 
                        <div class="user_thumb">
                        <img src="images/logo-menu-direito.jpg" alt="" title="" />     
                        </div>  
                    </div>
                    
                    <div class="user_details">
                    <p><?= $site->site_meta_titulo ?></p>
				<?php if (!empty($_SESSION['email'])) : ?>
				<?php echo "<p><span>Seja bem-vindo(a) ".$_SESSION['nome']."</span></p>"; ?>
				<?php endif; ?>
                    </div>  
 

                   <nav class="user-nav">
                        <ul>
						  <li><a href="agenda.php" data-transition="slidedown"><img src="images/icons/white/blog.png" alt="" title="" /><span>Meus Agendamentos</span></a></li>
						  <li><a href="whatsapp.php" data-transition="slidedown"><img src="images/icons/white/whatsapp.png" alt="" title="" /><span>WhatsApp</span></a></li>
						  <li><a href="ligar.php" data-transition="slidedown"><img src="images/icons/white/ligar.png" alt="" title="" /><span>Ligar</span></a></li>
						  <li><a href="contato.php" data-transition="slidedown"><img src="images/icons/white/contato.png" alt="" title="" /><span>Contatos</span></a></li>
						  <li><a href="whatsappdev.php"><img src="images/icons/white/dev.png" alt="" title="" /><span>Desenvolvedor</span></a></li>
                          <li><a href="sair.php"><img src="images/icons/white/lock.png" alt="" title="" /><span>Sair</span></a></li>
						  <li><a href="restrito.php"><img src="images/icons/white/lock.png" alt="" title="" /><span>Acesso Restrito</span></a></li>
						  <li><img src="images/icons/white/versao.png" alt="" title="" /><span>Versão 2.0.27</span></li>
						</ul>
                   </nav>
          </div>

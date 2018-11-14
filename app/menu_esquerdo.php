              <nav class="main-nav">
                <ul>
                  <li><a href="home.php" data-transition="slidefade"><img src="images/icons/white/home.png" alt="" title="" /><span>Home</span></a></li>
				  <?php if (!empty($_SESSION['email'])) : ?>
				  <li><a href="agenda.php" data-transition="slidefade"><img src="images/icons/white/blog.png" alt="" title="" /><span>Meus Horários</span></a></li>
				  <?php endif; ?>
				  <li><a href="sobre.php" data-transition="slidefade"><img src="images/icons/white/sobre.png" alt="" title="" /><span>Sobre nós</span></a></li>
                  <li><a href="servicos.php" data-transition="slidedown"><img src="images/icons/white/servico.png" alt="" title="" /><span>Serviços</span></a></li>
                  <li><a href="cursos.php" data-transition="slidedown"><img src="images/icons/white/curso.png" alt="" title="" /><span>Cursos</span></a></li>
                  <li><a href="produtos.php" data-transition="slidedown"><img src="images/icons/white/produto.png" alt="" title="" /><span>Produtos</span></a></li>
				  <li><a href="galeria.php" data-transition="slidefade"><img src="images/icons/white/galeria.png" alt="" title="" /><span>Galeria</span></a></li>
                  <li><a href="promocoes.php" data-transition="slidefade"><img src="images/icons/white/desconto.png" alt="" title="" /><span>Promoções</span></a></li>
                  <li><a href="depoimento.php" data-transition="slidefade"><img src="images/icons/white/depoimento.png" alt="" title="" /><span>Depoimentos</span></a></li>
                  <li><a href="whatsapp.php" data-transition="slidedown"><img src="images/icons/white/whatsapp.png" alt="" title="" /><span>WhatsApp</span></a></li>
                  <li><a href="ios.php" data-transition="slidedown"><img src="images/icons/white/ios.png" alt="" title="" /><span>iPhone/iPad</span></a></li>
				  <li><a href="ligar.php" data-transition="slidedown"><img src="images/icons/white/ligar.png" alt="" title="" /><span>Ligar</span></a></li>
                  <li><a href="social.php" data-transition="slidefade"><img src="images/icons/white/social.png" alt="" title="" /><span>Social</span></a></li>
                  <li><a href="#right-panel" class="external"><img src="images/icons/white/contato.png" alt="" title="" /><span>Contatos</span></a></li>
                  <li><a href="contato.php" data-transition="slidefade"><img src="images/icons/white/mapa.png" alt="" title="" /><span>Localização</span></a></li>
                </ul>
              </nav>
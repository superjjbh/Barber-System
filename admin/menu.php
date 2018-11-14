<?php
$status0 = new Comment();
?>
<aside id="sidebar-left" class="sidebar-circle">
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="javascript:void(0);">
                <?php if ($_SESSION['USER']['IMAGEM']): ?>
                    <img src="../images/usuario/<?= $_SESSION['USER']['IMAGEM'] ?>" alt="admin">
                <?php else : ?>
                    <img src="../images/usuario/avatar.png" alt="admin">
                <?php endif; ?>
                <i class="online"></i>
            </a>
            <div class="media-body">
                <?php $user_nome = explode(" ", $_SESSION['USER']['NOME']); ?>
                <h4 class="media-heading">Olá, <span><?= $user_nome[0]; ?></span></h4>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li id="home">
            <a href="<?= Validacao::getBase() ?>admin/">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li id="frontend">
            <a href="frontend/">
                <span class="icon"><i class="fa fa-cog"></i></span>
                <span class="text">Dados do App </span>
            </a>
        </li>
        <li id="unidade">
            <a href="unidade/">
                <span class="icon"><i class="fa fa-building"></i></span>
                <span class="text">Unidades </span>
            </a>
        </li>
        <li id="horario">
            <a href="horario/">
                <span class="icon"><i class="fa fa-clock-o"></i></span>
                <span class="text">Horários </span>
            </a>
        </li>
        <li id="usuario">
            <a href="usuarios/">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Usuário </span>
            </a>
        </li>
        <li id="social">
            <a href="social/">
                <span class="icon"><i class="fa fa-facebook-f"></i></span>
                <span class="text">Redes Sociais </span>
            </a>
        </li>        <!--<li id="slide">
            <a href="slide.php">
                <span class="icon"><i class="fa fa-photo"></i></span>
                <span class="text">Slide </span>
            </a>
        </li>-->
        <li>
            <a class="logout" data-url="logar/?deslogar"  href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout">
                <span class="icon"><i class="fa fa-power-off"></i></span>
                <span class="text">Sair/ Logout </span>
            </a>
        </li>
        <li class="sidebar-category">
            <span>Conteúdo</span>
            <span class="pull-right"><i class="fa fa-edit"></i></span>
        </li>
		
        <li id="contatos">
            <a href="agenda/">
                <span class="icon"><i class="fa fa-calendar-o"></i></span>
                <span class="text">Agendamentos do Dia</span>
            </a>
        </li>
		
        <li id="contatos">
            <a href="cliente/">
                <span class="icon"><i class="fa fa-calendar"></i></span>
                <span class="text">Todos Agendamentos</span>
            </a>
        </li>
			
		<li>
            <a href="profissional/">
                <span class="icon"><i class="fa fa-trophy"></i></span>
                <span class="text">Profissionais </span>
            </a>
        </li>
		
        <li>
            <a href="servico/">
                <span class="icon"><i class="fa fa-cut"></i></span>
                <span class="text">Serviços </span>
            </a>
        </li>
		
        <li>
            <a href="curso/">
                <span class="icon"><i class="fa fa-mortar-board"></i></span>
                <span class="text">Cursos </span>
            </a>
        </li>
		
        <li>
            <a href="inscricao/">
                <span class="icon"><i class="fa fa-file-text"></i></span>
                <span class="text">Inscrições </span>
            </a>
        </li>
		
        <li>
            <a href="produto/">
                <span class="icon"><i class="fa fa-cube"></i></span>
                <span class="text">Produtos </span>
            </a>
        </li>
		
        <li>
            <a href="categoria/produto/">
                <span class="icon"><i class="fa fa-cubes"></i></span>
                <span class="text">Categoria de Produtos </span>
            </a>
        </li>
				
        <li>
            <a href="galeria/">
                <span class="icon"><i class="fa fa-photo"></i></span>
                <span class="text">Galeria de Fotos </span>
            </a>
        </li>
		
        <li>
            <a href="depoimentos/">
                <span class="icon"><i class="fa fa-bullhorn"></i></span>
                <span class="text">Depoimentos </span>
            </a>
        </li>
		
        <li>
            <a href="promocao/">
                <span class="icon"><i class="fa fa-tags"></i></span>
                <span class="text">Promoções </span>
            </a>
        </li>
		
        <li class="sidebar-category">
            <span>Configuração</span>
            <span class="pull-right"><i class="fa fa-cog"></i></span>
        </li>

        <li id="smtp">
            <a href="config/email/">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text">SMTP </span>
            </a>
        </li>
        <li class="sidebar-category">
            <span><span class="hidden-sidebar-minimize"></span> &nbsp;</span>
        </li>
    </ul>
</aside>
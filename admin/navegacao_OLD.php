<?php
require_once '../loader.php';
$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();
$smtp = new Smtpr();
$smtp->getSmtp();
$status0 = new Comment();
?>
<header id="header">
    <!-- Start header left -->
    <div class="header-right">
        <div class="navbar navbar-toolbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-minimize">
                <li><a class="btn btn-primary" href="<?= Validacao::getBase() ?>admin/"  style="color:#fff"><i class="fa fa-home" ></i> Painel de Controle</a></li>
				
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown navbar-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <?php if (isset($_SESSION['USER']['IMAGEM'])): ?>
                                <span class="avatar"><img src="thumb.php?w=40&h=40&zc=0&src=../images/usuario/<?= $_SESSION['USER']['IMAGEM'] ?>" class="img-circle" alt="admin"></span>
                            <?php else : ?>
                                <span class="avatar"><img src="thumb.php?w=50&h=50&zc=0&src=../images/usuario/avatar.png" class="img-circle" alt="admin"></span>
                            <?php endif; ?>
                            <span class="text hidden-xs hidden-sm text-muted"><?= $_SESSION['USER']['NOME'] ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="dropdown-header">Sair</li>
                        <li><a class="logout" data-url="logar/?deslogar"  href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
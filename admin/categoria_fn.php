<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $nome = addslashes($_POST['categoria_nome']);
    $cad = new Categoria();
    $cad->categoria_nome = $nome;
    $cad->incluir();
    Filter :: redirect("categoria/produto/?success");
}

function atualizar() {
    $categoria_id = intval($_POST['categoria_id']);
    $categoria_nome = addslashes($_POST['categoria_nome']);
    $a = new Categoria();
    $a->categoria_nome = $categoria_nome;
    $a->categoria_id = $categoria_id;
    $a->atualizar();
    Filter :: redirect("categoria/produto/?success");
}

function remover() {
    $pagina = new Pagina;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Categoria();
        $remover->categoria_id = $id;
        $remover->deletar();
        $pagina->removerArquivo();
        Filter :: redirect("categoria/produto/?success");
    }
}

function Json() {
    if (isset($_REQUEST['categoria_id'])) {
        $categoria_id = intval($_REQUEST['categoria_id']);
        $j = new Categoria();
        $j->categoria_id = $categoria_id;
        echo $j->getJason();
    }
}

function posicao() {
    $posicao = new Categoria();
    $posicao->updatePos();
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


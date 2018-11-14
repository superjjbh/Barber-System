<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $nome = addslashes($_POST['profissional_nome']);
    $cad = new Profissional();
    $cad->profissional_nome = $nome;
    $cad->incluir();
    Filter :: redirect("profissional/?success");
}

function atualizar() {
    $profissional_id = intval($_POST['profissional_id']);
    $profissional_nome = addslashes($_POST['profissional_nome']);
    $a = new Profissional();
    $a->profissional_nome = $profissional_nome;
    $a->profissional_id = $profissional_id;
    $a->atualizar();
    Filter :: redirect("profissional/?success");
}

function remover() {
    $pagina = new Pagina;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Profissional();
        $remover->profissional_id = $id;
        $remover->deletar();
        $pagina->removerArquivo();
        Filter :: redirect("profissional/?success");
    }
}

function Json() {
    if (isset($_REQUEST['profissional_id'])) {
        $profissional_id = intval($_REQUEST['profissional_id']);
        $j = new Profissional();
        $j->profissional_id = $profissional_id;
        echo $j->getJason();
    }
}

function posicao() {
    $posicao = new Profissional();
    $posicao->updatePos();
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


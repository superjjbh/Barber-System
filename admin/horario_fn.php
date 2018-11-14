<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $nome = addslashes($_POST['horario_nome']);
    $cad = new Horario();
    $cad->horario_nome = $nome;
    $cad->incluir();
    Filter :: redirect("horario/?success");
}

function atualizar() {
    $horario_id = intval($_POST['horario_id']);
    $horario_nome = addslashes($_POST['horario_nome']);
    $a = new Horario();
    $a->horario_nome = $horario_nome;
    $a->horario_id = $horario_id;
    $a->atualizar();
    Filter :: redirect("horario/?success");
}

function remover() {
    $pagina = new Pagina;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Horario();
        $remover->horario_id = $id;
        $remover->deletar();
        $pagina->removerArquivo();
        Filter :: redirect("horario/?success");
    }
}

function Json() {
    if (isset($_REQUEST['horario_id'])) {
        $horario_id = intval($_REQUEST['horario_id']);
        $j = new Horario();
        $j->horario_id = $horario_id;
        echo $j->getJason();
    }
}

function posicao() {
    $posicao = new Horario();
    $posicao->updatePos();
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


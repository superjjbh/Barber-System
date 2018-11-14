<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $nome = addslashes($_POST['unidade_nome']);
    $end = addslashes($_POST['unidade_endereco']);
    $tel = addslashes($_POST['unidade_telefone']);
    $cel = addslashes($_POST['unidade_celular']);
    $email = addslashes($_POST['unidade_email']);
    $cad = new Unidade();
    $cad->unidade_nome = $nome;
    $cad->unidade_endereco = $end;
    $cad->unidade_telefone = $tel;
    $cad->unidade_celular = $cel;
    $cad->unidade_email = $email;
    $cad->incluir();
    Filter :: redirect("unidade/?success");
}

function atualizar() {
    $unidade_id = intval($_POST['unidade_id']);
    $unidade_nome = addslashes($_POST['unidade_nome']);
    $unidade_endereco = addslashes($_POST['unidade_endereco']);
    $unidade_telefone = addslashes($_POST['unidade_telefone']);
    $unidade_celular = addslashes($_POST['unidade_celular']);
    $unidade_email = addslashes($_POST['unidade_email']);

    $a = new Unidade();
    $a->unidade_nome = $unidade_nome;
    $a->unidade_endereco = $unidade_endereco;
    $a->unidade_telefone = $unidade_telefone;
    $a->unidade_celular = $unidade_celular;
    $a->unidade_email = $unidade_email;
    $a->unidade_id = $unidade_id;
    $a->atualizar();
    Filter :: redirect("unidade/?success");
}

function remover() {
    $pagina = new Pagina;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Unidade();
        $remover->unidade_id = $id;
        $remover->deletar();
        $pagina->removerArquivo();
        Filter :: redirect("unidade/?success");
    }
}

function Json() {
    if (isset($_REQUEST['unidade_id'])) {
        $unidade_id = intval($_REQUEST['unidade_id']);
        $j = new Unidade();
        $j->unidade_id = $unidade_id;
        echo $j->getJason();
    }
}

function posicao() {
    $posicao = new Unidade();
    $posicao->updatePos();
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


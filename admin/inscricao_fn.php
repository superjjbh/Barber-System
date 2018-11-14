<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $inscricao_nome = addslashes($_POST['inscricao_nome']);
    $inscricao_email = addslashes($_POST['inscricao_email']);
    $inscricao_telefone = addslashes($_POST['inscricao_telefone']);
    $inscricao_curso = addslashes($_POST['inscricao_curso']);
    $inscricao_data = addslashes($_POST['inscricao_data']);
    $inscricao_resumo = addslashes($_POST['inscricao_resumo']);
    $inscricao_observacao = addslashes($_POST['inscricao_observacao']);

    $inscricao = new Inscricao();
    $inscricao->inscricao_nome = $inscricao_nome;
    $inscricao->inscricao_email = $inscricao_email;
    $inscricao->inscricao_telefone = $inscricao_telefone;
    $inscricao->inscricao_curso = $inscricao_curso;
    $inscricao->inscricao_data = $inscricao_data;
    $inscricao->inscricao_resumo = $inscricao_resumo;
    $inscricao->inscricao_observacao = $inscricao_observacao;
    $inscricao->incluir();
    Filter :: redirect("inscricao/");
}

function atualizar() {
    $atualizar = new Inscricao();
    $atualizar->inscricao_nome = addslashes($_POST['inscricao_nome']);
    $atualizar->inscricao_email = addslashes($_POST['inscricao_email']);
    $atualizar->inscricao_telefone = addslashes($_POST['inscricao_telefone']);
    $atualizar->inscricao_curso = addslashes($_POST['inscricao_curso']);
    $atualizar->inscricao_data = addslashes($_POST['inscricao_data']);
    $atualizar->inscricao_resumo = addslashes($_POST['inscricao_resumo']);
    $atualizar->inscricao_observacao = addslashes($_POST['inscricao_observacao']);
    $atualizar->inscricao_id  = intval($_POST['inscricao_id']);
    $atualizar->atualizar();
    Filter :: redirect("inscricao/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Inscricao();
        $remover->inscricao_id = "$id";
        $remover->removerArquivo();
        $remover->remover();
        Filter :: redirect("inscricao/?success");
    }
}

function Json() {
    if (isset($_REQUEST['inscricao_id'])) {
        $inscricao_id = intval($_REQUEST['inscricao_id']);
        $j = new Inscricao();
        $j->inscricao_id =  $inscricao_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


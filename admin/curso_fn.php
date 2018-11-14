<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $curso_nome = addslashes($_POST['curso_nome']);
    $curso_data_inicio = addslashes($_POST['curso_data_inicio']);
    $curso_data_fim = addslashes($_POST['curso_data_fim']);
    $curso_horario = addslashes($_POST['curso_horario']);
    $curso_valor = addslashes($_POST['curso_valor']);
    $curso_descricao = addslashes($_POST['curso_descricao']);
    $curso_profissional = addslashes($_POST['curso_profissional']);
    $curso_status = addslashes($_POST['curso_status']);

    $curso = new Curso();
    $curso->curso_nome = $curso_nome;
    $curso->curso_data_inicio = $curso_data_inicio;
    $curso->curso_data_fim = $curso_data_fim;
    $curso->curso_horario = $curso_horario;
    $curso->curso_valor = $curso_valor;
    $curso->curso_descricao = $curso_descricao;
    $curso->curso_profissional = $curso_profissional;
    $curso->curso_status = $curso_status;
    if (isset($_FILES['curso_imagem']['name']) && !empty($_FILES['curso_imagem']['name'])) {
        $curso->enviar();
    }
    $curso->incluir();
    Filter :: redirect("curso/");
}

function atualizar() {
    $atualizar = new Curso();
    $atualizar->curso_nome = addslashes($_POST['curso_nome']);
    $atualizar->curso_data_inicio = addslashes($_POST['curso_data_inicio']);
    $atualizar->curso_data_fim = addslashes($_POST['curso_data_fim']);
    $atualizar->curso_horario = addslashes($_POST['curso_horario']);
    $atualizar->curso_valor = addslashes($_POST['curso_valor']);
    $atualizar->curso_descricao = addslashes($_POST['curso_descricao']);
    $atualizar->curso_profissional = addslashes($_POST['curso_profissional']);
    $atualizar->curso_status = addslashes($_POST['curso_status']);
    $atualizar->curso_id  = intval($_POST['curso_id']);
    if (isset($_FILES['curso_imagem']['name']) && !empty($_FILES['curso_imagem']['name'])) {
        $atualizar->removerArquivo();
        $atualizar->enviar();
    }
    $atualizar->atualizar();
    Filter :: redirect("curso/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Curso();
        $remover->curso_id = "$id";
        $remover->removerArquivo();
        $remover->remover();
        Filter :: redirect("curso/?success");
    }
}

function Json() {
    if (isset($_REQUEST['curso_id'])) {
        $curso_id = intval($_REQUEST['curso_id']);
        $j = new Curso();
        $j->curso_id =  $curso_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


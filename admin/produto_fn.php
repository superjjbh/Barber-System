<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $produto_categoria = addslashes($_POST['produto_categoria']);
	$produto_nome = addslashes($_POST['produto_nome']);
    $produto_preco = addslashes($_POST['produto_preco']);
    $produto_descricao = addslashes($_POST['produto_descricao']);

    $produto = new Produto();
    $produto->produto_categoria = $produto_categoria;
    $produto->produto_nome = $produto_nome;
    $produto->produto_preco = $produto_preco;
    $produto->produto_descricao = $produto_descricao;
    if (isset($_FILES['produto_imagem']['name']) && !empty($_FILES['produto_imagem']['name'])) {
        $produto->enviar();
    }
    $produto->incluir();
    Filter :: redirect("produto/");
}

function atualizar() {
    $atualizar = new Produto();
    $atualizar->produto_categoria = addslashes($_POST['produto_categoria']);
    $atualizar->produto_nome = addslashes($_POST['produto_nome']);
    $atualizar->produto_preco = addslashes($_POST['produto_preco']);
    $atualizar->produto_descricao = addslashes($_POST['produto_descricao']);
    $atualizar->produto_id  = intval($_POST['produto_id']);
    if (isset($_FILES['produto_imagem']['name']) && !empty($_FILES['produto_imagem']['name'])) {
        $atualizar->removerArquivo();
        $atualizar->enviar();
    }
    $atualizar->atualizar();
    Filter :: redirect("produto/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Produto();
        $remover->produto_id = "$id";
        $remover->removerArquivo();
        $remover->remover();
        Filter :: redirect("produto/?success");
    }
}

function Json() {
    if (isset($_REQUEST['produto_id'])) {
        $produto_id = intval($_REQUEST['produto_id']);
        $j = new Produto();
        $j->produto_id =  $produto_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}


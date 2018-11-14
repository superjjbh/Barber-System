<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
	$servico_nome = addslashes($_POST['servico_nome']);
	$servico_icon = $_POST['servico_icon'];
	$servico_descricao = addslashes($_POST['servico_descricao']);
	$servico_email = $_POST['servico_email'];
	$servico_horario = $_POST['servico_horario'];
	$servico_data = $_POST['servico_data'];
	$servico_status = $_POST['servico_status'];
	$servico_profissional = addslashes($_POST['servico_profissional']);
    $servico = new Servico();
    $servico->db = new DB;
	$servico->servico_nome = $servico_nome;
	$servico->servico_icon = $servico_icon;
	$servico->servico_descricao = $servico_descricao;
	$servico->servico_email = $servico_email;
	$servico->servico_horario = $servico_horario;
	$servico->servico_data = date("d/m/Y", strtotime($servico_data));
	$servico->servico_status = $servico_status;
	$servico->servico_profissional = $servico_profissional;
    $servico->gravar();
    Filter :: redirect("cliente/?success");
}

function atualizar() {
    $servico = new Servico();
    $servico->db = new DB;
	$servico->servico_nome = $servico_nome;
	$servico->servico_icon = $servico_icon;
	$servico->servico_descricao = $servico_descricao;
	$servico->servico_email = $servico_email;
	$servico->servico_horario = $servico_horario;
	$servico->servico_data = date("d/m/Y", strtotime($servico_data));
	$servico->servico_status = $servico_status;
	$servico->servico_profissional = $servico_profissional;
    $servico->servico_id = intval($_REQUEST['servico_id']);
    $servico->atualizar();
    Filter :: redirect("cliente/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $servico_id = intval($_REQUEST['id']);
        $r = new Servico();
        $r->servico_id = $servico_id;
        $r->remover();
        Filter :: redirect("cliente/?delete");
    }
}

function moderar() {
    $moderar = new Servico();
    $servico_id = $_REQUEST['id'];
    $servico_status = $_REQUEST['status'];
    $moderar->mudarStatus($servico_id, $servico_status);	
    Filter :: redirect("cliente/?success");
}


function Json() {
    if (isset($_REQUEST['servico_id'])) {
        $servico_id = intval($_REQUEST['servico_id']);
        $j = new Servico();
        $j->servico_id = $servico_id;
        echo $j->getJason();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}




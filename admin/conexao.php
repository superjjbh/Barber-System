<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["acao"])){
    if($_POST["acao"]=="inserir"){
        inserirPessoa();
    }
    if($_POST["acao"]=="alterar"){
        alterarPessoa();
    }
    if($_POST["acao"]=="excluir"){
        excluirPessoa();
    }
}

function abrirBanco(){
    $conexao = new mysqli("localhost", "u421847002_barbe", "090979", "u421847002_barbe");
    return $conexao;
}

function inserirPessoa(){
    $banco = abrirBanco();
    $sql = "INSERT INTO pessoa(nome, telefone, endereco, nascimento) "
            . "VALUES ('{$_POST["nome"]}','{$_POST["telefone"]}','{$_POST["endereco"]}','{$_POST["nascimento"]}')";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function alterarPessoa(){
    $banco = abrirBanco();
    $sql = "UPDATE pessoa SET nome='{$_POST["nome"]}',"
            . "nascimento='{$_POST["nascimento"]}',endereco='{$_POST["endereco"]}',"
            . "telefone='{$_POST["telefone"]}' WHERE id='{$_POST["id"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function excluirPessoa(){
    $banco = abrirBanco();
    $sql = "DELETE FROM pessoa WHERE id='{$_POST["id"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function selectAllPessoa(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM servico ORDER BY servico_data ASC";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectAllInscricao(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM inscricao ORDER BY inscricao_nome ASC";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}


function selectAllVendas(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM dl_pedidos ORDER BY id desc";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}


function selectIdPessoa($id){
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa WHERE id =".$id;
    $resultado = $banco->query($sql);
    $banco->close();
    $pessoa = mysqli_fetch_assoc($resultado);
    return $pessoa;
}

function voltarIndex(){
    header("Location:index.php");
}
function formatoData($data){
            $array = explode("-", $data);
            // $data = 2016-04-14
            // $array[0]= 2016, $array[1] = 04 e $array[2]= 14;
            $novaData = $array[2]."/".$array["1"]."/".$array[0];
            return $novaData;
        }


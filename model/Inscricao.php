<?php

/*
 * @author phpstaff.com.br
 */

require_once 'Controle.php';

class Inscricao extends Controle {

    public $bd;
    public $inscricao_id;
    public $inscricao_nome;
    public $inscricao_email;
    public $inscricao_telefone;
	public $inscricao_curso;
	public $inscricao_data;
    public $inscricao_resumo;
    public $inscricao_observacao;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("inscricao", "inscricao_nome, inscricao_email, inscricao_telefone, inscricao_curso, inscricao_data, inscricao_resumo,  inscricao_observacao", "'$this->inscricao_nome','$this->inscricao_email','$this->inscricao_telefone','$this->inscricao_curso','$this->inscricao_data', '$this->inscricao_resumo', '$this->inscricao_observacao'");
    }

    public function atualizar() {
        $this->update("inscricao", "inscricao_nome = '$this->inscricao_nome', inscricao_email = '$this->inscricao_email', inscricao_telefone = '$this->inscricao_telefone',inscricao_curso = '$this->inscricao_curso',inscricao_data = '$this->inscricao_data', inscricao_resumo = '$this->inscricao_resumo', inscricao_observacao = '$this->inscricao_observacao'", "inscricao_id = '$this->inscricao_id'");
    }

    public function remover() {
        $this->delete("inscricao", "inscricao_id = '$this->inscricao_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("inscricao", "inscricao_id = '$this->inscricao_id'", "inscricao_observacao", "../images/team/");
    }

    public function enviar() {
        $this->upload("../images/team/", "inscricao_observacao", "");
    }

    public function getInscricao() {
        $this->select("inscricao", "", "*", "", "WHERE inscricao_id = $this->inscricao_id", "");
    }

    public function getInscricoes() {
        $this->select("inscricao");
    }
	
    public function getSearch() {
        $busca = $_POST['busca'];
        $this->db->query("SELECT * FROM inscricao WHERE inscricao_curso like '%$busca%'")->fetchAll(); //OR 
        $this->db->data;
	}
    public function JSON() {
        $this->getJSON("inscricao", "inscricao_id = '$this->inscricao_id'");
    }

}

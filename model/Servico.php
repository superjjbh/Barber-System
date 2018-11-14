<?php

/*
 * @author phpstaff.com.br
 */

require_once 'Controle.php';
class Servico extends Controle {

    public $db;
    public $servico_id;
    public $servico_nome;
    public $servico_icon;
    public $servico_descricao;
    public $servico_unidade;
    public $servico_data;
    public $servico_horario;
    public $servico_email;
    public $servico_status;
    public $servico_profissional;
    public $servico_promocao;
    public $servico_adicional;
    public $servico_adicional2;
    public $servico_adicional3;
    public $servico_adicional4;
    public $result;

    public function __construct() {
        parent::__construct();
        require_once 'Registry.php';
        $registry = Registry::getInstance();
        if( $registry->get('db') == false ) {
            $registry->set('db', new DB);
        }
        $this->db = $registry->get('db');           
    }

    public function gravar() {
        $this->insert("servico", " servico_nome, servico_icon, servico_unidade, servico_descricao, servico_data, servico_horario, servico_email, servico_status, servico_profissional, servico_promocao, servico_adicional, servico_adicional2, servico_adicional3, servico_adicional4", " '$this->servico_nome','$this->servico_icon','$this->servico_unidade','$this->servico_descricao','$this->servico_data','$this->servico_horario','$this->servico_email','$this->servico_status','$this->servico_profissional','$this->servico_promocao', '$this->servico_adicional', '$this->servico_adicional2', '$this->servico_adicional3', '$this->servico_adicional4'");
    }

    public function atualizar() {
        $this->update("servico", "servico_nome  = '$this->servico_nome', servico_icon = '$this->servico_icon', servico_unidade = '$this->servico_unidade',"
                . " servico_descricao = '$this->servico_descricao', servico_data = '$this->servico_data', servico_horario = '$this->servico_horario', servico_email = '$this->servico_email', servico_status = '$this->servico_status', servico_profissional = '$this->servico_profissional' , servico_promocao = '$this->servico_promocao', servico_adicional = '$this->servico_adicional', servico_adicional2 = '$this->servico_adicional2', servico_adicional3 = '$this->servico_adicional3', servico_adicional4 = '$this->servico_adicional4'", "servico_id = '$this->servico_id'");
    }

    public function remover() {
        $this->delete("servico", "servico_id = '$this->servico_id'");
    }

    public function getServico() {
        $this->select("servico", "", "*", "", "WHERE servico_id = $this->servico_id", "");
    }

    public function getServicos() {
        $this->select("servico", "", "*", "", "ORDER BY servico_status ASC", "");
        //$this->db->query("SELECT servico_id, servico_nome, servico_icon, servico_descricao, DATE_FORMAT(servico_data, '%e %b, %Y') AS data, servico_horario, servico_email, servico_status, servico_profissional FROM servico ORDER BY data ASC")->fetchAll(); //OR 
        //$this->db->data;
    }
	
    public function getServicosDia() {
		date_default_timezone_set('America/Sao_Paulo');
		$datacorrente = date('d/m/Y');
        $this->db->query("SELECT * FROM servico WHERE servico_data = '$datacorrente' ORDER BY servico_status ASC")->fetchAll(); //OR 
        $this->db->data;
    }
		
    public function getServicoEmail() {
		$this->select("servico", "", "*", "", " WHERE servico_email = 'superjjbh@gmail.com' ORDER BY servico_data DESC", "");
    }
	
    public function getSearch() {
        $busca = $_POST['busca'];
        $this->db->query("SELECT * FROM servico WHERE servico_nome like '%$busca%'")->fetchAll(); //OR 
        $this->db->data;
    }
	
    public function getAgenda() {
        $busca = $_SESSION['email'];
        $this->db->query("SELECT * FROM servico WHERE servico_email like '%$busca%' ORDER BY servico_status ASC")->fetchAll(); //OR 
        $this->db->data;
    }

    public function getAgendaTotal() {
        $busca = $_POST['email'];
        $this->db->query("SELECT COUNT(*) FROM servico WHERE servico_email like '%$busca%'")->fetchAll(); //OR 
        $this->db->data;
    }	
	
    public function getSearchStatus() {
		$status = $_POST['status'];
        $this->db->query("SELECT * FROM servico WHERE servico_status like '%$status%'")->fetchAll(); //OR 
        $this->db->data;
    }
	
	
    public function getSearchData() {
		$inicio = date("d/m/Y", strtotime($_POST['inicio']));
		$fim = date("d/m/Y", strtotime($_POST['fim']));
        $this->db->query("SELECT * FROM servico WHERE servico_data BETWEEN '$inicio' AND '$fim'")->fetchAll(); //OR 
        $this->db->data;
    }

    public function getJason() {
        $this->getJSON("servico", "servico_id = '$this->servico_id'");
    }

}

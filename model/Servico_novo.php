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
    public $servico_data;
    public $servico_horario;
    public $servico_email;
    public $servico_status;
    public $servico_profissional;
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
        $this->insert("servico", " servico_nome, servico_icon, servico_descricao, servico_data, servico_horario, servico_email, servico_status, servico_profissional", " '$this->servico_nome','$this->servico_icon','$this->servico_descricao','$this->servico_data','$this->servico_horario','$this->servico_email', '$this->servico_status', '$this->servico_profissional'");
    }

    public function atualizar() {
        $this->update("servico", "servico_nome  = '$this->servico_nome', servico_icon = '$this->servico_icon',"
                . " servico_descricao = '$this->servico_descricao', servico_data = '$this->servico_data', servico_horario = '$this->servico_horario', servico_email = '$this->servico_email, servico_status = '$this->servico_status, servico_profissional = '$this->servico_profissional", "servico_id = '$this->servico_id'");
    }

    public function remover() {
        $this->delete("servico", "servico_id = '$this->servico_id'");
    }
	
    public function getServico() {
        $this->select("servico", "", "*", "", "WHERE servico_id = $this->servico_id", "");
    }

    public function getServicos() {
        $this->select("servico", "", "*", "", "ORDER BY servico_data ASC", "");
    }
	
    public function mudarStatus($servico_id, $servico_status) {
        $this->Moderar("servico", "servico_status", "servico_id", "$servico_id", "$servico_status");
    }

    public function getJason() {
        $this->getJSON("servico", "servico_id = '$this->servico_id'");
    }

}

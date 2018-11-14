<?php
/*
 * @author phpstaff.com.br
 */
require_once 'Controle.php';
class Unidade extends Controle {

    public $db;
    public $unidade_id;
    public $unidade_nome;
    public $unidade_endereco;
    public $unidade_telefone;
    public $unidade_celular;
    public $unidade_email;
    public $result;
    public $unidade_todos = array();

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("unidade", "unidade_nome, unidade_endereco, unidade_telefone, unidade_celular, unidade_email", "'$this->unidade_nome', '$this->unidade_endereco', '$this->unidade_telefone', '$this->unidade_celular', '$this->unidade_email'");
    }

    public function atualizar() {
        $this->update("unidade", "unidade_nome = '$this->unidade_nome',unidade_endereco = '$this->unidade_endereco',unidade_telefone = '$this->unidade_telefone',unidade_celular = '$this->unidade_celular',unidade_email = '$this->unidade_email'", "unidade_id = $this->unidade_id");
    }
	
    public function deletar() {
        $this->delete("unidade", "unidade_id = $this->unidade_id");
    }

    public function getUnidade() {
        $this->select("unidade", "", "*", "", "WHERE unidade_id = $this->unidade_id", "");
    }

    public function getUnidades() {
        $this->select("unidade");
    }

    /* MENU CATEGORIA */

    /* MENU CATEGORIA */

    public function getJason() {
        $this->getJSON("unidade", "unidade_id = '$this->unidade_id'");
    }

    public function updatePos() {
        $item = $_POST['item'];
        if(!empty($item )){
            $this->Posicao($item, "unidade", "profissional_pos", "unidade_id");
        }
    }

}

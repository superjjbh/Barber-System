<?php
/*
 * @author phpstaff.com.br
 */
require_once 'Controle.php';
class Profissional extends Controle {

    public $db;
    public $profissional_id;
    public $profissional_nome;
    public $result;
    public $profissional_todos = array();

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("profissional", "profissional_nome", "'$this->profissional_nome'");
    }

    public function atualizar() {
        $this->update("profissional", "profissional_nome = '$this->profissional_nome'", "profissional_id = $this->profissional_id");
    }

    public function deletar() {
        require_once '../loader.php';
        $p = new Pagina;
        $p->pagina_area = $this->profissional_id;
        $p->getBy();
        if(isset($p->db->data[0])){        
            foreach ($p->db->data as $rem) {
                $rem->pagina_id;
                $p->removerArquivo();
                $p->remover();
            }
        }    
        $this->delete("profissional", "profissional_id = $this->profissional_id");
    }

    public function getAreas() {
        $this->select("profissional", "", "*", "", " order by profissional_nome ASC", "");
    }

    public function getArea() {
        $this->select("profissional", "", "*", "", "INNER JOIN pagina ON (pagina_area = profissional_id) WHERE pagina_area = $this->profissional_id", "");
    }

    /* MENU CATEGORIA */

    public function getMenu() {
        $this->select("profissional", "", "*", "", "ORDER BY profissional_id DESC LIMIT 0,6", "");
    }

    /* MENU CATEGORIA */

    public function getJason() {
        $this->getJSON("profissional", "profissional_id = '$this->profissional_id'");
    }

    public function updatePos() {
        $item = $_POST['item'];
        if(!empty($item )){
            $this->Posicao($item, "profissional", "profissional_pos", "profissional_id");
        }
    }

}

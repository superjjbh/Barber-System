<?php
/*
 * @author phpstaff.com.br
 */
require_once 'Controle.php';
class Horario extends Controle {

    public $db;
    public $horario_id;
    public $horario_nome;
    public $result;
    public $horario_todos = array();

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("horario", "horario_nome", "'$this->horario_nome'");
    }

    public function atualizar() {
        $this->update("horario", "horario_nome = '$this->horario_nome'", "horario_id = $this->horario_id");
    }

    public function deletar() {
        require_once '../loader.php';
        $p = new Pagina;
        $p->pagina_area = $this->horario_id;
        $p->getBy();
        if(isset($p->db->data[0])){        
            foreach ($p->db->data as $rem) {
                $rem->pagina_id;
                $p->removerArquivo();
                $p->remover();
            }
        }    
        $this->delete("horario", "horario_id = $this->horario_id");
    }

    public function getAreas() {
        $this->select("horario", "", "*", "", " order by horario_nome ASC", "");
    }

    public function getArea() {
        $this->select("horario", "", "*", "", "INNER JOIN pagina ON (pagina_area = horario_id) WHERE pagina_area = $this->horario_id", "");
    }

    /* MENU CATEGORIA */

    public function getMenu() {
        $this->select("horario", "", "*", "", "ORDER BY horario_id DESC LIMIT 0,6", "");
    }

    /* MENU CATEGORIA */

    public function getJason() {
        $this->getJSON("horario", "horario_id = '$this->horario_id'");
    }

    public function updatePos() {
        $item = $_POST['item'];
        if(!empty($item )){
            $this->Posicao($item, "horario", "horario_pos", "horario_id");
        }
    }

}

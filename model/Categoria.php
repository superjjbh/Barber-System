<?php
/*
 * @author phpstaff.com.br
 */
require_once 'Controle.php';
class Categoria extends Controle {

    public $db;
    public $categoria_id;
    public $categoria_nome;
    public $result;
    public $categoria_todos = array();

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("categoria", "categoria_nome", "'$this->categoria_nome'");
    }

    public function atualizar() {
        $this->update("categoria", "categoria_nome = '$this->categoria_nome'", "categoria_id = $this->categoria_id");
    }

    public function deletar() {
        require_once '../loader.php';
        $p = new Pagina;
        $p->pagina_area = $this->categoria_id;
        $p->getBy();
        if(isset($p->db->data[0])){        
            foreach ($p->db->data as $rem) {
                $rem->pagina_id;
                $p->removerArquivo();
                $p->remover();
            }
        }    
        $this->delete("categoria", "categoria_id = $this->categoria_id");
    }

    public function getCategorias() {
        $this->select("categoria", "", "*", "", " order by categoria_nome ASC", "");
    }

    //public function getCategoria() {
      //  $this->select("categoria", "", "*", "", "INNER JOIN pagina ON (pagina_area = categoria_id) WHERE pagina_area = $this->categoria_id", "");
    //}
	
    public function getCategoria() {
        $this->select("categoria", "", "*", "", "WHERE categoria_id = $this->categoria_id", "");
    }

    /* MENU CATEGORIA */

    public function getMenu() {
        $this->select("categoria", "", "*", "", "ORDER BY categoria_id DESC LIMIT 0,6", "");
    }

    /* MENU CATEGORIA */

    public function getJason() {
        $this->getJSON("categoria", "categoria_id = '$this->categoria_id'");
    }

    public function updatePos() {
        $item = $_POST['item'];
        if(!empty($item )){
            $this->Posicao($item, "categoria", "categoria_pos", "categoria_id");
        }
    }

}

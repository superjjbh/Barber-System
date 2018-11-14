<?php

/*
 * @author phpstaff.com.br
 */

require_once 'Controle.php';
class Area1 extends Controle {

    public $db;
    public $area1_id;
    public $area1_nome;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("area1", "area1_nome", "'$this->area1_nome'");
    }

    public function atualizar() {
        $this->update("area1", "area1_nome = '$this->area1_nome'", "area1_id = $this->area1_id");
    }

    public function deletar() {
        require_once '../loader.php';
        $p = new Portfolio();
        $p->portfolio_area1 = $this->area1_id;
        //$p->portfolio_id = $this->area1_id;
        //$p->getBy();
        $p->db->query("SELECT * FROM area1 
                        INNER JOIN portfolio ON (portfolio_area1 = area1_id) 
                        LEFT JOIN foto ON (foto_portfolio = portfolio_id) WHERE area1_id = $this->area1_id")->fetchAll();
        if(isset($p->db->data[0])){
            foreach ($p->db->data as $rem) {
                $p->portfolio_id = $rem->portfolio_id;
                $p->removerArquivo();
                $p->remover();
            }
        }
        $this->delete("area1", "area1_id =  $this->area1_id");
    }

    public function getAreas1() {
        $this->db->query("SELECT * FROM area1  ORDER BY area1_pos ASC")->fetchAll();
        //$this->select("area1", "", "*", "", " order by area1_pos ASC", "");
    }
   
    public function getArea1($id) {
        $this->select("area1", "", "*", "", "INNER JOIN portfolio ON (portfolio_area1 = area1_id) WHERE portfolio_area1 = $this->area1_id", "");
    }
    
    public function getRelacionados($id,$n) {
        $this->select("area1", "", "*", "", "INNER JOIN portfolio ON (portfolio_area1 = area1_id) WHERE portfolio_area1 = $id AND portfolio_id <> $n", "");
    }

    public function getJason() {
        $this->getJSON("area1", "area1_id = '$this->area1_id'");
    }

    public function updatePos() {        
        $item = $_POST['item'];
        if(!empty($item )){
            $this->Posicao($item, "area1", "area1_pos", "area1_id");
        }
    }

}

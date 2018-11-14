<?php

/*
 * @author phpstaff.com.br
 */
 
require_once 'Controle.php';
class Social extends Controle {

    public $bd;
    public $social_id;
    public $social_url;
    public $social_nome;
    public $social_status;
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

    public function getSociais() {
        $this->select("social");
    }
   
    public function getSociaistatus() {
         $this->select("social", "", "*", "", "WHERE social_status = 1", "");
    }
	
    public function getSocialFace() {
         $this->select("social", "", "*", "", "WHERE social_id = 9 AND social_status = 1", "");
    }
	
    public function getSocialTwitter() {
         $this->select("social", "", "*", "", "WHERE social_id = 26 AND social_status = 1", "");
    }
	
    public function getSocialInsta() {
         $this->select("social", "", "*", "", "WHERE social_id = 15 AND social_status = 1", "");
    }

    public function atualizar() {
        $this->update("social", "social_url    = '$this->social_url'", "social_id = '$this->social_id'");
    }

    public function mudarStatus($social_id, $social_status) {
        $this->Moderar("social", "social_status", "social_id", "$social_id", "$social_status");
    }

    public function JSON() {
        $this->getJSON("social", "social_id = '$this->social_id'");
    }

}

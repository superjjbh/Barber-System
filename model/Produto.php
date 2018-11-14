<?php

/*
 * @author phpstaff.com.br
 */

require_once 'Controle.php';

class Produto extends Controle {

    public $bd;
    public $produto_id;
    public $produto_categoria;
    public $produto_nome;
    public $produto_preco;
    public $produto_descricao;
    public $produto_imagem;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("produto", "produto_categoria, produto_nome, produto_preco, produto_descricao,  produto_imagem", "'$this->produto_categoria','$this->produto_nome','$this->produto_preco', '$this->produto_descricao', '$this->produto_imagem'");
    }

    public function atualizar() {
        if ($this->produto_imagem != "") {
            $this->update("produto", "produto_categoria = '$this->produto_categoria', produto_nome = '$this->produto_nome', produto_preco = '$this->produto_preco',produto_descricao = '$this->produto_descricao'"
                    . ",produto_imagem = '$this->produto_imagem'", "produto_id = '$this->produto_id'");
        } else {
            $this->update("produto", "produto_categoria = '$this->produto_categoria', produto_nome = '$this->produto_nome', produto_preco = '$this->produto_preco', produto_descricao = '$this->produto_descricao'", "produto_id = '$this->produto_id'");
        }
    }

    public function remover() {
        $this->delete("produto", "produto_id = '$this->produto_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("produto", "produto_id = '$this->produto_id'", "produto_imagem", "../images/team/");
    }

    public function enviar() {
        $this->upload("../images/team/", "produto_imagem", "");
    }

    public function getProduto() {
        $this->select("produto", "", "*", "", "WHERE produto_id = $this->produto_id", "");
    }

    public function getProdutos() {
        $this->select("produto");
    }
	
    public function getBusca() {
		$busca = $_POST['busca'];
        $this->db->query("SELECT * FROM produto WHERE produto_categoria like '%$busca%'")->fetchAll(); //OR 
        $this->db->data;
    }

    public function JSON() {
        $this->getJSON("produto", "produto_id = '$this->produto_id'");
    }

}

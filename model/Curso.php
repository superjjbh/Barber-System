<?php

/*
 * @author phpstaff.com.br
 */

require_once 'Controle.php';

class Curso extends Controle {

    public $bd;
    public $curso_id;
    public $curso_nome;
    public $curso_data_inicio;
    public $curso_data_fim;
	public $curso_horario;
	public $curso_valor;
    public $curso_descricao;
    public $curso_imagem;
    public $curso_profissional;
    public $curso_status;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("curso", "curso_nome, curso_data_inicio, curso_data_fim, curso_horario, curso_valor, curso_descricao,  curso_imagem, curso_profissional, curso_status", "'$this->curso_nome','$this->curso_data_inicio','$this->curso_data_fim','$this->curso_horario','$this->curso_valor', '$this->curso_descricao', '$this->curso_imagem', '$this->curso_profissional', '$this->curso_status'");
    }

    public function atualizar() {
        if ($this->curso_imagem != "") {
            $this->update("curso", "curso_nome = '$this->curso_nome', curso_data_inicio = '$this->curso_data_inicio',curso_data_fim = '$this->curso_data_fim',curso_horario = '$this->curso_horario',curso_valor = '$this->curso_valor',curso_descricao = '$this->curso_descricao',curso_profissional = '$this->curso_profissional',curso_status = '$this->curso_status'"
                    . ",curso_imagem = '$this->curso_imagem'", "curso_id = '$this->curso_id'");
        } else {
            $this->update("curso", "curso_nome = '$this->curso_nome', curso_data_inicio = '$this->curso_data_inicio', curso_data_fim = '$this->curso_data_fim',curso_horario = '$this->curso_horario',curso_valor = '$this->curso_valor', curso_descricao = '$this->curso_descricao',curso_profissional = '$this->curso_profissional',curso_status = '$this->curso_status'", "curso_id = '$this->curso_id'");
        }
    }

    public function remover() {
        $this->delete("curso", "curso_id = '$this->curso_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("curso", "curso_id = '$this->curso_id'", "curso_imagem", "../images/team/");
    }

    public function enviar() {
        $this->upload("../images/team/", "curso_imagem", "");
    }

    public function getCurso() {
        $this->select("curso", "", "*", "", "WHERE curso_id = $this->curso_id", "");
    }

    public function getCursos() {
        $this->select("curso");
    }

    public function JSON() {
        $this->getJSON("curso", "curso_id = '$this->curso_id'");
    }

}

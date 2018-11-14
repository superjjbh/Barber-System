<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("conexao.php");
$grupo = selectAllInscricao();
//var_dump($grupo);

$arqexcel = "<meta charset='UTF-8'>";

$arqexcel .= "<table border='1'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>WhatsApp</th>
                    <th>E-mail</th>
					<th>Curso</th>
                    <th>Data</th>
                    <th>Data e Horários Completos do Curso</th>
                    <th>Status</th>				
                </tr>
            </thead>
            <tbody>";
                
                    foreach ($grupo as $pessoa) { 
           $arqexcel .="        <tr>
                    <td>{$pessoa["inscricao_nome"]}</td>
                    <td>{$pessoa["inscricao_telefone"]}</td>
                    <td>{$pessoa["inscricao_email"]}</td>
                    <td>{$pessoa["inscricao_curso"]}</td>
                    <td>{$pessoa["inscricao_data"]}</td>
                    <td>{$pessoa["inscricao_resumo"]}</td>
                    <td>{$pessoa["inscricao_observacao"]}</td>
                    </tr>";
                  }
                
          $arqexcel .="  </tbody>
        </table>";
          
          header("Content-Type: application/xls");
          header("Content-Disposition:attachment; filename = inscricao.xls");
          echo $arqexcel;


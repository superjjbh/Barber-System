<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("conexao.php");
$grupo = selectAllPessoa();
//var_dump($grupo);

$arqexcel = "<meta charset='UTF-8'>";

$arqexcel .= "<table border='1'>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Data Agenda</th>
                    <th>Serviço Escolhido</th>
                </tr>
            </thead>
            <tbody>";
                
                    foreach ($grupo as $pessoa) { 
           $arqexcel .="        <tr>
                    <td>{$pessoa["servico_nome"]}</td>
                    <td>{$pessoa["servico_icon"]}</td>
                    <td>{$pessoa["servico_email"]}</td>
                    <td>{$pessoa["servico_data"]}</td>
                    <td>{$pessoa["servico_descricao"]}</td>
                    </tr>";
                  }
                
          $arqexcel .="  </tbody>
        </table>";
          
          header("Content-Type: application/xls");
          header("Content-Disposition:attachment; filename = relatorio.xls");
          echo $arqexcel;


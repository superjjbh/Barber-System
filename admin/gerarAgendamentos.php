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
                    <th>Contato</th>
                    <th>E-mail</th>
					<th>Data</th>
                    <th>Horário</th>
                    <th>Serviço</th>
                    <th>Serv. Adic. 1</th>
                    <th>Serv. Adic. 2</th>
                    <th>Serv. Adic. 3</th>
                    <th>Serv. Adic. 4</th>
                    <th>Profissional</th>
                    <th>Status</th>				
                </tr>
            </thead>
            <tbody>";
                
                    foreach ($grupo as $pessoa) { 
           $arqexcel .="        <tr>
                    <td>{$pessoa["servico_nome"]}</td>
                    <td>{$pessoa["servico_icon"]}</td>
                    <td>{$pessoa["servico_email"]}</td>
                    <td>{$pessoa["servico_data"]}</td>
                    <td>{$pessoa["servico_horario"]}</td>
                    <td>{$pessoa["servico_descricao"]}</td>
                    <td>{$pessoa["servico_adicional"]}</td>
                    <td>{$pessoa["servico_adicional2"]}</td>
                    <td>{$pessoa["servico_adicional3"]}</td>
                    <td>{$pessoa["servico_adicional4"]}</td>
                    <td>{$pessoa["servico_profissional"]}</td>
                    <td>{$pessoa["servico_status"]}</td>
                    </tr>";
                  }
                
          $arqexcel .="  </tbody>
        </table>";
          
          header("Content-Type: application/xls");
          header("Content-Disposition:attachment; filename = relatorio.xls");
          echo $arqexcel;


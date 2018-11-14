<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
						<?php
									  $mysqli = new mysqli('localhost', 'root', '090979', 'srblack');
									  $sql = "SELECT * FROM `servico`"; //monto a query
									  $query = $mysqli->query( $sql ); //executo a query
        
							foreach ($query as $livro) {
								echo '================'.'</br>';
								echo 'Id = '.$livro['servico_id'].'</br>';
								echo 'Codigo = '.$livro['servico_data'].'</br>';
								echo 'Nome = '.$livro['servico_horario'].'</br>';
								echo 'Descrição = '.$livro['servico_descricao'].'</br>';
								echo '================'.'</br>';
							}
							?>
    </body>
</html>
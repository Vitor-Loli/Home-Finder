<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>

    <link rel="stylesheet" href="assets/css/sistema.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="inicio">
        <h3>Bem Vindo <span class='nome'><?php print " {$_SESSION['userName']}"; ?></span></h3>

        <button><i class='bx bx-plus'> </i>Imóvel</button>
    </div>

    <div class="tabela">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Localização</th>
                    <th>Preço</th>
                    <th>Andares</th>
                    <th>Quartos</th>
                    <th>Carros</th>
                    <th>Área</th>
                    <th>Situação</th>
                </tr>
            </thead>

            <tbody>
                    <?php

                    require_once "application/class/dataBase.php";

                    $dataBase = new dataBase;

                    $sql = "SELECT * FROM imoveis";
                    $parametros= [];
                    $dados = $dataBase->selectRegisters($sql, $parametros); 

                    foreach($dados as $linha){
                        print"
                            <tr>
                                <td>{$linha['id_imovel']}</td>
                                <td>{$linha['descricao']}</td>
                                <td>{$linha['localizacao']}</td>
                                <td>{$linha['preco']}</td>
                                <td>{$linha['andares']}</td>
                                <td>{$linha['quartos']}</td>
                                <td>{$linha['carros']}</td>
                                <td>{$linha['area']}</td>
                                <td>{$linha['situacao']}</td>
                            </tr>
                        ";
                    }

                    ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
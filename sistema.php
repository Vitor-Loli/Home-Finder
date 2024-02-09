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
        
        <div class="buttons">
            <button onclick="formImovel()"><i class='bx bx-plus'> </i>Imóvel</button>
            <button class="sair" onclick = "sair()"><i class='bx bx-exit' ></i></button>
        </div>
        
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
                    <th>Ações</th>
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
                                <td>
                                <a onclick='excluirImovel({$linha['id_imovel']}, \"{$linha['imagem']}\")'><i class='bx bx-trash' ></i></a>
                                    <i class='bx bx-edit-alt' ></i>
                                </td>
                            </tr>
                        ";
                    }

                    ?>
                
            </tbody>
        </table>
    </div>
</body>

<script>
    function formImovel(){
        window.location = "novo-imovel.html"
    }

    function sair(){
        window.location = "index.php"
    }

    function excluirImovel(id, imagem) {
    var resposta = confirm('Deseja realmente excluir o imóvel?');
    if (resposta) {
      window.location = 'application/excluir-imovel.php?id=' + id + '&imagem=' + imagem;
    }
  }
</script>
</html>
<?php

    $id = isset($_GET['id'])? $_GET['id']: '';
    $imagem = isset($_GET['imagem'])? $_GET['imagem']: '';

    if($id == ''){
        print "<script>
            alert('Há dados em branco, por favor verifique!')
            window.location = '../sistema.php'
        </script>";
    }

    require_once "class/dataBase.php";
    $dataBase = new dataBase;

    $sql = "DELETE FROM imoveis WHERE id_imovel = ?";
    $parametros = [$id];
    $dataBase->executeCommand($sql, $parametros);

    if ($imagem != "") {
        $caminho = "upload/$imagem";
        if (file_exists($caminho)) {
            unlink($caminho);
        }
    }

    print "<script>
            alert('Imóvel excluido com sucesso!')
            window.location = '../sistema.php'
        </script>";
?>
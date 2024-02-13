<?php

    $id = isset($_GET['id'])? $_GET['id']: '';

    if($id == ''){
        print "<script>
            alert('Há dados em branco, por favor verifique!')
            window.location = 'index.php'
        </script>";
    }

    require_once 'application/class/dataBase.php';
    $dataBase = new dataBase;

    $sql = "SELECT * FROM imoveis WHERE id_imovel = ?";
    $parametros = [$id];
    $dados = $dataBase->selectRegister($sql, $parametros);

    $preco = $dados['preco'];

    $preco = number_format($preco / 100, 2, ',', '.');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imóvel | Home Finder</title>

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="assets/css/imovel.css">
</head>
<body>


    <div class="inicio">
        <h3><?php print "{$dados['descricao']}" ?></h3>

        <div class="btn">
            <h3 class="preco"><?php print "R$ $preco" ?></h3>
            <button class="sair" onclick="voltar()"><i class='bx bx-exit' ></i></button>
        </div>
        
        
    </div>

    <div class="desc">
        <div class="imagem">
            <img src="application/upload/<?php print $dados['imagem']; ?>" alt="">
        </div> 

        <div class="infos">
            <h4>Esse imóvel contém:</h4>
            <p><i class='bx bxs-building-house'></i><?php print $dados['andares']; ?> Andar(es)</p>
            <p><i class='bx bxs-bed'></i><?php print $dados['quartos']; ?> Quarto(s)</p>
            <p><i class='bx bxs-car'></i><?php print $dados['carros']; ?> Carro(s)</p>
            <p><i class='bx bxs-area' ></i><?php print $dados['area']; ?> m²</p>
        </div>
    </div>

    
    
</body>
<script>
    function voltar(){
        window.location = "index.php"
    }
</script>

</html>
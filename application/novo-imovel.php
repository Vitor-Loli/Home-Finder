<?php
    $id = isset($_POST['txtID'])? $_POST['txtID']: '';
    $descricao = isset($_POST['txtDesc'])? $_POST['txtDesc']: '';
    $localizacao = isset($_POST['txtLocal'])? $_POST['txtLocal']: '';
    $precoD = isset($_POST['txtPreco'])? $_POST['txtPreco']: '';
    $andares = isset($_POST['txtAndares'])? $_POST['txtAndares']: '';
    $quartos = isset($_POST['txtQuartos'])? $_POST['txtQuartos']: '';
    $carros = isset($_POST['txtCarros'])? $_POST['txtCarros']: '';
    $areaD = isset($_POST['txtArea'])? $_POST['txtArea']: '';
    $situacao = isset($_POST['txtSituacao'])? $_POST['txtSituacao']: '';

    if($descricao == '' || $localizacao == '' || $precoD == '' || $andares == '' || $quartos == '' || $carros == '' || $areaD == '' || $situacao == ''){
        print"<script>
            alert('Há dados em branco, por favor verifique!')
            window.location = '../novo-imovel.html'
        </script>";
    } 
    
    $nome_imagem = uniqid() . '.jpg';
    $destino = 'upload/' . $nome_imagem;
    move_uploaded_file($_FILES['file_imagem']['tmp_name'], $destino);
    
    $preco  = (int)preg_replace("/[^0-9]/", "", $precoD);

    $area = str_replace(['.', ','], '', $areaD);
    $area = intval($area);

    require_once "class/dataBase.php";
    $dataBase = new dataBase;

    if($id == "NOVO"){
        $sql = "INSERT INTO imoveis (descricao, localizacao, preco, andares, quartos, carros, area, situacao, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $parametros = [$descricao, $localizacao, $preco, $andares, $quartos, $carros, $area, $situacao, $nome_imagem];
        $dataBase->executeCommand($sql, $parametros);   
        $msn = "Imóvel cadastrado com sucesso!";
    } else{
        $sql = "UPDATE imoveis SET id = ?, descricao = ?, localizacao = ?, preco = ?, andares = ?, quartos = ?, carros = ?, area = ?, situacao = ?, imagem = ?";
        $parametros = [$id, $descricao, $localizacao, $preco, $andares, $quartos, $carros, $area, $situacao, $nome_imagem];
        $dataBase->executeCommand($sql, $parametros);   
        $msn = "Imóvel alterado com sucesso!";
    }

    print"<script>
            alert('$msn')
            window.location = '../sistema.php'
    </script>";
    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your new Home</title>

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/cabecalho.css">
</head>

<body>


    <header class="cabecalho">
        <div class="logo">
            <img src="assets/images/logo.png" alt="LOGO">
            <div class="titulo">
                <h1>HOME</h1>
                <h1>FINDER</h1>
            </div>

        </div>

        <nav class="menu">
            <ul>
                <li><a href="#"><i class='bx bx-search'></i></a></li>
                <li><a href="#imoveis">Imóveis</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#contatos">Contatos</a></li>
            </ul>
        </nav>

    </header>

    <div class="infos">
        <div class="local">
            <i class='bx bxs-location-plus'></i>
            <p>Lindóia do Sul - Rua Leonelo Bertol 149</p>
        </div>

        <div class="contato">
            <i class='bx bxs-phone'></i>
            <p>(49) 99841-1197</p>
        </div>
    </div>


    <div class="apresentacao">
        <div class="texto">
            <h1>UM NOVO LAR TE ESPERA</h1>
            <p>Conheça nossos imóveis</p>
            <div class="botao">
                <button><a href="#imoveis">Imóveis</a></button>
            </div>
        </div>
    </div>

    <div class="imoveis" id="imoveis">

        <div class="cards">

        <?php
            require_once "application/class/dataBase.php";

            $dataBase = new dataBase;

            $sql = "SELECT * FROM imoveis";
            $parametros= [];
            $dados = $dataBase->selectRegisters($sql, $parametros); 

            foreach($dados as $linha){
                if($linha['situacao'] == 1){
                    $situacao = "vago";
                    $disp = "Disponível";
                }else{
                    $situacao = "alugado";
                    $disp = "Indisponível";
                }


                print"
                    
                        <div class='card'>
                                <img src='assets/images/foto-chave.png' alt=''>
                            <div class='descricao'>
                                <h3>{$linha['descricao']}</h3>
                                <p>{$linha['localizacao']}</p>
                                <h3><span class='preco'>R$ {$linha['preco']}</span></h3>
                                <p><i class='bx bxs-building-house'></i>{$linha['andares']} Andares</p>
                                <p><i class='bx bxs-bed'></i>{$linha['quartos']} Quartos</p>
                                <p><i class='bx bxs-car'></i>{$linha['carros']} Carros</p>
                                <p><i class='bx bxs-area' ></i>{$linha['area']} m²</p>
                                <h3><span class='$situacao'>$disp</span></h3>
                            </div>
                            <div class='button'>
                                <button>Ver Imóvel</button>
                            </div>
                        </div>
                    
                ";
            }
        ?>

        </div>

        <div class="filtro">
            <form action="application/pesquisar-imovel.php" class="form">
                <div>
                    <input type="text" placeholder="Pesquisar imóvel" name="txtPesquisar">
                    <label for="txtPesquisar"><i class='bx bx-search'></i></label>
                </div>

                <div>
                    <select name="txtLocalizacao" id="">
                        <option value="">Localização...</option>
                        <option value="Centro">Centro</option>
                        <option value="Centro">Interior</option>
                    </select>
                    <label for="txtLocalizacao"><i class='bx bxs-location-plus'></i></label>
                </div>


                <div>
                    <select name="txtQuartos" id="">
                        <option value="">Quartos...</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                    </select>
                    <label for="txtQuartos"><i class='bx bxs-bed'></i></label>
                </div>

                <div>
                    <select name="txtCarros" id="">
                        <option value="">Carros...</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                    </select>
                    <label for="txtCarros"><i class='bx bxs-car'></i></label>
                </div>

                <div class="botao">
                    <input type="submit" value="Enviar" class="btn">
                </div>

            </form>

        </div>

    </div>

    <div class="sobre" id="sobre">
        

        <div class="texto">
            <div class="titulo">
                <h1>Sobre</h1>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, ante eu pulvinar maximus, quam
                turpis scelerisque sem, nec venenatis libero ipsum gravida leo. Praesent ut lorem quis nibh dictum posuere
                vitae sed mi. Praesent vitae hendrerit elit. Integer aliquet bibendum erat, in vestibulum erat eleifend sit
                amet. Aliquam porta, nisi vitae aliquet viverra, metus velit ultrices mi, ut aliquam tortor odio et nibh.
                Sed enim mi, vestibulum efficitur lectus nec, congue mollis ante. Donec ornare velit vitae fringilla tempus.
            </p>
            
        </div>

        <img src="assets/images/logo.png" alt="">
    </div>

    <div class="contatos" id="contatos">
        <div class="logo">
            <h1>HOME</h1>
            <h1>FINDER</h1>
        </div>
        <div class="redes">
            <i class='bx bxl-instagram'></i>
            <i class='bx bxl-facebook'></i>
            <i class='bx bxl-twitter'></i>
            <i class='bx bxl-whatsapp' ></i>
        </div>
        <div class="funcoes">
            <ul>
                <li><a href="#"><i class='bx bx-up-arrow-alt' ></i></a></li>
                <li><a href="#imoveis">Imóveis</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#contatos">Contatos</a></li>
                <li><a href="login.php">Sistema</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
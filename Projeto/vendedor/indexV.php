<?php 

$servername = "localhost";
$username = "root";
$password = "Sk8long2077#";
$dbname = "getninjas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT nome, tipo, email, especificações, preco, km, carroceria FROM carro join cadastrovendedor on fkVendor = idVendor where idCarro = 1"; /* query utilizada para buscar dados no banco para exibir em um card */
$result = $conn->query($sql);
$resulte = $conn->query($sql);

session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];

require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// while ($dados = mysqli_fetch_array($resultado)) {
//     $_SESSION['nome'] = $dados['nm_projeto'];
// 	$_SESSION['senha'] = $dados['senha'];
// 	$_SESSION['email'] = $dados['email'];
//     $_SESSION['perfil'] = $dados['perfil'];
// }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Projeto</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

   

    <link rel="stylesheet" href="css/index_css.css">
    </head>
    
    <body>
        <div class="header">
            <div class="logo">
                <a href="index.html" style="text-decoration: none; color: var(--font-color); font-size: 25px;">Logo</a>
            </div>
            <div class="op">
                <li class="opi1">Ver Anuncios
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="#">Meus Anuncios</a>
                            <a href="prosp-tela.php">Todos Anuncios</a>
                            <a href="#">Alugar Imóveis</a>
                        </div>
                    </div>
                </li>
                <li class="opi1"> Seu Carro
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="vender.php">Inserir Carro</a>
                            <a href="venderEdit.php">Editar Carro</a>
                        </div>
                    </div>
                </li>
                <li class="opi1"> Seu Imovel
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="vendeImo.php">Inserir Imovel</a>
                            <a href="imoveisEdit.php">Editar Imovel</a>
                        </div>
                    </div>
                </li>
            </div>
            <div class="ot">
                <i class='bx bx-moon night'></i>
                <i class='bx bx-heart'></i>
                <li class="opi1">
                    <div class="dropdown"><i class='bx bx-user-circle'></i>
                        <div class="dropdown-content2">
                            <a href="anuncios.html"><i class='bx bx-edit'></i>Meus Anuncios</a>
                            <a href="perfilV.php"><i class='bx bx-user'></i>Minha conta</a>
                        </div>
                    </div>
                </li>
            </div>
            <div class="ot2">
                <i class='bx bx-menu'></i>
            </div>
        </div>
    <div class="welcome-area" id="welcome">

        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="filtro1">
                        <div class="op2">
                            <li>Carros</li>
                            <li>Imóveis</li>
                        </div>
                        <div class="bar">
                            <i class='bx bx-search' ></i>
                            <input type="text" placeholder="Digite um lugar" class="ipt1">
                            <button>Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i class='bx bxs-car'></i>
                                </div>
                                <h5 class="features-title">Variedades automotivas</h5>
                                <p>Carros automáticos e manuais, motos e veiculos de acordo com suas preferências</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i class='bx bx-cart-add' ></i>
                                </div>
                                <h5 class="features-title">Compras comunicativas</h5>
                                <p>Compras e acordos feitos e comunicados através de chats e contatos.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i class='bx bxs-home-circle' ></i>
                                </div>
                                <h5 class="features-title">Residências variadas</h5>
                                <p>Casas e apartamentos de acordo com suas preferências</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
 "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="280.000000pt" height="280.000000pt" viewBox="0 0 280.000000 280.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,280.000000) scale(0.100000,-0.100000)"
fill="var(--font-color)" stroke="none">
<path d="M880 2781 c-19 -10 -45 -36 -57 -57 -20 -35 -23 -53 -23 -172 0 -111
3 -139 19 -170 19 -37 82 -82 115 -82 13 0 16 -13 16 -83 0 -69 3 -87 18 -100
38 -34 57 -20 156 116 l50 67 203 0 c185 0 208 2 243 20 66 34 80 74 80 232 0
119 -3 137 -23 172 -43 75 -48 76 -427 76 -307 0 -338 -2 -370 -19z m704 -97
c13 -12 16 -40 16 -134 0 -94 -3 -122 -16 -134 -13 -14 -49 -16 -234 -16
l-218 0 -41 -47 -41 -48 0 29 c0 44 -26 66 -76 66 -68 0 -74 12 -74 150 0 94
3 122 16 134 13 14 58 16 334 16 276 0 321 -2 334 -16z"/>
<path d="M1000 2550 l0 -50 250 0 250 0 0 50 0 50 -250 0 -250 0 0 -50z"/>
<path d="M503 2182 c-251 -90 -272 -432 -35 -549 81 -40 183 -40 264 0 107 53
163 144 163 267 0 85 -21 142 -74 203 -72 81 -213 117 -318 79z m209 -118
c125 -88 113 -269 -22 -342 -95 -50 -215 -11 -268 88 -50 95 -11 215 88 268
63 33 143 28 202 -14z"/>
<path d="M2103 2182 c-251 -90 -272 -432 -35 -549 81 -40 183 -40 264 0 107
53 163 144 163 267 0 85 -21 142 -74 203 -72 81 -213 117 -318 79z m209 -118
c125 -88 113 -269 -22 -342 -95 -50 -215 -11 -268 88 -50 95 -11 215 88 268
63 33 143 28 202 -14z"/>
<path d="M1150 1950 l0 -50 50 0 50 0 0 50 0 50 -50 0 -50 0 0 -50z"/>
<path d="M1350 1950 l0 -50 50 0 50 0 0 50 0 50 -50 0 -50 0 0 -50z"/>
<path d="M1550 1950 l0 -50 50 0 50 0 0 50 0 50 -50 0 -50 0 0 -50z"/>
<path d="M1230 1731 c-19 -10 -45 -36 -57 -57 -20 -35 -23 -53 -23 -172 0
-156 12 -193 78 -230 38 -21 50 -22 271 -22 213 0 235 2 271 20 45 23 80 81
80 132 0 23 15 56 50 108 27 41 50 82 50 91 0 26 -34 49 -73 49 -30 0 -39 5
-54 31 -37 63 -65 69 -325 69 -208 0 -237 -2 -268 -19z m504 -97 c9 -8 16 -24
16 -34 0 -10 12 -28 26 -39 l25 -20 -25 -38 c-18 -26 -26 -51 -26 -80 0 -72
-2 -73 -250 -73 -185 0 -221 2 -234 16 -23 23 -23 245 0 268 23 24 445 24 468
0z"/>
<path d="M1350 1500 l0 -50 150 0 150 0 0 50 0 50 -150 0 -150 0 0 -50z"/>
<path d="M0 1156 c0 -372 2 -391 56 -461 14 -19 41 -44 60 -56 l34 -21 0 -309
0 -309 50 0 50 0 0 300 0 300 250 0 250 0 0 -283 c0 -262 1 -285 18 -300 15
-14 42 -17 150 -17 l132 0 0 425 0 425 350 0 350 0 0 -425 0 -425 133 0 c117
0 136 2 150 18 15 16 17 52 17 300 l0 282 250 0 250 0 0 -300 0 -300 50 0 50
0 0 309 0 309 34 21 c19 12 46 37 60 56 54 70 56 89 56 461 l0 344 -50 0 -50
0 0 -341 c0 -294 -2 -346 -16 -375 -19 -40 -60 -72 -103 -80 l-31 -6 0 294 c0
338 -4 363 -75 433 -62 63 -109 75 -290 75 -134 0 -154 -2 -168 -18 -14 -16
-17 -43 -17 -175 l0 -157 -208 0 c-252 0 -242 5 -242 -118 l0 -82 -150 0 -150
0 0 83 c0 122 9 117 -243 117 l-207 0 0 158 c0 141 -2 161 -18 175 -16 14 -43
17 -169 17 -178 0 -226 -12 -288 -75 -71 -70 -75 -95 -75 -433 l0 -294 -31 6
c-43 8 -84 40 -103 80 -14 29 -16 81 -16 375 l0 341 -50 0 -50 0 0 -344z m700
85 c0 -132 3 -162 16 -175 13 -14 48 -16 225 -16 l209 0 0 -50 0 -50 -275 0
-275 0 0 150 0 150 -50 0 -50 0 0 -182 c0 -155 2 -184 17 -200 14 -16 35 -18
209 -18 162 0 195 -3 208 -16 14 -13 16 -61 16 -375 l0 -359 -50 0 -50 0 0
282 c0 248 -2 284 -17 300 -15 16 -36 18 -250 18 l-234 0 3 303 c3 294 4 303
25 333 37 52 73 64 206 64 l117 0 0 -159z m1686 132 c61 -44 64 -60 64 -382
l0 -291 -232 0 c-201 0 -234 -2 -250 -17 -17 -15 -18 -38 -18 -300 l0 -283
-50 0 -50 0 0 359 c0 314 2 362 16 375 13 13 46 16 206 16 164 0 194 2 210 17
16 14 18 35 18 200 l0 183 -50 0 -50 0 0 -150 0 -150 -275 0 -275 0 0 50 0 50
207 0 c178 0 209 2 225 17 16 14 18 34 18 175 l0 160 128 -4 c112 -3 131 -6
158 -25z"/>
</g>
</svg>

                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title" style="color: var(--main-color); font-weight: 600;">Converse sobre os interesses específicos.</h2>
                    </div>
                    <div class="left-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ullam corporis a sint quod illo accusantium dolorem quis exercitationem! Rem labore, perspiciatis tenetur nobis a corporis minus modi est excepturi.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title" style="color: var(--main-color); font-weight: 600;">Feche negócios de forma prática</h2>
                    </div>
                    <div class="left-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est hic iste culpa similique, impedit sit dolorum suscipit quibusdam eius aspernatur sunt fugit et blanditiis aperiam eum eos animi voluptatum dolores?</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
 "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="288.000000pt" height="320.000000pt" viewBox="0 0 288.000000 320.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,320.000000) scale(0.100000,-0.100000)"
fill="var(--font-color)" stroke="none">
<path d="M1537 3186 c-169 -61 -249 -241 -178 -401 25 -57 99 -136 156 -166
25 -13 45 -26 45 -29 0 -3 -93 -74 -205 -159 -113 -85 -219 -170 -237 -189
-23 -28 -40 -37 -67 -38 -20 -1 -128 -36 -241 -77 -113 -40 -206 -73 -208 -71
-2 1 2 31 8 66 29 168 -58 321 -208 364 -100 29 -199 5 -279 -68 -75 -70 -88
-105 -88 -233 0 -131 14 -165 96 -239 28 -25 47 -46 41 -46 -6 0 -35 -23 -66
-51 -96 -88 -96 -88 -96 -569 0 -397 1 -411 20 -430 25 -25 51 -25 79 -2 17
14 21 30 23 87 l3 70 141 5 c111 4 146 9 160 21 11 9 81 57 156 108 112 75
146 93 185 97 66 8 128 -26 160 -86 23 -42 23 -51 21 -254 l-3 -210 -75 -32
c-41 -18 -81 -33 -87 -33 -10 -1 -13 39 -13 167 0 151 -2 171 -18 185 -10 10
-27 17 -38 17 -31 0 -371 -207 -391 -237 -16 -24 -19 -63 -23 -328 l-5 -300
-85 0 -85 0 -3 145 c-2 133 -4 146 -23 163 -28 22 -54 22 -79 -3 -19 -19 -20
-33 -20 -205 0 -242 -16 -225 209 -225 146 0 172 2 190 18 21 17 21 25 24 341
l2 325 105 63 c58 35 108 63 113 63 4 0 7 -173 7 -385 0 -372 1 -386 20 -405
20 -20 33 -20 1085 -20 1052 0 1065 0 1085 20 20 20 20 33 20 1042 0 1127 2
1091 -63 1211 -56 105 -112 155 -375 333 -136 92 -267 175 -292 186 -25 11
-79 22 -120 25 l-75 6 -1 61 c-1 88 -32 153 -108 224 -91 85 -200 113 -299 78z
m196 -150 c164 -125 78 -358 -118 -322 -40 8 -117 72 -141 117 -37 72 -8 167
66 217 50 34 140 28 193 -12z m323 -349 c35 -9 109 -52 237 -138 102 -68 185
-127 184 -131 -3 -11 -288 -238 -298 -238 -5 0 -64 37 -131 81 -67 45 -131 81
-142 81 -12 0 -160 -56 -330 -126 -170 -69 -316 -126 -325 -126 -25 0 -41 20
-41 51 0 23 40 56 328 272 348 260 358 267 412 278 52 10 52 10 106 -4z
m-1656 -332 c16 -8 42 -32 57 -52 25 -33 28 -44 28 -118 0 -74 -3 -85 -28
-118 -40 -53 -79 -70 -147 -65 -69 5 -115 35 -141 92 -47 103 -3 234 91 269
30 11 112 7 140 -8z m2240 -61 c52 -56 88 -134 101 -216 5 -35 8 -206 7 -382
l-3 -319 -60 0 -60 0 -5 263 c-5 244 -6 263 -24 276 -27 19 -60 18 -79 -4 -14
-16 -17 -54 -19 -277 l-3 -259 -65 1 -65 1 -6 283 c-5 299 -8 315 -56 392 -14
22 -23 40 -21 42 19 18 305 244 309 245 4 0 25 -21 49 -46z m-604 -175 c93
-63 144 -104 162 -132 l27 -40 3 -286 3 -286 -51 3 c-27 2 -63 -1 -79 -6 -15
-5 -149 -103 -297 -218 -148 -114 -288 -222 -310 -239 -34 -26 -380 -175 -406
-175 -5 0 -8 87 -8 193 0 219 -8 258 -66 326 -20 23 -57 53 -82 69 -42 24 -57
27 -137 27 -66 0 -99 -5 -124 -17 -19 -10 -36 -18 -38 -18 -1 0 -3 46 -3 103
l0 102 276 190 c172 117 284 201 295 219 15 25 26 30 61 32 28 2 147 46 333
123 160 66 294 120 298 121 5 0 69 -41 143 -91z m-944 -56 c10 -9 18 -24 18
-34 0 -21 -29 -44 -315 -239 -116 -79 -227 -157 -247 -173 l-38 -29 0 -178 0
-177 -79 -52 -78 -52 -109 3 -109 3 -3 253 c-1 156 2 269 8 293 22 81 39 89
485 250 226 81 419 147 429 148 11 1 28 -6 38 -16z m1656 -1375 l-3 -563 -980
0 -980 0 0 178 0 178 364 145 364 145 310 240 309 239 309 0 309 0 -2 -562z"/>
<path d="M2322 977 c-48 -51 -7 -107 79 -107 l49 0 0 -133 c0 -117 2 -136 18
-150 24 -22 65 -21 85 1 15 16 17 45 17 195 0 222 3 217 -133 217 -85 0 -96
-2 -115 -23z"/>
<path d="M2472 434 c-45 -31 -19 -104 37 -104 55 0 80 61 41 100 -24 24 -48
25 -78 4z"/>
<path d="M27 672 c-37 -40 -7 -102 49 -102 46 0 72 71 38 104 -21 22 -67 20
-87 -2z"/>
</g>
</svg>

                </div>
            </div>
        </div>
    </section>
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Processo de funcionamento</h1>
                            <p>Aenean nec tempor metus. Maecenas ligula dolor, commodo in imperdiet interdum, vehicula ut ex. Donec ante diam.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i class='bx bx-happy-alt'></i>
                            <strong>Pesquise</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i class='bx bx-happy-alt'></i>
                            <strong>Analise</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i class='bx bx-happy-alt'></i>
                            <strong>Discuta</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i class='bx bx-happy-alt'></i>
                            <strong>Revise</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i class='bx bx-happy-alt'></i>
                            <strong>Aprove</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i class='bx bx-happy-alt'></i>
                            <strong>Feche negócio</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Nossas pesquisas dizem</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec tempus, sem non rutrum imperdiet, lectus orci fringilla nulla, at accumsan elit eros a turpis. Ut sagittis lectus libero.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i style="color: var(--main-color);" class='bx bxs-pyramid'></i>
                            <p>Proin a neque nisi. Nam ipsum nisi, venenatis ut nulla quis, egestas scelerisque orci. Maecenas a finibus odio.</p>
                            <div class="user-image">
                                <img src="http://placehold.it/60x60" alt="">
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Alguem</h3>
                                <span>Cargo</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i style="color: var(--main-color);" class='bx bxs-pyramid'></i>
                            <p>Integer molestie aliquam gravida. Nullam nec arcu finibus, imperdiet nulla vitae, placerat nibh. Cras maximus venenatis molestie.</p>
                            <div class="user-image">
                                <img src="http://placehold.it/60x60" alt="">
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Alguem</h3>
                                <span>Cargo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i style="color: var(--main-color);" class='bx bxs-pyramid'></i>
                            <p>Quisque diam odio, maximus ac consectetur eu, auctor non lorem. Cras quis est non ante ultrices molestie. Ut vehicula et diam at aliquam.</p>
                            <div class="user-image">
                                <img src="http://placehold.it/60x60" alt="">
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Alguem</h3>
                                <span>Cargo</span>
                            </div>
                        </div>
                    </div>
                </div>
          
            </div>
        </div>
    </section>

    <section class="section colored" id="pricing-plans">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Saldos</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Trabalhamos com método de saldo em plataforma! Consiga mais rapido suas conquistas com seus saldos! <br> <br>Aceitamos as seguintes formas de depósito</p>
                    </div>
                </div>
            </div>
         

            <div class="row">
               
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">PIX</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price">Aprovação</span>
                                <span class="period">Imediato</span>
                            </div>
                            <ul class="list">
                                <li class="active">600 GB transfer</li>
                                <li class="active">Pro Design Panel</li>
                                <li>15-minute support</li>
                                <li>Unlimited Emails</li>
                                <li>24/7 Security</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="main-button">Confira</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                    <div class="pricing-item active">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Crédito</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                              
                                <span class="price">Conveniência</span>
                                <span class="period">e Flexibilidade</span>
                            </div>
                            <ul class="list">
                                <li class="active">1200 GB transfer</li>
                                <li class="active">Pro Design Panel</li>
                                <li class="active">15-minute support</li>
                                <li>Unlimited Emails</li>
                                <li>24/7 Security</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="main-button">Confira</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Boleto</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price">Aprovação</span>
                                <span class="period">em até 48h</span>
                            </div>
                            <ul class="list">
                                <li class="active">5000 GB transfer</li>
                                <li class="active">Pro Design Panel</li>
                                <li class="active">15-minute support</li>
                                <li class="active">Unlimited Emails</li>
                                <li class="active">24/7 Security</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="main-button">Confira</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="counter">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong>50+</strong>
                            <span>Marcas de carro</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-top">
                            <strong>1000+</strong>
                            <span>Clientes Felizes</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong>24h</strong>
                            <span>Funcionamento</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item">
                            <strong>26</strong>
                            <span>Estados</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Confira</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Pesquisas que comprovam nossos métodos (provisório)</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="images/blog-item-01.png" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">Ter saldos na vida e seus benefícios lucrativos</a>
                            </h3>
                            <div class="text">
                               Cras aliquet ligula dui, vitae fermentum velit tincidunt id. Praesent eu finibus nunc. Nulla in sagittis eros. Aliquam egestas augue.
                            </div>
                            <a href="#" class="main-button">Leia mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="images/blog-item-02.png" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">Conquistar sua primeira compra residencial</a>
                            </h3>
                            <div class="text">
                                Aliquam commodo ornare nisl, et scelerisque nisl dignissim ac. Vestibulum finibus urna ut velit venenatis, vel ultrices sapien mattis.
                            </div>
                            <a href="#" class="main-button">Leia mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="images/blog-item-03.png" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">Evite golpes através de tecnologias úteis</a>
                            </h3>
                            <div class="text">
                                Maecenas eu erat vitae dui convallis consequat vel gravida nulla. Vestibulum finibus euismod odio, ut tempus enim varius eu.
                            </div>
                            <a href="#" class="main-button">Leia More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section colored" id="contact-us">
        <div class="container">
                        <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Tem dúvidas?</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Nos contate através de um e-mail que nosso suporte ficará feliz de ajudá-lo!</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Mantenha contato</h5>
                    <div class="contact-text">
                        <p>Deseje suas dúvidas em nosso campo para cessá-las</p>
                        <p>Nenhum tipo de golpe ou e-mail suspeito será respondido e será contatada imediatamente para centrais da PM</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nome completo" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="E-mail desejado" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Escreva aqui sua dúvida..." required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Enviar</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2024 Nome da empresa - Design: Alessi &hearts;</p>
                </div>
            </div>
        </div>
    </footer>

  </body>
</html>
<script src="main.js"></script>
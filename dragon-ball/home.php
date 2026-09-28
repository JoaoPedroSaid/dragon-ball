<?php  
  
session_start();  
  
if (!isset($_SESSION["usuario_id"])) {  
    header("Location: login.php");  
    exit;  
}  
  
?>  
  
<!DOCTYPE html>  
<html lang="pt-BR">  
  
<head>  
  
    <meta charset="UTF-8">  
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  
    <title>Dragon Ball Archive</title>  
  
    <link rel="stylesheet" href="style.css">  

    <style>

        /* =========================================
           CARDS DA HOME
        ========================================= */

        .destaques-home {
            width: 100%;
            padding: 60px 70px 70px;
            background-color: #050b16;
            border-top: 1px solid #24334a;
        }


        .topo-destaques {
            width: 1200px;
            max-width: 100%;
            margin: 0 auto 30px;
        }


        .topo-destaques span {
            display: block;

            color: #ffb900;

            font-size: 12px;
            font-weight: 800;

            letter-spacing: 3px;
        }


        .topo-destaques h2 {
            margin-top: 12px;
            margin-bottom: 10px;

            color: #ffffff;

            font-size: 34px;
            font-weight: 900;

            font-style: italic;
            letter-spacing: 1px;
        }


        .topo-destaques p {
            margin: 0;

            color: #aeb7c5;

            font-size: 14px;
            line-height: 1.6;
        }


        /* =========================================
           CARDS
        ========================================= */

        .cards-destaques {
            width: 1200px;
            max-width: 100%;

            margin: 0 auto;

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;
        }


        .card-destaque {
            min-height: 190px;

            padding: 25px;

            background-color: #0d1626;

            border: 1px solid #24334a;

            border-radius: 10px;

            transition: 0.3s ease;
        }


        .card-destaque:hover {
            transform: translateY(-5px);

            border-color: #ffb900;

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        }


        .card-destaque > span {
            display: block;

            color: #647187;

            font-size: 10px;
            font-weight: bold;

            letter-spacing: 2px;
        }


        .card-destaque h3 {
            margin-top: 18px;
            margin-bottom: 12px;

            color: #ffffff;

            font-size: 20px;
            font-weight: 900;

            font-style: italic;

            line-height: 1.2;
        }


        .card-destaque p {
            margin: 0;

            color: #aeb7c5;

            font-size: 13px;

            line-height: 1.6;
        }


        .linha-destaque {
            width: 40px;
            height: 2px;

            margin-top: 20px;

            background-color: #ffb900;
        }

    </style>
  
</head>  
  
<body>  
  
    <header class="cabecalho">  
  
        <div class="logo">  
            🐉 DRAGON BALL ARCHIVE  
        </div>  
  
        <nav>  
  
            <a href="home.php">  
                Início  
            </a>  
  
            <a href="personagens.php">  
                Personagens  
            </a>  
  
            <a href="tecnicas.php">  
                Técnicas  
            </a>  
  
            <a href="transformacoes.php">  
                Transformações  
            </a>  
  
            <a href="sagas.php">  
                Sagas  
            </a>  
  
        </nav>  
  
        <div class="usuario">  
  
            Olá,  
            <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>  
  
            <a href="logout.php">  
                Sair  
            </a>  
  
        </div>  
  
    </header>  
  
  
    <main class="home">  
  
        <!-- HERO -->  
  
        <section  
            class="hero"  
            style="background-image:  
                linear-gradient(  
                    90deg,  
                    rgba(3, 8, 18, 0.98) 0%,  
                    rgba(3, 8, 18, 0.85) 30%,  
                    rgba(3, 8, 18, 0.35) 60%,  
                    rgba(3, 8, 18, 0.05) 100%  
                ),  
                url('fundo-home.png');"  
        >  
  
            <div class="hero-conteudo">  
  
                <span>  
                    DRAGON BALL ARCHIVE  
                </span>  
  
                <h1>  
                    EXPLORE O UNIVERSO  
                    <br>  
                    DRAGON BALL  
                </h1>  
  
                <p>  
                    Descubra personagens, técnicas, transformações  
                    e histórias que marcaram o universo Dragon Ball.  
                </p>  
  
                <a  
                    href="personagens.php"  
                    class="botao"  
                >  
                    EXPLORAR PERSONAGENS  
                </a>  
  
            </div>  
  
        </section>  
  
  
        <!-- REGISTROS EM DESTAQUE -->  
  
        <section class="destaques-home">  
  
            <div class="topo-destaques">  
  
                <span>ARQUIVO DRAGON BALL</span>  
  
                <h2>  
                    REGISTROS EM DESTAQUE  
                </h2>  
  
                <p>  
                    Explore outros registros importantes do universo Dragon Ball.  
                </p>  
  
            </div>  
  
  
            <div class="cards-destaques">  
  
                <article class="card-destaque">  
  
                    <span>01</span>  
  
                    <h3>  
                        VILÕES  
                    </h3>  
  
                    <p>  
                        Conheça os principais inimigos que marcaram a história  
                        de Dragon Ball.  
                    </p>  
  
                    <div class="linha-destaque"></div>  
  
                </article>  
  
  
                <article class="card-destaque">  
  
                    <span>02</span>  
  
                    <h3>  
                        BATALHAS MEMORÁVEIS  
                    </h3>  
  
                    <p>  
                        Relembre confrontos que ficaram marcados na história  
                        do universo Dragon Ball.  
                    </p>  
  
                    <div class="linha-destaque"></div>  
  
                </article>  
  
  
                <article class="card-destaque">  
  
                    <span>03</span>  
  
                    <h3>  
                        PLANETAS  
                    </h3>  
  
                    <p>  
                        Descubra mundos importantes e lugares que fazem parte  
                        do universo Dragon Ball.  
                    </p>  
  
                    <div class="linha-destaque"></div>  
  
                </article>  
  
  
                <article class="card-destaque">  
  
                    <span>04</span>  
  
                    <h3>  
                        CURIOSIDADES  
                    </h3>  
  
                    <p>  
                        Encontre informações e fatos interessantes sobre  
                        personagens e acontecimentos.  
                    </p>  
  
                    <div class="linha-destaque"></div>  
  
                </article>  
  
            </div>  
  
        </section>  
  
    </main>  
  
</body>  
  
</html>

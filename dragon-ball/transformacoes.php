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

    <title>Transformações - Dragon Ball Archive</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<header class="cabecalho">

    <div class="logo">
        🐉 DRAGON BALL ARCHIVE
    </div>

    <nav>

        <a href="home.php">Início</a>

        <a href="personagens.php">Personagens</a>

        <a href="tecnicas.php">Técnicas</a>

        <a href="transformacoes.php">Transformações</a>

        <a href="sagas.php">Sagas</a>

    </nav>

    <div class="usuario">

        Olá,
        <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>

        <a href="logout.php">
            Sair
        </a>

    </div>

</header>


<main class="pagina-transformacoes">


    <section class="topo-transformacoes">

        <span>
            DRAGON BALL ARCHIVE
        </span>

        <h1>
            TRANSFORMAÇÕES
        </h1>

        <p>
            Conheça algumas das principais transformações do universo Dragon Ball.
        </p>

    </section>


    <section class="cards-transformacoes">


        <article class="card-transformacao">

            <span class="numero-card">
                01
            </span>

            <h2>
                SUPER SAIYAJIN
            </h2>

            <p>
                Uma transformação lendária dos Saiyajins que aumenta
                consideravelmente a força e o poder de luta do usuário.
            </p>

            <div class="card-informacao">

                <strong>
                    PRINCIPAL USUÁRIO
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


        <article class="card-transformacao">

            <span class="numero-card">
                02
            </span>

            <h2>
                SUPER SAIYAJIN 2
            </h2>

            <p>
                Uma evolução do Super Saiyajin que aumenta ainda mais
                o poder do guerreiro e apresenta descargas elétricas.
            </p>

            <div class="card-informacao">

                <strong>
                    PRINCIPAL USUÁRIO
                </strong>

                <span>
                    Gohan
                </span>

            </div>

        </article>


        <article class="card-transformacao">

            <span class="numero-card">
                03
            </span>

            <h2>
                SUPER SAIYAJIN 3
            </h2>

            <p>
                Uma transformação avançada conhecida pelo enorme
                aumento de poder e pelos longos cabelos dourados.
            </p>

            <div class="card-informacao">

                <strong>
                    PRINCIPAL USUÁRIO
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


        <article class="card-transformacao">

            <span class="numero-card">
                04
            </span>

            <h2>
                SUPER SAIYAJIN DEUS
            </h2>

            <p>
                Uma transformação que permite ao Saiyajin utilizar
                o poder divino, apresentando cabelos vermelhos.
            </p>

            <div class="card-informacao">

                <strong>
                    PRINCIPAL USUÁRIO
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


        <article class="card-transformacao">

            <span class="numero-card">
                05
            </span>

            <h2>
                SUPER SAIYAJIN BLUE
            </h2>

            <p>
                Uma transformação que combina o poder do Super Saiyajin
                com o poder divino, representada pelos cabelos azuis.
            </p>

            <div class="card-informacao">

                <strong>
                    PRINCIPAL USUÁRIO
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


        <article class="card-transformacao">

            <span class="numero-card">
                06
            </span>

            <h2>
                INSTINTO SUPERIOR
            </h2>

            <p>
                Um estado que permite ao corpo reagir aos ataques
                de maneira extremamente rápida e automática.
            </p>

            <div class="card-informacao">

                <strong>
                    PRINCIPAL USUÁRIO
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


    </section>


</main>


</body>

</html>

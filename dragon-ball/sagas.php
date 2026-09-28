<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$sql = "SELECT * FROM sagas ORDER BY id ASC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sagas - Dragon Ball Archive</title>

    <link rel="stylesheet" href="style.css">

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


<main class="pagina-sagas">


    <section class="topo-sagas">

        <span>
            DRAGON BALL ARCHIVE
        </span>

        <h1>
            SAGAS
        </h1>

        <p>
            Explore os principais acontecimentos da história
            de Dragon Ball em ordem cronológica.
        </p>

    </section>


    <section class="cards-sagas">


        <?php if ($resultado->num_rows > 0): ?>


            <?php while ($saga = $resultado->fetch_assoc()): ?>


                <article class="card-saga">


                    <div class="imagem-saga">

                        <?php if (!empty($saga["imagem"])): ?>

                            <img
                                src="<?php echo htmlspecialchars($saga["imagem"]); ?>"
                                alt="<?php echo htmlspecialchars($saga["nome"]); ?>"
                            >

                        <?php else: ?>

                            <div class="sem-imagem">
                                SEM IMAGEM
                            </div>

                        <?php endif; ?>

                    </div>


                    <div class="conteudo-saga">


                        <span class="numero-saga">

                            ARQUIVO
                            <?php echo str_pad($saga["id"], 2, "0", STR_PAD_LEFT); ?>

                        </span>


                        <span class="serie-saga">

                            <?php echo htmlspecialchars($saga["serie"]); ?>

                        </span>


                        <h2>

                            <?php echo htmlspecialchars($saga["nome"]); ?>

                        </h2>


                        <div class="linha-saga"></div>


                        <p>

                            <?php echo htmlspecialchars($saga["descricao"]); ?>

                        </p>


                    </div>


                </article>


            <?php endwhile; ?>


        <?php else: ?>


            <div class="nenhuma-saga">

                <h2>
                    Nenhuma saga encontrada.
                </h2>

                <p>
                    As sagas aparecerão aqui quando forem cadastradas.
                </p>

            </div>


        <?php endif; ?>


    </section>


</main>


</body>

</html>


<?php

$conexao->close();

?>

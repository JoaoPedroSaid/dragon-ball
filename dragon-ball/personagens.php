<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$sql = "SELECT * FROM personagens ORDER BY id DESC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personagens - Dragon Ball Archive</title>

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



    <main class="pagina-personagens">

        <section class="topo-personagens">

            <span>
                DRAGON BALL ARCHIVE
            </span>

            <h1>
                PERSONAGENS
            </h1>

            <p>
                Explore os personagens do universo Dragon Ball.
            </p>

        </section>


        <section class="lista-personagens">

            <?php if ($resultado->num_rows > 0): ?>


                <?php while ($personagem = $resultado->fetch_assoc()): ?>


                    <article class="card-personagem">

                        <div class="imagem-personagem">

                            <?php if (!empty($personagem["imagem"])): ?>

                                <img
                                    src="<?php echo htmlspecialchars($personagem["imagem"]); ?>"
                                    alt="<?php echo htmlspecialchars($personagem["nome"]); ?>"
                                >

                            <?php else: ?>

                                <div class="sem-imagem">
                                    SEM IMAGEM
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="info-personagem">

                            <h2>
                                <?php echo htmlspecialchars($personagem["nome"]); ?>
                            </h2>

                            <p>
                                <strong>Raça:</strong>
                                <?php echo htmlspecialchars($personagem["raca"]); ?>
                            </p>

                            <p>
                                <strong>Planeta:</strong>
                                <?php echo htmlspecialchars($personagem["planeta_origem"]); ?>
                            </p>

                            <a
                                href="personagem.php?id=<?php echo $personagem["id"]; ?>"
                                class="botao"
                            >
                                VER PERFIL
                            </a>

                        </div>

                    </article>


                <?php endwhile; ?>


            <?php else: ?>

                <div class="nenhum-personagem">

                    <h2>
                        Nenhum personagem encontrado.
                    </h2>

                    <p>
                        Os personagens aparecerão aqui quando forem cadastrados.
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

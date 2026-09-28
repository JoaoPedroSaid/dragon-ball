<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$sql = "SELECT * FROM tecnicas ORDER BY id ASC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Técnicas - Dragon Ball Archive</title>

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

        <a href="logout.php">Sair</a>

    </div>

</header>


<main class="pagina-tecnicas">


    <!-- CABEÇALHO DA PÁGINA -->

    <section class="banner-tecnicas">

        <div class="conteudo-banner">

            <span>DRAGON BALL ARCHIVE</span>

            <h1>TÉCNICAS</h1>

            <p>
                Conheça as técnicas e habilidades que marcaram
                o universo Dragon Ball.
            </p>

        </div>

    </section>


    <!-- FILTROS -->

    <section class="filtros-tecnicas">

        <div class="campo-busca">

            <input
                type="text"
                placeholder="Pesquisar técnica..."
            >

        </div>

        <div class="categorias-tecnicas">

            <button> TODAS </button>
            <button> ENERGIA </button>
            <button> ATAQUE </button>
            <button> AMPLIFICAÇÃO </button>

        </div>

    </section>


    <!-- LISTA DE TÉCNICAS -->

    <section class="lista-tecnicas">


        <?php if ($resultado->num_rows > 0): ?>


            <?php while ($tecnica = $resultado->fetch_assoc()): ?>


                <article class="card-tecnica">


                    <!-- IMAGEM -->

                    <div class="imagem-tecnica">

                        <?php if (!empty($tecnica["imagem"])): ?>

                            <img
                                src="<?php echo htmlspecialchars($tecnica["imagem"]); ?>"
                                alt="<?php echo htmlspecialchars($tecnica["nome"]); ?>"
                            >

                        <?php else: ?>

                            <div class="sem-imagem">
                                SEM IMAGEM
                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- CONTEÚDO -->

                    <div class="conteudo-tecnica">


                        <div class="cabecalho-tecnica">

                            <span class="numero-tecnica">

                                <?php
                                echo str_pad(
                                    $tecnica["id"],
                                    2,
                                    "0",
                                    STR_PAD_LEFT
                                );
                                ?>

                            </span>

                            <span class="tipo-tecnica">

                                <?php
                                echo htmlspecialchars(
                                    strtoupper($tecnica["tipo"])
                                );
                                ?>

                            </span>

                        </div>


                        <h2>

                            <?php
                            echo htmlspecialchars($tecnica["nome"]);
                            ?>

                        </h2>


                        <p>

                            <?php
                            echo htmlspecialchars($tecnica["descricao"]);
                            ?>

                        </p>


                        <div class="dados-tecnica">

                            <div>

                                <strong>Usuários</strong>

                                <span>
                                    <?php
                                    echo htmlspecialchars(
                                        $tecnica["usuarios"]
                                    );
                                    ?>
                                </span>

                            </div>


                            <div>

                                <strong>Tipo</strong>

                                <span>
                                    <?php
                                    echo htmlspecialchars(
                                        $tecnica["tipo"]
                                    );
                                    ?>
                                </span>

                            </div>

                        </div>


                        <a
                            href="#"
                            class="botao-ver-tecnica"
                        >
                            VER TÉCNICA
                        </a>


                    </div>


                </article>


            <?php endwhile; ?>


        <?php else: ?>


            <div class="nenhuma-tecnica">

                <h2>Nenhuma técnica encontrada.</h2>

                <p>
                    As técnicas aparecerão aqui quando forem cadastradas
                    no banco de dados.
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

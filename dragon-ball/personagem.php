<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: personagens.php");
    exit;
}

$sql = "SELECT * FROM personagens WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header("Location: personagens.php");
    exit;
}

$personagem = $resultado->fetch_assoc();


// A IA agora é chamada por JavaScript para o arquivo ia/gerar_ia.php.
// O resultado é exibido no bloco de relatório sem recarregar a página.
$texto_ia = null;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        <?php echo htmlspecialchars($personagem["nome"]); ?>
        - Dragon Ball Archive
    </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<header class="cabecalho">

    <div class="logo">
        DRAGON BALL ARCHIVE
    </div>


    <nav>

        <a href="home.php">
            INÍCIO
        </a>

        <a href="personagens.php">
            PERSONAGENS
        </a>

        <a href="tecnicas.php">
            TÉCNICAS
        </a>

        <a href="transformacoes.php">
            TRANSFORMAÇÕES
        </a>

        <a href="sagas.php">
            SAGAS
        </a>

    </nav>


    <div class="usuario">

        <span>
            <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>
        </span>

        <a href="logout.php">
            SAIR
        </a>

    </div>

</header>


<main class="arquivo-personagem">


    <section class="cabecalho-personagem">

        <div class="codigo-arquivo">

            ARQUIVO Nº
            <?php echo str_pad($personagem["id"], 4, "0", STR_PAD_LEFT); ?>

        </div>


        <div class="status-arquivo">

            ● ARQUIVO ATIVO

        </div>

    </section>



    <section class="personagem-principal">


        <div class="personagem-imagem">

            <img
                src="<?php echo htmlspecialchars($personagem["imagem"]); ?>"
                alt="<?php echo htmlspecialchars($personagem["nome"]); ?>"
            >

        </div>



        <div class="personagem-dados">

            <span class="categoria-personagem">

                REGISTRO DE PERSONAGEM

            </span>


            <h1>

                <?php echo htmlspecialchars($personagem["nome"]); ?>

            </h1>


            <p class="descricao-arquivo">

                DADOS IDENTIFICADOS NO ARQUIVO OFICIAL
                DO DRAGON BALL ARCHIVE.

            </p>


            <div class="dados-grid">


                <div class="dado">

                    <strong>
                        RAÇA
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["raca"]); ?>
                    </p>

                </div>


                <div class="dado">

                    <strong>
                        PLANETA DE ORIGEM
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["planeta_origem"]); ?>
                    </p>

                </div>


                <div class="dado">

                    <strong>
                        TÉCNICA PRINCIPAL
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["tecnica_principal"]); ?>
                    </p>

                </div>


                <div class="dado">

                    <strong>
                        TRANSFORMAÇÃO
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["transformacao"]); ?>
                    </p>

                </div>


            </div>

        </div>

    </section>



    <section class="estatisticas-personagem">


        <div class="titulo-secao">

            <span>
                ANÁLISE DE COMBATE
            </span>

            <h2>
                CAPACIDADE DO GUERREIRO
            </h2>

        </div>


        <div class="estatisticas-grid">


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>PODER</strong>

                    <span>95%</span>

                </div>

                <div class="barra">

                    <div style="width: 95%;"></div>

                </div>

            </div>


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>TÉCNICA</strong>

                    <span>90%</span>

                </div>

                <div class="barra">

                    <div style="width: 90%;"></div>

                </div>

            </div>


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>VELOCIDADE</strong>

                    <span>88%</span>

                </div>

                <div class="barra">

                    <div style="width: 88%;"></div>

                </div>

            </div>


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>RESISTÊNCIA</strong>

                    <span>92%</span>

                </div>

                <div class="barra">

                    <div style="width: 92%;"></div>

                </div>

            </div>


        </div>

    </section>



    <section class="recursos-personagem">


        <div class="titulo-secao">

            <span>
                RECURSOS DO ARQUIVO
            </span>

            <h2>
                ANÁLISE INTELIGENTE
            </h2>

        </div>


        <div class="recursos-grid">


            <!-- RECURSO 01 -->

            <button type="button" class="recurso" data-acao="descricao">

                <span class="numero-recurso">
                    01
                </span>

                <strong>
                    GERAR DESCRIÇÃO
                </strong>

                <small>
                    Criar uma descrição detalhada do personagem.
                </small>

            </button>


            <!-- RECURSO 02 -->

            <button type="button" class="recurso" data-acao="tecnica">

                <span class="numero-recurso">
                    02
                </span>

                <strong>
                    EXPLICAR TÉCNICA
                </strong>

                <small>
                    Descobrir como funciona sua principal técnica.
                </small>

            </button>


            <!-- RECURSO 03 -->

            <button type="button" class="recurso" data-acao="curiosidade">

                <span class="numero-recurso">
                    03
                </span>

                <strong>
                    GERAR CURIOSIDADE
                </strong>

                <small>
                    Encontrar uma curiosidade sobre o personagem.
                </small>

            </button>


            <!-- RECURSO 04 -->

            <button type="button" class="recurso" data-acao="historia">

                <span class="numero-recurso">
                    04
                </span>

                <strong>
                    EXPLICAR HISTÓRIA
                </strong>

                <small>
                    Gerar um resumo da trajetória do personagem.
                </small>

            </button>


        </div>



        <div class="resultado-ia">


            <div class="resultado-topo">

                <span>
                    RELATÓRIO DO ARQUIVO
                </span>

                <span>
                    AI-ARCHIVE
                </span>

            </div>


            <div class="resultado-conteudo" id="resultado-ia-conteudo">

                <p id="texto-resultado-ia">
                    Selecione um dos recursos acima para gerar uma análise deste personagem.
                </p>

            </div>


        </div>


    </section>



    <a href="personagens.php" class="voltar-arquivo">

        ← VOLTAR PARA O ARQUIVO DE PERSONAGENS

    </a>


</main>


<script>
    const botoesIA = document.querySelectorAll(".recurso[data-acao]");
    const resultadoIA = document.getElementById("texto-resultado-ia");
    const idPersonagem = <?php echo (int) $personagem["id"]; ?>;

    botoesIA.forEach((botao) => {
        botao.addEventListener("click", async () => {
            const acao = botao.dataset.acao;

            botoesIA.forEach((item) => {
                item.disabled = true;
            });

            resultadoIA.textContent = "Analisando personagem...";

            try {
                const dados = new FormData();
                dados.append("id", idPersonagem);
                dados.append("acao", acao);

                const resposta = await fetch("ia/gerar_ia.php", {
                    method: "POST",
                    body: dados
                });

                const resultado = await resposta.json();

                if (!resposta.ok || !resultado.sucesso) {
                    throw new Error(resultado.mensagem || "Não foi possível gerar a análise.");
                }

                resultadoIA.textContent = resultado.texto;
            } catch (erro) {
                resultadoIA.textContent = "Erro: " + erro.message;
            } finally {
                botoesIA.forEach((item) => {
                    item.disabled = false;
                });
            }
        });
    });
</script>

</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criar conta - Dragon Ball Archive</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main 
        class="tela-cadastro"
        style="background-image:
            linear-gradient(
                rgba(3, 8, 18, 0.70),
                rgba(3, 8, 18, 0.85)
            ),
            url('fundo-formulario.png');"
    >

        <div class="cadastro-box">

            <h1>DRAGON BALL ARCHIVE</h1>

            <h2>COMECE SUA VIAGEM</h2>

            <p>Crie sua conta para explorar o universo Dragon Ball.</p>

            <form action="salvar_usuario.php" method="POST">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit">
                    CRIAR CONTA
                </button>

            </form>

            <a href="login.php" class="logar">
                LOGAR
            </a>

            <a href="index.php" class="voltar">
                VOLTAR
            </a>

        </div>

    </main>

</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Dragon Ball Archive</title>

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

            <h2>ENTRE NA SUA CONTA</h2>

            <p>
                Continue sua viagem pelo universo Dragon Ball.
            </p>

            <form action="autenticar.php" method="POST">

                <label for="usuario">Usuário</label>

                <input
                    type="text"
                    id="usuario"
                    name="usuario"
                    required
                >

                <label for="senha">Senha</label>

                <input
                    type="password"
                    id="senha"
                    name="senha"
                    required
                >

                <button type="submit">
                    ENTRAR
                </button>

            </form>

            <a href="cadastro_usuario.php" class="voltar">
                Ainda não tenho uma conta
            </a>

        </div>

    </main>

</body>

</html>

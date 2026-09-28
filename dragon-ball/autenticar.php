<?php

session_start();

require_once "conexao.php";

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE usuario = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("s", $usuario);

$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {

    $dados = $resultado->fetch_assoc();

    if (password_verify($senha, $dados["senha"])) {

        $_SESSION["usuario_id"] = $dados["id"];
        $_SESSION["usuario_nome"] = $dados["nome"];
        $_SESSION["usuario"] = $dados["usuario"];

        header("Location: home.php");
        exit;

    } else {

        echo "Senha incorreta.";

    }

} else {

    echo "Usuário não encontrado.";

}

$stmt->close();
$conexao->close();

?>

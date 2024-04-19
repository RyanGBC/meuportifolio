<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo 'cxnome' não está vazio
    if (!empty($_POST["cxnome,cxemail,cxtelefone"])) {
        include_once "factory/conexao.php";

        // Limpa e valida os dados recebidos do formulário
        $nome = mysqli_real_escape_string($conn, $_POST["cxnome"]);
        $email = mysqli_real_escape_string($conn, $_POST["cxemail"]);
        $telefone = mysqli_real_escape_string($conn, $_POST["cxtelefone"]);

        // Prepara e executa a consulta SQL usando prepared statements
        $sql = "INSERT INTO tbdadosportifolio (nome, email, telefone) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $telefone);
            if (mysqli_stmt_execute($stmt)) {
                echo "Dados gravados com sucesso!";
            } else {
                echo "Erro ao gravar os dados: " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "Erro na preparação da consulta SQL: " . mysqli_stmt_error($stmt);
        }

        // Fecha a conexão com o banco de dados
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Dados não cadastrados, campo 'nome' está vazio.";
    }
}
?>

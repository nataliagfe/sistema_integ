<?php
session_start(); 
include_once("conexao.php");


$turma = $_SESSION['turma'];
$materia = $_SESSION['materia'];

if (!isset($turma) || !isset($materia)) {
    die("Erro: As variáveis turma ou materia não foram encontradas.");
}

$consulta = mysqli_query($conexao, "SELECT Cod_aluno, Nome_aluno
                                    FROM Aluno
                                    WHERE Cod_turma = '$turma' ORDER BY Nome_aluno");

if (!$consulta) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="notas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="body">
    <nav id="menu">
        <div id="icones">
            <i class="bi bi-list"></i>
        </div>
        <ul>
            <li class="item">
                <a href="pagina_professor.html">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="texto">Home</span>
                </a>
            </li>
            <li class="item">
                <a href="alunos.html">
                    <span class="icon"><i class="bi bi-people-fill"></i></span>
                    <span class="texto">Alunos</span>
                </a>
            </li>
            <li class="item">
                <a href="conta.html">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="texto">Conta</span>
                </a>
            </li>
            <li class="item">
                <a href="index.html">
                    <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                    <span class="texto">Sair</span>
                </a>
            </li>
        </ul>
    </nav>
    <div id="fundo">
        <div id="formulario">
            <h1>Alterar Notas</h1>
            <form action="alteracao.php" method="post">
                <label for="select">Selecione o nome do aluno: </label>
                <select name="aluno" required>
                    <?php
                    while ($linha = mysqli_fetch_array($consulta)) {
                        echo "<option value='" . $linha['Cod_aluno'] . "'>" . $linha['Nome_aluno'] . "</option>";
                    }
                    ?>
                </select>
                <label for="nota">Correção da Nota: </label>
                <input type="text" id="novaNota" name="novaNota" required >
                <input type="submit" id="entrar" name="entrar" value="Alterar">
            </form>
        </div>
    </div>
</body>
</html>

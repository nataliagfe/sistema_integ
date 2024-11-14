<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento - Seleção de Turma e Aluno</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="notas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="body">
    <nav id="menu">
        <div id="icones">
            <i class="bi bi-list"></i>
        </div>
        <ul>
            <li class="item">
                <a href="logado.html">
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
            <h1>Seleção de Turma e Aluno</h1>
            <form action="acesso_aluno.php" method="post">
                <label for="turma">Selecione o seu nome: </label>
                <select name="cod_aluno" id="aluno" onchange="carregarAlunos(this.value)">
                    <option value="">Selecione seu nome </option>
                    <?php
                    include_once("conexao.php");

                    $turma = $_POST["turma"];
                    $consulta = mysqli_query($conexao, "SELECT Cod_aluno, Nome_aluno FROM Aluno WHERE Cod_turma = '$turma' ORDER BY Cod_aluno");

                    while ($linha = mysqli_fetch_array($consulta)) {
                        echo "<option value='" . $linha['Cod_aluno'] . "'>" . $linha['Nome_aluno'] . "</option>";
                    }
                    ?>
                </select>

                <input type="submit" id="entrar" name="entrar" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>
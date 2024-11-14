<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="alunos.css">
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
            <h1>Presença</h1>
            <form action="presenca_table.php" method="post">
    <label for="select">Selecione o número da turma: </label>
    <select name="turma">
        <?php
        include_once("conexao.php");
        $consulta = mysqli_query($conexao, "SELECT Cod_turma, Num_turma FROM Turma ORDER BY Cod_turma");
        while ($linha = mysqli_fetch_array($consulta)) {
            echo "<option value='" . $linha['Cod_turma'] . "'>" . $linha['Num_turma'] . "</option>";
        }
        ?>
    </select>

    <label for="select">Selecione a matéria: </label>
    <select name="materia">
        <?php
        include_once("conexao.php");
        $consulta = mysqli_query($conexao, "SELECT Cod_materia, Nome_materia FROM Materia ORDER BY Cod_materia");
        while ($linha = mysqli_fetch_array($consulta)) {
            echo "<option value='" . $linha['Cod_materia'] . "'>" . $linha['Nome_materia'] . "</option>";
        }
        ?>
    </select>

    <input type="submit" id="entrar" name="entrar" value="Entrar">
</form>

        </div>
    </div>
</body>
</html>

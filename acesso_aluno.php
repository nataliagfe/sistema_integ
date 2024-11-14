<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas e Presença do Aluno</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="alunos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            background-color: #f1f1f1;
        }

        th {
            background-color: #4682B4;
            color: white;
        }
    </style>
</head>

<body>
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

    <div id="fundo2">
        <?php
        include_once("conexao.php");

        $cod_aluno = $_POST["cod_aluno"];

        // Consulta as informações do aluno
        $consulta_aluno = "SELECT a.Nome_aluno, a.Serie, t.Num_turma
                   FROM Aluno a
                   JOIN Turma t ON a.Cod_turma = t.Cod_turma
                   WHERE a.Cod_aluno = '$cod_aluno'";
        $resultado_aluno = mysqli_query($conexao, $consulta_aluno) or die(mysqli_error($conexao));
        $aluno = mysqli_fetch_assoc($resultado_aluno);

        echo "<h2 align='center'>Informações do Aluno: " . $aluno['Nome_aluno'] . "</h2>";
        echo "<p align='center'>Série: " . $aluno['Serie'] . " | Turma: " . $aluno['Num_turma'] . "</p>";

        // Consulta as matérias, notas e presenças
        $consulta_materias = "
    SELECT m.Nome_materia, 
           n.Nota, 
           COUNT(p.Cod_presenca) AS presencas
    FROM Materia m
    LEFT JOIN Nota n ON n.Cod_materia = m.Cod_materia AND n.Cod_aluno = '$cod_aluno'
    LEFT JOIN Presenca p ON p.Cod_aluno = '$cod_aluno' AND p.Cod_materia = m.Cod_materia AND p.Presenca = '1'
    GROUP BY m.Nome_materia, n.Nota
";

        $resultado_materias = mysqli_query($conexao, $consulta_materias) or die(mysqli_error($conexao));

        echo "<table>
        <tr>
            <th>Matéria</th>
            <th>Nota</th>
            <th>Presenças</th>
        </tr>";

        while ($linha = mysqli_fetch_assoc($resultado_materias)) {
            $materia = $linha['Nome_materia'];
            $nota = $linha['Nota'] ?? 'Não lançada';  // Verifica se há nota registrada
            $presencas = $linha['presencas'] ?? 0;  // Caso não haja presenças registradas, assume 0

            echo "<tr>
            <td>$materia</td>
            <td>$nota</td>
            <td>$presencas</td>
          </tr>";
        }

        echo "</table>";
        ?>

    </div>
</body>

</html>
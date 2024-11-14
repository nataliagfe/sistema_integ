<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento - Inserir Notas</title>
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar se há notas a serem salvas
            if (isset($_POST['nota'])) {
                $notas = $_POST['nota'];
                $turma = $_POST['turma'];
                $materia = $_POST['materia'];

                foreach ($notas as $cod_aluno => $nota) {
                    // Sanitizar a nota
                    $nota = mysqli_real_escape_string($conexao, $nota);
                    $cod_aluno = mysqli_real_escape_string($conexao, $cod_aluno);


                    if (!is_numeric($nota) || $nota < 0 || $nota > 100) {
                        echo "Nota inválida para o aluno com código $cod_aluno. A nota não será salva.<br>";
                        continue;
                    }


                    $consulta_nota = "INSERT INTO Nota ( Nota, Cod_aluno, Cod_turma, Cod_Materia) VALUES ( '$nota','$cod_aluno', '$turma', '$materia')";

                    if (mysqli_query($conexao, $consulta_nota)) {
                        echo "Nota do aluno $cod_aluno salva com sucesso!<br>";
                    } else {
                        echo "Erro ao salvar a nota do aluno $cod_aluno: " . mysqli_error($conexao) . "<br>";
                    }
                }
            } else {
                echo "Nenhuma nota foi recebida para ser salva.<br>";
            }
        } else {
            echo "Método inválido para essa requisição.<br>";
        }

        mysqli_close($conexao);
        ?>
    </div>
</body>

</html>
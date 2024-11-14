<?php
session_start();
include_once("conexao.php");

$_SESSION['turma'] = $_POST['turma'];
$_SESSION['materia'] = $_POST['materia'];

$turma = $_SESSION['turma'];
$materia = $_SESSION['materia'];

$consulta = "SELECT Aluno.Cod_aluno as 'codigo', Aluno.Nome_aluno as 'nome'
             FROM Aluno
             WHERE Aluno.Cod_turma = '$turma'
             ORDER BY Aluno.Nome_aluno";

$resultado = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));

?>


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

    <div id="fundo2">
        <?php
        include_once("conexao.php");

        
        $turma = $_POST["turma"];
        $materia = $_POST["materia"];

        
        $consulta = "SELECT Aluno.Cod_aluno as 'codigo', Aluno.Nome_aluno as 'nome'
                     FROM Aluno
                     WHERE Aluno.Cod_turma = '$turma'
                     ORDER BY Aluno.Nome_aluno";

        $resultado = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));

        echo "
        <style>
            table {
                width: 70%;
                border-collapse: collapse;
                margin: 20px auto;
                font-family: Arial, sans-serif;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
                background-color: #f1f1f1; 
            }
            th {
                background-color: #4682B4;
                color: white;
            }
                #entrar2{
                    position: absolute;
                    top: 92.5%;
                    width: 20%;
                    margin-left: 64%;
                    padding: 10px;
                    background-color: #3498db;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                }
                #entrar2 a{
                    color: white;
                    text-decoration: none;
                }
                
        </style>
        ";
        $turma = $_POST["turma"];
        $materia = $_POST["materia"];

        echo "<form action='salvar_notas.php' method='POST'>";
        echo "<input type='hidden' name='turma' value='$turma'>";
        echo "<input type='hidden' name='materia' value='$materia'>";

        echo "<table height='20%' width='70%' align='center' border='2'>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Nota</th>
                </tr>";

        while ($linha = mysqli_fetch_array($resultado)) {
            $cod_aluno = $linha['codigo'];
            $nome_aluno = $linha['nome'];

            echo "<tr>
                    <td valign='middle' align='center'>$cod_aluno</td>
                    <td valign='middle' align='center'>$nome_aluno</td>
                    <td valign='middle' align='center'>
                        <input type='text' name='nota[$cod_aluno]' value='' placeholder='Digite a nota'>
                    </td>
                  </tr>";
        }

        echo "</table><br>";
        echo "<button type='submit' id='entrar'>Salvar Notas</button>";
        echo "</form>";
        echo "<button type='submit' id='entrar2'><a href='alterar_notas.php'>Alterar Notas</a></button>";
        ?>
    </div>
</body>

</html>
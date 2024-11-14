<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento - Marcar Presença</title>
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
        <?php
        include_once("conexao.php");

        $materia = $_POST['materia'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['presenca']) && !empty($_POST['presenca'])) {
                // Percorre os alunos cujas presenças foram marcadas
                foreach ($_POST['presenca'] as $cod_aluno) {
                    // Aqui registramos uma presença (presença '1') para o aluno
                    $data_presenca = date('Y-m-d H:i:s');  // Data e hora atual

                    // Insere um novo registro de presença para o aluno
                    $inserir_presenca = "INSERT INTO Presenca (Presenca, Cod_aluno, Data_presenca, Cod_materia) 
                                 VALUES ('1', '$cod_aluno', '$data_presenca', '$materia')";
                    $resultado_inserir = mysqli_query($conexao, $inserir_presenca);

                    if (!$resultado_inserir) {
                        die("Erro ao registrar presença: " . mysqli_error($conexao));
                    }
                }

                // Caso contrário, se nenhum aluno foi marcado
                echo "<table height = '90%' align = 'center' border = '0'><tr><td valign = 'middle' align = 'center'>
                <font size = '5'>Presença registrada com sucesso!</font><br>";
            } else {
                echo "<table height = '90%' align = 'center' border = '0'><tr><td valign = 'middle' align = 'center'>
                <font size = '5'>Não foram selecionados alunos!</font><br>";
            }
        }
        ?>
    </div>
</body>

</html>
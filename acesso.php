<?php
// REVISADO - OK
include_once("conexao.php");
session_start();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script language="javascript">
            function sucesso(url){
                setTimeout("window.location='" + url + "'", 2000);
            }
            function failed(){
                setTimeout("window.location='aviso.html'", 2000);
            }
        </script>
    </head>
    <body>
        <?php
            if (isset($_POST['login']) && isset($_POST['senha'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha'];

                $consulta = mysqli_query($conexao, "SELECT * FROM Usuario WHERE Login = '$login' AND Senha = '$senha'") or die (mysqli_error($conexao));
                $linhas = mysqli_num_rows($consulta);

                if ($linhas == 0) {
                    echo "<br><br><br><br><br><br><p align='center'>Por favor aguarde&hellip;</p>";
                    echo "<script language='javascript'>failed()</script>";
                } else {
                    $usuario = mysqli_fetch_assoc($consulta);
                    $_SESSION["usuario"] = $usuario["Login"];
                    $_SESSION["password"] = $usuario["Senha"];

                    // Verifica o tipo de usuário e redireciona para a página correta
                    if ($usuario["Login"] == "Professor") {
                        // Se for Professor, redireciona para a página do professor
                        echo "<br><br><br><br><br><br><p align='center'>Por favor aguarde&hellip;</p>";
                        echo "<script language='javascript'>sucesso('pagina_professor.html')</script>";
                    } elseif ($usuario["Login"] == "Aluno") {
                        // Se for Aluno, redireciona para a página do aluno
                        echo "<br><br><br><br><br><br><p align='center'>Por favor aguarde&hellip;</p>";
                        echo "<script language='javascript'>sucesso('pagina_aluno.html')</script>";
                    } else {
                        // Caso o tipo de usuário seja desconhecido
                        echo "<br><br><br><br><br><br><p align='center'>Tipo de usuário desconhecido. Tente novamente.</p>";
                        echo "<script language='javascript'>failed()</script>";
                    }
                }
            } else {
                // Caso o formulário não tenha sido enviado corretamente
                echo "<br><br><br><br><br><br><p align='center'>Por favor, preencha os campos de login e senha.</p>";
                echo "<script language='javascript'>failed()</script>";
            }
        ?>
    </body> 
</html>

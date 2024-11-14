<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento</title>
    <link rel="stylesheet" href="urna.css">
    <script>
        // Protege o código da página
        document.onmousedown = function(event) {
            if (event.button === 2 || event.button === 3) {
                alert('Indisponível');
            }
        };
        
        // Impede o uso do botão "Voltar"
        function noBack() {
            window.history.forward();
        }
        window.onload = noBack;
        window.onpageshow = function(evt) {
            if (evt.persisted) noBack();
        };
        window.onunload = function() {
            void(0);
        };
    </script>
</head>
<body>
    <div id="fundo2">
        <div id="conteudo">
            <iframe name="conteudo" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>
        </div>
    </div>
</body>
</html>

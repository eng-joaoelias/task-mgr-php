<?php 
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = array();
}

if (isset($_POST['nome-tarefa'])) {
    array_push($_SESSION['tarefas'], $_POST['nome-tarefa']);
    unset($_POST['nome-tarefa']);
}

if (isset($_POST['apagar'])) {
    unset($_SESSION['tarefas']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador de Tarefas</title>
</head>

<body>
    <main>
        <div class="container">
            <header class="header">
                <h1>Gerenciador de Tarefas</h1>
            </header>

            <div class="form">
                <form action="" method="post">
                    <label for="nome-tarefa">Tarefa:</label>
                    <input type="text" name="nome-tarefa" id="nome-tarefa" placeholder="Nome da Tarefa">
                    <input type="submit" value="Adicionar" class="button">
                </form>
            </div>

            <div class="separador">

            </div>

            <div class="lista-tarefas">
                    <?php 
                    if (isset($_SESSION['tarefas'])) {
                        echo "<ul>";
                        foreach ($_SESSION['tarefas'] as $key => $tarefa) {
                            echo "<li>$tarefa</li>";
                        }
                        echo "</ul>";
                    }
                    ?>
            </div>
            <form action="" method="post">
                <input type="hidden" name="apagar" value="apagar">
                <input type="submit" value="Limpar Tarefas" class="button apaga">
            </form>
        </div>
    </main>

    <footer class="footer">
        <p>Desenvolvido por João Elias Ferraz Santana</p>
    </footer>
</body>

</html>

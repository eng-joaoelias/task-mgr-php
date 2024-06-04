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
    unset($_POST['apagar']);
}

if (isset($_POST['key'])) {
    array_splice($_SESSION['tarefas'], $_POST['key'], 1);
    unset($_POST['key']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    $scriptName = $_SERVER['SCRIPT_NAME'];
                    $scriptUrl = "http://".$_SERVER['HTTP_HOST'].$scriptName;
                    
                    if (isset($_SESSION['tarefas'])) {
                        echo "<ul>";
                        foreach ($_SESSION['tarefas'] as $key => $tarefa) {
                            //ao lado da tarefa, existira um btn de lixeira pra excluir a tarefa
                            //ao clicar no botao de remover a tarefa, aparecera uma janela no
                            //topo do navegador solicitando a confirmação de exclusao
                            echo "<li>
                                <span>$tarefa</span>
                                <form action='' method='post' style='display:inline;'>
                                    <input type='hidden' name='key' value='$key'>
                                    <button type='submit' class='apaga' onclick='return confirm(\"Deseja realmente remover essa tarefa?\")'>
                                        <i class='fa fa-trash' aria-hidden='true'></i>
                                    </button>
                                </form>
                            </li>";
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

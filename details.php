<?php
session_start();

if (isset($_GET['key']) && is_numeric($_GET['key'])) {
    $key = (int)$_GET['key'];
    if (isset($_SESSION['tarefas'][$key])) {
        $tarefa = $_SESSION['tarefas'][$key];
        /*
        echo "<h1>Detalhes da Tarefa</h1>";
        echo "<p><strong>Nome:</strong> " . htmlspecialchars($tarefa['nome-tarefa']) . "</p>";
        echo "<p><strong>Descrição:</strong> " . htmlspecialchars($tarefa['descricao-tarefa']) . "</p>";
        echo "<p><strong>Data:</strong> " . htmlspecialchars($tarefa['data-tarefa']) . "</p>";
        */
    } else {
        $_SESSION['mensagem'] = 'Tarefa não encontrada.';
        /*echo "<p>Tarefa não encontrada.</p>";*/
    }
} else {
    /*echo "<p>Índice de tarefa inválido.</p>";*/
    $_SESSION['mensagem'] = 'Índice de tarefa inválido.';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Detalhes da Tarefa</title>
</head>

<body>
    <main class="container-detalhes">

        <header class="header">
            <h1>
                <?php
                echo htmlspecialchars($tarefa['nome-tarefa']);
                ?>
            </h1>
        </header>

        <div class="linha">

            <div class="detalhes">
                <dl>
                    <dt>
                        Descrição da Tarefa:
                    </dt>
                    <dd>
                        <?php echo htmlspecialchars($tarefa['descricao-tarefa']);?>
                    </dd>

                    <dt>
                        Data da Tarefa:
                    </dt>
                    <dd>
                        <?php echo htmlspecialchars($tarefa['data-tarefa']);?>
                    </dd>
                </dl>
            </div>

            <div class="imagem">
                <img src="uploads/<?php echo $tarefa['imagem-tarefa'];?>" alt="Foto da Tarefa">
            </div>

        </div>

    </main>

    <footer class="footer">
        <p>Desenvolvido por João Elias Ferraz Santana</p>
    </footer>
</body>

</html>

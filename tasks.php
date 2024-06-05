<div class="lista-tarefas">
    <?php
    if (isset($_SESSION['tarefas']) && is_array($_SESSION['tarefas'])) {
        echo "<ul>";
        foreach ($_SESSION['tarefas'] as $key => $tarefa) {
            echo "<li>
                <a href=\"details.php?key=$key\" target=\"_blank\">" . htmlspecialchars($tarefa['nome-tarefa']) . "</a>
                <form action='' method='post' style='display:inline;'>
                    <input type='hidden' name='key' value='$key'>
                    <button type='submit' class='apaga rmv-tarefa' onclick='return confirm(\"Deseja realmente remover essa tarefa?\")'>
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

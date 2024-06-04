<div class="form">
    <form action="" method="post">
        <label for="nome-tarefa">Tarefa:</label>
        <input type="text" name="nome-tarefa" id="nome-tarefa" placeholder="Nome da Tarefa">
        <input type="submit" value="Adicionar" class="button">
    </form>

    <?php 
        if (isset($_SESSION['mensagem'])) {
            echo "<p style='color: #f00;' id='msg-erro'>" . $_SESSION['mensagem'] . "</p>";
            unset($_SESSION['mensagem']);
        }
    ?>
</div>

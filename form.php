<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome-tarefa">Tarefa:</label>
        <input type="text" name="nome-tarefa" id="nome-tarefa" placeholder="Nome da Tarefa">
        <label for="nome-tarefa">Descrição:</label>
        <input type="text" name="descricao-tarefa" id="descricao-tarefa" placeholder="Descrição da Tarefa">
        <label for="data-tarefa">Data:</label>
        <input type="date" name="data-tarefa" id="data-tarefa">
        <label for="imagem-tarefa">Imagem:</label>
        <input type="file" name="imagem-tarefa" id="imagem-tarefa">
        <input type="submit" value="Adicionar" class="button">
    </form>

    <?php 
        if (isset($_SESSION['mensagem'])) {
            echo "<p style='color: #f00;' id='msg-erro'>" . $_SESSION['mensagem'] . "</p>";
            unset($_SESSION['mensagem']);
        }
    ?>
</div>

<?php
session_start();

if (!isset($_SESSION['tarefas']) || !is_array($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nome-tarefa']) && isset($_POST['descricao-tarefa']) && isset($_POST['data-tarefa'])) {

        if ($_POST['nome-tarefa'] != "") {

            $nome_arquivo = '';

            if (isset($_FILES['imagem-tarefa']) && $_FILES['imagem-tarefa']['error'] == UPLOAD_ERR_OK) {

                $extensao = strtolower(pathinfo($_FILES['imagem-tarefa']['name'], PATHINFO_EXTENSION));
                $nome_arquivo = md5(date('Y.m.d.H.i.s')) . '.' . $extensao;
                $diretorio = 'uploads/';

                if (move_uploaded_file($_FILES['imagem-tarefa']['tmp_name'], $diretorio . $nome_arquivo)) {
                    $nome_arquivo = $diretorio . $nome_arquivo; // Adiciona o caminho completo
                } else {
                    $nome_arquivo = ''; // Se o upload falhar, define como string vazia
                }
            }

            $dados = [
                'nome-tarefa' => $_POST['nome-tarefa'],
                'descricao-tarefa' => $_POST['descricao-tarefa'],
                'data-tarefa' => $_POST['data-tarefa'],
                'imagem-tarefa' => $nome_arquivo
            ];

            array_push($_SESSION['tarefas'], $dados);
            unset($_POST['nome-tarefa']);
            unset($_POST['descricao-tarefa']);
            unset($_POST['data-tarefa']);
            unset($_POST['imagem-tarefa']);
        } else {
            $_SESSION['mensagem'] = "Preencha o nome da tarefa!";
        }
    }

    if (isset($_POST['apagar'])) {
        unset($_SESSION['tarefas']);
        unset($_POST['apagar']);
    }

    if (isset($_POST['key'])) {
        array_splice($_SESSION['tarefas'], $_POST['key'], 1);
        unset($_POST['key']);
    }

    // Redireciona para evitar a duplicação no recarregamento da página
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Carregar o template HTML
include 'template.php';

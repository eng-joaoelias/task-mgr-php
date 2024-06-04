<?php 
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome-tarefa'])) {
        if ($_POST['nome-tarefa'] != "") {
            array_push($_SESSION['tarefas'], $_POST['nome-tarefa']);
            unset($_POST['nome-tarefa']);
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

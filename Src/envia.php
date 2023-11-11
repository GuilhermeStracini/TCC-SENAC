<?php

if (!isset($_POST) || !isset($_POST['nome']) || !isset($_POST['email'])) {
    header('Location: index.html');
    exit();
}

$filters = array(
    'nome' => FILTER_SANITIZE_STRING,
    'email' => FILTER_SANITIZE_EMAIL,
    'encontrou' => FILTER_SANITIZE_STRING,
    'assunto' => FILTER_SANITIZE_STRING,
    'mensagem' => FILTER_SANITIZE_STRING
);
$revised = filter_var_array($_POST, $filters);
$br = "<br />";
$msg = "<strong>Nome: </strong>" . $revised["nome"] . $br;
$msg .= "<strong>E-mail: </strong>" . $revised["email"] . $br;
$msg .= "<strong>Como encontrou o site: </strong>" .
    $revised["encontrou"] . $br;
$msg .= "<strong>Assunto: </strong>" . $revised["assunto"] . $br;
$msg .= "<strong>Mensagem: </strong>" . $revised["mensagem"] . $br;

$mensagem = $msg;
$remetente = $revised["email"];
$destinatario = "contato.TurmaNT@zerocool.com.br";
$assunto = "Canoagem - " . $revised["assunto"];

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "From: contato.TurmaNT@zerocool.com.br\r\n";
$headers .= "Return-Path: contato.TurmaNT@zerocool.com.br\r\n";

if (!mail($destinatario, $assunto, $mensagem, $headers)) {
    echo "Falha no envio da mensagem!";
} else {
    header("Location: obrigado.html");
}

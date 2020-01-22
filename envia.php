<?php
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$encontrou = $_POST['encontrou'];
	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];

	$msg = "<strong>Nome: </strong>" . $nome . "<br />";
	$msg .= "<strong>E-mail: </strong>" . $email . "<br />";
	$msg .= "<strong>Como encontrou o site: </strong>" . $encontrou . "<br />";
	$msg .= "<strong>Assunto: </strong>" . $assunto . "<br />";
	$msg .= "<strong>Mensagem: </strong>" . $mensagem . "<br />";

	$mensagem = $msg;
	$remetente = $email;
	$destinatario = "contato.TurmaNT@zerocool.com.br";
	$assunto = "Canoagem - ".$assunto;
	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: contato.TurmaNT@zerocool.com.br\r\n"; 				//Colocar aqui o e-mail existente no provedor
	$headers .= "Return-Path: contato.TurmaNT@zerocool.com.br\r\n";			//Colocar aqui o e-mail existente no provedor
	if(!mail($destinatario,$assunto,$mensagem,$headers)) echo "Falha no envio da mensagem!";
	else header("Location: obrigado.html");
?>
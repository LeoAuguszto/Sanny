<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 18/04/2018
 * Time: 08:55
 */

require_once("../_class/class.phpmailer.php");

/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");

$nome           = $_POST['newsNome'] . " " . $_POST['newsSobrenome'];
$empresa        = $_POST['newsEmpresa'];
$mail           = $_POST['newsEmail'];
$assunto        = $nome . " da empresa " . $empresa . " quer assinar nossa newsletter no email " . $mail;
$corpo          = "
                <strong>Nome </strong> $nome <br>
                <strong>Empresa </strong> $empresa <br>
                <strong>E-mail </strong> $mail <br>
";

$mail = new PHPMailer(true);

$mail->IsSMTP();

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$email_remetente = 'webmaster@strapet.com.br';
$email_reply = 'webmaster-return@strapet.com.br';
$email_destino = 'newsletter@strapet.com.br';



try{
    $mail->Host = 'smtp.strapet.com.br';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = $email_remetente;
    $mail->Password = 'stptwmaster30';

    //Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->SetFrom($email_remetente, 'Webmaster'); //Seu e-mail
    $mail->AddReplyTo($email_reply, 'Webmaster'); //Seu e-mail
    $mail->Subject = $assunto;//Assunto do e-mail


    //Define os destinatário(s)
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($email_destino, 'Newsletter');

    //Campos abaixo são opcionais
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
    //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
    //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo

    $mail->MsgHTML($corpo);

    $mail->Send();
    echo "E-mail enviado. Em breve você receberá nossas novidades!".$quebra_linha;



} catch (phpmailerException $ex){
    echo $ex->errorMessage();
}

//    if($_SERVER["REQUEST_METHOD"] == "POST"){
//        if(isset($_POST['btnNews'])){
//
//            /* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
//            if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
//            elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
//            else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
//
//            $nome           = $_POST['newsNome'] . " " . $_POST['newsSobrenome'];
//            $empresa        = $_POST['newsEmpresa'];
//            $mail           = $_POST['newsEmail'];
//            $assunto        = $nome . " da empresa " . $empresa . " quer assinar nossa newsletter no email " . $mail;
//            $corpo          = "
//                <strong>Nome </strong> $nome
//                <strong>Empresa </strong> $empresa
//                <strong>E-mail </strong> $mail
//            ";
//
//            $email_remetente = 'webmaster@strapet.com.br';
////            $email_remetente = 'bgarciamoura@gmail.com';
//            $email_reply = 'webmaster-return@strapet.com.br';
////            $email_destino = 'bgarciamoura@gmail.com';
////            $email_destino = 'rafael_lopes7@hotmail.com';
////            $email_destino = 'bgarciamoura@hotmail.com';
////            $email_destino = 'newsletter@strapet.com.br';
//            $email_destino = 'webmaster@strapet.com.br';
//
//
//            $headers = "MIME-Version: 1.1".$quebra_linha;
//            $headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
//            $headers .= 'From: Contato <'.$email_remetente.'>' . $quebra_linha;
//            $headers .= "Return-Path: Teste Suporte <".$email_reply.">".$quebra_linha;
//            $headers .= 'Reply-To: '.$email_reply.$quebra_linha;
//
////            mail('newsletter@strapet.com.br', $assunto, $corpo, $headers, 'From: webmaster@strapet.com.br');
//            mail($email_destino, $assunto, $corpo, $headers, '-f'.$email_remetente);
//        }
//    }
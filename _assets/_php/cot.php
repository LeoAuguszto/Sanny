<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 23/04/2018
 * Time: 17:13
 */

require_once("../_class/class.phpmailer.php");

/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");


$produto        = $_POST['cotProduto'];
$medida         = $_POST['cotMedidaCaixa'];
$qntCaixa       = $_POST['cotQntPorCaixa'];
$quantidade     = $_POST['cotQuantidade'];
$empresa        = $_POST['cotEmpresa'];
$CNPJ           = $_POST['cotCNPJ'];
$tel            = $_POST['cotTel'];
$contatoEmail   = $_POST['cotEmail'];
$msg            = $_POST['cotMsg'];

$assunto        = "Cotação do " . $produto;
$corpo          = "
                <strong>Solicitante: </strong> $empresa <br>
                <strong>Solicita: </strong> $produto <br>
                <hr><br>
                <strong>DADOS DA EMPRESA</strong>  <br>
                <strong>Nome Fantasia: </strong> $empresa <br>
                <strong>CNPJ: </strong> $CNPJ <br>
                <hr><br>
                <strong>DADOS PARA CONTATO</strong>  <br>
                <strong>Nome do Contato: </strong> $empresa <br>
                <strong>E-mail do Contato: </strong> $contatoEmail <br>
                <strong>Telefone do Contato: </strong> $tel <br>
                <hr><br>
                <strong>DADOS DO PRODUTO</strong>  <br>
                <strong>Produto: </strong> $produto <br>
                <strong>Medida: </strong> $medida <br>
                <strong>Quantidade por caixa: </strong> $qntCaixa <br>
                <strong>Quantidade do produto: </strong> $quantidade <br>
                <hr><br>
                <strong>MENSAGEM: </strong> $msg <br>
";

$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->CharSet='UTF-8';
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$email_remetente = 'webmaster@strapet.com.br';
$email_reply = 'webmaster-return@strapet.com.br';
$email_destino = 'cotacao@strapet.com.br';



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
    $mail->AddAddress($email_destino, 'Assistente');

    //Campos abaixo são opcionais
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
    //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
    //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo

    $mail->MsgHTML($corpo);

    $mail->Send();
    echo "E-mail enviado. Em breve responderemos seu e-mail!".$quebra_linha;



} catch (phpmailerException $ex){
    echo $ex->errorMessage();
}
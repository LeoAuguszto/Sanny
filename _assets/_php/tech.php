<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 23/04/2018
 * Time: 16:08
 */


require_once("../_class/class.phpmailer.php");

/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");


$option         = $_POST['tipoAssis'];
$razao          = $_POST['tecRazao'];
$fantasia       = $_POST['tecFantasia'];
$CNPJ           = $_POST['tecCNPJ'];
$cep            = $_POST['tecCEP'];
$rua            = $_POST['tecRua'];
$numero         = $_POST['tecNumero'];
$bairro         = $_POST['tecBairro'];
$cidade         = $_POST['tecCidade'];
$UF             = $_POST['selUfAssis'];
$contatoNome    = $_POST['tecContato'];
$contatoEmail   = $_POST['tecEmail'];
$tel            = $_POST['tecTel'];
$maquinas       = $_POST['tecMaquinas'];
$quantidade     = $_POST['tecQntd'];
$msg            = $_POST['tecMsg'];



$assunto        = $option;
$corpo          = "
                <strong>Solicitante: </strong> $contatoNome <br>
                <strong>Solicita: </strong> $option <br>
                <hr><br>
                <strong>DADOS DA EMPRESA</strong>  <br>
                <strong>Razão Social: </strong> $razao <br>
                <strong>Nome Fantasia: </strong> $fantasia <br>
                <strong>CNPJ: </strong> $CNPJ <br>
                <strong>Endereço: </strong> $rua, $numero, $bairro, $cidade, $UF, $cep <br>
                <hr><br>
                <strong>DADOS PARA CONTATO</strong>  <br>
                <strong>Nome do Contato: </strong> $contatoNome <br>
                <strong>E-mail do Contato: </strong> $contatoEmail <br>
                <strong>Telefone do Contato: </strong> $tel <br>
                <hr><br>
                <strong>DADOS DAS MAQUINAS</strong>  <br>
                <strong>Maquinas: </strong> $maquinas <br>
                <strong>Quantidade de maquinas: </strong> $quantidade <br>
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
$email_destino = 'assistencia@strapet.com.br';



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

<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mail = new PHPMailer(true);

if(isset($_POST['btnEnviar'])){

    $dir = 'uploads/';
    // Dados da empresa e do colaborador
    $razaoSocial = $_POST['razao-social'];
    $CNPJouCAEPF = $_POST['CNPJouCAEPF'];
    $emailEmpresa = $_POST['email-empresa'];
    $telefoneEmpresa = $_POST['telefone-empresa'];
    $nomeCompletoColaborador = $_POST['nome-completo-colaborador'];

    if(isset($_FILES['upload-ficha-registro'])){
        $uploadFichaRegistro = $_FILES['upload-ficha-registro']['name'];
        $atestadosMedicos = $_FILES['upload-atestado-medico']['tmp_name'];
        move_uploaded_file($_FILES['upload-ficha-registro']['tmp_name'], $dir.$uploadFichaRegistro);
    }


    // Dados do Atestado
    $dataAtestado = $_POST['data-atestado'];
    $cid = $_POST['cid'];
    $horaAtendimento = $_POST['hora-atendimento'];
    $quantidadeDiasTratamento = $_POST['quantidade-dias-tratamento'];
    $houveInternacao = isset($_POST['houve-internacao']) ? $_POST['houve-internacao'] : null;

    if(isset($_FILES['upload-atestado-medico'])){
        $uploadAtestadoMedico = $_FILES['upload-atestado-medico']['name'];
        move_uploaded_file(implode("", $_FILES['upload-atestado-medico']['tmp_name']), $dir.$uploadAtestadoMedico);
    }

    // Dados do Médico
    $nomeMedico = $_POST['nome-medico'];
    $CRMMedico = $_POST['CRM-medico'];
    $CPFMedico = $_POST['CPF-medico'];
    $dataNascimentoMedico = $_POST['data-nascimento-medico'];

    // Dados para CAT
    $dataAcidente = $_POST['data-acidente'];
    $horaAcidente = $_POST['hora-acidente'];
    $quantidadeHorasTrabalhadas = $_POST['quantidade-horas-trabalhadas'];
    $policiaComunicada = isset($_POST['policia-comunicada']) ? $_POST['policia-comunicada'] : null;
    $houveObito = isset($_POST['houve-obito']) ? $_POST['houve-obito'] : null;
    $dataObito = $_POST['data-obito'];
    $tipoAmbiente = $_POST['tipo-ambiente'];
    $localAcidente = $_POST['local-acidente'];
    $CEP = isset($_POST['CEP']) ? $_POST['CEP'] : null;
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $descricaoAcidente = $_POST['descricao-acidente'];
    $numeroProtocolo = date("mdY").mt_rand();

    try{

        // Configuração inicial do servidor de email
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->CharSet = 'utf-8';
        $mail->Encoding = 'base64';                                        
        $mail->Host       = 'smtp.mailtrap.io';
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '9dec5ba2f4e1c4';                     
        $mail->Password   = '96250c105ec055';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                               
        $mail->Port       = 2525;

        
        $mail->setFrom($emailEmpresa, $razaoSocial);
        $mail->addAddress('jn.e-social@hotmail.com', 'JN');

        $mail->addAttachment($dir. $uploadFichaRegistro);

        $totalAtestadosMedicos = count($_FILES['upload-atestado-medico']['tmp_name']);
        for($i = 0; $i < $totalAtestadosMedicos; $i++){
            $mail->addAttachment($atestadosMedicos[$i], $uploadAtestadoMedico[$i]);
        }

        $mail->isHTML(true);
        $mail->Subject = 'CAT para envio da '. $razaoSocial;

        $mail->Body = '';

        $mail->send();
        echo "<script> alert('Requisição realizada com sucesso.\\nGuarde seu número de protocolo: '+ $numeroprotocolo); </script>";
        echo "<script> window.location = './cat.php'; </script>";

    } catch (Exception $e){
        echo $e->getMessage();
    }
}

?>
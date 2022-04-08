<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mail = new PHPMailer(true);

if(isset($_POST['btnEnviar'])){

    function formatarData($data){
        if($data == ""){
            return "Sem data";
        } else {
            return date("d-m-Y", strtotime($data));
        }
    }

    $dir = 'uploads/';
    // Dados da empresa e do colaborador
    $razaoSocial = $_POST['razao-social'];
    $CNPJouCAEPF = $_POST['CNPJouCAEPF'];
    $emailEmpresa = $_POST['email-empresa'];
    $telefoneEmpresa = $_POST['telefone-empresa'];
    $nomeCompletoColaborador = $_POST['nome-completo-colaborador'];

    if(isset($_FILES['upload-ficha-registro'])){
        $uploadFichaRegistro = $_FILES['upload-ficha-registro']['name'];
        move_uploaded_file($_FILES['upload-ficha-registro']['tmp_name'], $dir.$uploadFichaRegistro);
    }


    // Dados do Atestado
    $dataAtestado = formatarData($_POST['data-atestado']);
    $cid = $_POST['cid'];
    $horaAtendimento = $_POST['hora-atendimento'];
    $quantidadeDiasTratamento = $_POST['quantidade-dias-tratamento'];
    $houveInternacao = $_POST['houve-internacao'];
    

    if(isset($_FILES['upload-atestado-medico'])){
        move_uploaded_file(implode("", $_FILES['upload-atestado-medico']['tmp_name']), $dir.$uploadAtestadoMedico);
    }

    // Dados do Médico
    $nomeMedico = $_POST['nome-medico'];
    $CRMMedico = $_POST['CRM-medico'];
    $CPFMedico = $_POST['CPF-medico'];
    $dataNascimentoMedico = formatarData($_POST['data-nascimento-medico']);

    // Dados para CAT
    $dataAcidente = formatarData($_POST['data-acidente']);
    $horaAcidente = $_POST['hora-acidente'];
    $quantidadeHorasTrabalhadas = $_POST['quantidade-horas-trabalhadas'];
    $policiaComunicada = $_POST['policia-comunicada'];
    $houveObito = $_POST['houve-obito'];
    $dataObito = formatarData($_POST['data-obito']);
    $tipoAmbiente = $_POST['tipo-ambiente'];
    $localAcidente = $_POST['local-acidente'];
    $CEP = $_POST['cep'];
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
        $mail->Username   = '68d10f5d5df184';                     
        $mail->Password   = '2571d69a982f5e';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                               
        $mail->Port       = 2525;

        
        $mail->setFrom($emailEmpresa, $razaoSocial);
        $mail->addAddress('jn.e-social@hotmail.com', 'JN - eSocial');

        $mail->addAttachment($dir. $uploadFichaRegistro);

        $uploadAtestadoMedico = $_FILES['upload-atestado-medico']['name'];
        $totalAtestadosMedicos = count($_FILES['upload-atestado-medico']['tmp_name']);
        $atestadosMedicos = $_FILES['upload-atestado-medico']['tmp_name'];
        for($i = 0; $i < $totalAtestadosMedicos; $i++){
            $mail->addAttachment($_FILES['upload-atestado-medico']['tmp_name'][$i], $_FILES['upload-atestado-medico']['name'][$i]);
        }

        $mail->isHTML(true);
        $mail->Subject = 'CAT para envio da '. $razaoSocial . ' ('. $CNPJouCAEPF. ')';

        $mail->Body = '<p><br> Você recebeu uma CAT da '. $razaoSocial . ' para ser transmitido. Confira os dados: </p><br><br>'
                    .'<p><b> Número de protocolo: </b>'. $numeroProtocolo . '</p><br>'
                    .'<p><b> Nome Completo do Colaborador: </b>'. $nomeCompletoColaborador. '</p><br>'
                    .'<h3> Dados do Atestado Médico </h3><br>'
                    .'<p><b> Data do Atestado: </b>'. $dataAtestado . '</p><br>'
                    .'<p><b> CID: </b>'. $cid . '</p><br>'
                    .'<p><b> Hora do Atendimento: </b>'. $horaAtendimento . '</p><br>'
                    .'<p><b> Quantidade de Dias de Tratamento: </b>'. $quantidadeDiasTratamento . ' dias </p><br>'
                    .'<p><b> Houve internação?: </b>'. $houveInternacao . '</p><br>'
                    .'<h3> Dados do Médico </h3><br>'
                    .'<p><b> Nome: </b>'. $nomeMedico . '</p><br>'
                    .'<p><b> CRM: </b>'. $CRMMedico . '</p><br>'
                    .'<p><b> CPF: </b>'. $CPFMedico . '</p><br>'
                    .'<p><b> Data Nascimento: </b>'. $dataNascimentoMedico . '</p><br>'
                    .'<h3> Dados para CAT </h3><br>'
                    .'<p><b> Data do Acidente: </b>'. $dataAcidente . '</p><br>'
                    .'<p><b> Hora do Acidente: </b>'. $horaAcidente . '</p><br>'
                    .'<p><b> Quantidade de Horas Trabalhadas: </b>'. $quantidadeHorasTrabalhadas . '</p><br>'
                    .'<p><b> A polícia foi comunicada?: </b>'. $policiaComunicada . '</p><br>'
                    .'<p><b> Houve óbito?: </b>'. $houveObito . '</p><br>'
                    .'<p><b> Data Óbito: </b>'. $dataObito . '</p><br>'
                    .'<p><b> Tipo do Ambiente: </b>'. $tipoAmbiente . '</p><br>'
                    .'<p><b> Local do Acidente: </b>'. $localAcidente . '</p><br>'
                    .'<p><b> CEP: </b>'. $CEP . '</p><br>'
                    .'<p><b> Cidade: </b>'. $cidade . '</p><br>'
                    .'<p><b> Bairro: </b>'. $bairro . '</p><br>'
                    .'<p><b> Logradouro: </b>'. $logradouro . '</p><br>'
                    .'<p><b> Número: </b>'. $numero . '</p><br>'
                    .'<p><b> Complemento: </b>'. $complemento . '</p><br>'
                    .'<p><b> Descrição do Acidente: </b>'. $descricaoAcidente . '</p><br>';

        $mail->send();
        echo "<script> alert('Requisição realizada com sucesso.\\nGuarde seu número de protocolo: '+ $numeroprotocolo); </script>";
        //echo "<script> window.location = './cat.php'; </script>";

    } catch (Exception $e){
        echo $e->getMessage();
    }
}

?>
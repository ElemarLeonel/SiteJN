<?php

  use PHPMailer\PHPMailer\PHPMailer;
  //use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require './vendor/autoload.php';

  $mail = new PHPMailer(true);

  
  try{                      
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->CharSet = 'utf-8';
  $mail->Encoding = 'base64';                                        
  $mail->Host       = 'smtp.mailtrap.io';                                   
  $mail->Username   = 'f22aac41a4eb5e';                     
  $mail->Password   = '1a8e903de3b066';                                 
  $mail->Port       = 2525;


  $razaoSocial = $_POST['razao-social'];
  $CNPJouCAEPF = $_POST['CNPJouCAEPF'];
  $nomeCompletoColaborador = $_POST['nome-completo-colaborador'];
  $CPFColaborador = $_POST['CPF-colaborador'];
  $cargoColaborador = $_POST['cargo-colaborador'];
  $RGColaborador = $_POST['RG-colaborador'];
  $dataNascimentoColaborador = date("d-m-Y", strtotime($_POST['data-nascimento-colaborador']));
  $tipoExame = $_POST['tipo-exame'];
  $examesComplementares = implode(", ", $_POST['exames-complementares']);
  $outrosExamesComplementares = $_POST['outros-exames-complementares'];
  $numeroProtocolo = date("mdY").mt_rand();

  $mail->setFrom($_POST['email-empresa'], $_POST['razao-social']);
  $mail->addAddress('elemarleonelbalduino@gmail.com', 'JN');

  $mail->isHTML(true);
  $mail->Subject = 'Exame '. $tipoExame. ' da '.$razaosocial. ' ('. $CNPJouCAEPF. ')';
  $mail->Body = 'Você recebeu um exame '. $tipoExame. ' da '.$razaoSocial. '. Confira aqui os dados: <br><br>'
                .'<strong> Número da protocolo: </strong>'. $numeroProtocolo . '<br><br>'
                .'<strong> Nome Completo do Colaborador: </strong>'. $nomeCompletoColaborador. '<br><br>'
                .'<strong> CPF: </strong>'. $CPFColaborador. '<br><br>'
                .'<strong> Cargo: </strong>'. $cargoColaborador. '<br><br>'
                .'<strong> RG: </strong>'. $RGColaborador. '<br><br>'
                .'<strong> Data de Nascimento: </strong>'. $dataNascimentoColaborador. '<br><br>'
                .'<strong> Tipo do Exame a ser Realizado: </strong>'. $tipoExame. '<br><br>'
                .'<strong> Exames Complementares: </strong>'. $examesComplementares.'<br><br>'
                .'<strong> Outros Exames Complementares: </strong>'. $outrosExamesComplementares;

  if($mail->send()){
    echo "<script> alert('Requisição realizada com sucesso.\\nGuarde seu número de protocolo: '+ $numeroprotocolo); </script>";
    echo "<script> window.location = './requisicoes.php'; </script>";
  } else {
    echo 'Requisição não realizada. Favor, verificar';
  }

} catch (Exception $e){
  echo 'Requisição não enviada. Erro Mailer: {$mail->ErrorInfo}';
}

require './_part/links.php';

?>
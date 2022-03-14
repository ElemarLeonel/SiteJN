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
  $mail->Username   = '39db1ff977b488';                     
  $mail->Password   = '4d2f1280a01ad0';                                 
  $mail->Port       = 2525;

  $examescomplementares = implode(", ", $_POST['exames-complementares']);

  $mail->setFrom($_POST['email-empresa'], $_POST['razao-social']);
  $mail->addAddress('elemarleonelbalduino@gmail.com', 'JN');

  $mail->isHTML(true);
  $mail->Subject = 'Exame '. $_POST['tipo-exame']. ' da '.$_POST['razao-social']. ' ('. $_POST['CNPJouCAEPF']. ')';
  $mail->Body = 'Você recebeu um exame '. $_POST['tipo-exame']. ' da '.$_POST['razao-social']. '. Confira aqui os dados: <br><br>'
                .'<strong> Nome Completo do Colaborador: </strong>'. $_POST['nome-completo-colaborador']. '<br><br>'
                .'<strong> CPF: </strong>'. $_POST['CPF-colaborador']. '<br><br>'
                .'<strong> Cargo: </strong>'. $_POST['cargo-colaborador']. '<br><br>'
                .'<strong> RG: </strong>'. $_POST['RG-colaborador']. '<br><br>'
                .'<strong> Data de Nascimento: </strong>'. date("d-m-Y", strtotime($_POST['data-nascimento-colaborador'])). '<br><br>'
                .'<strong> Tipo do Exame a ser Realizado: </strong>'. $_POST['tipo-exame']. '<br><br>'
                .'<strong> Exames Complementares: </strong>'. $examescomplementares;

  if($mail->send()){
    echo 'Requisição realizada com sucesso';
    header('Location: ./requisicoes.php');
  } else {
    echo 'Requisição não realizada. Favor, verificar';
  }

} catch (Exception $e){
  echo 'Requisição não enviada. Erro Mailer: {$mail->ErrorInfo}';
}

?>
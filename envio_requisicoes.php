<?php

  use PHPMailer\PHPMailer\PHPMailer;
  //use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require './vendor/autoload.php';
  use Dompdf\Dompdf;
  use Dompdf\Options;

  $mail = new PHPMailer(true);

  $razaoSocial = $_POST['razao-social'];
  $CNPJouCAEPF = $_POST['CNPJouCAEPF'];
  $emailEmpresa = $_POST['email-empresa'];
  $telefoneEmpresa = $_POST['telefone-empresa'];
  $nomeCompletoColaborador = $_POST['nome-completo-colaborador'];
  $CPFColaborador = $_POST['CPF-colaborador'];
  $cargoColaborador = $_POST['cargo-colaborador'];
  $RGColaborador = $_POST['RG-colaborador'];
  $dataNascimentoColaborador = date("d-m-Y", strtotime($_POST['data-nascimento-colaborador']));
  $tipoExame = $_POST['tipo-exame'];
  $examesComplementares = implode(", ", $_POST['exames-complementares']);
  $outrosExamesComplementares = $_POST['outros-exames-complementares'];
  $numeroProtocolo = date("mdY").mt_rand();

  if(isset($_POST['btnEnviar'])){
    try{                      
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->CharSet = 'utf-8';
      $mail->Encoding = 'base64';                                        
      $mail->Host       = 'smtp.mailtrap.io';                                   
      $mail->Username   = 'f22aac41a4eb5e';                     
      $mail->Password   = '1a8e903de3b066';                                 
      $mail->Port       = 2525;



      $mail->setFrom($emailEmpresa, $razaoSocial);
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
  } else if(isset($_POST['btnGerarPDF'])){

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $options = new Options();
    $options->set('defaultFont', 'Courier');
    $dompdf->loadHtml('<h2 style="text-align: center;"> Requisição de Exames </h2><br><br>'
                      .'<p style="font-size: 15px;"><strong> Razão Social: </strong>'. $razaoSocial . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> CNPJ / CAEPF: </strong>'. $CNPJouCAEPF . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> Email para contato: </strong>'. $emailEmpresa . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> Telefone para contato: </strong>'. $telefoneEmpresa . '</p><br><br>'
                      .'<h3><strong> Dados do Colaborador </strong><h3><br><br>'
                      .'<p style="font-size: 15px;"><strong> Nome completo do colaborador: </strong>'. $nomeCompletoColaborador. '</p><br>'
                      .'<p style="font-size: 15px;"><strong> CPF: </strong>'. $CPFColaborador . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> RG: </strong>'. $RGColaborador. '</p><br>'
                      .'<p style="font-size: 15px;"><strong> Data de Nascimento: </strong>'. $dataNascimentoColaborador . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> Tipo de Exame: </strong>'. $tipoExame . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> Exames complementares: </strong>'. $examesComplementares . '</p><br>'
                      .'<p style="font-size: 15px;"><strong> Exames complementares: </strong>'. $outrosExamesComplementares . '</p>');

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('Requisição para exame '.$tipoExame. ' da '.$razaoSocial);
  }

require './_part/links.php';

?>
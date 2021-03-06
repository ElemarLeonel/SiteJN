<?php

  use PHPMailer\PHPMailer\PHPMailer;
  //use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require './vendor/autoload.php';
  use Dompdf\Dompdf;
  use Dompdf\Options;

  $mail = new PHPMailer(true);

  // Dados da Empresa
  $razaoSocial = $_POST['razao-social'];
  $CNPJouCAEPF = $_POST['CNPJouCAEPF'];
  $emailEmpresa = $_POST['email-empresa'];
  $telefoneEmpresa = $_POST['telefone-empresa'];

  // Dados do Colaborador
  $nomeCompletoColaborador = $_POST['nome-completo-colaborador'];
  $CPFColaborador = $_POST['CPF-colaborador'];
  $cargoColaborador = $_POST['cargo-colaborador'];
  $RGColaborador = $_POST['RG-colaborador'];
  $dataNascimentoColaborador = date("d-m-Y", strtotime($_POST['data-nascimento-colaborador']));

  // Dados do Exame
  $tipoExame = $_POST['tipo-exame'];
  $examesComplementares = implode(", ", $_POST['exames-complementares']);
  $outrosExamesComplementares = $_POST['outros-exames-complementares'];
  $numeroProtocolo = date("mdY").mt_rand();

  if(isset($_POST['btnEnviar'])){
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
      $mail->addAddress('jn_saude@hotmail.com', 'JN');

      $mail->isHTML(true);
      $mail->Subject = 'Exame '. $tipoExame. ' da '.$razaosocial. ' ('. $CNPJouCAEPF. ')';
      
      $mail->Body = 'Você recebeu um exame '. $tipoExame. ' da '.$razaoSocial. '. Confira aqui os dados: <br><br>'
                    .'<b> Número da protocolo: </b>'. $numeroProtocolo . '<br><br>'
                    .'<b> Nome Completo do Colaborador: </b>'. $nomeCompletoColaborador. '<br><br>'
                    .'<b> CPF: </b>'. $CPFColaborador. '<br><br>'
                    .'<b> Cargo: </b>'. $cargoColaborador. '<br><br>'
                    .'<b> RG: </b>'. $RGColaborador. '<br><br>'
                    .'<b> Data de Nascimento: </b>'. $dataNascimentoColaborador. '<br><br>'
                    .'<b> Tipo do Exame a ser Realizado: </b>'. $tipoExame. '<br><br>'
                    .'<b> Exames Complementares: </b>'. $examesComplementares.'<br><br>'
                    .'<b> Outros Exames Complementares: </b>'. $outrosExamesComplementares;

      // Envio do email
      $mail->send();
      echo "<script> alert('Requisição realizada com sucesso.\\nGuarde seu número de protocolo: '+ $numeroprotocolo); </script>";
      echo "<script> window.location = './requisicoes.php'; </script>";
    } catch (Exception $e){
      echo 'Requisição não enviada.';
    }
    
  } else if(isset($_POST['btnGerarPDF'])){

    // Instanciar e usar a classe DOMPDF
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

    // (Opcional) Configurar o tamanho do papel e a orientação
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o HTML como PDF
    $dompdf->render();

    // Saída do PDF gerado do navegador
    $dompdf->stream('Requisição para exame '.$tipoExame. ' da '.$razaoSocial);
  }

require './_part/links.php';

?>
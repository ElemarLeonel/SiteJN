<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Meta charset -->
  <meta charset="utf-8">
  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- Page Title -->
  <title>JN - Fazer Requisições de Exames</title>

  <!-- Meta Description -->
  <meta name="description" content="Página de Requisições">
  <!-- <meta name="keywords" content="Segurança, Trabalho, Saúde, Segurança do Trabalho, Saúde do Trabalho, Trabalhador, SST, Envio dos Eventos"> -->
  <meta name="author" content="Elemar Leonel">

  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="icon" href="./img/faviconjn.png" sizes="32x32">

</head>

<body id="body">
  <?php
    require './_part/links.php';
    require './_part/navbar.php';
  ?>

  <section id="requisicoes" name="requisicoes">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
        <div class="contact-form">
          <h3 class="text-center">Faça a requisição do exame agora</h3>
          <form action="envio_requisicoes.php" method="POST">

            <div class="input-group" style="margin-bottom: 20px;">
              <div class="input-field">
                <label for="email-empresa">Email</label>
                <input type="email" name="email-empresa" id="email-empresa" placeholder="Digite o email da empresa" class="form-control" required>
              </div>
              <div class="input-field">
                <label for="telefone-empresa">Telefone</label>
                <input type="text" name="telefone-empresa" id="telefone-empresa" placeholder="Digite um telefone para contato" class="form-control" required>
              </div>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
              <div class="input-field">
                <label for="CNPJouCAEPF">CNPJ / CAEPF</label>
                <input type="text" name="CNPJouCAEPF" id="CNPJouCAEPF" placeholder="CNPJ da empresa ou CAEPF (Fazenda)" class="form-control" required minlength="12" maxlength="14">
              </div>
              <div class="input-field">
                <label for="razao-social">Razao Social ou Nome Fazenda</label>
                <input type="text" name="razao-social" id="razao-social" placeholder="Digite a razão social ou nome da fazenda" class="form-control" required>
              </div>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
              <div class="input-field">
                <label for="nome-completo-colaborador">Nome Completo</label>
                <input type="text" class="form-control" id="nome-completo-colaborador" name="nome-completo-colaborador" placeholder="Digite o nome completo do colaborador" required>
              </div>
              <div class="input-field">
                <label for="CPF-colaborador">CPF</label>
                <input type="text" class="form-control" id="CPF-colaborador" name="CPF-colaborador" placeholder="Digite o CPF do colaborador" required>
              </div>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
              <label for="cargo-colaborador">Cargo</label>
              <input type="text" class="form-control" id="cargo-colaborador" name="cargo-colaborador" placeholder="Digite o cargo do colaborador" required>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
              <div class="input-field">
                <label for="RG-colaborador">RG</label>
                <input type="text" class="form-control" id="RG-colaborador" name="RG-colaborador" placeholder="Digite o RG do colaborador" required>
              </div>
              <div class="input-field">
                <label for="data-nascimento-colaborador">Data de Nascimento</label>
                <input type="date" class="form-control" id="data-nascimento-colaborador" name="data-nascimento-colaborador" required>
              </div>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
              <label for="tipo-exame">Tipo de Exame</label>
              <select class="form-select form-control" aria-label="ASO" required id="tipo-exame" name="tipo-exame">
                <option selected disabled>Escolha uma das opções de ASO abaixo</option>
                <option value="Admissional">Admissional</option>
                <option value="Demissional">Demissional</option>
                <option value="Retorno ao Trabalho">Retorno ao Trabalho</option>
                <option value="Mudança de Função/Risco">Mudança de Função/Risco</option>
                <option value="Periódico">Periódico</option>
                <option value="Pontual">Pontual</option>
              </select>
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
              <label for="exames-complementares">Exames Complementares</label>
              <select class="form-select form-control mt-5" id="exames-complementares" name="exames-complementares[]" multiple="multiple" aria-label="Exames complementares"> required
                <option value="Sem Exames Complementares" selected>Sem Exames Complementares</option>
                <option value="Hemograma">Hemograma</option>
                <option value="Glicemia">Glicemia</option>
                <option value="Fezes (EPF)">Fezes (EPF)</option>
                <option value="Urina (EAS)">Urina (EAS)</option>
                <option value="Audiometria">Audiometria</option>
                <option value="Espirometria">Espirometria</option>
                <option value="Colinesterase Sanguínea">Colinesterase Sanguínea</option>
                <option value="Ácido Hipúrico">Ácido Hipúrico</option>
                <option value="Ácido Metil Hipúrico">Ácido Metil Hipúrico</option>
                <option value="Reticulócitos">Reticulócitos</option>
                <option value="Eletrocardiograma">Eletrocardiograma</option>
                <option value="Eletroencefalograma">Eletroencefalograma</option>
                <option value="Acuidade Visual">Acuidade Visual</option>
                <option value="Raio-X (Tórax)">Raio-X (Tórax)</option>
                <option value="Raio-X (Lombar)">Raio-X (Lombar)</option>
                <option value="Sífilis (UDRL)">Sífilis (UDRL)</option>
                <option value="Gama GT">Gama GT</option>
                <option value="Coprocultura">Coprocultura</option>
                <option value="Brucelose (Teste)">Brucelose (Teste)</option>
                <option value="TGO/TGP">TGO/TGP</option>
                <option value="Outros">Outros</option>
              </select>
            </div>

            <div class="input-group" style="margin-bottom: 20px; display: none;" id="div-outros-exames">
              <label for="outros-exames-complementares">Outros Exames Complementares</label>
              <input type="text" class="form-control" id="outros-exames-complementares" name="outros-exames-complementares" placeholder="Digite outros exames não descritos acima">
            </div>

            <div class="input-group">
              <button type="submit" class="btn btn-success pull-right" id="btnEnviar" name="btnEnviar"> Enviar Requisição </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
    require './_part/footer.php';
  ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">

    // Máscara para CPF do colaborador
    $('#CPF-colaborador').mask('000.000.000-00', {
      reverse: true,
      placeholder: '___.___.___-__'
    });

    // Máscara para Telefone da empresa
    $('#telefone-empresa').mask('(00) 00000-0000');

    // Máscara para CNPJ ou CAEPF
    $('#CNPJouCAEPF').keydown(function() {
      try {
        $('#CNPJouCAEPF').unmask();
      } catch (e) {}

      var tamanho = $('#CNPJouCAEPF').val().length;

      if (tamanho < 12) {
        $('#CNPJouCAEPF').mask('000.000.000/000-00', {
          reverse: true
        });
      } else if (tamanho >= 14) {
        $('#CNPJouCAEPF').mask('00.000.000/0000-00', {
          reverse: true
        });
      }

      var elem = this;
      setTimeout(function() {
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
      }, 0);
      // reaplico o valor para mudar o foco
      var currentValue = $(this).val();
      $(this).val('');
      $(this).val(currentValue);
    });

    //Mostrar campo escondido
    $(document).ready(function() {
      $('#div-outros-exames').hide();
      $('#exames-complementares').change(function() {
      $('#exames-complementares option:selected').each(function() {
        if($(this).val() == "Outros"){
          $('#div-outros-exames').show();
        } else {
          $('#div-outros-exames').hide();
        }
        });
      });
    });
  </script>
</body>

</html>
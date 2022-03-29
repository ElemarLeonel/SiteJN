<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Meta charset -->
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- Page Title -->
    <title>JN - Abertura de CAT</title>

    <!-- Meta Description -->
    <meta name="description" content="Página de CAT">
    <!-- <meta name="keywords" content="Segurança, Trabalho, Saúde, Segurança do Trabalho, Saúde do Trabalho, Trabalhador, SST, Envio dos Eventos"> -->
    <meta name="author" content="Elemar Leonel">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/faviconjn.ico" sizes="32x32">

    <style>
        .fieldset-form {
            margin-top: 3rem;
        }

        .legend-fieldset-form {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: #00A859;
        }

        fieldset .input-group {
            margin-bottom: 2rem;
        }
    </style>

</head>

<body id="body">
    <?php
        require './_part/links.php';
        require './_part/navbar.php';
    ?>

    <section id="cat" name="cat">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" 
            data-wow-duration="500ms" data-wow-delay="300ms">
                <div class="contact-form">
                    <h3 class="text-center">Faça a solicitação para abertura da CAT (S-2210)</h3>
                    <form action="envio_cat.php" method="POST" enctype="multipart/form-data">

                        <fieldset class="fieldset-form">
                            <legend class="legend-fieldset-form">Dados da Empresa e Colaborador</legend>
                            <div class="input-group">
                                <div class="input-field">
                                    <label for="email-empresa">Email*</label>
                                    <input type="email" name="email-empresa" id="email-empresa" 
                                    placeholder="Digite o email da empresa" class="form-control" required>
                                </div>
                                <div class="input-field">
                                    <label for="telefone-empresa">Telefone*</label>
                                    <input type="text" name="telefone-empresa" id="telefone-empresa" 
                                    placeholder="Digite um telefone para contato" class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="CNPJouCAEPF">CNPJ / CAEPF*</label>
                                    <input type="text" name="CNPJouCAEPF" id="CNPJouCAEPF" 
                                    placeholder="CNPJ da empresa ou CAEPF (Fazenda)" class="form-control" 
                                    required minlength="12" maxlength="14">
                                </div>
                                <div class="input-field">
                                    <label for="razao-social">Razao Social ou Nome Fazenda*</label>
                                    <input type="text" name="razao-social" id="razao-social" 
                                    placeholder="Digite a razão social ou nome da fazenda" class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="nome-completo-colaborador">Nome Completo*</label>
                                    <input type="text" class="form-control" name="nome-completo-colaborador" 
                                    id="nome-completo-colaborador" placeholder="Digite o nome completo do colaborador" required>
                                </div>
                                <div class="input-field">
                                    <label for="upload-ficha-registro">Ficha de Registro (atualizada)*</label>
                                    <input type="file" class="form-control" name="upload-ficha-registro" 
                                    id="upload-ficha-registro" aria-describedby="inputGroupFileAddon04" 
                                    aria-label="Upload" required accept="image/*, application/pdf">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset-form">
                            <legend class="legend-fieldset-form">Dados do Atestado Médico</legend>
                            <div class="input-group">
                                <div class="input-field">
                                    <label for="data-atestado">Data Atestado*</label>
                                    <input type="date" name="data-atestado" id="data-atestado" class="form-control" required>
                                </div>
                                <div class="input-field">
                                    <label for="cid">CID*</label>
                                    <input type="text" name="cid" id="cid" placeholder="Digite o CID descrito no atestado" 
                                    class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="hora-atendimento">Hora Atendimento*</label>
                                    <input type="text" name="hora-atendimento" id="hora-atendimento" class="form-control" 
                                    placeholder="Digite a hora do atendimento médico" required>
                                </div>
                                <div class="input-field">
                                    <label for="quantidade-dias-tratamento">Dias Tratamento*</label>
                                    <input type="number" name="quantidade-dias-tratamento" id="quantidade-dias-tratamento" 
                                    placeholder="Digite a quantidade de dias do tratamento" class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field form-check form-switch">
                                    <label class="form-check-label" for="houve-internacao">Houve internação?</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="houve-internacao" 
                                    name="houve-internacao[]">
                                </div>
                                <div class="input-field">
                                    <label for="upload-atestado-medico">Atestado Médico*</label>
                                    <input type="file" class="form-control" id="upload-atestado-medico" 
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload" required multiple 
                                    accept="image/*, application/pdf" name="upload-atestado-medico[]">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset-form">
                            <legend class="legend-fieldset-form">Dados do Médico (Atestado Médico)</legend>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="nome-medico">Nome do Médico*</label>
                                    <input type="text" name="nome-medico" id="nome-medico" placeholder="Digite o nome do médico" 
                                    class="form-control" required>
                                </div>
                                <div class="input-field">
                                    <label for="crm-medico">CRM-UF*</label>
                                    <input type="text" name="CRM-medico" id="CRM-medico" placeholder="Digite o CRM-UF do médico" 
                                    class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="CPF-medico">CPF do Médico*</label>
                                    <input type="text" name="CPF-medico" id="CPF-medico" placeholder="Digite o nome do médico" 
                                    class="form-control" required>
                                </div>
                                <div class="input-field">
                                    <label for="data-nascimento-medico">Data de Nascimento do Médico</label>
                                    <input type="date" name="data-nascimento-medico" id="data-nascimento-medico" class="form-control">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset-form">
                            <legend class="legend-fieldset-form">Dados para CAT</legend>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="data-acidente">Data do Acidente*</label>
                                    <input type="date" name="data-acidente" id="data-acidente" class="form-control" required>
                                </div>
                                <div class="input-field">
                                    <label for="hora-acidente">Hora do Acidente*</label>
                                    <input type="text" name="hora-acidente" id="hora-acidente" 
                                    placeholder="Digite a hora do acidente" class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="quantidade-horas-trabalhadas">Quantidade Horas Trabalhadas*</label>
                                    <input type="text" name="quantidade-horas-trabalhadas" id="quantidade-horas-trabalhadas" 
                                    placeholder="Digite a quantidade de horas trabalhadas antes do acidente" class="form-control" 
                                    required>
                                </div>
                                <div class="input-field form-check form-switch">
                                    <label class="form-check-label" for="policia-comunicada">A polícia foi comunicada?</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="policia-comunicada" 
                                    name="policia-comunicada">
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field form-check form-switch">
                                    <label class="form-check-label" for="houve-obito">Houve óbito?</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="houve-obito" 
                                    name="houve-obito">
                                </div>
                                <div class="input-field">
                                    <label for="data-obito" id="data-obito-label">Data do Óbito</label>
                                    <input type="date" name="data-obito" id="data-obito" class="form-control">
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="tipo-ambiente">Tipo do Ambiente*</label>
                                    <select class="form-select form-control" aria-label="ASO" required id="tipo-ambiente" 
                                    name="tipo-ambiente">
                                        <option selected disabled>Ambiente do acidente</option>
                                        <option value="Estabelecimento do empregador">Estabelecimento do empregador</option>
                                        <option value="Estabelecimento de terceiros">Estabelecimento de terceiros</option>
                                        <option value="Via pública">Via pública</option>
                                        <option value="Área rural">Área rural</option>
                                        <option value="Embarcação">Embarcação</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <label for="local-acidente">
                                        Local Acidente (Ex: Pátio, Rampa de Acesso, Posto de Trabalho...)*
                                    </label>
                                    <input type="text" name="local-acidente" id="local-acidente" 
                                    placeholder="Digite o local do acidente" class="form-control" required>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="cep">CEP*</label>
                                    <input type="text" name="cep" id="cep" placeholder="Digite o CEP do local" 
                                    class="form-control" required>
                                </div>
                                <div class="input-field">
                                    <label for="cidade">Cidade*</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" required 
                                    data-autocomplete-city>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="bairro">Bairro*</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" required 
                                    data-autocomplete-neighborhood>
                                </div>
                                <div class="input-field">
                                    <label for="logradouro">Logradouro*</label>
                                    <input type="text" name="logradouro" id="logradouro" class="form-control" 
                                    required data-autocomplete-address>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field">
                                    <label for="numero">Número</label>
                                    <input type="text" name="numero" id="numero" class="form-control">
                                </div>
                                <div class="input-field">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" name="complemento" id="complemento" class="form-control">
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field w-100">
                                    <label for="descricao-acidente">Descrição do Acidente*</label>
                                    <textarea class="form-control" name="descricao-acidente" id="descricao-acidente" 
                                    cols="30" rows="10" 
                                    placeholder="Descreva sobre o acidente com detalhes e qua(is) foram a(s) parte(s) atingida(s)." required></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="input-group d-flex justify-content-end">
                            <input type="submit" class="pull-right text-center" id="form-submit" name="btnEnviar" value="Registrar CAT">
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
    <script src="./js/jquery.autocomplete-address.min.js"></script>
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

        // Máscara para Hora Atendimento
        $('#hora-atendimento').mask('00:00');

        // Máscara para Hora Acidente
        $('#hora-acidente').mask('00:00');

        // Máscara para Hora Acidente
        $('#quantidade-horas-trabalhadas').mask('00:00');

        // Via CEP
        $('#cep').mask('00000-000');
        $('#cep').autocompleteAddress();

        // Campo Oculto
        $('#data-obito').hide();
        $('#data-obito-label').hide();
        $('#houve-obito').click(function() {
            if ($('#houve-obito').is(':checked')) {
                $('#data-obito').show();
                $('#data-obito-label').show().attr("required", "req");
            } else {
                $('#data-obito').hide();
                $('#data-obito-label').hide();
            }
        })
    </script>

</body>

</html>
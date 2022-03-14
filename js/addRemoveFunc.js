var cont = 1;
$("#adicionar-colaborador").click(function(){
  $("#addCollaborator").append(
'<div class="container-fluid" id="add' + cont + '">'
  +'<form action="./envio_requisicoes.php" method="POST">'

    + '<div class="input-group" style="margin-bottom: 20px;">'
      + '<div class="input-field">'
        + '<input type="text" class="form-control" id="nome-completo-colaborador" name="nome-completo-colaborador" placeholder="Digite o nome completo do colaborador" required>'
      + '</div>'
      + '<div class="input-field">'
        + '<input type="text" class="form-control" id="CPF-colaborador" name="CPF-colaborador" placeholder="Digite o CPF do colaborador" required>'
      + '</div>'
    + '</div>'

    + '<div class="input-group" style="margin-bottom: 20px;">'
        + '<input type="text" class="form-control" id="cargo-colaborador" name="cargo-colaborador" placeholder="Digite o cargo do colaborador" required>'
    +'</div>'

    + '<div class="input-group" style="margin-bottom: 20px;">'
      + '<div class="input-field">'
        + '<input type="number" class="form-control" id="RG-colaborador" name="RG-colaborador" placeholder="Digite o RG do colaborador" required>'
      + '</div>'
      + '<div class="input-field">'
        + '<input type="date" class="form-control" id="data-nascimento-colaborador" name="data-nascimento-colaborador" placeholder="Digite a data de nascimento do colaborador" required>'
      + '</div>'
    + '</div>'

    + '<div class="input-group" style="margin-bottom: 20px;">'

      + '<select class="form-select form-control" aria-label="ASO" required id="tipo-exame" name="tipo-exame">'
        + '<option selected disabled>Escolha uma das opções de ASO abaixo</option>'
        + '<option value="1">Admissional</option>'
        + '<option value="2">Demissional</option>'
        + '<option value="3">Retorno ao Trabalho</option>'
        + '<option value="4">Mudança de Função/Risco</option>'
        + '<option value="5">Periódico</option>'
        + '<option value="6">Pontual</option>'
      + '</select>'

      + '<select class="form-select form-control mt-5" id="exames-complementares" name="exames-complementares[]" multiple aria-label="Exames complementares"> required'
        + '<option selected disabled>Escolha uma das opções abaixo</option>'
        + '<option value="1">Hemograma</option>'
        + '<option value="2">Glicemia</option>'
        + '<option value="3">Fezes (EPF)</option>'
        + '<option value="4">Urina (EAS)</option>'
        + '<option value="5">Audiometria</option>'
        + '<option value="6">Espirometria</option>'
        + '<option value="7">Colinesterase Sanguínea</option>'
        + '<option value="8">Ácido Hipúrico</option>'
        + '<option value="9">Ácido Metil Hipúrico</option>'
        + '<option value="10">Reticulócitos</option>'
        + '<option value="11">Eletrocardiograma</option>'
        + '<option value="12">Eletroencefalograma</option>'
        + '<option value="13">Acuidade Visual</option>'
        + '<option value="14">Raio-X (Tórax)</option>'
        + '<option value="15">Raio-X (Lombar)</option>'
        + '<option value="16">Sífilis (UDRL)</option>'
        + '<option value="17">Gama GT</option>'
        + '<option value="18">Coprocultura</option>'
        + '<option value="19">Brucelose (Teste)</option>'
        + '<option value="20">TGO/TGP</option>'
      + '</select>'
    + '</div>'

    + '<div class="input-group" style="margin-bottom: 20px; display: flex; gap: 1rem;">'
      + '<button type="button" class="btn btn-success btnAdicionar id="'+ cont +'"><i class="fas fa-plus" style="padding-right: 7px;"></i>Adicionar</button>'
      + '<button type="button" class="btn btn-danger btnRemover" id="'+ cont +'"><i class="fas fa-trash-alt" style="padding-right: 7px;"></i>Remover</button>'
    + '</div>'
  + '</form>'
+ '</div>'
);
  $('#CPF-colaborador').mask('000.000.000-00', {reverse: true, placeholder: '___.___.___-__'});
});

$( "form" ).on( "click", ".btnRemover", function() {
  var button_id = $(this).attr("id");
  $('#add'+ button_id +'').remove();
});

  var nomeCompletoColaborador = document.getElementById('nome-completo-colaborador').value;
  var CPFColaborador = document.getElementById('CPF-colaborador').value.replace(/\D/g, '');
  var cargoColaborador = document.getElementById('cargo-colaborador').value;
  var RGColaborador = document.getElementById('RG-colaborador').value;
  var dataNascimentoColaborador = document.getElementById('data-nascimento-colaborador').value.toLocaleString('pt-br');
  var tipoExame = $('#tipo-exame option:selected').text();
  var examesComplementares = document.getElementById('exames-complementares');
  var itensExamesComplementares = [...examesComplementares.selectedOptions]
                                  .map(option => option.text);

$("form").on("click", ".btnAdicionar", function(){
  const mapColaborador = new Map();
  mapColaborador.set('nomeCompletoColaborador', nomeCompletoColaborador)
                .set('CPFColaborador', CPFColaborador)
                .set('cargoColaborador', cargoColaborador)
                .set('RGColaborador', RGColaborador)
                .set('dataNascimentoColaborador', dataNascimentoColaborador)
                .set('tipoExame', tipoExame)
                .set('itensExamesComplementares', itensExamesComplementares);

  mapColaborador.forEach(function(value, key) {
    console.log(key + " = " + value);
  });

})
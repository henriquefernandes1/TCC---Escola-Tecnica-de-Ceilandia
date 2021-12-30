// INÍCIO DO JAVASCRIPT DO MAPEAMENTO

$('[name="inputTipoMap"]').ready(function() {

    // ocultando todas
    $('[name="inputCodigoMapeamento"] option').css('display', 'none');
});

$('[name="inputTipoMap"]').click(function() {
    // ocultando todas
    $('[name="inputCodigoMapeamento"] option').css('display', 'none');
    // exibindo as do estado selecionado
    $('[name="inputCodigoMapeamento"] .' + $(this).val()).css('display', '');

});


$(document).on('change', '#inputCodigoMapeamento', function() {

    var option = $(this).find("option:selected");

    var orgao = option.data('orgao');
    var desc = option.data('desc');

    $('#inputOrgaoMapeamento').val(orgao);
    $('#inputDescricaoMapeamento').val(desc);

});



//FIM DO JAVASCRIPT DO MAPEAMENTO
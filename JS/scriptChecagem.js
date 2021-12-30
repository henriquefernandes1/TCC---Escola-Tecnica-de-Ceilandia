// INÍCIO DO JAVASCRIPT DO CHECAGEM

$('[name="inputTipoChecagem"]').ready(function() {

    // ocultando todas
    $('[name="inputCodigoChecagem"] option').css('display', 'none');
});

$('[name="inputTipoChecagem"]').click(function() {
    // ocultando todas
    $('[name="inputCodigoChecagem"] option').css('display', 'none');
    // exibindo as do estado selecionado
    $('[name="inputCodigoChecagem"] .' + $(this).val()).css('display', '');

});


$(document).on('change', '#inputCodigoChecagem', function() {
    var value = $(this).val();
    var option = $(this).find("option:selected");

    var orgao = option.data('orgao');

    $('#inputDescricaoChecagem').val(value);
    $('#inputOrgaoChecagem').val(orgao);

});



//FIM DO JAVASCRIPT DO CHECAGEM
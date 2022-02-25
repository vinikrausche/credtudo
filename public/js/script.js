$(document).ready(function () {
    $('#cpf').mask('000.000.000-00')
    $('#cnpj').mask('00.000.000/0001-00')
    $('#placa').mask('AAA-0A00')
    $('#ipva').mask('0')
    $('#renavam').mask('00AAAAAA-AA')
    $("#juridica").change(function (e) {
        const option = $(this).val()
        if (option == '1') {
            $('#cpf').attr('disabled', false)
            $('#cnpj').attr('disabled', true)
        } else {
            $('#cpf').attr('disabled', true)
            $('#cnpj').attr('disabled', false)
        }

    });


})
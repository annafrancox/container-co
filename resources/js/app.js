require('./bootstrap');

$(function() {
    $('.select2').select2({
        placeholder: 'Selecione'
    });
});

$('select[value]').each(function () {
    $(this).val($(this).attr('value'));
});
$('#cpf').mask('000.000.000-00');
$('#cnpj').mask('00.000.000/0000-00');
var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
},
    options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };

$('#phone').mask(behavior, options);

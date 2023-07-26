// Pagina main
// $('#btn_toggle').click(function(){
//     $('#menu_lateral').toggleClass('active');
//     $('#content').toggleClass('active');
// });

// Pagina show
$('#visualizar_anexo').click(function(e){
    e.preventDefault();
    var href = $(this).attr('href');
    $('#modal_anexo').modal('show');
    $('#modal_anexo .modal-body .img img').attr('src', href);
    $('#modal_anexo .modal-footer a').attr('href', href);
});

// function readURL(input){
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $(input).next()
//             .attr('src', e.target.result)
//         };
//         reader.readAsDataURL(input.files[0]);
//     } else {
//         var img = input.value;
//         $(input).next().attr('src', img);
//     }
// }

// Pagina index
$(document).ready(function(){
    var prioridade = $('#table_prioridade');

    if ($(prioridade).text() == 'Baixa'){
        $(prioridade).css({'font-weight':'600', 'background-color':'rgba(73, 255, 73, 0.616)'});
    } else if ($(prioridade).text() == 'Média'){
        $(prioridade).css({'font-weight':'600', 'background-color':'rgb(255, 255, 124)'});
    } else if ($(prioridade).text() == 'Alta'){
        $(prioridade).css({'font-weight':'600', 'background-color':'rgb(243, 117, 117)'});
    }
});

// Pagina create
$('#descricao').keyup(function(){
    var limite = 500;
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;
    $('.caracteres').text(caracteresRestantes + ' caracteres restantes.');
    if (caracteresDigitados >= 450){
        $('.caracteres').css('color', 'red');
    } else {
        $('.caracteres').css('color', 'green');
    }
    $('.caracteres').css('display', 'block');
});

$('#descricao').blur(function(){
    $('.caracteres').css('display', 'none');
});

// pagina acompanhamento usuario
function verDetalheChamado(id){
    $('#modal_detalhes_chamados').modal('show');
    document.getElementById('modal_analista').setAttribute('value', id.analista || 'Aguardando...');
    document.getElementById('modal_email_analista').setAttribute('value', id.email_analista || 'Aguardando...');
    document.getElementById('modal_prioridade').setAttribute('value', id.prioridade || 'Aguardando...');
    document.getElementById('modal_status').setAttribute('value', id.status || 'Aguardando...');
    document.getElementById('modal_descricao').innerText = id.descricao || 'Aguardando..';
    document.getElementById('modal_andamento').innerText = id.andamento || 'Aguardando..';
    document.getElementById('modal_resolucao').innerText = id.resolucao || 'Aguardando..';
    document.getElementById('modal_resolucao').innerText = id.resolucao || 'Aguardando..';
    document.getElementById('modal_anexo').setAttribute('src', '/img_chamados/'+`${id.formFile}`)
}

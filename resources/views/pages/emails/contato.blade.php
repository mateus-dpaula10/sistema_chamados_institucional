<!DOCTYPE html>

<html>

<body>  
    <h1>Mensagem:</h1>

    <p>A equipe de T.I do Ceert recebeu o seu chamado com sucesso!</p>

    <p>Em breve seu chamado será atendido.</p>

    <p>Abaixo seguem detalhes do seu chamado:</p>

    <p>Nome do analista: {{ $analista }}</p>
    <p>E-mail do analista: {{ $email_analista }}</p>
    <p>Descrição do chamado: {{ $descricao }}</p>
    <p>Previsão de entrega do chamado: {{ $previsao_entrega }}</p>
</body>

</html>

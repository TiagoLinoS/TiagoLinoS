<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Formulário</title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];

    require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "tiago.santos@estudante.ifb.edu.br");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "tiagolinods@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Tiago, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
		//Referencias
		//https://www.youtube.com/watch?v=OZG6PBlqNec
		//https://www.youtube.com/watch?v=oDo8FlDXyLY
		//https://www.youtube.com/watch?v=2idv8xgGH0k
        ?>
    </body>
</html>
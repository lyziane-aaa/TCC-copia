<!DOCTYPE html>
<html>
<head>
<?php 
    include_once("../../TCC/funcs/header.php")?>
    <title>Contato</title>
</head>
<body class="bg-dark">
<?php 
    include_once(SITE_ROOT . "funcs/menu.php");
    ?>

		<h4 class="sent-notification"></h4>

		<form class="cadastro bg-dark" id="contatoForm">
			<h2 align="center"><i class="fas fa-phone-square-alt"></i> Entre em contato conosco</h2>

			<label>Nome</label>
			<input id="name" type="text" placeholder="Digite seu nome" required>
			<br><br>

			<label>Email</label>
			<input id="email" type="text" placeholder="Digite seu email" required>
			<br><br>

			<label>Assunto</label>
			<input id="subject" type="text" placeholder=" Digite o assunto" required>
			<br><br>

			<p>Mensagem</p>
			<textarea id="body" rows="3" placeholder="Digite sua mensagem" required></textarea>
            <input type="reset" value="Limpar">
			<input type="submit" onsubmit="sendEmail()" value="Enviar Email">
		</form>
</div>

<?php 
include_once(SITE_ROOT . "funcs/footer.php");
?>
</body>
</html>
      
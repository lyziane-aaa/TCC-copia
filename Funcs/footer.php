<script>
	function confirmar(id) {
		Swal.fire({
			title: 'Você tem certeza?',
			text: "Não há como reverter a exclusão!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Excluir',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.isConfirmed) {
				var hre = "<?= $hre ?>"
				Swal.fire(
					'O Arquivo foi excluido!',
					'',
					'success'
				)
				location.href = hre + id;
			}
		})
	};

	function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'envioEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#contatoForm')[0].reset();
                        $('.sent-notification').text("Mensagem enviada com sucesso.");
                   }
                });
            }
        };

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        };

		$(document).ready(function () {
                $('.collapse-bc').on('click', function () {
                    if ($(this).find('.caret-icon').hasClass('fa-caret-down')) {
                        $(this).find('.caret-icon').removeClass('fa-caret-down').addClass('fa-caret-up');
                    } else {
                        $(this).find('.caret-icon').removeClass('fa-caret-up').addClass('fa-caret-down');
                    }
                });
            });

</script>

<?php
if (isset($_GET['sucesso'])) {
	if ($_GET['sucesso'] == 1) {
		echo " <script>
	Swal.fire(
		'Cadastro Realizado com Sucesso',
		'',
		'success'
	);
	
		</script>";
	} else if($_GET['sucesso'] == 3){
		echo " <script>
		Swal.fire(
			'Registro Atualizado com Sucesso',
			'',
			'success'
		);
		
			</script>";
	}
	else if($_GET['sucesso'] == 4){
		echo " <script>
		Swal.fire(
			'Bimestre atualizado com sucesso',
			'',
			'success'
		);
		
			</script>";
	}
	else{
		echo "Deu ERRADO!";
	}
}


        

?>
</div>
<footer id="rodape" >
    <p>Copyright &copy; 2021 by Eduardo Marinho, Lucas Felipe e Lyziane Nogueira <br>
        <a href="https://pt-br.facebook.com/gevpoficial/" target="blank">Facebook </a>| <a href="https://www.instagram.com/gevp.ifrn/" target="blank"> Instagram </a>
    </p>
</footer>
</div><!-- fim do container-->
</body>
</html>
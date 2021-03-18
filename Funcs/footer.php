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
<footer id="rodape" >
    <p>Copyright &copy; 2021 by Eduardo Marinho, Lucas Felipe e Lyziane Nogueira <br>
        <a href="https://pt-br.facebook.com/gevpoficial/" target="blank">Facebook </a>| <a href="https://www.instagram.com/gevp.ifrn/" target="blank"> Instagram </a>
    </p>
</footer>
</div><!-- fim do container-->
</body>
</html>
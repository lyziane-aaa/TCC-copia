<!DOCTYPE html>
<html>
	<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Buscar Achados e Perdidos</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<link rel="stylesheet" type="text/css" href="../_css/listar.css">
			
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/kt-2.5.3/sl-1.3.1/datatables.min.css"/>
      
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/kt-2.5.3/sl-1.3.1/datatables.min.js"></script>
		
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<script type="text/javascript">
            setTimeout(function(){ 
                var msg = document.getElementsByClassName("alertaDeErro");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
        </script>
			<script>
        $.fn.dataTable.Buttons.swfPath = '../../Teste/flashExport.swf'
			$(document).ready(function() {
					$('#tabela_achados').DataTable( {
						"Processando": true,
            "serverSide": true,
            select: 'multi',
            select: {
                items: 'row',
                  
            },

    				"language": {
   								 "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
						"ajax": {
						"url": "tabela_achados.php",
						"type": "POST"
						},
					} );
        } );
        $('#tabela_achados').on( 'click', 'tbody tr', function () {
    myTable.row( this ).delete( {
        buttons: [
            { label: 'Cancel', fn: function () { this.close(); } },
            'Delete'
        ]
    } );
} );
        

			</script>
	</head>

	<body class="temaescuro">

	<?php
	include_once("../menu.php");
    if(isset($_SESSION['login'])) {session_start();}
    
		$nivel_necessario = 2;
		include_once("../conexao.php");
	
			$_SESSION['listar'] = 1;
			/* Aparentemente a presença do Bootstrap altera o tamanho da imagem no menu,
			então essa variavel se encontrara em todos os listar e conterá o novo conteudo a ser colocado
      como formartação da imagem, porém para isso dar certo terei de fazer um teste lógico dentro do
      class="table table-bordered table-striped"
       menu com o php */
  ?>
	
		<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading">Achados e Perdidos</div>
        <div class="panel-body">
            <div class="table-responsive">
    <table id="tabela_achados">
        <thead>
            <tr>
                
                <th>Nome do Objeto</th>
				<th>Descrição</th>
                <th>Gremista que recebeu</th>
                <th>Quando foi achado</th>
                <th>Onde foi achado</th>
				<th>Quem reivindicou</th>
                <th>CPF ou Matrícula</th>
                <th>Gremista que devolveu</th>
                <th>Postado</th>
                <th>Situação</th>
                <th>Imagem</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            </div> 
        </div>
      
    </div>
</div>
<?php



$result_achados="SELECT * FROM achados WHERE 1=1";
$resultado_achados= mysqli_query($conn, $result_achados);

while ($row_achados =mysqli_fetch_array($resultado_achados)) { 
	
echo '<div class="modal fade" id="modal-img-' . $row_achados["id_achados"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div style="overflow-y: hidden; height: calc(100vh - 15rem);">
      <div class="px-2" style="overflow-y: auto; height: 100%;">
        <img src= "imgAchados/' . $row_achados["img_achados"] . '" alt = "toto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>';
// Modal de editar
echo '

<div class="modal fade" id="modal-editar-' . $row_achados["id_achados"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div style="overflow-y: hidden; height: calc(100vh - 15rem);">
        <div class="px-2" style="overflow-y: auto; height: 100%;">
            <form action="inserir_achados.php" class = "cadastro" method="post">
            <h2 class="cad-titulo"><img src="../imagens/achados.png"> Cadastro Achados e Perdidos</h2>
            <hr class="divisor"> 

            <label for="nome-objeto">Nome do Objeto:</label>
            <input type="text" name="nomeAchados"  value="' . $row_achados["nome_achados"] . '"required>
            <br>

            <label for="gremista-recebe">Gremista que recebeu:</label>
            <input type="text" name="gremistaRecebeuAchados" value="' . $row_achados["gremista_recebeu_achados"] . '" required>
            <br>

            <label for="quando-achados">Quando foi achado:</label>
            <input type="date" name="quandoAchados"  value="' . $row_achados["quando_achados"] . '" required>
            <br>

            <label for="onde-achados">Onde foi achado:</label>
            <input type="text" name="ondeAchados"  value="' . $row_achados["onde_achados"] . '" required>
            <br>

            <label for="dados-achados">CPF ou Matrícula de quem Reinvindicou:</label>
            <input type="text" name="cpfMatriculaAchados"  onKeyPress="return Onlynumbers(event);" value="' . $row_achados["cpf_matricula_achados"] . '" required>
            <br>

            <label for="gremista-devolveu-achados">Gremista que devolveu:</label>
            <input type="text" name="gremistaDevolveuAchados"  value="' . $row_achados["gremista_devolveu_achados"] . '" >
            <br>

            <div> 
                <label for="postado" id="post">Postado:</label>
                    <select name="postadoAchados" >
                        <option value="Sim">Sim</option>
                        <option selected value="Não">Não</option>
                    </select>
                    
                <label for="status" id="situ">Situação:</label>
                    <select name="statusAchados">
                        <option value="Devolvido">Devolvido</option>
                        <option selected value="Aguardando"  >Aguardando</option>
                        <option value="Incorporado">Incorporado</option>
                    </select>
            </div>
            <br>

            <label for="descricao">Descrição</label> 
            <textarea name="descricaoAchados"  
            cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto" value="' . $row_achados["descricao_achados"] . '" ></textarea>
            <br>

            <input type="submit" class="botao" onclick="msg()" value="Cadastrar">
            <input type="reset" class="botao" value="Limpar">
        </form>
       </div> <!-- modal body -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>';

}


include_once("../footer.php");
?>

	</body>

</html>
<html>
<head>
<!-- TEM DE ALTERAR O FETCH, O LINK PARA 
O FETCH E OS CAMPOS QUE SÃO MANDADOS VIA A JQUERY
Rever como mandar campos de variáveis de multipla escolhas!-->
<title>Bolsa Cópia-Listar</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="tema-escuro">
<?php 
    include_once("../menu.php");
?>
    <div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading">Achados e Perdidos</div>
        <div class="panel-body">
            <div class="table-responsive">
    <table id="data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome do Objeto</th>
                <th>Gremista que recebeu</th>
                <th>Quando foi achado</th>
                <th>Onde foi achado</th>
                <th>CPF ou Matrícula</th>
                <th>Gremista que recebeu</th>
                <th>Postado</th>
                <th>Situação</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            </div> <!-- Panel-body !-->
        </div>
    </div>
</div>
<br/>
<br/>
</body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

var dataTable = $('#data').DataTable({
"processing" : true,
"serverSide" : true,
"order" : [],
"ajax" : {
url:"fetch_achados.php",
type:"POST"
}
});

$('#data').on('draw.dt', function(){
$('#data').Tabledit({
url:'action.php',
dataType:'json',
columns:{
    identifier : [0, 'id'],
    editable:[[1, 'Nome do Objeto'], [2, 'Gremista que recebeu'], [3, 'Quando foi achado'], [4, 'Onde foi achado'], [5, 'CPF ou Matrícula'],[6, 'Gremista que Devolveu'], [7, 'Postado',['Sim'],['Não']], [8, 'Situação'], [9, 'imagem']]
},
restoreButton:false,
onSuccess:function(data, textStatus, jqXHR)
{

if(data.action == 'delete')
{
    $('#' + data.id).remove();
    $('#data').DataTable().ajax.reload();
}
        }
    });
});
}); 
</script>
